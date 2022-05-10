	/* Section_141 template_210 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de elementos con imagen, título, descripción y botón', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Datos generales de la sección', 'cmb2' ),
		'id'   => $prefix . 'title_cf_{{page_section_id}}',
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
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
		'name' => __( 'Elementos', 'cmb2' ),
		'id'   => $prefix . 'group_services_{{page_section_id}}',
		'desc' => __( 'Desde aquí se da de alta cada elemento de la sección.', 'cmb2' ),
		'type' => 'title',
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Elementos', 'cmb2' ),
        'id'      => $prefix . 'elements_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Elemento {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro elemento', 'cmb2' ),
            'remove_button' => __( 'Eliminar elemento', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del elemento', 'cmb2' ),
        'id'   => 'element_icon_data_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen png/jpg', 'cmb2' ),
		'desc' => __( 'Imagen en formato png o jpg', 'cmb2' ),
        'id'   => 'element_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => 'element_title',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'element_description',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón - Texto', 'cmb2' ),
        'id'   => 'element_button_text',
        'type' => 'text_medium'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón - Enlace', 'cmb2' ),
        'id'   => 'element_button_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace externo', 'cmb2' ),
        'id'   => 'element_external_url',
        'desc' => __( 'Marcar este check si el enlace es externo a la web para que se abra en una pestaña aparte y añadir nofollow', 'cmb2' ),
        'type' => 'checkbox'
    ) );