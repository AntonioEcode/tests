<?php

add_action( 'admin_init', 'wpeb_settings_cookies' );

function wpeb_settings_cookies() {

    add_settings_section(
        $id = 'wpeb_settings_page_cookies_section_general',
        $title = __( 'Cookies - Activación', 'frontecode' ),
        $callback = '',
        $page = 'wpeb_settings_cookies'
    );

	add_settings_field(
	   $id = 'wpeb_cookies_enable',
	   $title = __( 'Activar uso de cookies', 'frontecode' ),
	   $callback = 'checkbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_general',
       $args = array( $id )
	);

	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_enable' );

}

add_action( 'admin_init', 'wpeb_settings_cookies_modal' );

function wpeb_settings_cookies_modal() {

    add_settings_section(
        $id = 'wpeb_settings_page_cookies_section_modal',
        $title = __( 'Cookies - Modal', 'frontecode' ),
        $callback = '',
        $page = 'wpeb_settings_cookies'
    );

	add_settings_field(
	   $id = 'wpeb_cookies_modal_title',
	   $title = __( 'Título', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_modal',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_modal_description',
	   $title = __( 'Descripción', 'frontecode' ),
	   $callback = 'textareabox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_modal',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_modal_config_button',
	   $title = __( 'Botón "Personalizar" - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_modal',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_modal_accept',
	   $title = __( 'Botón "Aceptar" - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_modal',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_modal_decline',
	   $title = __( 'Botón "Rechazar" - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_modal',
       $args = array( $id )
	);

	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_modal_title' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_modal_description' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_modal_config_button' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_modal_accept' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_modal_decline' );

}

add_action( 'admin_init', 'wpeb_settings_cookies_popup' );

function wpeb_settings_cookies_popup() {

    add_settings_section(
        $id = 'wpeb_settings_page_cookies_section_popup',
        $title = __( 'Cookies - Popup', 'frontecode' ),
        $callback = '',
        $page = 'wpeb_settings_cookies'
    );

	add_settings_field(
	   $id = 'wpeb_cookies_popup_title',
	   $title = __( 'Título', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_author_name',
	   $title = __( 'Autor - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_author_link',
	   $title = __( 'Autor - Enlace', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_save_button',
	   $title = __( 'Botón "Guardar" - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_accept_all_button',
	   $title = __( 'Botón "Aceptar todas" - Texto', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_cookies_usage_title',
	   $title = __( 'Utilización de cookies - Título', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_cookies_usage_description',
	   $title = __( 'Utilización de cookies - Descripción', 'frontecode' ),
	   $callback = 'textareabox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_cookies_analytics_title',
	   $title = __( 'Cookies de análisis - Título', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_cookies_analytics_description',
	   $title = __( 'Cookies de análisis - Descripción', 'frontecode' ),
	   $callback = 'textareabox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

    for( $i=1; $i < 6; $i++ ) {

        add_settings_field(
           $id = 'wpeb_cookies_popup_cookies_analytics_table_name_' . $i,
           $title = __( 'Cookies de análisis - Tabla - Nombre ' . $i, 'frontecode' ),
           $callback = 'textbox_callback',
           $page = 'wpeb_settings_cookies',
           $section = 'wpeb_settings_page_cookies_section_popup',
           $args = array( $id )
        );

        add_settings_field(
           $id = 'wpeb_cookies_popup_cookies_analytics_table_domain_' . $i,
           $title = __( 'Cookies de análisis - Tabla - Dominio ' . $i, 'frontecode' ),
           $callback = 'textbox_callback',
           $page = 'wpeb_settings_cookies',
           $section = 'wpeb_settings_page_cookies_section_popup',
           $args = array( $id )
        );

        add_settings_field(
           $id = 'wpeb_cookies_popup_cookies_analytics_table_expiration_' . $i,
           $title = __( 'Cookies de análisis - Tabla - Expiración ' . $i, 'frontecode' ),
           $callback = 'textbox_callback',
           $page = 'wpeb_settings_cookies',
           $section = 'wpeb_settings_page_cookies_section_popup',
           $args = array( $id )
        );

        add_settings_field(
           $id = 'wpeb_cookies_popup_cookies_analytics_table_description_' . $i,
           $title = __( 'Cookies de análisis - Tabla - Descripción ' . $i, 'frontecode' ),
           $callback = 'textareabox_callback',
           $page = 'wpeb_settings_cookies',
           $section = 'wpeb_settings_page_cookies_section_popup',
           $args = array( $id )
        );

    }

	add_settings_field(
	   $id = 'wpeb_cookies_popup_more_info_title',
	   $title = __( 'Más información - Título', 'frontecode' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'wpeb_cookies_popup_more_info_description',
	   $title = __( 'Más información - Descripción', 'frontecode' ),
	   $callback = 'textareabox_callback',
	   $page = 'wpeb_settings_cookies',
	   $section = 'wpeb_settings_page_cookies_section_popup',
       $args = array( $id )
	);

	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_title' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_author_name' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_author_link' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_save_button' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_accept_all_button' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_usage_title' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_usage_description' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_title' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_description' );

    for( $i=1; $i < 6; $i++ ) {

        register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_table_name_' . $i );
    	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_table_domain_' . $i );
    	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_table_expiration_' . $i );
    	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_cookies_analytics_table_description_' . $i );

    }

	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_more_info_title' );
	register_setting( 'wpeb_settings_cookies', 'wpeb_cookies_popup_more_info_description' );

}

?>
