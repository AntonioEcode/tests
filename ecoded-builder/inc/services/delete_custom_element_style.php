<?php

// AJAX to delete custom style of specific element in a section
add_action( 'wp_ajax_wpeb_delete_custom_element_style', 'wpeb_delete_custom_element_style' );

function wpeb_delete_custom_element_style() {

	// Get $_POST
	$current_page_id = !empty( $_POST['page_id'] ) ? $_POST['page_id'] : NULL;
	$current_page_section_id = !empty( $_POST['section_id'] ) ? $_POST['section_id'] : NULL;
	$section_type_id = !empty( $_POST['section_type_id'] ) ? $_POST['section_type_id'] : NULL;
	$element_id = !empty( $_POST['element_id'] ) ? $_POST['element_id'] : NULL;
	$compile_style = !empty( $_POST['compile_style'] ) ? $_POST['compile_style'] : NULL;

	if(
		wpeb_check_ajax_access() &&
		!empty( $current_page_id ) &&
		!empty( $current_page_section_id ) &&
		!empty( $section_type_id ) &&
		!empty( $element_id )
	) {

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

		// Delete element style from custom config files and check for update or delete in compile custom style
		foreach( $pages_ids as $page_id => $page_section_id ) {

			// Delete element style from custom config file
			$custom_config_path = WPEB_PLUGIN_CUSTOM . 'custom_config_' . $page_id . '.json';

			if( file_exists( $custom_config_path ) ) {

				// Get custom config data
				$custom_config_data = file_get_contents( $custom_config_path );
				$custom_config_data = json_decode( $custom_config_data );

				// If config json file not empty and section id property exists, check if element exists and delete it
				if( !empty( (array)$custom_config_data ) && property_exists( $custom_config_data, $page_section_id ) ) {

					if( property_exists( $custom_config_data->$page_section_id, $element_id ) ) {

						// Delete element style
						unset( $custom_config_data->$page_section_id->$element_id );

						// Check if the section has no more elements and delete it
						if( !(array)$custom_config_data->$page_section_id ) {

							// Delete section style
							unset( $custom_config_data->$page_section_id );

							// Check if the custom_config_data has no more sections and delete it
							if( !(array)$custom_config_data ) {

								unlink( $custom_config_path );

							} else {

								// Add content to custom_config.json file
								file_put_contents( $custom_config_path, json_encode( $custom_config_data ) );

							}

						} else {

							// Add content to custom_config.json file
							file_put_contents( $custom_config_path, json_encode( $custom_config_data ) );

						}

					}

				}

			}

			// If empty delete in compile custom style else edit.
			if( empty( $compile_style ) ) {

				// Delete custom compile style section
				wpeb_delete_custom_compile_style_section( $page_id, $page_section_id );

			} else {

				// Edit compile style file
				wpeb_edit_custom_compile_style_file( $page_id, $page_section_id, $compile_style );

			}

		}

		wp_send_json_success();

	} else {

		wp_send_json_error(
			new WP_Error( 'required_data_are_missing', __( 'No se ha podido restablecer los estilos del elemento, faltan datos requeridos.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

?>
