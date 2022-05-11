<?php

/**
 * Create custom post type "global_content"
 */
add_action( 'init', 'wpeb_global_content' );

function wpeb_global_content() {

	$labels = array(
		'name'               => __( 'Contenidos globales', 'cmb2' ),
		'singular_name'      => __( 'Contenido global', 'cmb2' ),
		'add_new'            => __( 'Añadir nuevo', 'cmb2' ),
		'add_new_item'       => __( 'Añadir nuevo contenido global', 'cmb2' ),
		'edit_item'          => __( 'Editar contenido global', 'cmb2' ),
		'new_item'           => __( 'Nuevo contenido global', 'cmb2' ),
		'all_items'          => __( 'Todo el contenido global', 'cmb2' ),
		'view_item'          => __( 'Ver contenido global', 'cmb2' ),
		'search_items'       => __( 'Buscar contenido global', 'cmb2' ),
		'not_found'          => __( 'Contenidos globales no encontrados', 'cmb2' ),
		'not_found_in_trash' => __( 'Contenidos globales no encontrados en la papelera', 'cmb2' ),
		'parent_item_colon'  => __( '', 'cmb2' ),
		'menu_name'          => __( 'Contenidos globales', 'cmb2' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => FALSE,
		'publicly_queryable' => FALSE,
		'show_ui'            => TRUE,
		'show_in_menu'       => FALSE,
		'query_var'          => FALSE,
		// 'rewrite'            => array( 'slug' => 'contenido' ),
		'capability_type'    => 'page',
		'has_archive'        => FALSE,
		'hierarchical'       => FALSE,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-category',
		'supports'           => array( 'title' )
	);

	register_post_type( 'global_content', $args );

}

/**
 * Variable metaboxes for global content
 */
add_action( 'cmb2_admin_init', 'wpeb_global_content_general_metabox' );

function wpeb_global_content_general_metabox() {

	$global_id = isset( $_GET['post'] ) && !empty( $_GET['post'] ) ? $_GET['post'] : NULL;
	$global_id = empty( $global_id ) && ( isset( $_POST['post_ID'] ) && !empty( $_POST['post_ID'] ) ) ? $_POST['post_ID'] : $global_id;

	$section_id  = get_post_meta( $global_id, '_global_section_id', TRUE );
	$template_id = get_post_meta( $global_id, '_global_template_id', TRUE );

	if( !empty( $section_id ) && !empty( $template_id ) ) {

		$metabox_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/metabox.php';
		$metabox_content = file_exists( $metabox_file ) ? file_get_contents( $metabox_file ) : FALSE;

		// If section have metabox add to template_metabox_content
		if( !empty( $metabox_content ) ) {

			// Replace content
			$metabox_content = str_replace( '_{{page_section_id}}', '', $metabox_content );
			$metabox_content = str_replace( '$current_page_id', "''", $metabox_content );
			$metabox_content = str_replace( '{{page_section_id}}', '', $metabox_content );
			$metabox_content = str_replace( '{{page_id}}', 'global', $metabox_content );
			$metabox_content = str_replace( '{{section_id}}', $section_id, $metabox_content );
			$metabox_content = str_replace( '{{template_id}}', $template_id, $metabox_content );

			$prefix      = '_global_';
			$object_type = 'global_content';

			eval( $metabox_content );

		}

	}

}

function get_if_show_on_global( $cmb ) {

	return TRUE;

}

?>
