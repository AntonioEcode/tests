	/* Section_112 template_177 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Header con antetítulo, títular H1, subtítulo, un botón e imagen de fondo', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
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
        'name' => __( 'Contenido de la sección', 'cmb2' ),
		'id'   => $prefix . 'section_content_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => $prefix . 'pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'desc' => __( 'Opcional. Si se deja en blanco se utilizará el nombre de la página', 'cmb2' ),
		'id'   => $prefix . 'title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Subtítulo', 'cmb2' ),
		'id'   => $prefix . 'subtitle_{{page_section_id}}',
		'type' => 'textarea_small'
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