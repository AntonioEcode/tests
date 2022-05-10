    /* Section_157 template_254 */

    $services_{{page_section_id}} = wpeb_get_selector_options_by_template( 'service' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de conferencias', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
		'name' => __( 'Elementos', 'cmb2' ),
		'desc' => __( 'Desde aquí se pueden dar de alta cada elemento del listado', 'cmb2' ),
		'type' => 'title',
		'id'   => 'elements_group_title_{{page_section_id}}'
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
        'id'   => 'element_data',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Conferencias', 'cmb2' ),
        'id'               => 'service_id',
        'type'             => 'select',
        'after'            => empty( $services_{{page_section_id}} ) ? __( 'No hay ninguna conferencia dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $services_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Nombre de la conferencia', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado una conferencia existente y se deja en blanco este campo, saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_title',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace a la conferencia', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional.</b> Si se ha seleccionado una conferencia existente y se deja en blanco este campo, saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Día de la conferencia', 'cmb2' ),
        'id'   => 'element_event_day',
        'type' => 'text_date',
        'date_format' => 'Y-m-d',
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Horario', 'cmb2' ),
        'id'   => 'element_schedule',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Localización', 'cmb2' ),
        'id'   => 'element_location',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Dirección', 'cmb2' ),
        'id'   => 'element_address',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'element_description',
        'type' => 'textarea_small'
    ) );