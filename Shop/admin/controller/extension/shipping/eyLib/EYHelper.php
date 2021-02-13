<?php

include(__DIR__ . '/ey_lib.php');

class EYHelper
{
    const TEST_MODE = 'shipping_enviaya_test_mode';
    const TITLE = 'shipping_enviaya_title';
    const ACCOUNT = 'shipping_enviaya_account';
    const SERVICE_TIMEOUT = 'shipping_enviaya_service_timeout';
    const ORIGIN_DIRECTION = 'shipping_enviaya_origin_direction';
    const SEND_SHIPMENT_NOTICE = 'shipping_enviaya_send_shipment_notifications';
    const ENABLE_API_LOGS = 'shipping_enviaya_enable_api_logs';
    const API_KEY = 'shipping_enviaya_apikey';
    const TEST_API_KEY = 'shipping_enviaya_test_apikey';
    const SENDER_NAME = 'shipping_enviaya_sender_name';
    const COMPANY_NAME = 'shipping_enviaya_company_name';
    const COUNTRY_CODE = 'shipping_enviaya_country_code';
    const POSTAL_CODE = 'shipping_enviaya_postal_code';
    const DIRECTION_FIRST = 'shipping_enviaya_direction_first';
    const DIRECTION_SECOND = 'shipping_enviaya_direction_second';
    const CITY = 'shipping_enviaya_city';
    const PHONE = 'shipping_enviaya_phone';
    const STATE_CODE = 'shipping_enviaya_state_code';
    const NEIGHBORHOOD = 'shipping_enviaya_neighborhood';
    const DISTRICT = 'shipping_enviaya_district';
    const EMAIL = 'shipping_enviaya_email';
    const SHIPPING_SERVICES_DESIGN = 'shipping_enviaya_shipping_services_design';
    const GROUP_BY_CARRIER = 'shipping_enviaya_group_by_carrier';
    const ENABLE_CONTINGENCY_SHIPPING_SERVICES = 'shipping_enviaya_enable_contingency_shipping_services';
    const CONTINGENCY_STANDARD_SHIPPING = 'shipping_enviaya_contingency_standard_shipping';
    const CONTINGENCY_EXPRESS_SHIPPING = 'shipping_enviaya_contingency_express_shipping';
    const FLAT_STANDARD = 'shipping_enviaya_flat_standard';
    const FLAT_EXPRESS = 'shipping_enviaya_flat_express';
    const ZONE_DATA = 'shipping_enviaya_zone_data';
    const ENABLE_RATING = 'shipping_enviaya_enable_rating';
    const DISPLAY_CARRIER_LOGO = 'shipping_enviaya_display_carrier_logo';
    const SHIPPING_DELIVERY_TIME = 'shipping_enviaya_shipping_delivery_time';
    const SHIPPING_CARRIER_NAME = 'shipping_enviaya_shipping_carrier_name';
    const SHIPPING_SERVICE_NAME = 'shipping_enviaya_shipping_service_name';
    const SHIPPING_SERVICES_DISPLAY = 'shipping_enviaya_shipping_services_display';
    const AS_DEFINED_PRICE = 'shipping_enviaya_as_defined_price';
    const CONFIG_TAX = 'config_tax';

    public function getJsonTranslation($language, $enviaya_accounts)
    {
        $jsonTranslation = json_decode(file_get_contents(__DIR__ . '/translation.json'), true);
        $result = self::arrayKey($jsonTranslation, $language);
        $array = [];

        foreach ($result as $key => $item) {
            if (strpos($item, '{#api_link#}') || strpos($item, '{#subsidies_link#}')) {
                $array[$key] = str_replace(
                    ['{#api_link#}', '{#subsidies_link#}'],
                    [$result['api_domain'], $enviaya_accounts],
                    $item
                );
            } else {
                $array[$key] = $item;
            }
        }

        return $array;
    }

    public static function arrayKey($array, $needle)
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            if (isset($value[$needle]))
                $new_array[$key] = $value[$needle];
        }
        return $new_array;
    }

    public static function libAPI($array)
    {
        return new EnviayaAPI([
            'api_key' => isset($array['api_key']) ? $array['api_key'] : null,
            'enviaya_account' => isset($array['enviaya_account']['enviaya_account']) ? $array['enviaya_account']['enviaya_account'] : null,
            'carrier_account' => 1,
            'app_id' => 5,
            'domain' => isset($array['api_domain']) ? $array['api_domain'] : null,
            'timeout' => isset($array['timeout']) ? $array['timeout'] : null
        ]);
    }
}
