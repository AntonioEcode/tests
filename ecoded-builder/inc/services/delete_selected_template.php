<?php

// AJAX to delete selected template id for section
add_action( 'wp_ajax_wpeb_delete_selected_template', 'wpeb_delete_selected_template' );

function wpeb_delete_selected_template() {

	// Get $_POST
	$current_page_id = !empty( $_POST['page_id'] ) ? $_POST['page_id'] : NULL;
	$current_page_section_id = !empty( $_POST['page_section_id'] ) ? $_POST['page_section_id'] : NULL;
	$section_type_id = !empty( $_POST['section_type_id'] ) ? $_POST['section_type_id'] : NULL;

	if(
		wpeb_check_ajax_access() &&
		!empty( $current_page_id ) &&
		!empty( $current_page_section_id ) &&
		!empty( $section_type_id )
	) {

		// Update selected template_id in DB
		if( wpeb_update_template( $current_page_section_id, $template_id = NULL, $section_type_id ) ) {

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

				// Delete custom compile style section
				wpeb_delete_custom_compile_style_section( $page_id, $page_section_id );

				// Get custom styles for this page
				$custom_config_path = WPEB_PLUGIN_CUSTOM . 'custom_config_' . $page_id . '.json';

				if( file_exists( $custom_config_path ) ) {

					// Get custom config data
					$custom_config_data = file_get_contents( $custom_config_path );
					$custom_config_data = json_decode( $custom_config_data );

					// If config json file not empty and section id property exists
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

			wp_send_json_success();

		} else {

			wp_send_json_error(
				new WP_Error( 'selected_template_not_deleted', __( 'No se ha podido eliminar la plantilla seleccionada.', 'ecoded_builder' ) )
			);

		}

	} else {

		wp_send_json_error(
			new WP_Error( 'required_data_are_missing', __( 'No se ha podido eliminar la plantilla seleccionada, faltan datos requeridos.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

?>
