<?php

// Function to generate link and img tag content for metabox headers
function wpeb_get_section_info( $page_id, $page_section_id, $section_id, $template_id ) {

	$section_link   = '';
	$screenshot_img = '';
	$create_global_content = '';

    if( !empty( $page_id ) && !empty( $page_section_id ) ) {

        $section_link = get_permalink( $page_id );

		if( !empty( $section_link ) ) {

			$section_link .= '#page_section_' . $page_section_id;

			$section_link = '<a href="' . $section_link . '" target="_blank">' . __( 'Ver en la web', 'frontecode' ) . '</a>';

		}

		$screenshot_link = WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section_id . '/template_' . $template_id . '/screenshot.png';

		$screenshot_img = '<figure><img src="' . $screenshot_link . '"></figure>';

		// Check if this template is ready for global content to add create button
		if( check_is_global_template( $section_id, $template_id ) ) {

			$create_global_content = '<span class="button_create_global_content" data-section="' . $section_id . '" data-template="' . $template_id . '">' . __( 'Crear contenido global', 'frontecode' ) . '</span>';

		}

	} elseif( !empty( $section_id ) && !empty( $template_id ) ) {

		$screenshot_link = WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section_id . '/template_' . $template_id . '/screenshot.png';

		$screenshot_img = '<figure><img src="' . $screenshot_link . '"></figure>';

	}

	return $section_link . $screenshot_img . $create_global_content;

}

?>
