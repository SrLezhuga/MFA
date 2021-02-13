<?php
include(__DIR__ . '/eyLib/EYHelper.php');

class ControllerExtensionShippingEnviaya extends Controller
{
    private $fields = [
        'shipping_enviaya_contingency_standard_shipping',
        'shipping_enviaya_contingency_express_shipping',
        'shipping_enviaya_shipping_carrier_name',
        'shipping_enviaya_enable_currency_support',
        'shipping_enviaya_shipping_service_name',
        'shipping_enviaya_shipping_delivery_time',
        'shipping_enviaya_shipping_services_display',
        'shipping_enviaya_as_defined_price',
        'shipping_enviaya_zone_data',
        'shipping_enviaya_enable_api_logs',
        'shipping_enviaya_send_shipment_notifications',
        'shipping_enviaya_status',
        'shipping_enviaya_sort_order',
        'shipping_enviaya_service_timeout',
        'shipping_enviaya_account',
        'shipping_enviaya_test_mode',
        'shipping_enviaya_test_apikey',
        'shipping_enviaya_apikey',
        'shipping_enviaya_enable_rating',
        'shipping_enviaya_title',
        'shipping_enviaya_currency',
        'shipping_enviaya_enable_contingency_shipping_services',
        'shipping_enviaya_flat_standard',
        'shipping_enviaya_flat_express',
        'shipping_enviaya_shipping_services_design',
        'shipping_enviaya_display_carrier_logo',
        'shipping_enviaya_group_by_carrier',
        'shipping_enviaya_origin_direction',
        'shipping_enviaya_sender_name',
        'shipping_enviaya_company_name',
        'shipping_enviaya_direction_first',
        'shipping_enviaya_direction_second',
        'shipping_enviaya_neighborhood',
        'shipping_enviaya_district',
        'shipping_enviaya_postal_code',
        'shipping_enviaya_city',
        'shipping_enviaya_state_code',
        'shipping_enviaya_country_code',
        'shipping_enviaya_phone',
        'shipping_enviaya_email'
    ];

