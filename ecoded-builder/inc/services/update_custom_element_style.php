<?php

// AJAX to save custom style of specific element in a section
add_action( 'wp_ajax_wpeb_update_custom_element_style', 'wpeb_update_custom_element_style' );

function wpeb_update_custom_element_style() {

	// Get $_POST
	$current_page_id = !empty( $_POST['page_id'] ) ? $_POST['page_id'] : NULL;
	$current_page_section_id = !empty( $_POST['section_id'] ) ? $_POST['section_id'] : NULL;
	$section_type_id = !empty( $_POST['section_type_id'] ) ? $_POST['section_type_id'] : NULL;
	$element_id = !empty( $_POST['element_id'] ) ? $_POST['element_id'] : NULL;
	$compile_style = !empty( $_POST['compile_style'] ) ? $_POST['compile_style'] : NULL;
	$style = !empty( $_POST['style'] ) ? $_POST['style'] : NULL;

	if(
		wpeb_check_ajax_access() &&
		!empty( $current_page_id ) &&
		!empty( $current_page_section_id ) &&
		!empty( $section_type_id ) &&
		!empty( $element_id ) &&
		!empty( $style )
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

		// Edit custom files
		foreach( $pages_ids as $page_id => $page_section_id ) {

			// Edit custom config file
			wpeb_edit_custom_config_file( $page_id, $page_section_id, $element_id, $style );

			if( !empty( $compile_style ) ) {

				// Edit compile style file
				wpeb_edit_custom_compile_style_file( $page_id, $page_section_id, $compile_style );

			}

		}

		wp_send_json_success();

	} else {

		wp_send_json_error(
			new WP_Error( 'required_data_are_missing', __( 'No se ha podido guardar los estilos modificados, faltan datos requeridos.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

// Function to edit custom_config_{page_id}.json
function wpeb_edit_custom_config_file( $page_id, $page_section_id, $element_id, $style ) {

	// JSON with config per page_section_id and element
	$custom_config_path = WPEB_PLUGIN_CUSTOM . 'custom_config_' . $page_id . '.json';

	if( !file_exists( $custom_config_path ) ) {

		// Create file
		file_put_contents( $custom_config_path, $content = '' );

	}

	// Get custom config data
	$custom_config_data = file_get_contents( $custom_config_path );
	$custom_config_data = json_decode( $custom_config_data );

	// If file is empty, initialise the json
	$custom_config_data = empty( $custom_config_data ) ? (object)array() : $custom_config_data;

	if( !property_exists( $custom_config_data, $page_section_id ) ) {

		// If not exists, create it
		$custom_config_data->$page_section_id = (object)array();

	}

	if( !property_exists( $custom_config_data->$page_section_id, $element_id ) ) {

		// If not exists, create it
		$custom_config_data->$page_section_id->$element_id = '';

	}

	// Add the new style
	$custom_config_data->$page_section_id->$element_id = $style;

	// Add content to custom_config.json file
	file_put_contents( $custom_config_path, json_encode( $custom_config_data ) );

}

// Function to edit custom_compile_style_{page_id}.json
function wpeb_edit_custom_compile_style_file( $page_id, $page_section_id, $compile_style ) {

	$current_page_section = explode( ' ', $compile_style )[0];
	$new_page_section = '#page_section_' . $page_section_id;
	$compile_style = str_replace( $current_page_section, $new_page_section, $compile_style );

	// JSON with compile style css per page_section_id
	$custom_compile_style_path = WPEB_PLUGIN_CUSTOM . 'custom_compile_style_' . $page_id . '.json';

	if( !file_exists( $custom_compile_style_path ) ) {

		// Create file
		file_put_contents( $custom_compile_style_path, $content = '' );

	}

	// Get compile style data
	$custom_compile_style_data = file_get_contents( $custom_compile_style_path );
	$custom_compile_style_data = json_decode( $custom_compile_style_data );

	// If file is empty, initialise the json
	$custom_compile_style_data = empty( $custom_compile_style_data ) ? (object)array() : $custom_compile_style_data;

	if( !property_exists( $custom_compile_style_data, $page_section_id ) ) {

		// If not exists, create it
		$custom_compile_style_data->$page_section_id = (object)array();

	}

	// Add the new compile style
	$custom_compile_style_data->$page_section_id = $compile_style;

	// Add content to custom_compile_style_{page_id}.json file
	file_put_contents( $custom_compile_style_path, json_encode( $custom_compile_style_data ) );

}

?>
