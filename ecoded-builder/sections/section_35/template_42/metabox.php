	/* Section_35 template_42 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box_{{page_section_id}}',
		'title'        => __( 'Sección con formulario de contacto a la izquierda y de información de contacto a la derecha', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Título del bloque izquierdo, antes del formulario', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título del bloque derecho con la información de contacto', 'cmb2' ),
		'id'   => $prefix . 'location_title_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción bajo el título del bloque derecho', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );
