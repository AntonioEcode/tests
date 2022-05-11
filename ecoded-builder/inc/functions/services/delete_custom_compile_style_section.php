<?php

// Function to delete custom compile style section of specific page
function wpeb_delete_custom_compile_style_section( $page_id, $page_section_id ) {

	$custom_compile_style_path = WPEB_PLUGIN_CUSTOM . 'custom_compile_style_' . $page_id . '.json';

	if( file_exists( $custom_compile_style_path ) ) {

		// Get custom compile style data
		$custom_compile_style_data = file_get_contents( $custom_compile_style_path );
		$custom_compile_style_data = json_decode( $custom_compile_style_data );

		// If json file not empty and page section id property exists, delete it
		if( !empty( (array)$custom_compile_style_data ) && property_exists( $custom_compile_style_data, $page_section_id ) ) {

			// Delete section style
			unset( $custom_compile_style_data->$page_section_id );

			// Check if the custom_compile_style_data has no more sections and delete it
			if( !(array)$custom_compile_style_data ) {

				unlink( $custom_compile_style_path );

			} else {

				// Add content to custom_compile_style_{page_id}.json file
				file_put_contents( $custom_compile_style_path, json_encode( $custom_compile_style_data ) );

			}

		}

	}

}

?>