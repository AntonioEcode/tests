    /* Section_23 template_43 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Título con imagen de fondo y flecha animada apuntando hacia abajo con ancla', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo del slide', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
        'id'   =>  $prefix . 'slide_image_title{{page_section_id}}',
        'type' => 'title'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
        'id'   => $prefix . 'image_hd_{{page_section_id}}',
        'type' => 'file'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
        'id'   => $prefix . 'image_{{page_section_id}}',
        'type' => 'file'
    ) );