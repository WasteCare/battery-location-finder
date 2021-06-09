<?php

class WcSettingsPersistence
{
  public function add_settings() {
    
    register_setting(
        'wc_location_plugin_settings',
        'wc_location_plugin_settings',
        array($this, 'wc_location_validate_settings')
    );

    add_settings_section(
        'wastecare_settings',
        'WasteCare Settings',
        array($this, 'wastecare_settings_text'),
        'wc_location_finder'
    );

        add_settings_field(
            'wastecare_api_url',
            'WasteCare API Url',
            array($this, 'wc_location_render_wastecare_api_url_field'),
            'wc_location_finder',
            'wastecare_settings'
        );

        add_settings_field(
            'wastecare_api_key',
            'WasteCare API Key',
            array($this, 'wc_location_render_wastecare_api_key_field'),
            'wc_location_finder',
            'wastecare_settings'
        );

    add_settings_section(
        'google_map_settings',
        'Google Maps Settings',
        array($this, 'google_map_settings_text'),
        'wc_location_finder'
    );

        add_settings_field(
            'google_maps_api_key',
            'Google Maps API Key',
            array($this, 'wc_location_render_google_api_text_field'),
            'wc_location_finder',
            'google_map_settings'
        );
  }

  public function wastecare_settings_text() {
    echo '<p>Settings relating to WasteCare</p>';
  }

  public function google_map_settings_text() {
    echo '<p>Settings relating to Google</p>';
  }

  function wc_location_render_wastecare_api_url_field($args) {
    $options = get_option( 'wc_location_plugin_settings' );
    printf(
      '<input type="text" name="%s" value="%s" />',
      esc_attr( 'wc_location_plugin_settings[wastecare_api_url]' ),
      esc_attr( $options['wastecare_api_url'] )
    );
  }

  function wc_location_render_wastecare_api_key_field() {
      $options = get_option( 'wc_location_plugin_settings' );
      printf(
        '<input type="text" name="%s" value="%s" />',
        esc_attr( 'wc_location_plugin_settings[wastecare_api_key]' ),
        esc_attr( $options['wastecare_api_key'] )
      );
  }

  function wc_location_render_google_api_text_field() {
      $options = get_option( 'wc_location_plugin_settings' );
      printf(
        '<input type="text" name="%s" value="%s" />',
        esc_attr( 'wc_location_plugin_settings[google_maps_api_key]' ),
        esc_attr( $options['google_maps_api_key'] )
      );
  }
    
  function wc_location_validate_settings( $input ) {
      echo var_dump ($input);
      $output['wastecare_api_url']      = sanitize_text_field( $input['wastecare_api_url'] );
      $output['wastecare_api_key']      = sanitize_text_field( $input['wastecare_api_key'] );
      $output['google_maps_api_key']    = sanitize_text_field( $input['google_maps_api_key'] );
      return $output;
  } 
}

