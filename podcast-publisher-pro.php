<?php
/**
 * Plugin Name: Podcast Publisher Pro
 * Plugin URI: https://designercastle.com/plugins/podcast-publisher-pro/
 * Description: A powerful tool to simplify podcast management. Create, edit, and publish podcasts with custom post types, custom meta fields, and seamless REST API integration. Ideal for podcasters looking for streamlined workflows.
 * Version: 1.0.0
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * Author: Aymen Tucker
 * Author URI: https://designercastle.com
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: podcast-publisher-pro
 * Domain Path: /languages
 * Tags: podcast, management, custom post types, REST API, meta fields
 */

// Security check to prevent direct access.

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Include required files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ppp-custom-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ppp-meta-boxes.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-ppp-rest-api.php';

// Initialize the plugin classes
PPP_Custom_Post_Type::init();
PPP_Meta_Boxes::init();
PPP_REST_API::init();

// Enqueue CSS (if needed)
function ppp_enqueue_styles() {
    wp_enqueue_style(
        'ppp-styles',
        plugin_dir_url( __FILE__ ) . 'assets/css/ppp-styles.css',
        array(),
        '1.0.0'
    );
}
add_action( 'admin_enqueue_scripts', 'ppp_enqueue_styles' );
