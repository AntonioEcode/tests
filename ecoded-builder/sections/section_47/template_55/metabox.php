	/* Section_47 template_55 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Listado de elementos + Elemento destacado', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Imagen para el fondo de la secci??n', 'cmb2' ),
        'id'   => 'section_{{page_section_id}}_background_title_cmb',
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
        'desc' => __( 'Para resoluciones de m??vil', 'cmb2' ),
		'id'   => $prefix . 'image_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Datos generales de la secci??n', 'cmb2' ),
		'id'   => $prefix . 'title_cf_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Antet??tulo', 'cmb2' ),
		'id'   => $prefix . 'pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
        'name' => __( 'T??tulo', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

    $cmb->add_field( array(
		'name' => __( 'Elementos', 'cmb2' ),
		'desc' => __( 'Desde aqu?? se da de alta cada elemento de la secci??n.', 'cmb2' ),
		'type' => 'title',
		'id'   => 'cta_group_services_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Elementos', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Elemento {#}', 'cmb2' ),
            'add_button'    => __( 'A??adir otro elemento', 'cmb2' ),
            'remove_button' => __( 'Eliminar elemento', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono del elemento', 'cmb2' ),
		'desc' => __( 'Rellenar solo uno de los dos campos, el de png/jpg o el de svg.', 'cmb2' ),
        'id'   => 'card_img_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Imagen png/jpg', 'cmb2' ),
		'desc' => __( 'Imagen en formato png o jpg', 'cmb2' ),
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono svg', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aqu?? el c??digo svg del icono. Para buscar iconos puede utilizar la p??gina <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cu??l puede indicar el tama??o y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => 'card_svg_icon',
        'type' => 'textarea_code',
		'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'beauty' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Contenido del elemento', 'cmb2' ),
        'id'   => 'card_data_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'T??tulo', 'cmb2' ),
        'id'   => 'card_title',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Enlace del elemento', 'cmb2' ),
        'id'   => 'card_url',
        'type' => 'text_url'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Descripci??n', 'cmb2' ),
        'id'   => 'card_description',
        'type' => 'wysiwyg'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Bot??n de la secci??n', 'cmb2' ),
		'id'   => $prefix . 'title_cf_button_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Texto del bot??n', 'cmb2' ),
        'desc' => __( 'Texto del bot??n', 'cmb2' ),
        'id'   => $prefix . 'section_button_txt_{{page_section_id}}',
        'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace del bot??n', 'cmb2' ),
        'desc' => __( 'Enlace del bot??n', 'cmb2' ),
        'id'   => $prefix . 'section_button_url_{{page_section_id}}',
        'type' => 'text_url'
	) );

    $cmb->add_field( array(
        'name' => __( 'Elemento destacado', 'cmb2' ),
        'id'   => 'section_{{page_section_id}}_featured_title_cmb',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Imagen HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'featured_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de m??vil', 'cmb2' ),
		'id'   => $prefix . 'featured_image_{{page_section_id}}',
		'type' => 'file'
	) );

    $cmb->add_field( array(
        'name' => __( 'Antet??tulo', 'cmb2' ),
        'id'   => $prefix . 'featured_pretitle_{{page_section_id}}',
        'type' => 'textarea_small'
    ) );

    $cmb->add_field( array(
        'name' => __( 'T??tulo', 'cmb2' ),
        'id'   => $prefix . 'featured_title_{{page_section_id}}',
        'type' => 'textarea_small'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Description', 'cmb2' ),
        'id'   => $prefix . 'featured_desc_{{page_section_id}}',
        'type' => 'textarea'
    ) );

    $cmb->add_field( array(
        'name' => __( 'Texto del bot??n', 'cmb2' ),
        'desc' => __( 'Texto del bot??n', 'cmb2' ),
        'id'   => $prefix . 'featured_button_txt_{{page_section_id}}',
        'type' => 'text'
	) );

    $cmb->add_field( array(
        'name' => __( 'Enlace del bot??n', 'cmb2' ),
        'desc' => __( 'Enlace del bot??n', 'cmb2' ),
        'id'   => $prefix . 'featured_button_url_{{page_section_id}}',
        'type' => 'text_url'
	) );
