<?php

// AJAX to get page structure
add_action( 'wp_ajax_wpeb_get_page_type_sections', 'wpeb_get_page_type_sections' );

function wpeb_get_page_type_sections() {

	// Get $_POST
	$page_id = !empty( $_POST['page_id'] ) ? $_POST['page_id'] : NULL;

	if( wpeb_check_ajax_access() && !empty( $page_id ) ) {

		// Get sections for the selected page
		$page_sections_data = wpeb_get_page_sections( $page_id );

		if( !empty( $page_sections_data ) ) {

			// If already have any template in any section, save id in array and get it
			$section_template_ids = array();

			foreach( $page_sections_data as $page_section ) {

				// If already have template selected, add id
				if( !empty( $page_section->section_template_id ) ) {

					$section_template_ids[] = $page_section->section_template_id;

				}

			}

			// If have selected templates get it
			$templates_data = array();

			if( !empty( $section_template_ids ) ) {

				// Get sections for the selected page
				$templates_data = wpeb_get_selected_section_template( $section_template_ids );

			}

			// If already have templates selected get data and add in main array
			if( !empty( $templates_data ) ) {

				foreach( $page_sections_data as $page_section ) {

					foreach( $templates_data as $template ) {

						if( $page_section->section_template_id == $template->section_template_id ) {

							$page_section->section_id = $template->section_id;

							// Check if this template is ready for global content and get it
							$page_section->global_content_ready = check_is_global_template( $template->section_id, $template->section_template_id );
							$page_section->global_content = $page_section->global_content_ready ? wpeb_get_global_content_by_template( $template->section_template_id ) : array();

							// Get all code necessary to build a specific default template
							$page_section->template_code = wpeb_get_template_code( $page_id, $page_section->page_section_id, $template->section_id, $template->section_template_id );

						}

					}

				}

			}

		}

		// Get custom styles for this page
		$custom_config = NULL;
		$custom_file_json = WPEB_PLUGIN_CUSTOM . 'custom_config_' . $page_id . '.json';

		if( file_exists( $custom_file_json ) ) {

			// Get custom_config.json
			$custom_config_data = file_get_contents( $custom_file_json );

			if( $custom_config_data !== FALSE ) {

				$custom_config = json_decode( $custom_config_data, TRUE );

			}

		}

		// Get data of wp pages to link in the builder the edit page and front page
		$wp_page_data = wpeb_get_wp_pages_data_by_page_type_id( $page_id );

		$page_type_data = (object)array(
			'global_styles' => wpeb_get_compile_global_styles_content(),
			'custom_config' => $custom_config !== NULL ? $custom_config : array(),
			'sections' => !empty( $page_sections_data ) ? $page_sections_data : array(),
			'wp_page_data' => $wp_page_data,
		);

		wp_send_json_success( $page_type_data );

	} else {

        wp_send_json_error(
			new WP_Error( 'not_page_type_data', __( 'No hay bloques disponibles para esta página.', 'ecoded_builder' ) )
        );

	}

	wp_die();

}

?>
