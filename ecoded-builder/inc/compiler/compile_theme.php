<?php

// Clear all caches
require_once WPEB_PLUGIN_COMPILER . 'functions/clear_all_caches.php';

// Add demo data
require_once WPEB_PLUGIN_COMPILER . 'functions/add_demo_data.php';

// Reset to base themes
require_once WPEB_PLUGIN_COMPILER . 'functions/reset_base_themes.php';

// Metabox functions
require_once WPEB_PLUGIN_COMPILER . 'metabox/get_start_template_metabox.php';
require_once WPEB_PLUGIN_COMPILER . 'metabox/get_content_template_metabox.php';
require_once WPEB_PLUGIN_COMPILER . 'metabox/get_end_template_metabox.php';
require_once WPEB_PLUGIN_COMPILER . 'metabox/generate_template_metabox.php';

// Page-template functions
require_once WPEB_PLUGIN_COMPILER . 'page-template/get_start_page_template.php';
require_once WPEB_PLUGIN_COMPILER . 'page-template/get_content_page_template.php';
require_once WPEB_PLUGIN_COMPILER . 'page-template/get_end_page_template.php';
require_once WPEB_PLUGIN_COMPILER . 'page-template/generate_page_template.php';

// Fonts functions
require_once WPEB_PLUGIN_COMPILER . 'fonts/add_fonts_theme.php';

// Styles functions
require_once WPEB_PLUGIN_COMPILER . 'styles/get_start_styles.php';
require_once WPEB_PLUGIN_COMPILER . 'styles/get_content_styles.php';
require_once WPEB_PLUGIN_COMPILER . 'styles/generate_style.php';

// Scripts functions
require_once WPEB_PLUGIN_COMPILER . 'scripts/get_start_scripts.php';
require_once WPEB_PLUGIN_COMPILER . 'scripts/get_content_scripts.php';
require_once WPEB_PLUGIN_COMPILER . 'scripts/get_end_scripts.php';
require_once WPEB_PLUGIN_COMPILER . 'scripts/generate_content_scripts.php';

// Shortcodes functions
require_once WPEB_PLUGIN_COMPILER . 'shortcodes/get_shortcodes_content.php';
require_once WPEB_PLUGIN_COMPILER . 'shortcodes/generate_custom_shortcodes_file.php';

// Additional head content functions
require_once WPEB_PLUGIN_COMPILER . 'content-head/get_content_head.php';
require_once WPEB_PLUGIN_COMPILER . 'content-head/generate_content_head.php';

// Remove editor functions
require_once WPEB_PLUGIN_COMPILER . 'remove-editor/get_remove_editor_content.php';
require_once WPEB_PLUGIN_COMPILER . 'remove-editor/generate_remove_editor_file.php';

// Dynamic footer settings functions
require_once WPEB_PLUGIN_COMPILER . 'footer-settings/get_footer_settings.php';

// Sidebar functions
require_once WPEB_PLUGIN_COMPILER . 'sidebar/check_sidebar.php';

// AJAX to get page structure
add_action( 'wp_ajax_wpeb_compile_theme_ajax', 'wpeb_compile_theme_ajax' );

