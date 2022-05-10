<?php

add_action( 'admin_init', 'wpeb_global_settings' );

function wpeb_global_settings() {

    // Website status settings
    add_settings_section(
        $id = 'wpeb_global_settings_status_section',
        $title = __( 'Estado de la web', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_global_settings'
    );

	add_settings_field(
	   $id = 'ecode_status_website',
	   $title = __( 'Estado', 'ecoded_builder' ),
	   $callback = 'radiobox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_status_section',
       $args = array( $id )
	);

	register_setting( 'wpeb_global_settings', 'ecode_status_website' );

    // Company section settings
    add_settings_section(
        $id = 'wpeb_global_settings_company_section',
        $title = __( 'Datos de la empresa', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_global_settings'
    );

	add_settings_field(
	   $id = 'ecode_company_name',
	   $title = __( 'Razón Social', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_vat_number',
	   $title = __( 'CIF', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_address',
	   $title = __( 'Dirección', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_city',
	   $title = __( 'Localidad', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_province',
	   $title = __( 'Provincia', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_postal_code',
	   $title = __( 'Código postal', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_country',
	   $title = __( 'País', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_email',
	   $title = __( 'Correo electrónico', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_landline_phone',
	   $title = __( 'Teléfono fijo', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_phone',
	   $title = __( 'Móvil', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_company_whatsapp',
	   $title = __( 'Móvil ( para el botón de WhatsApp )', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_schedule_time',
	   $title = __( 'Horario', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_company_section',
       $args = array( $id )
	);

	register_setting( 'wpeb_global_settings', 'ecode_company_name' );
	register_setting( 'wpeb_global_settings', 'ecode_company_vat_number' );
	register_setting( 'wpeb_global_settings', 'ecode_company_address' );
	register_setting( 'wpeb_global_settings', 'ecode_company_city' );
	register_setting( 'wpeb_global_settings', 'ecode_company_province' );
	register_setting( 'wpeb_global_settings', 'ecode_company_postal_code' );
	register_setting( 'wpeb_global_settings', 'ecode_company_country' );
	register_setting( 'wpeb_global_settings', 'ecode_company_email' );
	register_setting( 'wpeb_global_settings', 'ecode_company_landline_phone' );
	register_setting( 'wpeb_global_settings', 'ecode_company_phone' );
	register_setting( 'wpeb_global_settings', 'ecode_company_whatsapp' );
	register_setting( 'wpeb_global_settings', 'ecode_schedule_time' );

    // Legal texts section
    add_settings_section(
        $id = 'wpeb_global_settings_legal_texts',
        $title = __( 'Textos legales', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_global_settings'
    );

	add_settings_field(
	   $id = 'ecode_form_legal_text',
	   $title = __( 'Texto legal para los formularios', 'ecoded_builder' ),
	   $callback = 'textareabox_callback',
	   $page = 'wpeb_global_settings',
	   $section = 'wpeb_global_settings_legal_texts',
       $args = array( $id )
	);

	register_setting( 'wpeb_global_settings', 'ecode_form_legal_text' );

}

?>
