    /* Section_86 template_163 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'works_box_{{page_section_id}}',
		'title'        => __( 'Listado de bloques de imagen + título + descripción + botón', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Bloques', 'cmb2' ),
        'desc'    => __( 'Desde aquí puedes dar de alta las secciones.', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Bloque {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro bloque', 'cmb2' ),
            'remove_button' => __( 'Eliminar bloque', 'cmb2' ),
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
        'name' => __( 'Imagen desktop', 'cmb2' ),
        'id'   => 'card_image_desktop',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen desktop HD', 'cmb2' ),
        'id'   => 'card_image_desktop_hd',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'             => __( 'Alineación', 'cmb2' ),
        'desc'             => __( 'Seleccionar si el contenido del bloque estará centrado o alineado a la izquierda ( por defecto está a la derecha ).', 'cmb2' ),
        'id'               => 'content_alignment',
        'type'             => 'select',
        'show_option_none' => TRUE,
        'options'          => array(
            'ecode_article_center' => __( 'Centrado', 'cmb2' ),
            'ecode_article_right'  => __( 'Izquierda', 'cmb2' ),
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => 'card_title',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => 'card_description',
        'type' => 'wysiwyg'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Botón - Texto', 'cmb2' ),
        'id'   => 'card_button_text',
        'type' => 'text_medium'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace de la tarjeta', 'cmb2' ),
        'id'   => 'card_button_url',
        'type' => 'text_url'
    ) );
