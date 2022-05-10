	/* Section_63 template_74 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Header con H1, antetítulo, fecha, imagen de fondo y los últimos 3 artículos del blog', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
        'id'   =>  $prefix . 'section_image_title_{{page_section_id}}',
        'type' => 'title'
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
        'name' => __( 'Contenido principal de la sección', 'cmb2' ),
        'id'   =>  $prefix . 'section_content_{{page_section_id}}',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => $prefix . 'pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'desc' => __( 'Rellenar para poner un título personalizado si no, saldrá el de la página', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
		'name' => __( 'Ocultar fecha', 'cmb2' ),
		'desc' => __( 'Marcar este checkbox para no mostrar la fecha debajo del título', 'cmb2' ),
		'id'   => $prefix . 'hide_date_section_{{page_section_id}}',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Fecha debajo del Título', 'cmb2' ),
		'id'   => $prefix . 'date_section_{{page_section_id}}',
		'desc' => __( 'Dejar vacío para que salga la fecha actual dinámicamente', 'cmb2' ),
		'type' => 'text_date',
		// 'date_format' => 'j F, Y', // BUG not show after save
		'date_format' => 'Y-m-d',
		// 'timezone_meta_key' => 'wiki_test_timezone',
	) );

	$cmb->add_field( array(
        'name' => __( 'Sección de artículos', 'cmb2' ),
        'id'   =>  $prefix . 'section_last_posts_{{page_section_id}}',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
		'name' => __( 'Ocultar artículos', 'cmb2' ),
		'desc' => __( 'Marcar este checkbox para no mostrar artículos del blog', 'cmb2' ),
		'id'   => $prefix . 'hide_posts_{{page_section_id}}',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
        'name' => __( 'Título de los artículos', 'cmb2' ),
		'desc' => __( 'Titular que sale encima de los artículos', 'cmb2' ),
		'id'   => $prefix . 'posts_title_{{page_section_id}}',
		'type' => 'text'
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
