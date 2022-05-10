    /* Section_145 template_214 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Slider con imagen de fondo, título, fecha, ciudad, lugar y botones', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'desc' => __( 'Para varios tipos de resoluciones de pantalla.', 'cmb2' ),
        'id'   => 'slide_image_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio ( a partir de 1400px )', 'cmb2' ),
		'id'   => 'slide_image_hd',
		'type' => 'file'
	) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo escritorio', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio ( a partir de 1024px )', 'cmb2' ),
		'id'   => 'slide_image_desktop',
		'type' => 'file'
	) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo tablet', 'cmb2' ),
        'desc' => __( 'Para resoluciones de tablets ( a partir de 768px )', 'cmb2' ),
		'id'   => 'slide_image_tablet',
		'type' => 'file'
	) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo móvil', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => 'slide_image',
		'type' => 'file'
	) );














    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del slide', 'cmb2' ),
        'desc' => __( 'Título, fecha, ciudad, lugar y botones', 'cmb2' ),
        'id'   => 'slide_content_title',
        'type' => 'title'
    ) );


    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 1 - Texto', 'cmb2' ),
        'desc' => __( 'Botón encima del título', 'cmb2' ),
        'id'   => 'slide_txt_button_1',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 1 - Enlace', 'cmb2' ),
        'desc' => __( 'Enlace del primer botón', 'cmb2' ),
        'id'   => 'slide_link_button_1',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'desc' => __( 'Solo la primera diapositiva será H1, el resto H2. Si el título del primer slide se deja vacío, se pondrá automáticamente el título de la página.', 'cmb2' ),
        'id'   => 'slide_title',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Fecha', 'cmb2' ),
        'id'   => 'slide_date',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Ciudad', 'cmb2' ),
        'id'   => 'slide_city',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Lugar', 'cmb2' ),
        'id'   => 'slide_place',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 2 - Texto', 'cmb2' ),
        'desc' => __( 'Botón de la izquierda debajo del resto de información.', 'cmb2' ),
        'id'   => 'slide_txt_button_2',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 2 - Enlace', 'cmb2' ),
        'desc' => __( 'Enlace del botón de la izquierda debajo del resto de información.', 'cmb2' ),
        'id'   => 'slide_link_button_2',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 3 - Texto', 'cmb2' ),
        'id'   => 'slide_txt_button_3',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón 3 - Enlace', 'cmb2' ),
        'id'   => 'slide_link_button_3',
        'type' => 'text_url'
    ) );