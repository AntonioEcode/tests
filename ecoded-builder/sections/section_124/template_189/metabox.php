    /* Section_124 template_189 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Sección con dos columnas con título, contenido y fondo negro', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Columna izquierda', 'cmb2' ),
		'desc' => __( 'Desde aquí se gestiona el contenido de la primera columna.', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'first_column_section_title_{{page_section_id}}'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => $prefix . 'first_column_title_{{page_section_id}}',
        'type' => 'textarea_small'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => $prefix . 'first_column_content_{{page_section_id}}',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
		'name' => __( 'Columna derecha', 'cmb2' ),
		'desc' => __( 'Desde aquí se gestiona el contenido de la segunda columna.', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'second_column_section_title_{{page_section_id}}'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
        'id'   => $prefix . 'second_column_title_{{page_section_id}}',
        'type' => 'textarea_small'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
        'id'   => $prefix . 'second_column_content_{{page_section_id}}',
        'type' => 'wysiwyg'
    ) );
