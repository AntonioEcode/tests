    /* Section_23 template_28 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Slider con título ( H1 ), subtítulo ( H2 ), imagen de fondo y 2 botones', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
		'name' => __( 'Slider', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta cada slider de la sección', 'cmb2' ),
		'type' => 'title',
		'id'   => 'slides_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Slides', 'cmb2' ),
        'id'      => $prefix . 'slides_group_{{page_section_id}}',
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
        'name' => __( 'Imagen de fondo del slide', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
        'id'   => 'slide_image_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
        'id'   => 'slide_image_hd',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
        'id'   => 'slide_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del slide', 'cmb2' ),
        'desc' => __( 'Título, subtítulo, botones y alineación.', 'cmb2' ),
        'id'   => 'slide_content_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Alineación', 'cmb2' ),
        'desc'             => __( 'Seleccionar si el contenido del slide estará alineado a la izquierda o a la derecha.', 'cmb2' ),
        'id'               => 'content_alignment',
        'type'             => 'select',
        'show_option_none' => FALSE,
        'options'          => array(
            'ecode_article_left'  => __( 'Izquierda', 'cmb2' ),
            'ecode_article_right' => __( 'Derecha', 'cmb2' ),
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'desc' => __( 'Solo la primera diapositiva será H1, el resto H2. Si el primero se deja vacío se pondrá automáticamente el título de la página.', 'cmb2' ),
        'id'   => 'slide_title',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Subtítulo', 'cmb2' ),
        'desc' => __( 'Solo la primera diapositiva será H2, el resto H3', 'cmb2' ),
        'id'   => 'slide_subtitle',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Texto del primer botón', 'cmb2' ),
        'id'   => 'slide_txt_button_1',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace del primer botón', 'cmb2' ),
        'id'   => 'slide_link_button_1',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Texto del segundo botón', 'cmb2' ),
        'id'   => 'slide_txt_button_2',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace del segundo botón', 'cmb2' ),
        'id'   => 'slide_link_button_2',
        'type' => 'text_url'
    ) );