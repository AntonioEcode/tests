<?php

// Function to get real content if have
function wpeb_get_real_data( $page_section_id, $page_id, $section_id, $template_id ) {

	// Get real data if have for custom fields
	$real_data = (object)array();

	// Get page_sections_data from wp_eb_page_sections by id
	$page_sections_data = wpeb_get_page_sections_by_page_section_id( $page_section_id );

	$section_type_id = $page_sections_data->section_type_id;

	// If not is header or footer get real data. Header and footer are not yet ready for real content
	if( $section_type_id != 1 && $section_type_id != 2 ) {

		// Get page data from eb_pages by id
		$page_data = wpeb_get_page_types( $id = $page_id, $order = NULL );

		// Get WordPress post_id
		$post_id = $page_data->wp_page_id;

		if( !empty( $post_id ) ) {

			// Get template name
			$template_name = $page_data->template_name;

			$real_data = wpeb_get_data( $post_id, $template_name, $page_section_id, $section_id, $template_id );

		}

	}

	return $real_data;

}

?>