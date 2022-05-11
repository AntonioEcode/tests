<?php

// Get shortcodes content
function wpeb_get_shortcodes_content( $section_id, $template_id, $shortcodes_content ) {

	$shortcodes_file            = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/shortcodes.php';
	$section_shortcodes_content = file_exists( $shortcodes_file ) ? file_get_contents( $shortcodes_file ) : FALSE;

	// If section have shortcodes add to shortcodes_content
	if( !empty( $section_shortcodes_content ) ) {

		// Get each shortcode individually ( array )
		$shortcodes = explode( '/* END wpeb_shortcode */', $section_shortcodes_content );

		foreach( $shortcodes as $shortcode ) {

			if( !empty( $shortcode ) ) {

				$start_pos = strpos( $shortcode, 'function wpeb_' ) + 9;
				$end_pos = strpos( $shortcode, '(', $start_pos );
				$shortcode_function_name = substr( $shortcode, $start_pos, $end_pos - $start_pos ); // Example: function wpeb_featured_shortcode

				// If already not exists, add it
				if( !array_key_exists( $shortcode_function_name, $shortcodes_content ) ) {

					$shortcodes_content[$shortcode_function_name] = $shortcode;

				}

			}

		}

	}

	return $shortcodes_content;

}

?>
