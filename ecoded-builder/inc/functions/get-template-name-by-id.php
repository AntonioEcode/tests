<?php

function ecode_get_template_name_by_id( $post_id ) {

	$template_name = '';

	if( is_front_page( $post_id ) || get_option( 'page_on_front' ) == $post_id )	 {

		$template_name = 'front-page';

	} elseif( is_single( $post_id ) || get_post_type( $post_id ) == 'post' ) {

		$template_name = 'single-post';

	} elseif( is_home( $post_id ) || get_option( 'page_for_posts' ) == $post_id ) {

		$template_name = 'home';

	} else {

		$wp_page_template = get_post_meta( $post_id, '_wp_page_template', TRUE );

		$wp_page_template = explode( '/', $wp_page_template )[1];
		$wp_page_template = explode( '.', $wp_page_template )[0];

		$template_name = $wp_page_template;

	}

	return $template_name;

}

?>
