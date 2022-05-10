    /* Section_41 template_36 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Slider de imágenes que se van pasando automáticamente', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Slider', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta cada slider de la sección', 'cmb2' ),
		'type' => 'title',
		'id'   => 'slides_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Slides', 'cmb2' ),
        'id'      => $prefix . 'slides_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Slide {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro slide', 'cmb2' ),
            'remove_button' => __( 'Eliminar slide', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo del slide', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
        'id'   => 'slide_image_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
        'id'   => 'slide_image_hd',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
        'id'   => 'slide_image',
        'type' => 'file'
    ) );