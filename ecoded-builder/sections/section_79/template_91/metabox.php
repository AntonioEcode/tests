    /* Section_79 template_91 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'related_posts_box_{{page_section_id}}',
		'title'        => __( 'Sección de artículos relacionados al actual.', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name'    => __( 'Título', 'cmb2' ),
		'id'      => $prefix . 'title_{{page_section_id}}',
        'default' => __( 'Artículos relacionados', 'cmb2' ),
		'type'    => 'text'
	) );

    $group_field_id = $cmb->add_field( array(
        'id'   => $prefix . 'related_posts_blog_{{page_section_id}}',
        'type' => 'group',
        'desc' => __( 'Seleccionar 6 artículos manualmente o dejar vacío para sacar 6 artículos automáticamente.', 'cmb2' ),
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
