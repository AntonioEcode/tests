    /* Section_61 template_72 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'galery_box_{{page_section_id}}',
		'title'        => __( 'Galería de imágenes con fondo, antetítulo, título y botón', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Imagen para el fondo de la sección', 'cmb2' ),
        'id'   => $prefix . 'section_{{page_section_id}}_title_cmb',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Imagen HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'image_{{page_section_id}}',
		'type' => 'file'
	) );

    $cmb->add_field( array(
        'name' => __( 'Contenido de la sección', 'cmb2' ),
        'id'   => $prefix . 'conten_section_{{page_section_id}}_title_cmb',
        'type' => 'title'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => $prefix . 'pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
		'name' => __( 'Galería de imágenes', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'gallery_group_title_{{page_section_id}}'
	) );

    $cmb->add_field( array(
		'name' => __( 'Imágenes', 'cmb2' ),
		'id'   => $prefix . 'gallery_{{page_section_id}}',
		'type' => 'file_list',
	) );

    $cmb->add_field( array(
        'name' => __( 'Botón general de la sección', 'cmb2' ),
		'id'   => $prefix . 'title_cf_button_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Texto del botón', 'cmb2' ),
        'desc' => __( 'Texto del botón', 'cmb2' ),
        'id'   => $prefix . 'section_button_txt_{{page_section_id}}',
        'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace del botón', 'cmb2' ),
        'desc' => __( 'Enlace del botón', 'cmb2' ),
        'id'   => $prefix . 'section_button_url_{{page_section_id}}',
        'type' => 'text_url'
	) );
