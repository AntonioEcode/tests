    /* Section_130 template_196 */

    $works_{{page_section_id}} = wpeb_get_selector_options_by_template( 'work' );

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'works_box_{{page_section_id}}',
		'title'        => __( 'Listado de trabajos. Elementos con imagen + título + enlace', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Trabajos', 'cmb2' ),
		'desc' => __( 'Desde aquí se pueden dar de alta cada trabajo', 'cmb2' ),
		'type' => 'title',
		'id'   => 'cards_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Trabajos', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Trabajo {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otra trabajo', 'cmb2' ),
            'remove_button' => __( 'Eliminar trabajo', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Trabajos', 'cmb2' ),
        'id'               => 'work_id',
        'type'             => 'select',
        'after'            => empty( $works_{{page_section_id}} ) ? __( 'No hay ningún trabajo dado de alta en este momento', 'cmb2' ) : '',
        'show_option_none' => TRUE,
        'options'          => $works_{{page_section_id}},
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( '<b>Opcional</b> si se ha seleccionado un trabajo existente saldrá automático.', 'cmb2' ) : '',
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( 'Título de la tarjeta que se muestra al poner encima el ratón. <b>Opcional</b> si se ha seleccionado un trabajo existente saldrá automático.', 'cmb2' ) : __( 'Título de la tarjeta que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'card_title',
        'type' => 'text'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace de la tarjeta', 'cmb2' ),
        'desc' => !empty( $works_{{page_section_id}} ) ? __( 'Enlace de la tarjeta que se muestra al poner encima el ratón. <b>Opcional</b> si se ha seleccionado un trabajo existente saldrá automático.', 'cmb2' ) : __( 'Enlace de la tarjeta que se muestra al poner encima el ratón', 'cmb2' ),
        'id'   => 'card_button_url',
        'type' => 'text_url'
    ) );