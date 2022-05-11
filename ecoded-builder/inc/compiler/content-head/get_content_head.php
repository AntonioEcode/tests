<?php

// Get head-content content
function wpeb_get_content_head( $page_section_id, $section_id, $template_id, $template_name, $content_head_template ) {

	$content_head_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/content-head.php';
	$new_content_head  = file_exists( $content_head_file ) ? file_get_contents( $content_head_file ) : FALSE;

	// If section have content for the head add to content_head array
	if( !empty( $new_content_head ) ) {

		// Replace variable content
		$new_content_head = str_replace( '{{page_section_id}}', $page_section_id, $new_content_head );
		$new_content_head = str_replace( '{{template_name}}', $template_name, $new_content_head );
		$new_content_head = str_replace( '{{section_id}}', $section_id, $new_content_head );
		$new_content_head = str_replace( '{{template_id}}', $template_id, $new_content_head );

		// Add new content if not exists
		if( !in_array( $new_content_head, $content_head_template ) ) {

			array_push( $content_head_template, $new_content_head );

		}

	}

	return $content_head_template;

}

?>