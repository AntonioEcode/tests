    /* Section_159 template_257 */

    $services_{{page_section_id}} = wpeb_get_selector_options_by_template( 'service' );
    $works_{{page_section_id}} = wpeb_get_selector_options_by_template( 'work' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de conferencias agrupadas por hora', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Conferencias', 'cmb2' ),
		'desc' => __( 'Desde aquí se da de alta cada conferencia del listado', 'cmb2' ),
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
        'name' => __( 'Hora de inicio de la conferencia', 'cmb2' ),
        'desc' => __( 'Se agruparán las conferencias por esta hora', 'cmb2' ),
        'id'   => 'element_event_start_hour',
        'type' => 'text_time',
        'time_format' => 'H:i',
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Hora de fin de la conferencia', 'cmb2' ),
        'id'   => 'element_event_end_hour',
        'type' => 'text_time',
        'time_format' => 'H:i',
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Conferencias', 'cmb2' ),
        'id'               => 'element_service_id',
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
        'name'             => __( 'Ponente', 'cmb2' ),
        'id'               => 'element_work_id',
        'type'             => 'select',
        'after'            => empty( $works_{{page_section_id}} ) ? __( 'No hay ningún ponente dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $works_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Nombre del ponente', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un ponente existente y se deja en blanco este campo, saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_speaker_name',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace al ponente', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional.</b> Si se ha seleccionado un ponente existente y se deja en blanco este campo, saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_speaker_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Puesto de trabajo del ponente', 'cmb2' ),
        'id'   => 'element_speaker_job',
        'type' => 'text'
    ) );