<?php

// Function to get all data of template. Global content if have or her custom data
function wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id ) {

	// Get global content id
	$custom_field_key = '_' . $template_name . '_global_content_' . $page_section_id;

	$global_content_id = get_post_meta( $current_id, $custom_field_key, TRUE );

	// Get default config of custom fields for the current template
	$config_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/default_config.json';
	$config_file_content = file_exists( $config_file ) ? (array)json_decode( file_get_contents( $config_file ) ) : FALSE;

	$config_custom_fields = array_key_exists( 'custom_fields', $config_file_content ) ? (array)$config_file_content['custom_fields'] : array();

	// Get data
	$data = (object)array();

	// If have global content add to $data
	if( !empty( $global_content_id ) ) {

		// Get custom field by global content id
		$template_fields = wpeb_get_fields_by_global_content_id( $global_content_id );

		if( !empty( $template_fields ) ) {

			foreach( $template_fields as $field ) {

				$field_key   = str_replace( '_global_', '', $field->meta_key );
				$field_value = $field->meta_value;

				$field_type = '';

				if( array_key_exists( $field_key, $config_custom_fields ) ) {

					$field_type = $config_custom_fields[$field_key];

				}

				// Special case that require create more fields
				wpeb_get_additional_fields( $data, $field_key, $field_value, $field_type, $current_id );

			}

		}

	}

	// If not have global content add custom data to $data
	if( empty( (array)$data ) ) {

		foreach( $config_custom_fields as $field_key => $field_type ) {

			if ( $field_type == 'file' && strpos( $field_key, '_id' ) ) {

				$field_key_id = str_replace( '_id', '', $field_key );

				$meta_key = '_' . $template_name . '_' . $field_key_id . '_' . $page_section_id . '_id';

			} else {

				$meta_key = '_' . $template_name . '_' . $field_key . '_' . $page_section_id;

			}

			$field_value = get_post_meta( $current_id, $meta_key, TRUE );

			// Especial case for H1 fields. Get title page if not have custom title
			if( $field_type == 'h1' && empty( $field_value ) ) {

				$field_value = get_the_title( $current_id );

			}

			// Special case that require create more fields
			wpeb_get_additional_fields( $data, $field_key, $field_value, $field_type, $current_id );

		}

	}

	return $data;

}

// Special case that require create more fields
function wpeb_get_additional_fields( &$data, $field_key, $field_value, $field_type, $current_id ) {
	
	// Special case that require create more fields
	switch( $field_type ) {

		case 'file':

			if( strpos( $field_key, '_id' ) !== FALSE ) {

				// Add field key and value to $data
				$data->$field_key = $field_value;

				$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

				$alt_key = str_replace( '_id' , '', $field_key ) . '_alt';

				$data->$alt_key = !empty( $alt = get_post_meta( $field_value, '_wp_attachment_image_alt', TRUE ) ) ? $alt : $page_title;

			} else {

				$field_key = $field_key . '_src';

				// Add field key and value to $data
				$data->$field_key = $field_value;

			}

			break;

		case 'wysiwyg':

			// Add field key and value to $data
			$data->$field_key = apply_filters( 'the_content', $field_value );

			break;

		case 'group':

			// Add field key and value to $data
			$data->$field_key = maybe_unserialize( $field_value );

			break;

		case 'file_list':

			// Add field key and value to $data
			$data->$field_key = maybe_unserialize( $field_value );

			break;

		// case 'text_code':

		// 	// Para los svg, comprobar si hay que controlarlo

		// 	break;

		default:

			// Add field key and value to $data
			$data->$field_key = $field_value;

			break;

	}

}

?>
