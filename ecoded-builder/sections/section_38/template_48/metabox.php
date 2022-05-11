    /* Section_38 template_48 */

    $cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Campos personalizados', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
		'name'    => __( 'URL del vídeo de YouTube', 'cmb2' ),
		'desc'    => __( 'Ejemplo de URL: https://www.youtube.com/watch?v=ZfnFBXJuUIQ', 'cmb2' ),
		'id'      => $prefix . 'url_video',
		'type'    => 'text_url'
	) );