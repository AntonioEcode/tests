    /* Section_156 template_253 */

    $services_{{page_section_id}} = wpeb_get_selector_options_by_template( 'service' );
    $works_{{page_section_id}} = wpeb_get_selector_options_by_template( 'work' );

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
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
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
        'name' => __( 'Agrupación', 'cmb2' ),
        'desc' => __( 'Las ponencias se agruparán por lo que se indique aquí.', 'cmb2' ),
        'id'   => 'card_cat_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Día de la ponencia', 'cmb2' ),
        'desc' => __( 'Poner lo mismo en cada elemento que se quiera agrupar.', 'cmb2' ),
        'id'   => 'element_event_day',
        'type' => 'text_date'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del elemento', 'cmb2' ),
        'id'   => 'element_data',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Eventos', 'cmb2' ),
        'id'               => 'element_service_id',
        'type'             => 'select',
        'after'            => empty( $services_{{page_section_id}} ) ? __( 'No hay ningún evento dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $services_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen / icono del elemento', 'cmb2' ),
		'desc' => __( 'Rellenar solo uno de los dos campos, el de png/jpg o el de svg.', 'cmb2' ),
        'id'   => 'element_image_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un evento existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono svg', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aquí el código svg del icono. Para buscar iconos puede utilizar la página <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cuál puede indicar el tamaño y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => 'element_svg_icon',
        'type' => 'textarea_code',
        'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'build' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Nombre', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un evento existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_card_name',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace al evento', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional.</b> Si se ha seleccionado un evento existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_card_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Horario', 'cmb2' ),
        'id'   => 'element_schedule',
        'type' => 'text'
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
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un ponente existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_speaker_name',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace al ponente', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional.</b> Si se ha seleccionado un ponente existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'element_speaker_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Puesto de trabajo del ponente', 'cmb2' ),
        'id'   => 'element_speaker_job',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'element_description',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Etiquetas del evento', 'cmb2' ),
        'desc' => __( 'Separar cada etiqueta por punto y coma. Ej: Marketing;Empresas;Diseño', 'cmb2' ),
        'id'   => 'element_tags',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Localización', 'cmb2' ),
        'id'   => 'element_location',
        'type' => 'text'
    ) );
