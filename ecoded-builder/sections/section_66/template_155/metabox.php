	/* Section_66 template_77 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Sección con título, descripción dos botones, un artículo destacado y seis artículos más', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Contenido principal de la sección', 'cmb2' ),
        'id'   =>  $prefix . 'section_content_{{page_section_id}}',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón antes de los artículos - Texto', 'cmb2' ),
		'id'   => $prefix . 'button_1_text_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón antes de los artículos - Enlace', 'cmb2' ),
        'id'   =>  $prefix . 'button_1_url_{{page_section_id}}',
        'type' => 'text_url'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Listado de artículos', 'cmb2' ),
        'id'   =>  $prefix . 'section_posts_{{page_section_id}}',
        'type' => 'title'
    ) );

	$group_field_id = $cmb->add_field( array(
        'id'   => $prefix . 'posts_blog_slide_{{page_section_id}}',
        'type' => 'group',
        'desc' => __( 'Selecciona artículos manualmente o déjalo vacío para sacar los 6 últimos artículos automáticamente.', 'cmb2' ),
        'options' => array(
            'group_title'   => __( 'Artículo {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro artículo', 'cmb2' ),
            'remove_button' => __( 'Eliminar artículo', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Entrada', 'cmb2' ),
        'id'               => 'post_id',
        'type'             => 'select',
        'show_option_none' => TRUE,
        'options'          => ecode_get_posts( $post_type = 'post', $post_per_page = '-1' ),
    ) );

	$cmb->add_field( array(
        'name' => __( 'Botón después de los artículos - Texto', 'cmb2' ),
		'id'   => $prefix . 'button_2_text_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón después de los artículos - Enlace', 'cmb2' ),
        'desc' => __( 'Si se deja vacío será el enlace al blog directamente', 'cmb2' ),
        'id'   =>  $prefix . 'button_2_url_{{page_section_id}}',
        'type' => 'text_url'
    ) );
