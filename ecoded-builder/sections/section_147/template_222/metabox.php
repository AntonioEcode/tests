/* Section_147 template_222 */

$cmb = new_cmb2_box( array(
    'id'           => $prefix . 'slides_box_{{page_section_id}}',
    'title'        => __( 'Sección con imagen de fondo, título, dirección, cuenta atrás y botones', 'cmb2' ) . wpeb_get_section_info( $current_page_id, '{{page_section_id}}', '{{section_id}}', '{{template_id}}' ),
    'object_types' => $object_type,
    'show_on_cb'   => 'get_if_show_on_{{page_id}}',
    'closed'       => TRUE
) );

$cmb->add_field( array(
    'name' => __( 'Imagen de fondo de la sección', 'cmb2' ),
    'desc' => __( 'Para varios tipos de resoluciones de pantalla.', 'cmb2' ),
    'id'   => $prefix . 'section_image_title_{{page_section_id}}',
    'type' => 'title'
) );

$cmb->add_field( array(
    'name' => __( 'Imagen de fondo HD', 'cmb2' ),
    'desc' => __( 'Para resoluciones de escritorio ( a partir de 1400px )', 'cmb2' ),
    'id'   => $prefix . 'image_hd_{{page_section_id}}',
    'type' => 'file'
) );

$cmb->add_field( array(
    'name' => __( 'Imagen de fondo escritorio', 'cmb2' ),
    'desc' => __( 'Para resoluciones de escritorio ( a partir de 1024px )', 'cmb2' ),
    'id'   => $prefix . 'image_desktop_{{page_section_id}}',
    'type' => 'file'
) );

$cmb->add_field( array(
    'name' => __( 'Imagen de fondo tablet', 'cmb2' ),
    'desc' => __( 'Para resoluciones de tablets ( a partir de 768px )', 'cmb2' ),
    'id'   => $prefix . 'image_tablet_{{page_section_id}}',
    'type' => 'file'
) );

$cmb->add_field( array(
    'name' => __( 'Imagen de fondo móvil', 'cmb2' ),
    'desc' => __( 'Para resoluciones de móvil', 'cmb2' ),
    'id'   => $prefix . 'image_{{page_section_id}}',
    'type' => 'file'
) );

$cmb->add_field( array(
    'name' => __( 'Contenido de la sección', 'cmb2' ),
    'desc' => __( 'Título, dirección cuenta atrás y botones', 'cmb2' ),
    'id'   => $prefix . 'content_title_{{page_section_id}}_title_cmb',
    'type' => 'title'
) );

$cmb->add_field( array(
    'name' => __( 'Título', 'cmb2' ),
    'id'   => $prefix . 'title_{{page_section_id}}',
    'type' => 'textarea_small'
) );

$cmb->add_field( array(
    'name' => __( 'Dirección', 'cmb2' ),
    'id'   => $prefix . 'address_{{page_section_id}}',
    'type' => 'textarea_small'
) );

$cmb->add_field( array(
    'name' => __( 'Fecha', 'cmb2' ),
    'id'   =>  $prefix . 'date_{{page_section_id}}',
    'type' => 'text'
) );

$cmb->add_field( array(
    'name' => __( 'Ciudad', 'cmb2' ),
    'id'   =>  $prefix . 'city_{{page_section_id}}',
    'type' => 'text'
) );

$cmb->add_field( array(
    'name' => __( 'Lugar', 'cmb2' ),
    'id'   =>  $prefix . 'place_{{page_section_id}}',
    'type' => 'text'
) );

$cmb->add_field( array(
    'name' => __( 'Botón 1 - Texto', 'cmb2' ),
    'desc' => __( 'Botón de la izquierda debajo del resto de información.', 'cmb2' ),
    'id'   => $prefix . 'txt_button_1_{{page_section_id}}',
    'type' => 'text'
) );

$cmb->add_field( array(
    'name' => __( 'Botón 1 - Enlace', 'cmb2' ),
    'desc' => __( 'Enlace del botón de la izquierda debajo del resto de información.', 'cmb2' ),
    'id'   => $prefix . 'link_button_1_{{page_section_id}}',
    'type' => 'text_url'
) );

$cmb->add_field( array(
    'name' => __( 'Botón 2 - Texto', 'cmb2' ),
    'desc' => __( 'Botón de la derecha debajo del resto de información.', 'cmb2' ),
    'id'   => $prefix . 'txt_button_2_{{page_section_id}}',
    'type' => 'text'
) );

$cmb->add_field( array(
    'name' => __( 'Botón 2 - Enlace', 'cmb2' ),
    'desc' => __( 'Enlace del botón de la derecha debajo del resto de información.', 'cmb2' ),
    'id'   => $prefix . 'link_button_2_{{page_section_id}}',
    'type' => 'text_url'
) );
