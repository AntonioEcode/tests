<?php

/******************************************************************************/
/*                      Custom metabox Template Category                      */
/******************************************************************************/

add_action( 'cmb2_admin_init', 'custom_metabox_template_category' );

function custom_metabox_template_category() {

	// // Get sidebars data
	// $sidebars_widgets = get_option( 'sidebars_widgets', array() );

	// $enabled_ecoded_featured_posts = FALSE;

	// // If the sidebar exists and have ecoded_featured_posts check assigned widgets
	// if( array_key_exists( 'ecoded_sidebar_posts', $sidebars_widgets ) && !empty( $sidebars_widgets['ecoded_sidebar_posts'] ) ) {

	// 	foreach( $sidebars_widgets['ecoded_sidebar_posts'] as $widget ) {

	// 		// Check if ecoded_featured_posts widget is in use
	// 		if( strpos( $widget, 'ecoded_featured_posts' ) !== FALSE ) {

	// 			$enabled_ecoded_featured_posts = TRUE;

	// 		}

	// 	}

	// }

	// $prefix = '_term_';

	// /* Featured posts */
	// $cmb = new_cmb2_box( array(
	// 	'id'           => $prefix . 'slide_featured_posts_box',
	// 	'title'        => __( 'Sidebar personalizado - Artículos relacionados ( con imagen )', 'cmb2' ),
	// 	'object_types' => array( 'term' ),
	// 	'taxonomies'   => array( 'category' ),
	// ) );

	// $cmb->add_field( array(
	// 	'name' => __( 'Sidebar personalizado - Artículos relacionados ( con imagen )', 'cmb2' ),
	// 	'id'   => $prefix . 'slide_featured_posts_title',
	// 	'type' => 'title',
	// ) );

	// $cmb->add_field( array(
	// 	'id'           => $prefix . 'slide_featured_posts_hidden',
	// 	'type'         => 'hidden',
	// 	'before_field' => ecode_get_featured_posts_select( $post_id = NULL, $prefix . 'cat_v1_slide_featured_posts_hidden', $cmb->object_id ),
	// ) );

}

/******************************************************************************/
/*                      Custom metabox Template Category                      */
/******************************************************************************/

?>