function wpeb_compile_theme_ajax() {

	if( wpeb_check_ajax_access() ) {

		// Reset to base themes
		wpeb_reset_base_themes();

		// Call to compile theme
		wpeb_compile_theme();

		wp_send_json_success();

	} else {

		wp_send_json_error(
			new WP_Error( 'not_page_type_data', __( 'No se ha podido compilar el tema.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

// Main compile funtion
function wpeb_compile_theme() {

	// Get sections for the selected page
	$pages_sections_data = wpeb_get_pages_sections();

	if( !empty( $pages_sections_data ) ) {

		// Group pages_sections_data by page_id
		$pages_sections_grouped = wpeb_pages_sections_group_by_page_id( $pages_sections_data );

		// Array for add base section styles and libraries if is neccesary without duplicating and custom styles
		$styles = array(
			'sections_styles'  => array(),
			'libraries_styles' => array(),
			'custom_styles'    => array()
		);

		// Array to add base section scripts and libraries if is neccesary without duplicating per page
		$scripts = array(
			'general' => array(),
		);

		// Array to add all code of the used templates to generate conten-head.php ( for preloads for example )
		$content_head = array();

		// Array to add all templates generated
		$pages_templates_names = array();

		// Shortcodes content
		$shortcodes_content = array();

		// Array with page templates only
		$pages_templates = array();

		// For each page
		foreach( $pages_sections_grouped as $page_id => $page_data ) {

			$page_name = $page_data['page_name'];
			$page_template_name = $page_data['template_name'];
			$page_sections_data = $page_data['sections_data'];

			// Add current template name
			$pages_templates_names[] = $page_template_name;

			// Start metabox file
			$template_metabox_content = wpeb_get_start_template_metabox( $page_id, $page_template_name );

			// Start page-template file
			$page_template_content = wpeb_get_start_page_template( $page_name, $page_template_name );

			// Add template to the scripts array
			$scripts[$page_template_name] = array(
				'sections_scripts' => array(),
				'libraries_scripts' => array(),
			);

			// Add template to the content_head array
			$content_head[$page_template_name] = array();

			// Add current page template type in pages templates array
			$pages_templates[] = $page_template_name;

			// For each page section
			foreach( $page_sections_data as $page_section_data ) {

				$page_section_id = $page_section_data['page_section_id'];
				$order = $page_section_data['order'];
				$section_type_id = $page_section_data['section_type_id'];
				$section_id = $page_section_data['section_id'];
				$template_id = $page_section_data['section_template_id'];

				// Get metabox content file
				$template_metabox_content = wpeb_get_content_template_metabox( $page_id, $page_section_id, $section_id, $template_id, $template_metabox_content );

				// Get section styles content ( base and libraries if is neccesary )
				$styles = wpeb_get_base_section_content_styles( $section_id, $template_id, $styles );

				// If is header or footer section ( type 1 or 2 ) save scripts globaly
				if( $section_type_id == 1 || $section_type_id == 2 ) {

					// Get section scripts content ( base and libraries if is neccesary )
					$scripts['general'] = wpeb_get_base_section_content_scripts( $section_id, $template_id, $scripts['general'] );

				} else {

					// Get section scripts content ( base and libraries if is neccesary )
					$scripts[$page_template_name] = wpeb_get_base_section_content_scripts( $section_id, $template_id, $scripts[$page_template_name] );

				}

				// Get content-head.php ( in templates ) and add it to the array
				$content_head[$page_template_name] = wpeb_get_content_head( $page_section_id, $section_id, $template_id, $page_template_name, $content_head[$page_template_name] );

				// Get page template content file and generate template parts
				$page_template_content = wpeb_get_content_page_template( $page_template_name, $page_section_id, $section_type_id, $section_id, $template_id, $page_template_content );

				// Get shortcodes content
				$shortcodes_content = wpeb_get_shortcodes_content( $section_id, $template_id, $shortcodes_content );

				// If is footer section ( type 2 ) get footer settings page and copy in the generated theme
				if( $section_type_id == 2 ) {

					// Get shortcodes content
					wpeb_generate_footer_settings( $section_id, $template_id );

				}

				// If is 'Bloque blog' or 'Bloque contenido artículo' check if have sidebar
				if( $section_type_id == 5 || $section_type_id == 13 ) {

					wpeb_check_sidebar( $section_id, $template_id, $section_type_id );

				}

			}

			// Get custom styles content
			$styles = wpeb_get_custom_content_styles( $page_id, $styles );

			// End metabox file
			$template_metabox_content = wpeb_get_end_template_metabox( $template_metabox_content );

			// Generate metabox file
			wpeb_generate_template_metabox( $page_template_name, $template_metabox_content );

			// End page template file
			$page_template_content = wpeb_get_end_page_template( $page_template_content );

			// Generate page template file
			wpeb_generate_page_template( $page_template_name, $page_template_content );

		}

		/*
		 * METABOX
		 */

		// Load metabox for the page-templates in load-templates.php file
		if( !empty( $pages_templates_names ) ) {

			wpeb_generate_load_templates( $pages_templates_names );

		}

		/*
		 * FONTS
		 */

		// Add fonts files to theme
		wpeb_add_fonts_theme();

		/*
	     * STYLES
		 */

		// Start style content file ( Theme info and global styles )
		$styles_content = wpeb_get_start_styles();

		// Add Content in style file
		$styles_content = wpeb_get_content_styles( $styles, $styles_content );

		// Generate style file
		wpeb_generate_style( $styles_content );

		/*
		 * SCRIPTS
		 */

		// Start content-scripts file
		$scripts_content = wpeb_get_start_scripts();

		// Add content in content-scripts file
		$scripts_content = wpeb_get_content_scripts( $scripts, $scripts_content );

		// Add end in content-scripts file
		$scripts_content = wpeb_get_end_scripts( $scripts_content );

		// Generate content-scripts file
		wpeb_generate_content_scripts( $scripts_content );

		/*
		 * CONTENT HEAD
		 */

		// Generate /themes/ecodetheme/template-parts/header/content-head.php
		wpeb_generate_content_head( $content_head );

		/*
		 * SHORTCODES
		 */

		// Generate /theme/functions/shortcodes/custom-shortcodes.php
		wpeb_generate_custom_shortcodes_file( $shortcodes_content );

		/*
		 *** REMOVE EDITOR FOR CREATED PAGES TEMPLATES
		 */

		// Get content for remove-editor.php file
		$remove_editor_content = wpeb_get_remove_editor_content( $pages_templates );

		// Generate /theme/functions/shortcodes/remove-editor.php
		wpeb_generate_remove_editor_file( $remove_editor_content );

		/*
		 * CREATE DEMO DATA
		 */

		// Add demo content en the sections
		wpeb_add_demo_data( $pages_sections_grouped );

		// Upgrade css version to prevent cache
		wpeb_update_css_version();

		// Clear all caches
		wpeb_clear_all_caches();

	}

}

// Group an array of pages_sections_data by page_id
function wpeb_pages_sections_group_by_page_id( $pages_sections_data ) {

	$pages_sections_grouped = array();

	foreach( $pages_sections_data as $page_section ) {

		if( !array_key_exists( $page_section->page_id, $pages_sections_grouped ) ) {

			$pages_sections_grouped[$page_section->page_id] = array(
				'page_id'       => $page_section->page_id,
				'page_name'     => $page_section->page_name,
				'template_name' => $page_section->template_name,
				'wp_page_id'    => $page_section->wp_page_id,
				'sections_data' => array()
			);

		}

		$section_data = array(
			'page_section_id'     => $page_section->page_section_id,
			'order'               => $page_section->order,
			'section_type_id'     => $page_section->section_type_id,
			'section_id'          => $page_section->section_id,
			'section_template_id' => $page_section->section_template_id,
		);

		array_push( $pages_sections_grouped[$page_section->page_id]['sections_data'], $section_data );

	}

	return $pages_sections_grouped;

}

?>
