<?php

// AJAX to return posts filtered
add_action( 'wp_ajax_wpeb_get_posts_by', 'wpeb_get_posts_by' );

function wpeb_get_posts_by() {

	if( wpeb_check_ajax_access() ) {

		// Get $_POST
		$post_type = !empty( $_POST['post_type'] ) ? $_POST['post_type'] : 'post';
		$posts_per_page = !empty( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : -1;
		$category_id = !empty( $_POST['category_id'] ) ? $_POST['category_id'] : NULL;
		$tag_id = !empty( $_POST['tag_id'] ) ? $_POST['tag_id'] : NULL;
		$status = !empty( $_POST['status'] ) ? $_POST['status'] : 'publish';
		$orderby = !empty( $_POST['orderby'] ) ? $_POST['orderby'] : 'date';
		$order = !empty( $_POST['order'] ) ? $_POST['order'] : 'DESC';

		$results = wpeb_get_posts( $post_type, $posts_per_page, $category_id, $tag_id, $status, $orderby, $order );

		wp_send_json_success( $results );

	} else {

        wp_send_json_error(
			new WP_Error( 'not_data', __( 'No se han podido obtener resultados.', 'ecoded_builder' ) )
        );

	}

	wp_die();

}

?>