	/* Section_83 template_99 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'content_box_{{page_section_id}}',
		'title'        => __( 'Sección de sliders con título H1, subtítulo, imagen y un botón', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$group_field_id = $cmb->add_field( array(
        'name'    => __( 'Slides', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Slide {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro slide', 'cmb2' ),
            'remove_button' => __( 'Eliminar slide', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Alineación de la imagen', 'cmb2' ),
        'desc'             => __( 'Selecciona si la imagen estará a la izquierda o a la derecha.', 'cmb2' ),
        'id'               => 'card_img_alignment',
        'type'             => 'select',
        'show_option_none' => FALSE,
        'options'          => array(
            'left'  => __( 'Izquierda', 'cmb2' ),
            'right' => __( 'Derecha', 'cmb2' ),
        ),
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => 'card_image',
		'type' => 'file'
	) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título personalizado', 'cmb2' ),
		'desc' => __( 'Si no se mete saldrá el título de la página ( solo en el primer slide )', 'cmb2' ),
		'id'   => 'card_title',
		'type' => 'textarea_small'
	) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => 'card_subtitle',
		'type' => 'wysiwyg'
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Botón - Texto', 'cmb2' ),
		'id'   => 'card_button_text',
		'type' => 'text_medium',
	) );

	$cmb->add_group_field( $group_field_id, array(
		'name' => __( 'Botón - URL', 'cmb2' ),
		'id'   => 'card_button_url',
		'type' => 'text_url',
	) );