    private $required = [];
    private $errors = [];
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
            'enviaya_account' => $this->existsAccount(),
            'api_domain' => $this->_dataTranslate['api_domain'],
            'timeout' => $this->_getServiceTimeout(),
        ];
    }

    public function index()
    {
        $this->load->model('setting/setting');
        $this->load->language('extension/shipping/enviaya');
        $this->load->model('localisation/currency');
        $this->load->model('localisation/country');
        $this->load->model('localisation/zone');

        $data = [];
        $data += $this->_dataTranslate;
        $data['server_name'] = $_SERVER['SERVER_NAME'];
        $data['php'] = !empty(substr(phpversion(), 0, strpos(phpversion(), '-'))) ? substr(phpversion(), 0, strpos(phpversion(), '-')) : phpversion();
        $data['version'] = VERSION;
        $data['curl'] = curl_version()["version"];
        $data['download'] = $this->url->link('tool/log/download', 'user_token=' . $this->session->data['user_token'], true);
        $data['clear'] = $this->url->link('tool/log/clear', 'user_token=' . $this->session->data['user_token'], true);
        $data['support_code_value'] = base64_encode(json_encode([
            'php_version' => $data['php'],
            'opencart_version' => $data['version'],
            'server_name' => $data['server_name'],
            'curl_exists' => $data['curl']
        ]));

        $data['heading_title'] = $data['brand_name'];
        $this->document->setTitle($data['heading_title']);
        $data['currencies'] = $this->model_localisation_currency->getCurrencies();

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->request->post['shipping_enviaya_currency'] = $this->model_setting_setting->getSettingValue('config_currency');
            $this->model_setting_setting->editSetting('shipping_enviaya', $this->request->post);
            $this->saveDirection();
            $this->session->data['success'] = $data['text_success'];
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true));
        }

        $countries = $this->model_localisation_country->getCountries();
        $zones = $this->model_localisation_zone->getZones();

        foreach ($countries as $id => $country) {
            $countryCodeOptions[] = [
                'value' => 'country:' . $country['country_id'],
                'name' => $country['name']
            ];
            foreach ($zones as $item) {
                if ($country['country_id'] == $item['country_id'] && isset($countries[$item['country_id']])) {
                    $countryCodeOptions[] = [
                        'value' => 'state:' . $item['zone_id'],
                        'name' => '- ' . $item['name']
                    ];
                }
            }
        }

        $data['countries_all'] = $countryCodeOptions;
        $data['countries_json'] = json_encode($countryCodeOptions);
        $data['errors'] = $this->errors;
        $data['breadcrumbs'] = [];
        $data['breadcrumbs'][] = [
            'text' => $this->_dataTranslate['text_home'],
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        ];
        $data['breadcrumbs'][] = [
            'text' => $this->_dataTranslate['text_shipping'],
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
        ];
        $data['breadcrumbs'][] = [
            'text' => $data['brand_name'],
            'href' => $this->url->link('extension/shipping/enviaya', 'user_token=' . $this->session->data['user_token'], true)
        ];
        $data['action'] = $this->url->link('extension/shipping/enviaya', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);
        $data['enviaya_accounts'] = $this->getEnviayaAccounts();
        $data['origin_directions'] = $this->getDirections();

        foreach ($this->fields as $field) {
            if (isset($this->request->post[$field])) {
                $data[$field] = $this->request->post[$field];
            } else {
                $data[$field] = $this->config->get($field);
            }
        }

        $data['user_token'] = $this->request->get['user_token'];
        $data['countries'] = $this->model_localisation_country->getCountries();
        $data['currencies'] = $this->model_localisation_currency->getCurrencies();
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/shipping/enviaya', $data));
    }

    public function existsAccount()
    {
        $account = trim($this->getStoreConfig(EYHelper::ACCOUNT));
        if ($account !== '') {
            return ['enviaya_account' => $account];
        }

        return false;
    }

    private function _removeAscii($string)
    {
        $toFind = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'];
        $toRepl = ['a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'];

        return str_replace($toFind, $toRepl, $string);
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

            $this->load->model('catalog/product');
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

    public function tracking()
    {
        $order_id = $this->request->get['order_id'];
        $shipments = $this->getShipments($order_id);
        $order = $this->model_sale_order->getOrder($order_id);
        $products = $this->model_sale_order->getOrderProducts($order_id);
        $fullName = isset($order['shipping_firstname']) ? $order['shipping_firstname'] : '';
        $fullName .= isset($order['shipping_lastname']) ? " {$order['shipping_lastname']}" : '';
        $_parcels = $this->getParcels($products);
        $currency = $order['currency_code'];
        $selectRates = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rates` WHERE `order_id` = '" . $order_id . "'");
        $selectRates = $selectRates->rows;

        uasort($selectRates, function ($a, $b) {
            return $a['total_amount'] > $b['total_amount'];
        });

        $errors = null;

        if (isset($_POST["create_shipment"]) || isset($_POST["update_shipment"])) {
            $shipment_post = isset($_POST["create_shipment"]) ? $_POST["create_shipment"] : $_POST["update_shipment"];
            $shipment_type = isset($_POST["create_shipment"]) ? 'create_shipment' : 'update_shipment';
            $explode = explode(',', $shipment_post);

            $content = '';
            foreach ($products as $item) {
                if ($item == end($products)) {
                    $content .= $item['name'];
                } else {
                    $content .= "{$item['name']}, ";
                }
            }

            $props = [
                'rate_id' => $explode['0'],
                'rate_currency' => $currency,
                'carrier' => $explode['1'],
                'carrier_service_code' => $explode['2'],
                'origin_full_name' => $this->_removeAscii($this->getStoreConfig(EYHelper::SENDER_NAME)),
                'origin_company' => $this->_removeAscii($this->getStoreConfig(EYHelper::COMPANY_NAME)),
                'origin_country_code' => $this->getStoreConfig(EYHelper::COUNTRY_CODE),
                'origin_postal_code' => $this->getStoreConfig(EYHelper::POSTAL_CODE),
                'origin_direction_1' => $this->_removeAscii($this->getStoreConfig(EYHelper::DIRECTION_FIRST)) . ' ' .
                    $this->_removeAscii($this->getStoreConfig(EYHelper::DIRECTION_SECOND)),
                'origin_city' => $this->_removeAscii($this->getStoreConfig(EYHelper::CITY)),
                'origin_phone' => $this->getStoreConfig(EYHelper::PHONE),
                'origin_state_code' => $this->_removeAscii($this->getStoreConfig(EYHelper::STATE_CODE)),
                'origin_neighborhood' => $this->_removeAscii($this->getStoreConfig(EYHelper::NEIGHBORHOOD)),
                'origin_district' => $this->_removeAscii($this->getStoreConfig(EYHelper::DISTRICT)),
                'origin_email' => $this->getStoreConfig(EYHelper::EMAIL),
                'destination_full_name' => $this->_removeAscii($fullName),
                'destination_company' => $this->_removeAscii((isset($order['shipping_company']) ? $order['shipping_company'] : '')),
                'destination_country_code' => isset($order['shipping_iso_code_2']) ? $order['shipping_iso_code_2'] : $order['shipping_iso_code_3'],
                'destination_postal_code' => isset($order['shipping_postcode']) ? $order['shipping_postcode'] : '',
                'destination_direction_1' => $this->_removeAscii((isset($order['shipping_address_1']) ? $order['shipping_address_1'] : '')) .
                    ' ' . $this->_removeAscii((isset($order['shipping_address_2']) ? $order['shipping_address_2'] : '')),
                'destination_district' => $this->_removeAscii((isset($order['shipping_zone']) ? $order['shipping_zone'] : '')),
                'destination_phone' => isset($order['telephone']) ? $order['telephone'] : '',
                'destination_state_code' => str_replace('MX-', '', $order['shipping_zone_code']),
                'destination_city' => $this->_removeAscii((isset($order['shipping_city']) ? $order['shipping_city'] : '')),
                'destination_email' => $this->getStoreConfig(EYHelper::SEND_SHIPMENT_NOTICE) == "1" ? $order['email'] : null,
                'parcels' => $_parcels,
                'content' => $content,
                'label_format' => 'Letter',
                'shipment_type' => 'Package',
                'shop_order_id' => isset($order['order_id']) ? $order['order_id'] : null,
                'locale' => isset($order['language_code']) ? $order['language_code'] : null
            ];

            $result = EYHelper::libAPI($this->_api)->create($props);
            $shipment = $result['response'];
            $this->logger("ADMIN SHIPMENT BOOKING REQUEST: " . json_encode($result['request']));
            $this->logger("ADMIN BOOKING RESPONSE: " . json_encode($result['response']));

            $currency_value = $order['currency_value'];

            if (empty($shipment->errors) && isset($shipment)) {
                if ($shipment_type === 'create_shipment') {
                    $this->saveTrackingNumber($order_id, $explode['0'], $shipment, $shipment_post, $explode['3'], $currency_value);
                } elseif ($shipment_type === 'update_shipment') {
                    $this->updateTrackingNumber($order_id, $explode['0'], $shipment, $shipment_post, $explode['3'], $currency_value);
                }
            } else {
                $errors = $shipment->errors;
            }
        }

        $trackings = [];
        $active_rate = [];

        foreach ($selectRates as $rate) {
            if ($rate['active']) {
                $active_rate = $rate;
            }
        }

        foreach ($shipments as $shipment) {
            $props = [
                'shipment_number' => $shipment['tracking_number'],
                'carrier' => $shipment['shipping_courier_id']
            ];
            $_exeResponse = EYHelper::libAPI($this->_api)->track($props);
            if (isset($_exeResponse->errors)) {
                return false;
            }
            $_exeResponse->label_url = $shipment['label_url'];
            $trackings[] = $_exeResponse;
        }

        return $this->load->view('extension/shipping/enviaya_tracking', ['trackings' => $trackings, 'translate' => $this->_dataTranslate, 'selectRates' => $selectRates, 'active_rate' => $active_rate, 'errors' => $errors]);
    }

    public function logger($content)
    {
        $enable_api_logs = $this->getStoreConfig(EYHelper::ENABLE_API_LOGS);
        if ($enable_api_logs == "1") {
            $this->log->write($content);
        }
    }

    private function saveTrackingNumber($order_id, $rate_id, $shipment, $shipment_post, $total_shipping, $currency_value)
    {
        $total_shipping = $total_shipping / $currency_value;

        $this->db->query("INSERT INTO " . DB_PREFIX . "order_shipment SET
                order_id = {$order_id},
                tracking_number = '{$shipment->enviaya_shipment_number}',
                shipping_courier_id = '{$shipment->carrier}',
                date_added = '{$shipment->shipment_date}',
                label_url = '{$shipment->label_share_link}'
                ");
        $title = "Enviaya - $shipment->carrier";
        $this->db->query("UPDATE " . DB_PREFIX . "order_total SET
                title = '{$title}',
                value = {$total_shipping} WHERE order_id = {$order_id} AND code = 'shipping'");

        $query = $this->db->query("SELECT `value` FROM `" . DB_PREFIX . "order_total` WHERE `order_id` = '{$order_id}' AND NOT `code` = 'total' ");
        $order_total = $query->rows;
        $total = 0;

        foreach ($order_total as $item) {
            $total += $item['value'];
        }

        $this->db->query("UPDATE " . DB_PREFIX . "order SET
                shipping_method = '{$shipment->carrier}',
                shipping_code = '{$shipment_post}',
                total = $total WHERE order_id = {$order_id}");

        $this->db->query("UPDATE " . DB_PREFIX . "order_total SET
                value = $total WHERE order_id = {$order_id} AND code = 'total'");

        $this->db->query("UPDATE " . DB_PREFIX . "rates SET active = 0 WHERE order_id = '{$order_id}'");
        $this->db->query("UPDATE " . DB_PREFIX . "rates SET active = 1 WHERE rate_id = '{$rate_id}'");

        header("Refresh:0");
    }

    private function updateTrackingNumber($order_id, $rate_id, $shipment, $shipment_post, $total_shipping, $currency_value)
    {
        $total_shipping = $total_shipping / $currency_value;
        $this->db->query("UPDATE " . DB_PREFIX . "order_shipment SET
                tracking_number = '{$shipment->enviaya_shipment_number}',
                shipping_courier_id = '{$shipment->carrier}',
                date_added = '{$shipment->shipment_date}', label_url = '{$shipment->label_share_link}' WHERE order_id = '{$order_id}'");
        $title = "Enviaya - $shipment->carrier";
        $this->db->query("UPDATE " . DB_PREFIX . "order_total SET
                title = '{$title}',
                value = {$total_shipping} WHERE order_id = {$order_id} AND code = 'shipping'");

        $query = $this->db->query("SELECT `value` FROM `" . DB_PREFIX . "order_total` WHERE `order_id` = '{$order_id}' AND NOT `code` = 'total' ");
        $order_total = $query->rows;
        $total = 0;

        foreach ($order_total as $item) {
            $total += $item['value'];
        }

        $this->db->query("UPDATE " . DB_PREFIX . "order SET
                shipping_method = '{$shipment->carrier}',
                shipping_code = '{$shipment_post}',
                total = $total WHERE order_id = {$order_id}");

        $this->db->query("UPDATE " . DB_PREFIX . "order_total SET
                value = $total WHERE order_id = {$order_id} AND code = 'total'");

        $this->db->query("UPDATE " . DB_PREFIX . "rates SET active = 0 WHERE order_id = '{$order_id}'");
        $this->db->query("UPDATE " . DB_PREFIX . "rates SET active = 1 WHERE rate_id = '{$rate_id}'");

        header("Refresh:0");
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/shipping/enviaya')) {
            $this->errors[] = $this->language->get('error_permission');
        }

        foreach ($this->required as $field) {
            $field_name = str_replace('shipping_enviaya_', '', $field);
            if (empty($this->request->post[$field])) {
                $this->errors[] = $this->language->get('error_' . $field_name);
            }
        }

        return !$this->errors;
    }

    public function install()
    {
        $this->db->query("ALTER TABLE " . DB_PREFIX . "order_shipment ADD label_url VARCHAR (255)");

        $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "rates (
            id INT NOT NULL AUTO_INCREMENT,
            order_id INT NOT NULL,
            rate_id INT NOT NULL,
            carrier VARCHAR(40) NOT NULL,
            carrier_service_name VARCHAR(40) NOT NULL,
            carrier_service_code VARCHAR(40) NOT NULL,
            estimated_delivery VARCHAR(40) NOT NULL,
            free_shipping VARCHAR(140) NULL,
            currency VARCHAR(10) NOT NULL,
            carrier_logo_url VARCHAR(180) NULL,
            total_amount VARCHAR(10) NOT NULL,
            dynamic_service_name VARCHAR(60) NOT NULL,
            active BIT NOT NULL,
            ts_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`))");

        $this->load->model('setting/event');
        $this->load->model('setting/setting');
        $this->load->language('extension/shipping/enviaya');
        $currency = $this->model_setting_setting->getSettingValue('config_currency');
        $settings = [
            'shipping_enviaya_status' => 1,
            'shipping_enviaya_sort_order' => 1,
            'shipping_enviaya_test_mode' => 1,
            'shipping_enviaya_enable_rating' => 1,
            'shipping_enviaya_shipping_carrier_name' => 0,
            'shipping_enviaya_shipping_service_name' => 0,
            'shipping_enviaya_shipping_delivery_time' => 0,
            'shipping_enviaya_shipping_services_design' => 1,
            'shipping_enviaya_as_defined_price' => 0,
            'shipping_enviaya_enable_contingency_shipping_services' => 1,
            'shipping_enviaya_contingency_standard_shipping' => 1,
            'shipping_enviaya_contingency_express_shipping' => 1,
            'shipping_enviaya_flat_standard' => 100,
            'shipping_enviaya_flat_express' => 150,
            'shipping_enviaya_enable_currency_support' => 1,
            'shipping_enviaya_send_shipment_notifications' => 1,
            'shipping_enviaya_applicable_countries' => 0,
            'shipping_enviaya_service_timeout' => 15,
            'shipping_enviaya_enable_api_logs' => 0,
            'shipping_enviaya_currency' => $currency,

        ];
        $this->model_setting_setting->editSetting('shipping_enviaya', $settings);
        $this->model_setting_event->addEvent('enviaya_shipment_booking', 'catalog/controller/extension/payment/cod/confirm/after', 'event/enviaya/shipmentBooking');
    }

    public function uninstall()
    {
        $this->db->query("ALTER TABLE " . DB_PREFIX . "order_shipment DROP COLUMN label_url");
        $this->load->model('setting/event');
        $this->model_setting_event->deleteEventByCode('enviaya_shipment_booking');
    }

    private function getEnviayaAccounts()
    {
        $_exeResponse = EYHelper::libAPI($this->_api)->get_accounts();
        $accounts = [];

        if (isset($_exeResponse->errors)) {
            $accounts[] = [
                'value' => '',
                'label' => $this->_dataTranslate['get_origin_addresses']
            ];
            return $accounts;
        }

        if (isset($_exeResponse->enviaya_accounts)) {
            foreach ($_exeResponse->enviaya_accounts as $item) {
                $accounts[] = [
                    'value' => $item->account,
                    'label' => "{$item->alias} ({$item->account})"
                ];
            }

            return $accounts;
        }

        if (count($accounts) == 1) {
            $settings = $this->model_setting_setting->getSetting('shipping_enviaya');
            $settings['shipping_enviaya_account'] = $accounts[0]['value'];
            $this->model_setting_setting->editSetting('shipping_enviaya', $settings);
        }

        return $accounts;
    }

    private function getDirections()
    {
        $_exeResponse = EYHelper::libAPI($this->_api)->directions();
        $result = json_decode(json_encode($_exeResponse), true);
        $items = [];

        if (isset($result['directions'])) {
            foreach ($result['directions'] as $item) {
                $items[] = [
                    'full_name' => $item['full_name'],
                    'company' => $item['company'],
                    'phone' => $item['phone'],
                    'email' => $item['email'],
                    'direction_1' => $item['direction_1'],
                    'direction_2' => $item['direction_2'],
                    'neighborhood' => $item['neighborhood'],
                    'district' => $item['district'],
                    'postal_code' => $item['postal_code'],
                    'city' => $item['city'],
                    'state_code' => $item['state_code'],
                    'country_code' => $item['country_code']
                ];
            }
        }

        $directions = [];
        if (isset($result['errors'])) {
            $directions[] = [
                'value' => '',
                'label' => $this->_dataTranslate['get_origin_addresses']
            ];
            return $directions;
        }
        if (isset($items)) {
            $directions = array_map(function ($direction) {
                return [
                    'value' => base64_encode(json_encode($this->removeAscii($direction))),
                    'label' => $direction['full_name']
                ];
            }, $items);
        }
        if (count($directions) == 1) {
            $settings = $this->model_setting_setting->getSetting('shipping_enviaya');
            $settings['shipping_enviaya_origin_direction'] = $directions[0]['value'];
            $this->model_setting_setting->editSetting('shipping_enviaya', $settings);
        }

        return $directions;
    }

    public function removeAscii($string)
    {
        $toFind = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ'];
        $toRepl = ['a', 'e', 'i', 'o', 'u', 'n', 'A', 'E', 'I', 'O', 'U', 'N'];
        $string = str_replace('null', '""', $string);

        return str_replace($toFind, $toRepl, $string);
    }

    private function _getServiceTimeout()
    {
        return (int)$this->getStoreConfig(EYHelper::SERVICE_TIMEOUT);
    }

    private function getStoreConfig($key)
    {
        return $this->config->get($key);
    }

    private function getShipments($order_id)
    {
        $query = $this->db->query("SELECT `tracking_number`, `shipping_courier_id`, `label_url` FROM `" . DB_PREFIX . "order_shipment` WHERE `order_id` = '{$order_id}'");
        return $query->rows;
    }

    private function saveDirection()
    {
        $direction = json_decode(base64_decode($this->getStoreConfig(EYHelper::ORIGIN_DIRECTION)));

        if (!is_null($direction)) {
            $settings = $this->model_setting_setting->getSetting('shipping_enviaya');
            $settings['shipping_enviaya_sender_name'] = isset($direction->full_name) ? $direction->full_name : null;
            $settings['shipping_enviaya_company_name'] = isset($direction->company) ? $direction->company : null;
            $settings['shipping_enviaya_phone'] = isset($direction->phone) ? $direction->phone : null;
            $settings['shipping_enviaya_email'] = isset($direction->email) ? $direction->email : null;
            $settings['shipping_enviaya_direction_first'] = isset($direction->direction_1) ? $direction->direction_1 : null;
            $settings['shipping_enviaya_direction_second'] = isset($direction->direction_2) ? $direction->direction_2 : null;
            $settings['shipping_enviaya_neighborhood'] = isset($direction->neighborhood) ? $direction->neighborhood : null;
            $settings['shipping_enviaya_district'] = isset($direction->district) ? $direction->district : null;
            $settings['shipping_enviaya_postal_code'] = isset($direction->postal_code) ? $direction->postal_code : null;
            $settings['shipping_enviaya_city'] = isset($direction->city) ? $direction->city : null;
            $settings['shipping_enviaya_state_code'] = isset($direction->state_code) ? $direction->state_code : null;
            $settings['shipping_enviaya_country_code'] = isset($direction->country_code) ? $direction->country_code : null;
            $this->model_setting_setting->editSetting('shipping_enviaya', $settings);
        }
    }
}
