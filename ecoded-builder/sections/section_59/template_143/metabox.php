	/* Section_59 template_143 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'contact_box_{{page_section_id}}',
		'title'        => __( 'Sección con información de contacto a la izquierda y formulario de contacto a la derecha', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

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
        'name' => __( 'Sección izquierda ( datos de contacto )', 'cmb2' ),
		'id'   => $prefix . 'title_left_section_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título para los horarios', 'cmb2' ),
		'id'   => $prefix . 'schedules_title_{{page_section_id}}',
		'type' => 'text'
	) );

	$group_field_id = $cmb->add_field( array(
        'name'    => __( 'Horarios', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Horario {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro horario', 'cmb2' ),
            'remove_button' => __( 'Eliminar horario', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Día/s', 'cmb2' ),
        'id'   => 'card_days',
        'type' => 'text'
    ) );

	$cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Horario', 'cmb2' ),
        'id'   => 'card_hours',
        'type' => 'text'
    ) );

	$cmb->add_field( array(
        'name' => __( 'Sección derecha ( formulario de contacto )', 'cmb2' ),
		'id'   => $prefix . 'title_right_section_{{page_section_id}}',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Título', 'cmb2' ),
		'id'   => $prefix . 'form_title_{{page_section_id}}',
		'type' => 'textarea_small'
	) );

	$cmb->add_field( array(
        'name' => __( 'Descripción bajo el título', 'cmb2' ),
		'id'   => $prefix . 'description_{{page_section_id}}',
		'type' => 'wysiwyg'
	) );
