<?php

add_action( 'admin_init', 'wpeb_global_settings_social_networks' );

function wpeb_global_settings_social_networks() {

    // Social networks settings
    add_settings_section(
        $id = 'wpeb_global_settings_social_networks_section',
        $title = __( 'Aquí podrás añadir los enlaces a tus redes sociales', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_global_settings_social_networks'
    );

	add_settings_field(
	   $id = 'ecode_twitter_link',
	   $title = __( 'Twitter', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_linkedin_link',
	   $title = __( 'LinkedIn', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_facebook_link',
	   $title = __( 'Facebook', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_instagram_link',
	   $title = __( 'Instagram', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_youtube_link',
	   $title = __( 'YouTube', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	add_settings_field(
	   $id = 'ecode_pinterest_link',
	   $title = __( 'Pinterest', 'ecoded_builder' ),
	   $callback = 'textbox_callback',
	   $page = 'wpeb_global_settings_social_networks',
	   $section = 'wpeb_global_settings_social_networks_section',
       $args = array( $id )
	);

	register_setting( 'wpeb_global_settings_social_networks', 'ecode_twitter_link' );
	register_setting( 'wpeb_global_settings_social_networks', 'ecode_linkedin_link' );
	register_setting( 'wpeb_global_settings_social_networks', 'ecode_facebook_link' );
	register_setting( 'wpeb_global_settings_social_networks', 'ecode_instagram_link' );
	register_setting( 'wpeb_global_settings_social_networks', 'ecode_youtube_link' );
	register_setting( 'wpeb_global_settings_social_networks', 'ecode_pinterest_link' );

}

?>
