	/* Section_133 template_202 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Sección servicio / producto destacado con detalle', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Imagen de la sección', 'cmb2' ),
		'id'   => $prefix . 'section_title_{{page_section_id}}',
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
        'name' => __( 'Contenido de la sección destacada', 'cmb2' ),
		'id'   => $prefix . 'section_content_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'textarea'
	) );

	$cmb->add_field( array(
        'name' => __( 'Etiqueta', 'cmb2' ),
		'desc' => __( 'Texto bajo la descripción en negrita.', 'cmb2' ),
		'id'   => $prefix . 'tag_{{page_section_id}}',
		'type' => 'text_medium'
	) );

	$cmb->add_field( array(
        'name' => __( 'Icono svg del botón', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aquí el código svg del icono. Para buscar iconos puede utilizar la página <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cuál puede indicar el tamaño y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => $prefix . 'button_svg_icon_{{page_section_id}}',
        'type' => 'textarea_code',
		'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'beauty' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

	$cmb->add_field( array(
        'name' => __( 'Botón - Texto', 'cmb2' ),
		'id'   => $prefix . 'button_text_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón - Enlace', 'cmb2' ),
		'id'   => $prefix . 'button_url_{{page_section_id}}',
		'type' => 'text_url'
	) );

	$cmb->add_field( array(
        'name' => __( 'Contenido adicional', 'cmb2' ),
		'id'   => $prefix . 'section_aditional_content_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'additional_title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción', 'cmb2' ),
		'id'   => $prefix . 'additional_description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );

	$cmb->add_field( array(
		'name' => __( 'Tabla de especificaciones', 'cmb2' ),
		'desc' => __( 'Desde aquí se da de alta cada fila de la tabla.', 'cmb2' ),
		'type' => 'title',
		'id'   => $prefix . 'group_table_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Filas', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Fila {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otra fila', 'cmb2' ),
            'remove_button' => __( 'Eliminar fila', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Atributo', 'cmb2' ),
		'desc' => __( 'Columna 1', 'cmb2' ),
        'id'   => 'card_attribute',
        'type' => 'text_medium'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Valor', 'cmb2' ),
		'desc' => __( 'Columna 2', 'cmb2' ),
        'id'   => 'card_value',
        'type' => 'text_medium'
    ) );