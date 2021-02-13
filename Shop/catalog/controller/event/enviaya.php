<?php
include('./admin/controller/extension/shipping/eyLib/EYHelper.php');

class ControllerEventEnviaya extends Controller
{
    protected $_apikey = null;
    protected $_orderCarrier = null;
    protected $_serviceCode = null;
    protected $_rateId = null;
    private $_dataTranslate;

    public function __construct($params)
    {
        parent::__construct($params);

        $this->_getServiceApiKey();
        $EYHelper = new EYHelper;
        $existsAccount = $this->existsAccount();
        $enviaya_accounts = $existsAccount ? $existsAccount['enviaya_account'] : null;
        $this->_dataTranslate = $EYHelper->getJsonTranslation($this->language->get('code'), $enviaya_accounts);

        $this->_api = [
            'api_key' => $this->_apikey,
            'enviaya_account' => $this->existsAccount(),
            'api_domain' => $this->_dataTranslate['api_domain'],
            'timeout' => $this->_getServiceTimeout(),
        ];
    }

    public function shipmentBooking(&$route, &$args, &$output)
    {
        $this->load->model('checkout/order');
        $order = $this->model_checkout_order->getOrder($this->session->data['order_id']);
        $this->setCarrierAndRateid($order['shipping_code']);
        $rates = $this->session->data['shipping_methods']['enviaya']['title']['rates'];
        $order_id = $this->session->data['order_id'];

        foreach ($rates as $rate) {
            $free_shipping = isset($rate['additional_configuration']) ? $rate['additional_configuration']['free_shipping']['free_shipping_name'] : null;

            $active = $rate['rate_id'] == $this->_rateId ? 1 : 0;
            $total_amount = !$free_shipping ? $rate['total_amount'] : 0;

            $this->db->query("INSERT INTO " . DB_PREFIX . "rates SET
                order_id = {$order_id},
                rate_id = {$rate['rate_id']},
                carrier = '{$rate['carrier']}',
                carrier_service_name = '{$rate['carrier_service_name']}',
                carrier_service_code = '{$rate['carrier_service_code']}',
                estimated_delivery = '{$rate['estimated_delivery']}',
                free_shipping = '{$free_shipping}',
                currency = '{$rate['currency']}',
                carrier_logo_url = '{$rate['carrier_logo_url']}',
                total_amount = '{$total_amount}',
                active = {$active},
                dynamic_service_name = '{$rate['dynamic_service_name']}'");
        }

        if (!$this->isEnviayaShipment($order['shipping_code'])) {
            return true;
        }

        $_origin = [
            'full_name' => $this->_removeAscii($this->getStoreConfig(EYHelper::SENDER_NAME)),
            'company' => $this->_removeAscii($this->getStoreConfig(EYHelper::COMPANY_NAME)),
            'country_code' => $this->getStoreConfig(EYHelper::COUNTRY_CODE),
            'postal_code' => $this->getStoreConfig(EYHelper::POSTAL_CODE),
            'direction_1' => $this->_removeAscii($this->getStoreConfig(EYHelper::DIRECTION_FIRST)) . ' ' .
                $this->_removeAscii($this->getStoreConfig(EYHelper::DIRECTION_SECOND)),
            'city' => $this->_removeAscii($this->getStoreConfig(EYHelper::CITY)),
            'phone' => $this->getStoreConfig(EYHelper::PHONE),
            'state_code' => $this->_removeAscii($this->getStoreConfig(EYHelper::STATE_CODE)),
            'neighborhood' => $this->_removeAscii($this->getStoreConfig(EYHelper::NEIGHBORHOOD)),
            'district' => $this->_removeAscii($this->getStoreConfig(EYHelper::DISTRICT)),
            'email' => $this->getStoreConfig(EYHelper::EMAIL)
        ];

        $fullName = isset($order['shipping_firstname']) ? $order['shipping_firstname'] : '';
        $fullName .= isset($order['shipping_lastname']) ? " {$order['shipping_lastname']}" : '';
        $_destiny = [
            'full_name' => $this->_removeAscii($fullName),
            'company' => $this->_removeAscii((isset($order['shipping_company']) ? $order['shipping_company'] : '')),
            'country_code' => isset($order['shipping_iso_code_2']) ? $order['shipping_iso_code_2'] : $order['shipping_iso_code_3'],
            'postal_code' => isset($order['shipping_postcode']) ? $order['shipping_postcode'] : '',
            'direction_1' => $this->_removeAscii((isset($order['shipping_address_1']) ? $order['shipping_address_1'] : '')) .
                ' ' .
                $this->_removeAscii((isset($order['shipping_address_2']) ? $order['shipping_address_2'] : '')),
            'city' => $this->_removeAscii((isset($order['shipping_city']) ? $order['shipping_city'] : '')),
            'phone' => (isset($order['telephone']) ? $order['telephone'] : ''),
            'state_code' => str_replace('MX-', '', $order['shipping_zone_code']),
            'district' => $this->_removeAscii((isset($order['shipping_zone']) ? $order['shipping_zone'] : '')),
            'email' => $this->getStoreConfig(EYHelper::SEND_SHIPMENT_NOTICE) == "1" ? $order['email'] : null
        ];

        $getProducts = $this->cart->getProducts();
        $content = '';
        foreach ($getProducts as $item) {
            if ($item == end($getProducts)) {
                $content .= $item['name'];
            } else {
                $content .= "{$item['name']}, ";
            }
        }

        $_parcels = [];
        if ($getProducts) {
            $_parcels = $this->getParcels($getProducts);
        }
        if ($_parcels === false) {
            return false;
        }

        $currency = $order['currency_code'];

        $props = [
            'rate_id' => $this->_rateId,
            'rate_currency' => $currency,
            'carrier' => $this->_orderCarrier,
            'carrier_service_code' => $this->_serviceCode,
            'origin_full_name' => isset($_origin['full_name']) ? $_origin['full_name'] : null,
            'origin_company' => isset($_origin['company']) ? $_origin['company'] : null,
            'origin_country_code' => isset($_origin['country_code']) ? $_origin['country_code'] : null,
            'origin_postal_code' => isset($_origin['postal_code']) ? $_origin['postal_code'] : null,
            'origin_direction_1' => isset($_origin['direction_1']) ? $_origin['direction_1'] : null,
            'origin_city' => isset($_origin['city']) ? $_origin['city'] : null,
            'origin_phone' => isset($_origin['phone']) ? $_origin['phone'] : null,
            'origin_state_code' => isset($_origin['state_code']) ? $_origin['state_code'] : null,
            'origin_neighborhood' => isset($_origin['neighborhood']) ? $_origin['neighborhood'] : null,
            'origin_district' => isset($_origin['district']) ? $_origin['district'] : null,
            'origin_email' => isset($_origin['email']) ? $_origin['email'] : null,
            'destination_full_name' => isset($_destiny['full_name']) ? $_destiny['full_name'] : null,
            'destination_company' => isset($_destiny['company']) ? $_destiny['company'] : null,
            'destination_country_code' => isset($_destiny['country_code']) ? $_destiny['country_code'] : null,
            'destination_postal_code' => isset($_destiny['postal_code']) ? $_destiny['postal_code'] : null,
            'destination_direction_1' => isset($_destiny['direction_1']) ? $_destiny['direction_1'] : null,
            'destination_district' => isset($_destiny['district']) ? $_destiny['district'] : null,
            'destination_phone' => isset($_destiny['phone']) ? $_destiny['phone'] : null,
            'destination_state_code' => isset($_destiny['state_code']) ? $_destiny['state_code'] : null,
            'destination_city' => isset($_destiny['city']) ? $_destiny['city'] : null,
            'destination_email' => isset($_destiny['email']) ? $_destiny['email'] : null,
            'parcels' => $_parcels,
            'content' => $content,
            'label_format' => 'Letter',
            'shipment_type' => 'Package',
            'shop_order_id' => isset($order['order_id']) ? $order['order_id'] : null,
            'locale' => isset($order['language_code']) ? $order['language_code'] : null
        ];


        $result = EYHelper::libAPI($this->_api)->create($props);
        $shipment = $result['response'];
        $this->logger("SHIPMENT BOOKING REQUEST: " . json_encode($result['request']));
        $this->logger("SHIPMENT BOOKING RESPONSE: " . json_encode($result['response']));

        if (empty($shipment->errors) && isset($shipment)) {
            $this->saveTrackingNumber($order['order_id'], $shipment);
        }
    }

    public function logger($content)
    {
        $enable_api_logs = $this->getStoreConfig(EYHelper::ENABLE_API_LOGS);
        if ($enable_api_logs == "1") {
            $this->log->write($content);
        }
    }

    private function _getServiceApiKey()
    {
        $_getTypeValue = (int)$this->getStoreConfig(EYHelper::TEST_MODE);
        $this->_apikey = $this->getStoreConfig(($_getTypeValue == 0) ? EYHelper::API_KEY : EYHelper::TEST_API_KEY);
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

    private function _removeAscii($string)
    {
        $toFind = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'];
        $toRepl = ['a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'];

        return str_replace($toFind, $toRepl, $string);
    }

    private function setCarrierAndRateid(string $carrierData)
    {
        $_tmpShipping = str_replace('enviaya.', '', $carrierData);
        $_tmpData = explode('-', $_tmpShipping);

        $this->_orderCarrier = $_tmpData[0];
        $this->_serviceCode = count($_tmpData) > 1 ? $_tmpData[1] : '';
        $this->_rateId = count($_tmpData) > 2 ? $_tmpData[2] : '';
    }

    private function existsAccount()
    {
        $account = trim($this->getStoreConfig(EYHelper::ACCOUNT));

        if ($account !== '') {
            return ['enviaya_account' => $account];
        }

        return false;
    }

    private function getWeightUnit($weight_class_id)
    {
        $query = $this->db->query("SELECT `unit` FROM `" . DB_PREFIX . "weight_class_description` WHERE `weight_class_id` = '{$weight_class_id}' LIMIT 1");
        return $query->row['unit'];
    }

    private function getLengthUnit($length_class_id)
    {
        $query = $this->db->query("SELECT `unit` FROM `" . DB_PREFIX . "length_class_description` WHERE `length_class_id` = '{$length_class_id}' LIMIT 1");
        return $query->row['unit'];
    }

    private function saveTrackingNumber($order_id, $shipment)
    {
        $this->db->query("INSERT INTO " . DB_PREFIX . "order_shipment SET order_id = {$order_id}, tracking_number = '{$shipment->enviaya_shipment_number}', shipping_courier_id = '{$shipment->carrier}', date_added = '{$shipment->shipment_date}', label_url = '{$shipment->label_share_link}'");
    }

    private function _getServiceTimeout()
    {
        return (int)$this->getStoreConfig(EYHelper::SERVICE_TIMEOUT);
    }

    private function isEnviayaShipment(string $carrierData)
    {
        $data = explode('.', $carrierData);
        return $data[0] == 'enviaya';
    }
}
