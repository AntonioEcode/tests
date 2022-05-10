<?php

add_action( 'admin_init', 'wpeb_global_settings_analytics' );

function wpeb_global_settings_analytics() {

    // Analytics section
    add_settings_section(
        $id = 'wpeb_global_settings_analytics_section',
        $title = __( 'Integración con Google', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_global_settings_analytics'
    );

    add_settings_field(
       $id = 'ecode_analytics',
       $title = __( 'Google Analytics', 'ecoded_builder' ),
       $callback = 'textbox_callback',
       $page = 'wpeb_global_settings_analytics',
       $section = 'wpeb_global_settings_analytics_section',
       $args = array( $id, 'UA-XXXXXXXXX' )
    );

    register_setting( 'wpeb_global_settings_analytics', 'ecode_analytics' );

}

?>
