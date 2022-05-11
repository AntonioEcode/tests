<?php

// Generate shortcodes content
function wpeb_generate_footer_settings( $section_id, $template_id ) {

	$footer_settings_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/footer-settings.php';
	$footer_settings_page = WPEB_PLUGIN_THEME . 'functions/footer-settings.php';

	if( file_exists( $footer_settings_file ) ) {

		// Copy footer settings page in the theme inside the plugin
		copy( $footer_settings_file, $footer_settings_page );

	}

}

?>
