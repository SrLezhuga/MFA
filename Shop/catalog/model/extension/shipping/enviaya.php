<?php
include('./admin/controller/extension/shipping/eyLib/EYHelper.php');

class ModelExtensionShippingEnviaya extends Model
{
    private $_api;
    private $_dataTranslate;

    public function __construct($params)
    {
        parent::__construct($params);

        $_getTypeValue = (int)$this->getStoreConfig(EYHelper::TEST_MODE);
        $EYHelper = new EYHelper;
        $existsAccount = $this->existsAccount();
        $enviaya_accounts = $existsAccount ? $existsAccount['enviaya_account'] : null;
        $this->_dataTranslate = $EYHelper->getJsonTranslation($this->language->get('code'), $enviaya_accounts);

        $this->_api = [
            'api_key' => $this->getStoreConfig(($_getTypeValue == 0) ? 'shipping_enviaya_apikey' : 'shipping_enviaya_test_apikey'),
            'enviaya_account' => $existsAccount,
            'api_domain' => $this->_dataTranslate['api_domain'],
            'timeout' => $this->_getServiceTimeout(),
        ];
    }

    function getQuote($address)
    {
        $this->load->language('extension/shipping/enviaya');
        $enableRating = $this->isRatingEnabled();
        $useContigencyServices = $this->useContigencyServices();
        $is_excluded_zone_admin = $this->is_excluded_zone_admin($address);
        $group_by_carrier = $this->getStoreConfig(EYHelper::GROUP_BY_CARRIER);
        $response_result = true;

        if (!$enableRating) {
            return [];
        }

        if ($is_excluded_zone_admin) {
            $_parcels = [];
            if ($this->cart->getProducts()) {
                $_parcels = $this->getParcels($this->cart->getProducts());
            }
            $currency = $this->session->data['currency'];

            $props = [
                'rate_currency' => $currency,
                'shipment_type' => 'Package',
                'parcels' => $_parcels,
                'origin_country_code' => $this->getStoreConfig(EYHelper::COUNTRY_CODE),
                'origin_postal_code' => $this->getStoreConfig(EYHelper::POSTAL_CODE),
                'origin_state_code' => $this->getStoreConfig(EYHelper::STATE_CODE),
                'destination_country_code' => isset($address['iso_code_2']) ? $address['iso_code_2'] : null,
                'destination_state_code' => isset($address['zone_code']) ? $address['zone_code'] : null,
                'destination_postal_code' => isset($address['postcode']) ? $address['postcode'] : null,
                'insured_value_currency' => $currency,
                'currency' => $currency,
                'order_total_amount' => (float)$this->cart->getTotal(),
                'locale' => $_COOKIE['language']
            ];

            $result = EYHelper::libAPI($this->_api)->calculate($props);
            $response = $result['response'];
            $this->logger("RATES REQUEST: " . json_encode($result['request']));
            $this->logger("RATES RESPONSE: " . json_encode($result['response']));
            $quote_data = [];
            $rates = [];

            if (!empty($response) && empty($response->errors)) {
                $response_result = false;
                foreach ($response as $key => $carrier) {
                    if (!empty($carrier) && $key !== "warning" && $key !== "store_pickup") {
                        foreach ($carrier as $service) {
                            if (is_object($service)) {
                                $rates[] = $service;
                                $includeTaxes = (bool)$this->getStoreConfig(EYHelper::CONFIG_TAX);
                                if (isset($service->additional_configuration)) {
                                    $_price = 0.00;
                                } else {
                                    $_price = $includeTaxes ?
                                        (float)$service->total_amount :
                                        (float)$service->net_total_amount;
                                }
                                $titles = $this->getTitles($key, $service);
                                $carrierSlug = $key . '-' . $service->carrier_service_code . '-' . $service->rate_id;
                                $quote_data[$carrierSlug] = [
                                    'code' => 'enviaya.' . $carrierSlug,
                                    'title' => "Enviaya - {$service->carrier}",
                                    'cost' => $_price / $this->currency->getValue($this->session->data['currency']),
                                    'text' => $titles,
                                    'tax_class_id' => null
                                ];
                            }
                        }
                    }
                }
            }

            if ($useContigencyServices && $response_result) {
                $enable_contingency_shipping_services = $this->getStoreConfig(EYHelper::ENABLE_CONTINGENCY_SHIPPING_SERVICES);
                $contingency_standard_shipping = $this->getStoreConfig(EYHelper::CONTINGENCY_STANDARD_SHIPPING);
                $contingency_express_shipping = $this->getStoreConfig(EYHelper::CONTINGENCY_EXPRESS_SHIPPING);
                $flat_standard = $this->getStoreConfig(EYHelper::FLAT_STANDARD);
                $flat_express = $this->getStoreConfig(EYHelper::FLAT_EXPRESS);
                if ($enable_contingency_shipping_services == "1") {
                    if ($contingency_standard_shipping == "1") {
                        $quote_data['standard-1'] = [
                            'code' => 'enviaya.standard-1',
                            'title' => $this->_dataTranslate['standard_flat_rate'],
                            'cost' => (float)$flat_standard,
                            'text' => $this->_dataTranslate['standard_flat_rate'] . " - " . $this->currency->format($this->tax->calculate($flat_standard, $this->config->get('shipping_flat_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency']),
                            'tax_class_id' => null
                        ];
                    }
                    if ($contingency_express_shipping == "1") {
                        $quote_data['express-2'] = [
                            'code' => 'enviaya.express-2',
                            'title' => $this->_dataTranslate['express_flat_rate'],
                            'cost' => (float)$flat_express,
                            'text' => $this->_dataTranslate['express_flat_rate'] . " - " . $this->currency->format($this->tax->calculate($flat_express, $this->config->get('shipping_flat_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency']),
                            'tax_class_id' => null
                        ];
                    }
                }
            }
        } else {
            return [];
        }

        uasort($quote_data, function ($a, $b) {
            return $a['cost'] > $b['cost'];
        });

        $method_data = [];
        $result = [];

        foreach ($quote_data as $key => $item) {
            $name = stristr($key, '-', true);

            if (array_key_exists($name, $result)) {
                $result[$name][] = $item;
            } else {
                $result[$name] = [$item];
            }
        }

        if (count($quote_data)) {
            $design = $this->getStoreConfig(EYHelper::SHIPPING_SERVICES_DESIGN);
            $title = $this->getStoreConfig(EYHelper::TITLE);
            if ($this->request->get['route'] == "api/shipping/methods" || $this->request->get['route'] == "extension/total/shipping/quote") {
                $method_data = [
                    'code' => 'enviaya',
                    'title' => [
                        'title' => $title,
                        'rates' => $rates
                    ],
                    'quote' => $quote_data,
                    'sort_order' => $this->config->get('shipping_enviaya_sort_order'),
                    'error' => false
                ];
            } else {
                $method_data = [
                    'code' => 'enviaya',
                    'title' => [
                        'title' => $title,
                        'rates' => $rates,
                        'services_design' => $design,
                        'group_by_carrier' => $group_by_carrier
                    ],
                    'quote' => $group_by_carrier == "1" && $design == "0" ? $result : $quote_data,
                    'sort_order' => $this->config->get('shipping_enviaya_sort_order'),
                    'error' => false
                ];
            }
        }

        return $method_data;
    }

    public function logger($content)
    {
        $enable_api_logs = $this->getStoreConfig(EYHelper::ENABLE_API_LOGS);

        if ($enable_api_logs == "1") {
            $this->log->write($content);
        }
    }

    public function is_excluded_zone_admin($address)
    {
        $excluded_zones = $this->getStoreConfig(EYHelper::ZONE_DATA);

        if ($excluded_zones == '[]') {
            return true;
        } else {
            $array = json_decode(html_entity_decode($excluded_zones));
            if (!empty($array)) {
                foreach ($array as $zone) {
                    $result = false;
                    $excluded_zone_locations = 'excluded_zone_locations[]';
                    $excluded_zone_postcodes = 'excluded_zone_postcodes[]';

                    if (isset($zone->$excluded_zone_locations)) {
                        foreach ($zone->$excluded_zone_locations as $item) {
                            if ((stristr($item, 'country:') &&
                                    str_replace("country:", "", $item) == $address['country_id']) ||
                                stristr($item, 'state:') && str_replace("state:", "", $item) ==
                                $address['zone_id']
                            ) {
                                $result = true;
                                break;
                            }
                        }
                        if ($result) {
                            $zones = explode(',', $zone->$excluded_zone_postcodes);
                            for ($i = 0; $i < count($zones); $i++) {
                                if (strstr($zones[$i], '...')) {
                                    $explode_zones = explode('...', $zones[$i]);
                                    array_splice($zones, $i, 1, range($explode_zones[0], $explode_zones[1]));
                                }
                            }

                            foreach ($zones as $postcodes) {
                                if ($postcodes == $address['postcode']) {
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

    private function _getServiceTimeout()
    {
        return (int)$this->getStoreConfig(EYHelper::SERVICE_TIMEOUT);
    }

    private function isRatingEnabled()
    {
        return (bool)$this->getStoreConfig(EYHelper::ENABLE_RATING);
    }

    private function getStoreConfig($key)
    {
        return $this->config->get($key);
    }

    private function getParcels($products)
    {
        $this->load->model('catalog/product');
        $_parcels = [];

        foreach ($products as $item) {
            $_Q = $item['quantity'];
            $_qty = (float)$_Q;
            $tmpLength = null;
            $tmpHeight = null;
            $tmpWidth = null;
            $dimensionUnit = null;

            $thisParcel = null;

            $product = $this->model_catalog_product->getProduct($item['product_id']);

            $_weight = (float)$product['weight'];

            $tmpLength = $product['length'] ? (float)$product['length'] : null;
            $tmpHeight = $product['height'] ? (float)$product['height'] : null;
            $tmpWidth = $product['width'] ? (float)$product['width'] : null;

            $weightUnit = $this->getWeightUnit($product['weight_class_id']);
            $dimensionUnit = $this->getLengthUnit($product['length_class_id']);

            if ($_weight && $weightUnit === 'g') {
                $_weight /= 1000;
                $weightUnit = 'kg';
            }

            if ($_weight && $weightUnit === 'oz') {
                $_weight /= 35.274;
                $weightUnit = 'kg';
            }

            $endWeight = round($_weight, 2);

            $thisParcel = [
                'quantity' => (int)$_qty,
                'weight' => $endWeight ? (int)round($endWeight, 2) : null,
                'weight_unit' => $weightUnit,
                'length' => $tmpLength ? (int)round($tmpLength, 2) : null,
                'height' => $tmpHeight ? (int)round($tmpHeight, 2) : null,
                'width' => $tmpWidth ? (int)round($tmpWidth, 2) : null,
                'dimension_unit' => $dimensionUnit,
            ];

            $_parcels[] = $thisParcel;
        }

        return $_parcels;
    }

    private function existsAccount()
    {
        $account = trim($this->getStoreConfig(EYHelper::ACCOUNT));

        if ($account !== '') {
            return ['enviaya_account' => $account];
        }

        return false;
    }

    private function getTitles($carrier, $service)
    {
        $includeTaxes = (bool)$this->getStoreConfig(EYHelper::CONFIG_TAX);
        $currency = $service->currency;
        $estimated_delivery = isset($service->estimated_delivery) ? date_create($service->estimated_delivery) : null;
        $display_logo = $this->getStoreConfig(EYHelper::DISPLAY_CARRIER_LOGO);
        $logo_url = isset($service->carrier_logo_url) ? $service->carrier_logo_url : null;

        if (strpos($logo_url, 'ups')) {
            $logo = $display_logo ? "<div style='min-width: 50px; height: 36px; display: inline-block; text-align: center;'><img style='max-width: 22px;' src='{$logo_url}'></div>" : "";
        } else {
            $logo = $display_logo ? "<div style='min-width: 50px; height: 36px; display: inline-block; text-align: center;'><img style='max-width: 45px;' src='{$logo_url}'></div>" : "";
        }

        $design = $this->getStoreConfig(EYHelper::SHIPPING_SERVICES_DESIGN);
        $delivery_time = $this->getStoreConfig(EYHelper::SHIPPING_DELIVERY_TIME);
        $service_name_config = $this->getStoreConfig(EYHelper::SHIPPING_SERVICE_NAME);
        $service_display = $this->getStoreConfig(EYHelper::SHIPPING_SERVICES_DISPLAY);
        $as_defined_price = $this->getStoreConfig(EYHelper::AS_DEFINED_PRICE);

        $line = '-';

        switch ($delivery_time) {
            case '0':
                $delivery_date = isset($estimated_delivery) ? date_format($estimated_delivery, "d/m/Y") : null;
                break;
            case '1':
                $delivery_date = isset($service->est_transit_time_hours) ?
                    $this->calc_delivery_time((float)str_replace(
                        '-',
                        '',
                        $service->est_transit_time_hours
                    )) : null;
                break;
            case '2':
                $delivery_date = null;
                break;
        }

        switch ($service_name_config) {
            case '0':
                $name = isset($service->dynamic_service_name) ? $service->dynamic_service_name : null;
                break;
            case '1':
                $name = isset($service->enviaya_service_name) ? $service->enviaya_service_name : $service->carrier_service_name;
                break;
            case '2':
                $name = isset($service->carrier_service_name) ? $service->carrier_service_name : null;
                break;
            case '3':
                $name = null;
                $line = '';
                break;
        }

        $carrier_name = $this->getStoreConfig(EYHelper::SHIPPING_CARRIER_NAME) == '1' ? "{$service->carrier} {$line}" : "";
        $service_name = isset($service->dynamic_service_name) ? $service->dynamic_service_name : null;

        if (isset($service->additional_configuration)) {
            $_price = '0.00';
            switch ($as_defined_price) {
                case '0':
                    $price = null;
                    break;
                case '1':
                    $price = "<span class='shipment_amount'>({$_price} {$currency})</span>";
                    break;
            }
        } else {
            $_price = $includeTaxes ?
                (float)$service->total_amount :
                (float)$service->net_total_amount;
            $price = "<span class='shipment_amount'>({$_price} {$currency})</span>";
        }

        switch ($design) {
            case '0':
                switch ($service_display) {
                    case '0':
                        $description = "{$logo} <span class='carrier_name'>{$carrier_name}</span> <span class='service_name'>{$name}</span> - <span class='delivery_date'>{$delivery_date}</span> {$price}";
                        break;
                    case '1':
                        $description = "{$logo} <span class='carrier_name'>{$carrier_name}</span> <span class='service_name'>{$name}</span> <br> <span class='delivery_date'>{$delivery_date}</span> {$price}";
                        break;
                }
                break;
            case '1':
                $description = "<span class='carrier_name'>{$carrier_name}</span> <span class='service_name'>{$service_name}</span> - <span class='delivery_date'>{$delivery_date}</span> {$price}";
                break;
        }

        $name = isset($service->additional_configuration) ? $service->additional_configuration->free_shipping->free_shipping_name : $name;
        $description = isset($service->additional_configuration) ? "<span class='service_name'>{$name}</span> {$price}" : $description;

        return $description;
    }

    public function calc_delivery_time($item)
    {
        if ($item < 24) {
            $result = round($item, 1);

            if ($result == 1) {
                $result = $result . ' ' . $this->_dataTranslate['hour'];
            } else {
                $result = $result . ' ' . $this->_dataTranslate['hours'];
            }
        } else {
            $result = round($item / 24, 1);

            if ($result == 1) {
                $result = $result . ' ' . $this->_dataTranslate['day'];
            } else {
                $result = $result . ' ' . $this->_dataTranslate['days'];
            }
        }

        return $result;
    }

    private function getWeightUnit($weight_class_id)
    {
        $query = $this->db->query("SELECT `unit` FROM `" . DB_PREFIX . "weight_class_description` WHERE `weight_class_id` = '" . $weight_class_id . "' LIMIT 1");
        return $query->row['unit'];
    }

    private function getLengthUnit($length_class_id)
    {
        $query = $this->db->query("SELECT `unit` FROM `" . DB_PREFIX . "length_class_description` WHERE `length_class_id` = '" . $length_class_id . "' LIMIT 1");
        return $query->row['unit'];
    }

    private function useContigencyServices()
    {
        $useContigencyServices = $this->getStoreConfig(EYHelper::ENABLE_CONTINGENCY_SHIPPING_SERVICES);
        if ((strlen($useContigencyServices) > 0) && ($useContigencyServices != '0')) {
            return true;
        }
        return false;
    }
}
