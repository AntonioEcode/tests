    /* Section_5 template_131 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'upward_counter_box_{{page_section_id}}',
		'title'        => __( 'Contadores ascendentes informativos', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
		'id'   => $prefix . 'title_cf_{{page_section_id}}',
		'type' => 'title'
	) );

    $cmb->add_field( array(
        'name' => __( 'Imagen de fondo HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'background_image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'background_image_{{page_section_id}}',
		'type' => 'file'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Contadores', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Contador {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro contador', 'cmb2' ),
            'remove_button' => __( 'Eliminar contador', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono del contador', 'cmb2' ),
		'desc' => __( 'Rellenar solo uno de los dos campos, el de png/jpg o el de svg.', 'cmb2' ),
        'id'   => 'card_img_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono png/jpg', 'cmb2' ),
		'desc' => __( 'Icono en formato png o jpg', 'cmb2' ),
        'id'   => 'card_image',
        'type' => 'file'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono svg', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aquí el código svg del icono. Para buscar iconos puede utilizar la página <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cuál puede indicar el tamaño y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => 'card_svg_icon',
        'type' => 'textarea_code',
        'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'build' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'       => __( 'Número máximo del contador', 'cmb2' ),
		'desc'       => __( 'Al que se llegará desde 0.', 'cmb2' ),
        'id'         => 'card_counter_number',
        'type'       => 'text',
        'attributes' => array(
            'type' => 'number',
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'       => __( 'Texto que acompaña al contador', 'cmb2' ),
        'id'         => 'card_counter_title',
        'type'       => 'text'
    ) );
