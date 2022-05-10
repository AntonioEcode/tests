	/* Section_13 template_18 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box_{{page_section_id}}',
		'title'        => __( 'Sección de formulario de contacto con imagen de fondo, título y descripción', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'image_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );
