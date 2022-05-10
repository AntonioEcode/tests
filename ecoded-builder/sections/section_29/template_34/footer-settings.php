<?php

// Get template of global settings
require_once WPEB_PLUGIN_INC . '/settings/wpeb_default_fields.php';

/******************************************************************************/
/*        Generate Ecode builder footer settings menu in the dashboard        */
/******************************************************************************/
add_action( 'admin_menu', 'wpeb_builder_admin_menu_footer_settings', 9, 0 );
function wpeb_builder_admin_menu_footer_settings() {

	add_submenu_page(
        $parent_slug = 'wpeb_global_settings',
        $page_title = __( 'Opciones del footer', 'ecoded_builder' ),
        $menu_title = __( 'Opciones del footer', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug = 'wpeb_settings_footer',
        $function = 'wpeb_admin_global_settings_footer_template',
        $position = 100
    );

}

/******************************************************************************/
/*                       Get options of footer settings                       */
/******************************************************************************/
add_action( 'admin_init', 'wpeb_settings_footer' );
function wpeb_settings_footer() {

    // Footer settings
    add_settings_section(
        $id = 'wpeb_settings_footer_section',
        $title = __( 'Configuración del footer ( pie de página )', 'ecoded_builder' ),
        $callback = '',
        $page = 'wpeb_settings_footer'
    );

    add_settings_field(
        $id = 'ecode_footer_description',
        $title = __( 'Breve descripción', 'ecoded_builder' ),
        $callback = 'textareabox_callback',
        $page = 'wpeb_settings_footer',
        $section = 'wpeb_settings_footer_section',
        $args = array( $id )
	);

	add_settings_field(
        $id = 'ecode_footer_info',
        $title = __( 'Información del ©', 'ecoded_builder' ),
        $callback = 'textareabox_callback',
        $page = 'wpeb_settings_footer',
        $section = 'wpeb_settings_footer_section',
        $args = array( $id )
	);

	register_setting( 'wpeb_settings_footer', 'ecode_footer_description' );
	register_setting( 'wpeb_settings_footer', 'ecode_footer_info' );

}

/******************************************************************************/
/*                          Footer settings template                          */
/******************************************************************************/
function wpeb_admin_global_settings_footer_template() {

?>
<div class="wrap">
	<h1><?php echo __( 'Opciones del footer', 'ecoded_builder' ); ?></h1>
	<form action="options.php" method="POST" class="form_page_default">
		<?php

		settings_fields( 'wpeb_settings_footer' );
		do_settings_sections( 'wpeb_settings_footer' );

		?>
		<div class="save_page">
			<i><?php echo get_icon_dashboard( 'icon_save' ); ?></i>
			<?php

			submit_button( '', 'submit-global-styles' );

			?>
		</div>
	</form>
</div>
<?php

} // <--  END Footer settings template function

?>
