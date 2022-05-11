<?php

// AJAX to create new Global content
add_action( 'wp_ajax_wpeb_create_new_global_content', 'wpeb_create_new_global_content' );

function wpeb_create_new_global_content() {

	// Get $_POST
	$section_id  = !empty( $_POST['section_id'] ) ? $_POST['section_id'] : NULL;
	$template_id = !empty( $_POST['template_id'] ) ? $_POST['template_id'] : NULL;

	if( wpeb_check_ajax_access() && !empty( $template_id ) && !empty( $section_id ) ) {

		// Create new global content
		$post_arr = array(
			'post_type' => 'global_content',
			'meta_input' => array(
				'_global_section_id' => $section_id,
				'_global_template_id' => $template_id,
			),
		);

		$global_content_id = wp_insert_post( $post_arr );

		// Get edit permalink
		$global_content_edit_permalink = get_edit_post_link( $global_content_id, '&' );

		wp_send_json_success( $global_content_edit_permalink );

	} else {

        wp_send_json_error(
			new WP_Error( 'not_data', __( 'No se ha podido crear el contenido global correctamente.', 'ecoded_builder' ) )
        );

	}

	wp_die();

}

?>
