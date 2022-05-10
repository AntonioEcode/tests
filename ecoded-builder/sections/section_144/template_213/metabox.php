	/* Section_144 template_213 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'slides_box_{{page_section_id}}',
		'title'        => __( 'Sección con imagen de fondo y sliders con imagen + comentario + nombre', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio ( a partir de 1400px )', 'cmb2' ),
		'id'   => $prefix . 'background_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo escritorio', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio ( a partir de 1024px )', 'cmb2' ),
		'id'   => $prefix . 'background_image_desktop_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo tablet', 'cmb2' ),
        'desc' => __( 'Para resoluciones de tablets ( a partir de 768px )', 'cmb2' ),
		'id'   => $prefix . 'background_image_tablet_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo móvil', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'background_image_{{page_section_id}}',
		'type' => 'file'
	) );

    $cmb->add_field( array(
		'name' => __( 'Slider', 'cmb2' ),
		'desc' => __( 'Desde aquí se puede dar de alta cada slider', 'cmb2' ),
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
        'name' => __( 'Imagen', 'cmb2' ),
        'id'   => 'slide_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Comentario', 'cmb2' ),
        'id'   => 'slide_comment',
        'type' => 'textarea_small'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Nombre autor', 'cmb2' ),
        'id'   => 'slide_autor',
        'type' => 'textarea_small'
    ) );
