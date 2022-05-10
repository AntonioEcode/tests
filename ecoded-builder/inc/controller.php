<?php

/******************************************************************************/
/*                       Add scritps and styles to back                       */
/******************************************************************************/
add_action( 'admin_enqueue_scripts', 'wpeb_do_admin_enqueue_scripts', 10, 0 );

function wpeb_do_admin_enqueue_scripts() {

	if( wpeb_load_js() ) {

		wpeb_admin_enqueue_scripts();

	}

	if( wpeb_load_css() ) {

		wpeb_admin_enqueue_styles();

	}

}

function wpeb_admin_enqueue_scripts() {

	$wpeb_css_version = !empty( get_option( 'wpeb_css_version' ) ) ? get_option( 'wpeb_css_version' ) : '0';

	wp_enqueue_script( 'ecode_admin_builder_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/builder/ecode_admin_builder_js.php', FALSE, $wpeb_css_version );
	wp_enqueue_script( 'ecode_admin_builder_styles_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/builder_styles/ecode_admin_builder_styles_js.php', FALSE, $wpeb_css_version );
	wp_enqueue_script( 'ecode_admin_builder_themes_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/builder_themes/ecode_admin_builder_themes_js.php', FALSE, $wpeb_css_version );
	wp_enqueue_script( 'ecode_admin_global_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/global/ecode_admin_global_js.php', FALSE, $wpeb_css_version );
	wp_enqueue_script( 'ecode_admin_dashboard_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/dashboard/ecode_admin_dashboard_js.php', FALSE, $wpeb_css_version );
	wp_enqueue_script( 'ecode_admin_back_pages_js', WPEB_PLUGIN_FRONT_DIR . '/assets/js/back_pages/ecode_admin_back_pages_js.php', FALSE, $wpeb_css_version );

	do_action( 'wpeb_admin_enqueue_scripts' );

}

function wpeb_admin_enqueue_styles() {

	$wpeb_css_version = !empty( get_option( 'wpeb_css_version' ) ) ? get_option( 'wpeb_css_version' ) : '0';

	wp_enqueue_style( 'ecode_admin_global_css', WPEB_PLUGIN_FRONT_DIR . '/assets/css/style_global_editor.css', FALSE, $wpeb_css_version );

	do_action( 'wpeb_admin_enqueue_styles' );

}


add_action( 'admin_head', 'ecode_script' );

function ecode_script() {

	$admin_ajax = base64_encode( admin_url( 'admin-ajax.php' ) );

    echo "<script>var ajax_url = '$admin_ajax';</script>";

}

?>
