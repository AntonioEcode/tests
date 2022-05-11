<?php

/******************************************************************************/
/*                         Function to enqueue scripts                        */
/******************************************************************************/

add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts', 100 );

function custom_enqueue_scripts() {

    // Remove oembed JS
    wp_deregister_script( 'wp-embed' );

}

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

function wps_deregister_styles() {

    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wpml-tm-admin-bar' );

}

/******************************************************************************/
/*                       END Function to enqueue scripts                      */
/******************************************************************************/

/******************************************************************************/
/*                      Function to admin enqueue scripts                     */
/******************************************************************************/

add_action( 'admin_enqueue_scripts', 'load_admin_scripts' );

function load_admin_scripts() {

    // wp_register_script( 'admin-js', WPEB_PLUGIN_THEME_FRONT . '/js/admin.min.js', false, '1.0.0' );
    // wp_register_script( 'admin-js', WPEB_PLUGIN_THEME_FRONT . '/js/admin.js', false, '' );

    // wp_enqueue_script( 'admin-js' );

}

add_action( 'admin_enqueue_scripts', 'load_media_files' );

function load_media_files() {

    wp_enqueue_media();

    // Load admin style
    wp_register_style( 'admin_css', WPEB_PLUGIN_THEME_FRONT . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'admin_css' );

}

/******************************************************************************/
/*                    END Function to admin enqueue scripts                   */
/******************************************************************************/

/******************************************************************************/
/*                           Function to init scripts                         */
/******************************************************************************/

add_action( 'init', 'disable_emoji_feature' );

function disable_emoji_feature() {

	// Prevent Emoji from loading on the front-end
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

}

/******************************************************************************/
/*                         END Function to init scripts                       */
/******************************************************************************/

?>
