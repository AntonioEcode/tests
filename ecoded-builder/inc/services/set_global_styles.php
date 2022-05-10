<?php

// Set global sytles to the templates and compile theme
add_action( 'updated_option', 'wpeb_set_global_styles', 10 );

function wpeb_set_global_styles() {

	// Get $_POST
	$option_page = !empty( $_POST['option_page'] ) ? $_POST['option_page'] : NULL;
	$colors_changed = !empty( $_POST['wpeb_colors_changed'] ) ? $_POST['wpeb_colors_changed'] : NULL;

	if( $option_page == 'wpeb_global_styles' ) {

		// If colors changed re compile style.css in templates and in /ecode-builder/sections/assets/css/style_builder_base.php
		if( $colors_changed == '1' ) {

			set_colors();

		}

		// After change all selected templates, re compile theme
		wpeb_compile_theme();

	}

}

function set_colors() {

	// Get pages and templates used to change her css ( from DB )
	$pages_sections = wpeb_get_pages_sections();

	foreach( $pages_sections as $page_section ) {

		$template_css_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $page_section->section_id . '/template_' . $page_section->section_template_id . '/css/style.css';

		if( file_exists( $template_css_file ) ) {

			// Set global colors and replace it in style.css file of the current template
			wpeb_set_global_styles_to_css_template( $template_css_file );

		}

	}

	// Get style_builder_base.css and add it
	$style_builder_base_file = WPEB_PLUGIN_SECTIONS_BACK . 'assets/css/style_builder_base.css';

	if( file_exists( $style_builder_base_file ) ) {

		// Set global colors and replace it in /ecode-builder/sections/assets/css/style_builder_base.php
		wpeb_set_global_styles_to_css_template( $style_builder_base_file );

	}

}

?>
