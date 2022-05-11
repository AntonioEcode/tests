<?php

// Get metabox content
function wpeb_get_content_template_metabox( $page_id, $page_section_id, $section_id, $template_id, $template_metabox_content ) {

	$metabox_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/metabox.php';
	$metabox_content = file_exists( $metabox_file ) ? file_get_contents( $metabox_file ) : FALSE;

	// If section have metabox add to template_metabox_content
	if( !empty( $metabox_content ) ) {

		// Replace variable content
		$metabox_content = str_replace( '{{page_section_id}}', $page_section_id, $metabox_content );
		$metabox_content = str_replace( '{{page_id}}', $page_id, $metabox_content );
		$metabox_content = str_replace( '{{section_id}}', $section_id, $metabox_content );
		$metabox_content = str_replace( '{{template_id}}', $template_id, $metabox_content );

		$template_metabox_content .= "\n";
		$template_metabox_content .= $metabox_content;
		$template_metabox_content .= "\n\n";

	}

	return $template_metabox_content;

}

?>
