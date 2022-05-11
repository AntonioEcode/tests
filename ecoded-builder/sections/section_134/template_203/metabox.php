	/* Section_134 template_203 */

    $services_{{page_section_id}} = wpeb_get_selector_options_by_template( 'service' );
    $works_{{page_section_id}} = wpeb_get_selector_options_by_template( 'work' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de servicios / trabajos con contenido antes y después', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Contenido general de la sección', 'cmb2' ),
		'id'   => $prefix . 'title_cf_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Contenido antes del listado', 'cmb2' ),
		'id'   => $prefix . 'content_1_{{page_section_id}}',
        'desc' => __( 'Bloque de contenido que aparece antes del listado', 'cmb2' ),
		'type' => 'wysiwyg'
	) );

    $cmb->add_field( array(
        'name' => __( 'Contenido después del listado', 'cmb2' ),
		'id'   => $prefix . 'content_2_{{page_section_id}}',
        'desc' => __( 'Bloque de contenido que aparece después del listado', 'cmb2' ),
		'type' => 'wysiwyg'
	) );

    $cmb->add_field( array(
		'name' => __( 'Listado', 'cmb2' ),
		'id'   => $prefix . 'group_services_{{page_section_id}}',
		'desc' => __( 'Desde aquí se da de alta cada servicio / trabajo de la sección.', 'cmb2' ),
		'type' => 'title',
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Servicios', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
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
        'name' => __( 'Selecciona un servicio o trabajo existente ( uno u otro )', 'cmb2' ),
        'desc' => __( 'Aquí puedes seleccionar un servicio / trabajo existente para sacar algunos datos automáticamente ( indicado en la descripción de cada campo ).', 'cmb2' ),
        'id'   => 'card_work_service_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Servicios', 'cmb2' ),
        'desc'             => !empty( $services_{{page_section_id}} ) ? __( 'Selecciona un servicio existente para sacar algunos datos automáticamente.', 'cmb2' ) : '',
        'id'               => 'service_id',
        'type'             => 'select',
        'after'            => empty( $services_{{page_section_id}} ) ? __( 'No hay ningún servicio dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $services_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Trabajos', 'cmb2' ),
        'desc'             => !empty( $services_{{page_section_id}} ) ? __( 'Selecciona un trabajo existente para sacar algunos datos automáticamente.', 'cmb2' ) : '',
        'id'               => 'work_id',
        'type'             => 'select',
        'after'            => empty( $works_{{page_section_id}} ) ? __( 'No hay ningún trabajo dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $works_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del servicio', 'cmb2' ),
		'desc' => !empty( $services_{{page_section_id}} ) ? __( 'Los campos que pueden salir automáticamente al seleccionar un servicio lo indican en su descripción.', 'cmb2' ) : '',
        'id'   => 'card_icon_data_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen png/jpg', 'cmb2' ),
        'desc' => ( !empty( $works_{{page_section_id}} ) || !empty( $services_{{page_section_id}} ) ) ? __( '<b>Opcional</b> si se ha seleccionado un trabajo / servicio existente y este campo se deja en vacío, saldrá automático.', 'cmb2' ) : '',
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => 'card_title',
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un servicio existente saldrá automático.', 'cmb2' ) : '',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace al servicio', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un servicio existente saldrá automático. Enlace del botón que se muestra al poner encima el ratón.', 'cmb2' ) : __( 'Enlace del botón que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'card_url',
        'type' => 'text_url'
    ) );