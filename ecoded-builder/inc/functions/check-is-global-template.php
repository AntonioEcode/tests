<?php

/******************************************************************************/
/*               Check if template its ready to global content                */
/******************************************************************************/
function check_is_global_template( $section_id, $template_id ) {

    // Check if this template is ready for global content
	$template_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/html.php';
	$template_content = file_exists( $template_file ) ? file_get_contents( $template_file ) : FALSE;

	$global_content_ready = FALSE;

	if( !empty( $template_content ) ) {

		// If current template is ready for global content change $global_content_ready
		if( strpos( $template_content, 'wpeb_get_data' ) !== false ) {

			$global_content_ready = TRUE;

		}

	}

	return $global_content_ready;

}
/******************************************************************************/
/*             END Check if template its ready to global content              */
/******************************************************************************/

?>