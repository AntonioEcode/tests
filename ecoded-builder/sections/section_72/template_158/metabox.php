	/* Section_72 template_158 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Sección con título, subtítulo, carrusel de comentarios y comentarios destacados', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );

    $cmb->add_field( array(
		'name' => __( 'Slider', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta cada comentario del carrusel', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'slides_group_title_{{page_section_id}}'
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
        'name' => __( 'Imagen', 'cmb2' ),
        'id'   => 'slide_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Comentario', 'cmb2' ),
        'id'   => 'slide_comment',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Autor', 'cmb2' ),
        'id'   => 'slide_name',
        'type' => 'textarea_small'
    ) );

    $cmb->add_field( array(
		'name' => __( 'Comentarios destacados', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta cada comentario destacado', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'featured_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Comentarios destacados', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Comentario destacado {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro comentario destacado', 'cmb2' ),
            'remove_button' => __( 'Eliminar comentario destacado', 'cmb2' ),
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
        'name' => __( 'Comentario', 'cmb2' ),
        'id'   => 'card_comment',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Autor', 'cmb2' ),
        'id'   => 'card_name',
        'type' => 'textarea_small'
    ) );
