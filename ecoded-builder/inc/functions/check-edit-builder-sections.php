<?php

function ecode_check_edit_builder_sections( $get, $post_id ) {

	$return = FALSE;

	if( !empty( $get['action'] ) && $get['action'] == 'edit' ) {

		if ( get_post_type( $post_id ) == 'post' ) {

			$return = TRUE;

		}

		if ( get_post_type( $post_id ) == 'page' ) {

			if( is_front_page( $post_id ) || get_option( 'page_on_front' ) == $post_id ) {

				$return = TRUE;

			} elseif( is_home( $post_id ) || get_option( 'page_for_posts' ) == $post_id ) {

				$return = TRUE;

			} else {

				$wp_page_template = get_post_meta( $post_id, '_wp_page_template', TRUE );

				if( !empty( $wp_page_template ) && $wp_page_template != 'default'  ) {

					$return = TRUE;

				}

			}

		}

	}

	return $return;

}

?>
