	/* Section_116 template_181 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Sección de comentarios con título, comentario destacado y grupo de comentarios', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    /* Global content */
    if( $object_type != 'global_content' ) {

        $global_contents = wpeb_get_global_content_by_template( $template_id = '{{template_id}}' );

        if( !empty( $global_contents ) ) {

            $array_options = array();

            foreach( $global_contents as $global_content ) {

                $global_content_id = $global_content['global_content_id'];

                $option_name = $global_content['global_content_title'];
                $option_name .= ' <a href="' . $global_content['global_content_edit_link'] . '" target="_blank">';
                $option_name .= __( 'Editar', 'cmb2' );
                $option_name .= '</a>';

                $array_options[$global_content_id] = $option_name;

            }

            $cmb->add_field( array(
                'name'    => __( 'Contenido global', 'cmb2' ),
                'desc'    => __( 'Este template dispone de contenido global', 'cmb2' ),
                'id'      => $prefix . 'global_content_title_{{page_section_id}}',
                'type'    => 'title',
                'classes' => 'wpeb_global_content'
            ) );

            $cmb->add_field( array(
                'name'             => __( 'Selecciona un contenido global para este template', 'cmb2' ),
                'id'               => $prefix . 'global_content_{{page_section_id}}',
                'type'             => 'radio',
                'show_option_none' => TRUE,
                'options'          => $array_options,
                'classes'          => 'wpeb_global_content wpeb_global_content_radios'
            ) );

        }
    }
    /* END Global content */

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
        'name' => __( 'Contenido del comentario destacado', 'cmb2' ),
        'id'   =>  $prefix . 'featured_content_{{page_section_id}}',
        'type' => 'title'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => $prefix . 'featured_pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'featured_title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
        'name'             => __( 'Nº de estrellas', 'cmb2' ),
        'desc'             => __( 'Selecciona el número de estrellas que quieres que aparezcan', 'cmb2' ),
		'id'               => $prefix . 'featured_stars_{{page_section_id}}',
		'type'             => 'select',
        'show_option_none' => true,
        'options'          => array(
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ),
	) );

    $cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => $prefix . 'featured_description_{{page_section_id}}',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Botón - Texto', 'cmb2' ),
		'id'   => $prefix . 'featured_btn_txt_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Botón - Enlace', 'cmb2' ),
		'id'   => $prefix . 'featured_btn_url_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen del comentario destacado', 'cmb2' ),
        'id'   =>  $prefix . 'featured_section_img_{{page_section_id}}',
        'type' => 'title'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Imagen HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'featured_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'featured_image_{{page_section_id}}',
		'type' => 'file'
	) );

    $cmb->add_field( array(
		'name' => __( 'Comentarios', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta el resto de comentarios que no son destacados', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'comments_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Comentarios', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Comentario {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro comentario', 'cmb2' ),
            'remove_button' => __( 'Eliminar comentario', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen', 'cmb2' ),
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => 'card_pretitle',
		'type' => 'textarea_small'
	) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => 'card_title',
		'type' => 'textarea_small'
	) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Nº de estrellas', 'cmb2' ),
        'desc'             => __( 'Selecciona el número de estrellas que quieres que aparezcan', 'cmb2' ),
		'id'               => 'card_stars',
		'type'             => 'select',
        'show_option_none' => true,
        'options'          => array(
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ),
	) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'card_description',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón - Texto', 'cmb2' ),
		'id'   => 'card_btn_txt',
		'type' => 'text'
	) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón - Enlace', 'cmb2' ),
		'id'   => 'card_btn_url',
		'type' => 'text_url'
	) );
