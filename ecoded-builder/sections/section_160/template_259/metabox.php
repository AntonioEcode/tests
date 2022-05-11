	/* Section_160 template_259 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'title_img_box_{{page_section_id}}',
		'title'        => __( 'Detalle de un ponente', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
		'name' => __( 'Contenido de la parte izquierda', 'cmb2' ),
		'type' => 'title',
		'id'   => 'left_content_title_{{page_section_id}}'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen tablet', 'cmb2' ),
        'desc' => __( 'Para resoluciones de tablets. Ancho mínimo recomendado 768px', 'cmb2' ),
		'id'   => $prefix . 'image_tablet_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen móvil', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil. Ancho máximo recomendado 768px', 'cmb2' ),
		'id'   => $prefix . 'image_{{page_section_id}}',
		'type' => 'file'
	) );

    $cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );

	$cmb->add_field( array(
		'name' => __( 'Galería de imágenes', 'cmb2' ),
		'id'   => $prefix . 'gallery_{{page_section_id}}',
		'type' => 'file_list',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contenido de la parte derecha', 'cmb2' ),
		'type' => 'title',
		'id'   => 'right_content_title_{{page_section_id}}'
	) );

    $cmb->add_field( array(
        'name' => __( 'Empresa', 'cmb2' ),
		'id'   => $prefix . 'company_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Especialidad', 'cmb2' ),
		'id'   => $prefix . 'speciality_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Localización', 'cmb2' ),
		'id'   => $prefix . 'city_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Teléfono', 'cmb2' ),
		'id'   => $prefix . 'phone_{{page_section_id}}',
		'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Email', 'cmb2' ),
		'id'   => $prefix . 'email_{{page_section_id}}',
		'type' => 'text_email'
	) );

    $cmb->add_field( array(
        'name' => __( 'Web', 'cmb2' ),
		'id'   => $prefix . 'web_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a Twitter', 'cmb2' ),
		'id'   => $prefix . 'twitter_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a Facebook', 'cmb2' ),
		'id'   => $prefix . 'facebook_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a Instagram', 'cmb2' ),
		'id'   => $prefix . 'instagram_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a Linkedin', 'cmb2' ),
		'id'   => $prefix . 'linkedin_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a Pinterest', 'cmb2' ),
		'id'   => $prefix . 'pinterest_{{page_section_id}}',
		'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace a YouTube', 'cmb2' ),
		'id'   => $prefix . 'youtube_{{page_section_id}}',
		'type' => 'text_url'
	) );