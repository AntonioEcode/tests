<?php

/******************************************************************************/
/*                           Custom metabox Template Posts                    */
/******************************************************************************/

add_action( 'cmb2_admin_init', 'custom_metabox_posts' );

function custom_metabox_posts() {

	// Get sidebars data
	$sidebars_widgets = get_option( 'sidebars_widgets', array() );

	$ecoded_featured_posts_cont = 0;

	// If the sidebar exists and have ecoded_featured_posts check assigned widgets
	if( array_key_exists( 'ecoded_sidebar_posts', $sidebars_widgets ) && !empty( $sidebars_widgets['ecoded_sidebar_posts'] ) ) {

		foreach( $sidebars_widgets['ecoded_sidebar_posts'] as $widget ) {

			// Check if ecoded_featured_posts widget is in use
			if( strpos( $widget, 'ecoded_featured_posts' ) !== FALSE ) {

				$ecoded_featured_posts_cont++;

			}

		}

	}

	$prefix = '_post_';

	// If ecoded_featured_posts widget is in use, display the metabox
	if( $ecoded_featured_posts_cont > 0 ) {

		/* Custom widget ecoded_featured_posts. Related posts with image */
		$cmb = new_cmb2_box( array(
			'id'           => $prefix . 'custom_sidebar_box',
			'title'        => __( 'Sidebar personalizado - Posts relacionados con imagen', 'cmb2' ),
			'object_types' => array( 'post' ),
			'closed'	   => TRUE,
		) );

		for( $i = 1; $i <= $ecoded_featured_posts_cont; $i++ ) {

			$cmb->add_field( array(
				'name' => __( 'Posts relacionados con imagen - Posición', 'cmb2' ) . ' ' . $i,
				'desc' => __( 'Si se deja vacío saldrá automáticamente la configuración del widget', 'cmb2' ),
				'id'   => $prefix . 'custom_sidebar_title_' . $i,
				'type' => 'title'
			) );

			$cmb->add_field( array(
				'name' => __( 'Título', 'cmb2' ),
				'id'   => $prefix . 'title_' . $i,
				'type' => 'text'
			) );

			$cmb->add_field( array(
				'id'           => $prefix . 'custom_sidebar_img_posts_hidden_' . $i,
				'type'         => 'text',
				'before_field' => ecoded_get_related_img_posts_sidebar( $cmb->object_id, $prefix . 'custom_sidebar_img_posts_hidden_' . $i ),
				'attributes'   => array( 'data-hidden' => 'true', 'readonly' => 'readonly' ),
			) );

		}

	}

}

/******************************************************************************/
/*                        END Custom metabox Template Posts                   */
/******************************************************************************/

?>