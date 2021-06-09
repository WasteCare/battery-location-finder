<?php

class WcWebProxy {

    private $options;

    function __construct() {
        $this->options = get_option('wc_location_plugin_settings');
    }

    private function api_key() {
        return $this->options['wastecare_api_key'];
    }

    private function api_url() {
        return $this->options['wastecare_api_url'];
    }

    public function proxy_request($args) {
        check_ajax_referer( 'battery_locator' );

        $lat = $_GET['lat'];
        $lon = $_GET['lon'];


        $response = wp_remote_get($this->api_url() . $lat . '/' . $lon . '/25/0', 
            array(
                'headers' => array(
                    'Content-Type' => 'application/json',
                    'X-ApiKey' => $this->api_key()
                )
            )
        );
        
        $status = wp_remote_retrieve_response_code( $response );

        if( is_wp_error( $response ) || $status != "200" ) {
            status_header($status);
            exit();
            wp_die();
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body );

        exit ( json_encode( $data->returnData ) );
        wp_die(); // all ajax handlers should die when finished
    }



}