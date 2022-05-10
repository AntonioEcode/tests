<?php

// Get all code necessary to build a specific default template
function wpeb_get_template_code( $page_id, $page_section_id, $section_id, $section_template_id ) {

	$template_code = (object)array(
		'html_code'     => '',
		'styles'        => array(),
		'scripts'       => array(),
		'default_style' => array(),
	);

	// Get real data if have for custom fields
	$real_data = (object)array();

	// Get page_sections_data from wp_eb_page_sections by id
	$page_sections_data = wpeb_get_page_sections_by_page_section_id( $page_section_id );

	$section_type_id = $page_sections_data->section_type_id;

	// If not is header or footer get real data. Header and footer are not yet ready for real content
	if( $section_type_id != 1 && $section_type_id != 2 ) {

		// Get page data from eb_pages by id
		$page_data = wpeb_get_page_types( $id = $page_id, $order = NULL );

		// Get WordPress post_id
		$post_id = $page_data->wp_page_id;

		if( !empty( $post_id ) ) {

			// Get template name
			$template_name = $page_data->template_name;

			$real_data = wpeb_get_data( $post_id, $template_name, $page_section_id, $section_id, $section_template_id );

		}

	}

	if( !empty( $section_id ) && !empty( $section_template_id ) ) {

		// Process and save HTML in the array
		$template_code->html_code = wpeb_get_html_demo( $page_id, $page_section_id, $section_type_id, $section_id, $section_template_id );

		// Get from assets_config.json and add the css and js of the libraries if have them
		$assets_config_json_path = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $section_template_id . '/config/assets_config.json';
		$assets_config_json      = file_exists( $assets_config_json_path ) ? file_get_contents( $assets_config_json_path ) : FALSE;
		$assets_config           = NULL;

		if( $assets_config_json !== FALSE ) {

			$assets_config = json_decode( $assets_config_json, TRUE );

		}

		// Add template CSS paths
		$styles = array();

		$css_path_back  = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $section_template_id . '/css/style.css';
		$css_path_front = WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section_id . '/template_' . $section_template_id . '/css/style.css';

		if( file_exists( $css_path_back ) ) {

			// Before add template CSS, get global colors and replace it in style.css file of the template
			wpeb_set_global_styles_to_css_template( $css_path_back );

			array_push( $styles, $css_path_front );

		}

		// Check if have any css library to add
		if( $assets_config !== NULL ) {

			if( array_key_exists( 'css', $assets_config ) ) {

				foreach( $assets_config['css'] as $library_css_file ) {

					$css_library_path = WPEB_PLUGIN_SECTIONS_FRONT . 'assets/css/' . $library_css_file;

					array_push( $styles, $css_library_path );

				}

			}

		}

		// Add css to return
		$template_code->styles = $styles;

		// Add template JS paths
		$scripts = array();

		$js_path_back  = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $section_template_id . '/js/scripts.js';
		$js_path_front = WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section_id . '/template_' . $section_template_id . '/js/scripts.js';

		if( file_exists( $js_path_back ) ) {

			array_push( $scripts, $js_path_front );

		}

		// Check if have any js library to add
		if( $assets_config !== NULL ) {

			if( array_key_exists( 'js', $assets_config ) ) {

				foreach( $assets_config['js'] as $library_js_file ) {

					$js_library_path = WPEB_PLUGIN_SECTIONS_FRONT . 'assets/js/' . $library_js_file;

					array_push( $scripts, $js_library_path );

				}

			}

		}

		// Add js to return
		$template_code->scripts = $scripts;

		// Get default default_config.json
		$default_config_json_path = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $section_template_id . '/config/default_config.json';
		$default_config_json       = file_exists( $default_config_json_path ) ? file_get_contents( $default_config_json_path ) : FALSE;

		if( $default_config_json !== FALSE ) {

			$default_config = json_decode( $default_config_json, TRUE );

			$template_code->default_style = ( $default_config !== NULL && array_key_exists( 'default_style', $default_config ) ) ? $default_config['default_style'] : array();

		}

	}

	return $template_code;

}

?>