 	/* Section_113 template_178 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'content_box_{{page_section_id}}',
		'title'        => __( 'Sección de contenido destacado', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Gestión del contenido de la parte izquierda', 'cmb2' ),
		'id'   => $prefix . 'left_content_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => $prefix . 'description_{{page_section_id}}',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen png/jpg', 'cmb2' ),
		'desc' => __( 'Imagen en formato png o jpg', 'cmb2' ),
        'id'   => $prefix . 'signature_image_{{page_section_id}}',
        'type' => 'file'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Gestión del contenido de la parte derecha', 'cmb2' ),
		'id'   => $prefix . 'right_content_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen png/jpg', 'cmb2' ),
		'desc' => __( 'Imagen en formato png o jpg', 'cmb2' ),
        'id'   => $prefix . 'image_{{page_section_id}}',
        'type' => 'file'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Texto en la imagen', 'cmb2' ),
		'id'   => $prefix . 'img_text_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace en la imagen', 'cmb2' ),
		'id'   => $prefix . 'img_url_{{page_section_id}}',
		'type' => 'text_url'
	) );