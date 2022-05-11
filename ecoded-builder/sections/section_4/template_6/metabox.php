	/* Section_4 template_6 */

    $services_{{page_section_id}} = wpeb_get_selector_options_by_template( 'service' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de servicios principales', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name'    => __( 'Descripción', 'cmb2' ),
		'id'      => $prefix . 'description_{{page_section_id}}',
		'type'    => 'wysiwyg',
        'options' => array( 'wpautop' => true ),
	) );

    $cmb->add_field( array(
		'name' => __( 'Servicios', 'cmb2' ),
		'desc' => __( 'Desde aquí se da de alta cada servicio de la sección.', 'cmb2' ),
		'type' => 'title',
		'id'   => 'cta_group_services_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Servicios', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Servicio {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro servicio', 'cmb2' ),
            'remove_button' => __( 'Eliminar servicio', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
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
        'name' => __( 'Icono de la tarjeta', 'cmb2' ),
		'desc' => __( 'Rellenar solo uno de los dos campos, el de png/jpg o el de svg.', 'cmb2' ),
        'id'   => 'card_img_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono png/jpg', 'cmb2' ),
		'desc' => __( 'Icono en formato png o jpg', 'cmb2' ),
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono svg', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aquí el código svg del icono. Para buscar iconos puede utilizar la página <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cuál puede indicar el tamaño y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => 'card_svg_icon',
        'type' => 'textarea_code',
		'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'build' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del servicio', 'cmb2' ),
		'desc' => !empty( $services_{{page_section_id}} ) ? __( 'Los campos que pueden salir automáticamente al seleccionar un servicio lo indican en su descripción.', 'cmb2' ) : '',
        'id'   => 'card_group_data',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => 'card_title',
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un servicio existente saldrá automático.', 'cmb2' ) : '',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'card_description',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título posterior', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un servicio existente saldrá automático. Título que se muestra al poner encima el ratón.', 'cmb2' ) : __( 'Título que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'back_card_title',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción posterior', 'cmb2' ),
        'desc' => __( 'Descripción que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'back_card_description',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Texto del botón', 'cmb2' ),
        'desc' => __( 'Texto del botón que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'back_card_button_txt',
        'type' => 'text'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace del botón', 'cmb2' ),
        'desc' => !empty( $services_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un servicio existente saldrá automático. Enlace del botón que se muestra al poner encima el ratón.', 'cmb2' ) : __( 'Enlace del botón que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'back_card_button_url',
        'type' => 'text_url'
    ) );