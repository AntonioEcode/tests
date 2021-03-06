    /* Section_142 template_211 */

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'upward_counter_box_{{page_section_id}}',
		'title'        => __( 'Contadores ascendentes informativos', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
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
        'name' => __( 'Imagen de fondo de la secci??n', 'cmb2' ),
        'desc' => __( 'Para resoluciones de escritorio, tablet y m??vil.', 'cmb2' ),
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
        'name' => __( 'Imagen de fondo tablets', 'cmb2' ),
        'desc' => __( 'Para resoluciones de tablet', 'cmb2' ),
		'id'   => $prefix . 'background_image_tablet_{{page_section_id}}',
		'type' => 'file'
	) );

	$cmb->add_field( array(
        'name' => __( 'Imagen de fondo', 'cmb2' ),
        'desc' => __( 'Para resoluciones de m??vil', 'cmb2' ),
		'id'   => $prefix . 'background_image_{{page_section_id}}',
		'type' => 'file'
	) );

    $group_field_id = $cmb->add_field( array(
        'name'    => __( 'Contadores', 'cmb2' ),
        'id'      => $prefix . 'cards_group_{{page_section_id}}',
        'type'    => 'group',
        'options' => array(
            'group_title'   => __( 'Contador {#}', 'cmb2' ),
            'add_button'    => __( 'A??adir otro contador', 'cmb2' ),
            'remove_button' => __( 'Eliminar contador', 'cmb2' ),
            'sortable'      => TRUE,
            'closed'        => TRUE
        )
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono del contador', 'cmb2' ),
        'id'   => 'card_img_title',
        'type' => 'title'
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name' => __( 'Icono svg', 'cmb2' ),
		'desc' => __( 'Icono en formato svg. Pega aqu?? el c??digo svg del icono. Para buscar iconos puede utilizar la p??gina <a href="https://tablericons.com/" target="_blank" rel="nofollow noopener noreferrer">Tabler Icons</a> en la cu??l puede indicar el tama??o y color del icono. Y haciendo click sobre el icono puede copiarlo y pegarlo en la caja de arriba.', 'cmb2' ),
        'id'   => 'card_svg_icon',
        'type' => 'textarea_code',
        'after' => '<div class="ecode_container_list_icons">' . custom_icons_gallery( $type = 'build' ) . '</div>',
		'before' => '<div class="ecode_container_preview"></div>',
        'options' => array(
            'disable_codemirror' => true
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'       => __( 'N??mero m??ximo del contador', 'cmb2' ),
		'desc'       => __( 'Al que se llegar?? desde 0.', 'cmb2' ),
        'id'         => 'card_counter_number',
        'type'       => 'text',
        'attributes' => array(
            'type' => 'number'
        ),
    ) );

    $cmb->add_group_field( $group_field_id, array(
        'name'       => __( 'Texto que acompa??a al contador', 'cmb2' ),
        'id'         => 'card_counter_title',
        'type'       => 'text'
    ) );
