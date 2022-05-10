<?php

/**
* Plugin Name: Constructor de temas PRO - Ecoded Builder
* Plugin URI: https://ecodegroup.com/
* Description: Desarrollado para generar temas optimizados by Ecode
* Version: 1.0
* Author: ecode
* Author URI: https://ecodegroup.com/
**/

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

// Plugin version
define( 'WPEB_VERSION', '1.0' );

// WordPress version required
define( 'WPEB_REQUIRED_WP_VERSION', '5.0' );

// Plugin paths vars
define( 'WPEB_PLUGIN', __FILE__ );
define( 'WPEB_PLUGIN_BASENAME', plugin_basename( WPEB_PLUGIN ) );
define( 'WPEB_PLUGIN_NAME', trim( dirname( WPEB_PLUGIN_BASENAME ), '/' ) );
define( 'WPEB_PLUGIN_DIR', untrailingslashit( dirname( WPEB_PLUGIN ) ) );
define( 'WPEB_PLUGIN_FRONT_DIR', plugin_dir_url( __DIR__ ) . WPEB_PLUGIN_NAME );
define( 'WPEB_PLUGIN_INC', WPEB_PLUGIN_DIR . '/inc/' );
define( 'WPEB_PLUGIN_COMPILER', WPEB_PLUGIN_INC . '/compiler/' );
define( 'WPEB_PLUGIN_CONFIG', WPEB_PLUGIN_DIR . '/config/' );
define( 'WPEB_PLUGIN_SECTIONS_FRONT', WPEB_PLUGIN_FRONT_DIR . '/sections/' );
define( 'WPEB_PLUGIN_SECTIONS_BACK', WPEB_PLUGIN_DIR . '/sections/' );
define( 'WPEB_PLUGIN_FONTS_FRONT', WPEB_PLUGIN_FRONT_DIR . '/sections/assets/fonts/' );
define( 'WPEB_PLUGIN_FONTS_BACK', WPEB_PLUGIN_DIR . '/sections/assets/fonts/' );
define( 'WPEB_PLUGIN_CUSTOM', WPEB_PLUGIN_DIR . '/custom/' );
define( 'WPEB_THEME', WP_CONTENT_DIR . '/themes/ecodetheme/' );
define( 'WPEB_PLUGIN_ASSETS', WPEB_PLUGIN_DIR . '/assets/' );
define( 'WPEB_PLUGIN_ASSETS_FRONT', WPEB_PLUGIN_FRONT_DIR . '/assets/' );
define( 'WPEB_PLUGIN_THEME', WPEB_PLUGIN_DIR . '/theme/' );
define( 'WPEB_PLUGIN_THEME_FRONT', WPEB_PLUGIN_FRONT_DIR . '/theme/' );
define( 'WPEB_UPLOADS', content_url() . '/uploads/' );

if( !defined( 'WPEB_LOAD_JS' ) ) {

	define( 'WPEB_LOAD_JS', TRUE );

}

if( !defined( 'WPEB_LOAD_CSS' ) ) {

	define( 'WPEB_LOAD_CSS', TRUE );

}

require_once WPEB_PLUGIN_DIR . '/cmb2/init.php'; // Load plugin CMB2
require_once WPEB_PLUGIN_DIR . '/duplicate-post/duplicate-post.php'; // Load plugin duplicate post
require_once WPEB_PLUGIN_INC . 'controller.php';
require_once WPEB_PLUGIN_INC . 'functions.php';
require_once WPEB_PLUGIN_INC . 'theme-functions.php';
require_once WPEB_PLUGIN_INC . 'queries.php';
require_once WPEB_PLUGIN_INC . 'services.php';
require_once WPEB_PLUGIN_COMPILER . 'compile_theme.php';
require_once WPEB_PLUGIN_INC . 'settings.php';
require_once WPEB_PLUGIN_INC . 'personalization-dashboard.php';
require_once WPEB_PLUGIN_INC . 'personalization-wp.php';
require_once WPEB_PLUGIN_INC . 'cpt.php';
require_once WPEB_PLUGIN_INC . 'activate.php';
require_once WPEB_PLUGIN_INC . 'deactivate.php';

// Load custom functions.php of our theme
if( file_exists( WPEB_PLUGIN_THEME ) && is_dir( WPEB_PLUGIN_THEME ) ) {

	require_once WPEB_PLUGIN_THEME . 'functions.php';

}

register_activation_hook( WPEB_PLUGIN, 'wpeb_activate_ecoded_builder' );
register_deactivation_hook( WPEB_PLUGIN, 'wpeb_deactivate_ecoded_builder' );

?>
