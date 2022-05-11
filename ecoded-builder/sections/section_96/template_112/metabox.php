	/* Section_96 template_112 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Sección con 3 artículos', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Listado de artículos', 'cmb2' ),
        'id'   =>  $prefix . 'section_posts_{{page_section_id}}',
        'type' => 'title'
    ) );

	$group_field_id = $cmb->add_field( array(
        'id'   => $prefix . 'posts_blog_{{page_section_id}}',
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
