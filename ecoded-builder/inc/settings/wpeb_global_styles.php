<?php

add_action( 'admin_init', 'wpeb_global_styles' );

function wpeb_global_styles() {

    add_settings_section(
        $id       = 'wpeb_global_styles_header',
        $title    = '',
        $callback = '',
        $page     = 'wpeb_global_styles'
    );

    add_settings_field(
        $id       = 'wpeb_logo',
        $title    = '<i>' . get_icon_dashboard( 'icon_image' ) . '</i>' . '<h2>' . __( 'Logo oscuro', 'ecoded_builder' ) . '</h2><p>' . __( 'Logo oscuro para fondos claros', 'ecoded_builder' ) . '</p>' . wpeb_get_section_data_by( $page_id = '1', $section_type_id = '1' ),
        $callback = 'filebox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id, 'dark' )
    );

    add_settings_field(
        $id       = 'wpeb_white_logo',
        $title    = '<i>' . get_icon_dashboard( 'icon_image' ) . '</i>' . '<h2>' . __( 'Logo claro', 'ecoded_builder' ) . '</h2><p>' . __( 'Logo claro para fondos oscuros', 'ecoded_builder' ) . '</p>' . wpeb_get_section_data_by( $page_id = '1', $section_type_id = '1' ),
        $callback = 'filebox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id, 'light' )
    );

    add_settings_field(
        $id       = 'wpeb_favicon',
        $title    = '<i>' . get_icon_dashboard( 'icon_image' ) . '</i>' . '<h2>' . __( 'Favicon', 'ecoded_builder' ) . '</h2><p>' . __( 'Icono para mostrar en el explorador', 'ecoded_builder' ) . '</p>',
        $callback = 'filebox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id, 'dark' )
    );

    add_settings_field(
        $id       = 'wpeb_primary_typography',
        $title    = '<i>' . get_icon_dashboard( 'icon_typography' ) . '</i>' . '<h2>' . __( 'Tipografía primaria', 'ecoded_builder' ) . '</h2><p>' . __( 'Tipografía que se muestra en...', 'ecoded_builder' ) . '</p>',
        $callback = 'selectfontbox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id )
    );

    add_settings_field(
        $id       = 'wpeb_secondary_typography',
        $title    = '<i>' . get_icon_dashboard( 'icon_typography' ) . '</i>' . '<h2>' . __( 'Tipografía secundaria', 'ecoded_builder' ) . '</h2><p>' . __( 'Tipografía que se muestra en...', 'ecoded_builder' ) . '</p>',
        $callback = 'selectfontbox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id )
    );

    add_settings_field(
        $id       = 'wpeb_primary_color',
        $title    = '<i>' . get_icon_dashboard( 'icon_color' ) . '</i>' . '<h2>' . __( 'Color primario', 'ecoded_builder' ) . '</h2><p>' . __( 'Color que se muestra en...', 'ecoded_builder' ) . '</p>',
        $callback = 'colorpickerbox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id )
    );

    add_settings_field(
        $id       = 'wpeb_secondary_color',
        $title    = '<i>' . get_icon_dashboard( 'icon_color' ) . '</i>' . '<h2>' . __( 'Color secundario', 'ecoded_builder' ) . '</h2><p>' . __( 'Color que se muestra en...', 'ecoded_builder' ) . '</p>',
        $callback = 'colorpickerbox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array( $id )
    );

    add_settings_field(
        $id       = 'wpeb_colors_changed',
        $title    = '',
        $callback = 'colorschangedhiddenbox_callback',
        $page     = 'wpeb_global_styles',
        $section  = 'wpeb_global_styles_header',
        $args     = array(
            'id' => $id,
            'class' => 'hide'
        )
    );

	register_setting( 'wpeb_global_styles', 'wpeb_logo' );
	register_setting( 'wpeb_global_styles', 'wpeb_white_logo' );
	register_setting( 'wpeb_global_styles', 'wpeb_favicon' );
	register_setting( 'wpeb_global_styles', 'wpeb_primary_typography' );
	register_setting( 'wpeb_global_styles', 'wpeb_secondary_typography' );
	register_setting( 'wpeb_global_styles', 'wpeb_primary_color' );
	register_setting( 'wpeb_global_styles', 'wpeb_secondary_color' );
	register_setting( 'wpeb_global_styles', 'wpeb_colors_changed' );

}

?>
