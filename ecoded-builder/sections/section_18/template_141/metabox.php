	/* Section_18 template_141 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box_{{page_section_id}}',
		'title'        => __( 'Sección de información de contacto a la izquierda, formulario de contacto a la derecha y la imagen del mapa debajo', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Título del bloque izquierdo con la información de contacto', 'cmb2' ),
		'id'   => $prefix . 'location_title_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título del bloque derecho, antes del formulario', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen del mapa HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'map_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen del mapa', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'map_image_{{page_section_id}}',
		'type' => 'file'
	) );
