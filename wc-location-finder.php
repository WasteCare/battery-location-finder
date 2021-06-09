<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WasteCare Location Finder
 * Plugin URI:        https://www.waste.care
 * Description:       Mapping tool to allow customers to find the closest location to recycle batteries & WEEE
 * Version:           1.0.1
 * Author:            WasteCare
 * Author URI:        https://www.waste.care
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vwp-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



require_once plugin_dir_path(__FILE__) . 'inc/wc-settings-persistence.php';
require_once plugin_dir_path(__FILE__) . 'inc/wc-location-web-proxy.php';

class WcLocationFinder
{
  public $plugin;
  public $settings;

  function __construct() {
    $this->plugin = plugin_basename(__FILE__);
    $this->settings = new WcSettingsPersistence();
    $this->webproxy = new WcWebProxy();
  }

  function register() {

    add_action('admin_menu', array($this, 'add_admin_page'));
    add_action('admin_init', array($this->settings, 'add_settings'));

    add_action( "wp_ajax_nopriv_wc_location_finder", array($this->webproxy, 'proxy_request'));
    add_shortcode('wc_location_finder', array($this, 'render_location_finder'));
    add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));



  }

  private function is_develop_server() {
    $connection = @fsockopen('localhost', '8080');

    if ( $connection ) {
      return true;
    }

    return false;
  }

  public function settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=wc_location_finder">Settings</a>';
    array_push($links, $settings_link);
    return $links;
  }

  public function render_location_finder() {
    
    if ( $this->is_develop_server() ) {
      wp_enqueue_style( "wc-location-css-vendors", 'http://localhost:8080/css/app.css', [], '1.0.2', false);
      wp_enqueue_style( "wc-location-css", 'http://localhost:8080/css/chunk-vendors.css', [], '1.0.2', false);

      wp_enqueue_script( "wc-location-vendors", 'http://localhost:8080/js/chunk-vendors.js', array(), '1.0.2', true );
      wp_enqueue_script( "wc-location-app", 'http://localhost:8080/js/app.js', array('wc-location-vendors'), '1.0.2', true );
    } else {

      wp_enqueue_style( "wc-location-css-vendors", plugins_url('/dist/css/chunk-vendors.css', __FILE__), [], '1.0.2', 'all');
      wp_enqueue_style( "wc-location-css", plugins_url('/dist/css/app.css', __FILE__), [], '1.0.2', 'all' );
      wp_enqueue_script( "wc-location-vendors", plugins_url('/dist/js/chunk-vendors.js', __FILE__), array(), '1.0.2', true );
      wp_enqueue_script( "wc-location-app", plugins_url('/dist/js/app.js', __FILE__), array(
        'wc-location-vendors'
      ), '1.0.2', true );
    }
    

    
    
    $location_nonce = wp_create_nonce( 'battery_locator' );
    $options = get_option('wc_location_plugin_settings');

    wp_localize_script(
      'wc-location-app',
      'wc_ajax_obj',
      array( 
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce' => $location_nonce,
        'googleKey' => $options['google_maps_api_key'],
        'action' => 'wc_location_finder'
      )
      );

    require_once plugin_dir_path(__FILE__) . 'templates/client/index.php';
  }

  public function add_admin_page() {
    add_options_page('Location Finder', 'Location Finder', 'manage_options', 'wc_location_finder', array($this, 'admin_index'), 10);
  }

  public function admin_index() {
    require_once plugin_dir_path(__FILE__) . 'templates/admin/index.php';
  }

}

if ( class_exists('WcLocationFinder') ) {
  $wcPlugin = new  WcLocationFinder();
  $wcPlugin->register();
}

// Activation
require_once plugin_dir_path(__FILE__)  . 'inc/wc-location-finder-activate.php';
register_activation_hook( __FILE__, array('WcLocationFinderActivate', 'activate' ) );

// Deactivation
require_once plugin_dir_path(__FILE__)  . 'inc/wc-location-finder-deactivate.php';
register_deactivation_hook( __FILE__, array( 'WcLocationFinderDeactivate', 'deactivate' ) );
