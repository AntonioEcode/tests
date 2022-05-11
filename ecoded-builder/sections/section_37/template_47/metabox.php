    /* Section_37 template_47 */
	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services_box_{{page_section_id}}',
		'title'        => __( 'Sección con bloques de contenido y faq', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
		'object_types' => $object_type,
		'show_on_cb'   => 'get_if_show_on_{{page_id}}',
        'closed'       => TRUE
	) );

    $cmb->add_field( array(
		'name'    => __( 'Contenido de la primera sección', 'cmb2' ),
		'desc'    => __( 'Esta sección tiene un título H1 automático y dos columnas de contenido.', 'cmb2' ),
		'id'      => $prefix . 'section_1_title_{{page_section_id}}',
		'type'    => 'title',
	) );

    $cmb->add_field( array(
		'name'    => __( 'Contenido de la primera columna', 'cmb2' ),
		'desc'    => __( 'Columna de contenido de la izquierda.', 'cmb2' ),
		'id'      => $prefix . 'section_left_column_{{page_section_id}}',
		'type'    => 'wysiwyg',
		'options' => array( 'wpautop' => true ),
	) );

    $cmb->add_field( array(
		'name'    => __( 'Contenido de la segunda sección', 'cmb2' ),
		'desc'    => __( 'Columna de contenido de la derecha.', 'cmb2' ),
		'id'      => $prefix . 'section_right_column_{{page_section_id}}',
		'type'    => 'wysiwyg',
		'options' => array( 'wpautop' => true ),
	) );

    $cmb->add_field( array(
		'name' => __( 'FAQ ( segunda sección )', 'cmb2' ),
		'desc' => __( 'FAQ estilo acordeón con schema tipo FAQPage', 'cmb2' ),
		'type' => 'title',
		'id'   => 'faq_group_title_{{page_section_id}}'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Preguntas / respuestas', 'cmb2' ),
        'id'      => $prefix . 'elements_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Elemento {#}', 'cmb2' ),
            'add_button'    => __( 'Añadir otro elemento', 'cmb2' ),
            'remove_button' => __( 'Eliminar elemento', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Pregunta', 'cmb2' ),
        'id'   => 'element_question',
        'type' => 'text'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'    => __( 'Respuesta', 'cmb2' ),
        'id'      => 'element_answer',
        'type'    => 'wysiwyg',
		'options' => array( 'wpautop' => true ),
    ) );

    $cmb->add_field( array(
		'name'    => __( 'Contenido de la tercera sección', 'cmb2' ),
		'desc'    => __( 'Esta sección tiene un título H2 y dos bloques de contenido. El segundo bloque de contenido dentro de un caja', 'cmb2' ),
		'id'      => $prefix . 'section_3_title_{{page_section_id}}',
		'type'    => 'title',
	) );

    $cmb->add_field( array(
		'name'    => __( 'Subtítulo ( H2 )', 'cmb2' ),
		'id'      => $prefix . 'section_subtitle_{{page_section_id}}',
		'type'    => 'text',
	) );

    $cmb->add_field( array(
		'name'    => __( 'Primer bloque de contenido', 'cmb2' ),
		'id'      => $prefix . 'section_basic_content_{{page_section_id}}',
		'type'    => 'wysiwyg',
		'options' => array( 'wpautop' => true ),
	) );

    $cmb->add_field( array(
		'name'    => __( 'Segundo bloque de contenido', 'cmb2' ),
		'desc'    => __( 'Dentro de una caja con borde y fondo.', 'cmb2' ),
		'id'      => $prefix . 'section_box_content_{{page_section_id}}',
		'type'    => 'wysiwyg',
		'options' => array( 'wpautop' => true ),
	) );