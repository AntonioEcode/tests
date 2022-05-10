	/* Section_137 template_206 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Header con H1, H2, imagen de fondo, 2 botones y cuenta atrás', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen HD', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio', 'cmb2' ),
		'id'   => $prefix . 'image_hd_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen Tablet', 'cmb2' ),
        'desc' => __( 'Para resoluciones de tablet', 'cmb2' ),
		'id'   => $prefix . 'image_tablet_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen', 'cmb2' ),
        'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
		'id'   => $prefix . 'image_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón 1 - Texto', 'cmb2' ),
		'id'   => $prefix . 'button_1_title_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón 1 - Enlace', 'cmb2' ),
		'id'   => $prefix . 'button_1_url_{{page_section_id}}',
		'type' => 'text_url'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón 2 - Texto', 'cmb2' ),
		'id'   => $prefix . 'button_2_title_{{page_section_id}}',
		'type' => 'text'
	) );

	$cmb->add_field( array(
        'name' => __( 'Botón 2 - Enlace', 'cmb2' ),
		'id'   => $prefix . 'button_2_url_{{page_section_id}}',
		'type' => 'text_url'
	) );

	$cmb->add_field( array(
		'name' => __( 'Cuenta atrás', 'cmb2' ),
		'desc' => __( 'Introduce la fecha del evento para la cuenta atrás.', 'cmb2' ),
		'id'   => $prefix . 'countdown_{{page_section_id}}',
		'type' => 'text_datetime_timestamp',
	) );

	$cmb->add_field( array(
		'name'    => __( 'Color del elemento scroll', 'cmb2' ),
		'id'      => $prefix . 'scroll_color_{{page_section_id}}',
		'type'    => 'colorpicker',
		'default' => '#ffffff',
	) );
