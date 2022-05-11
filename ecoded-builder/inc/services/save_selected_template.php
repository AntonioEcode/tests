<?php

// AJAX to save template id selected for section and return section code
add_action( 'wp_ajax_wpeb_save_selected_template', 'wpeb_save_selected_template' );

function wpeb_save_selected_template() {

	// Get $_POST
	$current_page_id = !empty( $_POST['page_id'] ) ? $_POST['page_id'] : NULL;
	$current_page_section_id = !empty( $_POST['page_section_id'] ) ? $_POST['page_section_id'] : NULL;
	$section_type_id = !empty( $_POST['section_type_id'] ) ? $_POST['section_type_id'] : NULL;
	$section_id = !empty( $_POST['section_id'] ) ? $_POST['section_id'] : NULL;
	$template_id = !empty( $_POST['template_id'] ) ? $_POST['template_id'] : NULL;
	$old_template_id = !empty( $_POST['old_template_id'] ) ? $_POST['old_template_id'] : NULL;

	if( wpeb_check_ajax_access() &&
		!empty( $current_page_id ) &&
		!empty( $current_page_section_id ) &&
		!empty( $section_type_id ) &&
		!empty( $section_id ) &&
		!empty( $template_id )
	) {

		// Update selected template_id in DB
		if( wpeb_update_template( $current_page_section_id, $template_id, $section_type_id ) || $template_id == $old_template_id ) {

			// If a template was already selected for this section, we check if it is necessary to clean custom_config json
			if( !empty( $old_template_id ) ) {

				$pages_ids = array( $current_page_id => $current_page_section_id );

				// If section type is 1 ( Header ) or 2 ( Footer ) update all custom_config.json
				if( $section_type_id == 1 || $section_type_id == 2 ) {

					// Get all page ids and page sections ids
					$pages_data = wpeb_get_page_sections_by_section_type_id( $section_type_id );

					foreach( $pages_data as $page_data ) {

						if( $page_data->page_id != $current_page_id ) {

							$pages_ids[$page_data->page_id] = $page_data->id;

						}

					}

				}

				// Delete styles in custom files
				foreach( $pages_ids as $page_id => $page_section_id ) {

					// Get custom styles for this page
					$custom_config_path = WPEB_PLUGIN_CUSTOM . 'custom_config_' . $page_id . '.json';

					if( file_exists( $custom_config_path ) ) {

						// Get custom_config_{id}.json
						$custom_config_data = file_get_contents( $custom_config_path );
						$custom_config_data = json_decode( $custom_config_data );

						// Check if already exists and delete it
						if( !empty( (array)$custom_config_data ) && property_exists( $custom_config_data, $page_section_id ) ) {

							// Delete section styles
							unset( $custom_config_data->$page_section_id );

							// Check if the custom_config_data has no more sections and delete it
							if( !(array)$custom_config_data ) {

								unlink( $custom_config_path );

							} else {

								// Add content to custom_config_{id}.json file
								file_put_contents( $custom_config_path, json_encode( $custom_config_data ) );

							}

						}

					}

				}

			}

			// Check if this template is ready for global content and get it
			$global_content_ready = check_is_global_template( $section_id, $template_id );
			$global_content = $global_content_ready ? wpeb_get_global_content_by_template( $template_id ) : array();

			// Get all code necessary to build a specific default template
			$template_code = wpeb_get_template_code( $current_page_id, $current_page_section_id, $section_id, $template_id );

			wp_send_json_success(
				array(
					'global_content_ready' => $global_content_ready,
					'global_content' => $global_content,
					'template_code' => $template_code,
				)
			);

		} else {

			wp_send_json_error(
				new WP_Error( 'selected_template_not_saved', __( 'No se ha podido guardar la plantilla seleccionada.', 'ecoded_builder' ) )
			);

		}

	} else {

		wp_send_json_error(
			new WP_Error( 'required_data_are_missing', __( 'No se ha podido guardar la plantilla seleccionada, faltan datos requeridos.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

?>
