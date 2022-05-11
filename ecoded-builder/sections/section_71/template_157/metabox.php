	/* Section_71 template_157 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Sección con título, descripción, 3 artículos y contadores ascendentes', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
        'id'   => $prefix . 'section_{{page_section_id}}_back_cmb',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'back_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'back_image_{{page_section_id}}',
		'type' => 'file'
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
        'name' => __( 'Listado de artículos', 'cmb2' ),
        'id'   =>  $prefix . 'section_posts_{{page_section_id}}',
        'type' => 'title'
    ) );

	$group_field_id = $cmb->add_field( array(
        'id'   => $prefix . 'posts_blog_slide_{{page_section_id}}',
        'type' => 'group',
        'desc' => __( 'Selecciona artículos manualmente o déjalo vacío para sacar los 3 últimos artículos automáticamente.', 'cmb2' ),
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
        'name' => __( 'Contadores ascendentes', 'cmb2' ),
        'id'   =>  $prefix . 'counters_section_{{page_section_id}}',
        'type' => 'title'
    ) );
