<?php

// Before add template CSS, get global colors and replace it in style.css file of the template
function wpeb_set_global_styles_to_css_template( $css_path_file ) {

	// Get style content
	$css_template_content = file_exists( $css_path_file ) ? file_get_contents( $css_path_file ) : FALSE;

	if( !empty( $css_template_content ) ) {

		// Get global colors
		$primary_color   = get_option( 'wpeb_primary_color' );
		$secondary_color = get_option( 'wpeb_secondary_color' );

		// Replace global colors
		$css_template_content = wpeb_replace_property_value_in_css(
			$css_template_content, $key_template_start_comment = '/*! primary_color !*/', $key_template_end_comment = '/*! end_primary_color !*/', $new_property_value = $primary_color
		);

		$css_template_content = wpeb_replace_property_value_in_css(
			$css_template_content, $key_template_start_comment = '/*! secondary_color !*/', $key_template_end_comment = '/*! end_secondary_color !*/', $new_property_value = $secondary_color
		);

		// Put css content in style.css of the template
		$style_file = fopen( $css_path_file, 'w+' );
		fwrite( $style_file, $css_template_content );
		fclose( $style_file );

	}

}

// Function to replace old styles with global styles
function wpeb_replace_property_value_in_css( $css_template_content, $key_template_start_comment, $key_template_end_comment, $new_property_value ) {

	while( !empty( $block_to_replace_in_css = wpeb_get_content_matches( $key_template_start_comment, $key_template_end_comment, $css_template_content ) ) ) {

		$current_property_value = substr( $block_to_replace_in_css, strpos( $block_to_replace_in_css, ':' ) + 1 );

		// Check if contain !important and add it
		if( strpos( $current_property_value, '!important' )  ) {

			$new_property_value = $new_property_value . '!important';

		}

		$new_block_to_replace_in_css = str_replace( $current_property_value, $new_property_value . ';/*! end_temp !*/', $block_to_replace_in_css );

		// Replace key template for '/*! temp !*/'
		$new_block_to_replace_in_css = str_replace( $key_template_start_comment, '/*! temp !*/', $new_block_to_replace_in_css );

		$css_template_content = str_replace( $block_to_replace_in_css, $new_block_to_replace_in_css, $css_template_content );
		
	}

	// Replace '/*! temp !*/' and '/*! end_temp !*/' for key templates
	$css_template_content = str_replace( '/*! temp !*/', $key_template_start_comment, $css_template_content );
	$css_template_content = str_replace( '/*! end_temp !*/', $key_template_end_comment, $css_template_content );

	return $css_template_content;

}

?>