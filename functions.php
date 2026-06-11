<?php
/**
 * BanglaTrack Developer Theme functions and definitions.
 *
 * @package BanglaTrackDeveloper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BTD_VERSION', '1.0.0' );
define( 'BTD_DIR', get_template_directory() );
define( 'BTD_URI', get_template_directory_uri() );

// Load core classes.
require_once BTD_DIR . '/inc/class-theme-setup.php';
require_once BTD_DIR . '/inc/class-assets.php';
require_once BTD_DIR . '/inc/class-performance.php';
require_once BTD_DIR . '/inc/class-structured-data.php';
require_once BTD_DIR . '/inc/class-woocommerce.php';

// Initialize.
BTD\Theme_Setup::init();
BTD\Assets::init();
BTD\Performance::init();
BTD\Structured_Data::init();
BTD\WooCommerce_Integration::init();
