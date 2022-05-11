<?php

/******************************************************************************/
/*                           Custom metabox Template Posts                    */
/******************************************************************************/

add_action( 'cmb2_admin_init', 'custom_metabox_template_home' );

function show_front_page_only( $cmb ) {

    return get_option( 'page_for_posts' ) == $cmb->object_id;

}

function custom_metabox_template_home() {

	// Get sidebars data
	$sidebars_widgets = get_option( 'sidebars_widgets', array() );

	$enabled_ecoded_featured_posts = FALSE;

	// If the sidebar exists and have ecoded_featured_posts check assigned widgets
	if( array_key_exists( 'ecoded_sidebar_blog', $sidebars_widgets ) && !empty( $sidebars_widgets['ecoded_sidebar_blog'] ) ) {

		foreach( $sidebars_widgets['ecoded_sidebar_blog'] as $widget ) {

			// Check if ecoded_featured_posts widget is in use
			if( strpos( $widget, 'ecoded_featured_posts' ) !== FALSE ) {

				$enabled_ecoded_featured_posts = TRUE;

			}

		}

	}

	$prefix = '_home_';

	// If ecoded_featured_posts widget is in use, display the metabox
	if( $enabled_ecoded_featured_posts ) {

		/* Custom widget ecoded_featured_posts. Related posts with image */
		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'custom_sidebar_box',
			'title'        => __( 'Sidebar personalizado - Artículos relacionados ( con imagen )', 'cmb2' ),
			'object_types' => array( 'page' ),
			'show_on_cb'   => 'show_front_page_only',
			'closed'	   => TRUE,
		) );

		$cmb->add_field( array(
			'name' => __( 'Artículos relacionados ( con imagen )', 'cmb2' ),
			'desc' => __( 'Si se deja vacío saldrán automáticamente los del widget', 'cmb2' ),
			'id'   => $prefix . 'custom_sidebar_title_1',
			'type' => 'title'
		) );

		$cmb->add_field( array(
			'id'           => $prefix . 'custom_sidebar_img_posts_hidden',
			'type'         => 'hidden',
			'before_field' => ecoded_get_related_img_posts_sidebar( $cmb->object_id, $prefix . 'custom_sidebar_img_posts_hidden' ),
		) );

	}

}

/******************************************************************************/
/*                        END Custom metabox Template Posts                   */
/******************************************************************************/

?>