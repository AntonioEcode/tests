    /* Section_148 template_230 */

    $works_{{page_section_id}} = wpeb_get_selector_options_by_template( 'work' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Sección equipo. Miembros del equipo con imagen, nombre, puesto, descripción y rrss ( redes sociales ).', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Configuración de la sección', 'cmb2' ),
		'type' => 'title',
		'id'   => 'conf_group_title_{{page_section_id}}'
	) );

	$cmb->add_field( array(
        'name' => __( 'Configuración de la sección', 'cmb2' ),
        'desc' => __( 'Esta sección se puede configurar como slider. Marcando una opción o ambas en vez de salir todos los miembros del equipo de primeras, será un slider en el dispositivo que selecciones.', 'cmb2' ),
		'id'   => $prefix . 'slider_conf_{{page_section_id}}',
		'type' => 'multicheck',
        'options' => array(
            'ecode_articles_148_230_mob' => 'Móvil',
            'ecode_articles_148_230_des' => 'Escritorio',
        ),
	) );

    $cmb->add_field( array(
		'name' => __( 'Miembros del equipo', 'cmb2' ),
		'desc' => __( 'Desde aquí se da de alta cada miembro del equipo', 'cmb2' ),
		'type' => 'title',
		'id'   => 'cards_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Miembros', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Miembro {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otr@ miembro', 'cmb2' ),
            'remove_button' => __( 'Eliminar miembro', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Ponentes', 'cmb2' ),
        'id'               => 'work_id',
        'type'             => 'select',
        'after'            => empty( $works_{{page_section_id}} ) ? __( 'No hay ningún ponente dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $works_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un ponente existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Nombre', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un ponente existente saldrá automático.', 'cmb2' ) : __( 'Nombre del ponente', 'cmb2' ),
        'id'   => 'card_name',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Cargo', 'cmb2' ),
        'desc' => __( 'Cargo que ocupa en la empresa', 'cmb2' ),
        'id'   => 'card_position',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'desc' => __( 'Breve descripción', 'cmb2' ),
        'id'   => 'card_description',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace al ponente', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional.</b> Si se ha seleccionado un ponente existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'card_url',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace Facebook', 'cmb2' ),
        'id'   => 'card_facebook',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace Twitter', 'cmb2' ),
        'id'   => 'card_twitter',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace Instagram', 'cmb2' ),
        'id'   => 'card_instagram',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace Linkedin', 'cmb2' ),
        'id'   => 'card_linkedin',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace YouTube', 'cmb2' ),
        'id'   => 'card_youtube',
        'type' => 'text_url'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace adicional', 'cmb2' ),
        'id'   => 'card_additional',
        'type' => 'text_url'
    ) );
