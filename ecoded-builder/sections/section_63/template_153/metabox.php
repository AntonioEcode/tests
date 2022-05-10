	/* Section_63 template_153 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'header_box_{{page_section_id}}',
		'title'        => __( 'Header con H1, antetítulo, fecha, imagen de fondo y los últimos 3 artículos del blog', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio y de móvil.', 'cmb2' ),
        'id'   =>  $prefix . 'section_image_title_{{page_section_id}}',
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
        'name' => __( 'Contenido principal de la sección', 'cmb2' ),
        'id'   =>  $prefix . 'section_content_{{page_section_id}}',
        'type' => 'title'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Antetítulo', 'cmb2' ),
		'id'   => $prefix . 'pretitle_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'desc' => __( 'Rellenar para poner un título personalizado si no, saldrá el de la página', 'cmb2' ),
		'id'   => $prefix . 'custom_title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
		'name' => __( 'Ocultar fecha', 'cmb2' ),
		'desc' => __( 'Marcar este checkbox para no mostrar la fecha debajo del título', 'cmb2' ),
		'id'   => $prefix . 'hide_date_section_{{page_section_id}}',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'Fecha debajo del Título', 'cmb2' ),
		'id'   => $prefix . 'date_section_{{page_section_id}}',
		'desc' => __( 'Dejar vacío para que salga la fecha actual dinámicamente', 'cmb2' ),
		'type' => 'text_date',
		// 'date_format' => 'j F, Y', // BUG not show after save
		'date_format' => 'Y-m-d',
		// 'timezone_meta_key' => 'wiki_test_timezone',
	) );
