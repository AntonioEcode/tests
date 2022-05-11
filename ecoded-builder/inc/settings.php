<?php

// Get template of global settings
require_once WPEB_PLUGIN_INC . '/settings/wpeb_default_fields.php';

// Generate Ecode builder menu in the dashboard
add_action( 'admin_menu', 'wpeb_builder_admin_menu', 9, 0 );

function wpeb_builder_admin_menu() {

	global $_wp_last_object_menu;

	add_menu_page(
        $page_title = __( 'Ecoded Builder', 'ecoded_builder' ),
        $menu_title = __( 'Ecoded Builder', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug  = 'ecoded_builder_pages',
        $function   = 'wpeb_admin_builder_page',
        $icon_url   = WPEB_PLUGIN_FRONT_DIR . '/assets/img/icons/icon_menu_builder.svg',
        $position   = $_wp_last_object_menu + 2
    );

	add_menu_page(
		$page_title  = __( 'Ajustes Globales', 'ecoded_builder' ),
		$menu_title  = __( 'Ajustes Globales', 'ecoded_builder' ),
		$capability  = 'edit_others_pages',
        $menu_slug   = 'wpeb_global_settings',
		$function    = 'wpeb_admin_global_settings',
		$icon_url    = WPEB_PLUGIN_FRONT_DIR . '/assets/img/icons/icon_menu_global_settings.svg',
		$position    = $_wp_last_object_menu + 3
	);

	add_submenu_page(
		$parent_slug = 'wpeb_global_settings',
		$page_title  = __( 'Gestionar Menús', 'ecoded_builder' ),
		$menu_title  = __( 'Gestionar Menús', 'ecoded_builder' ),
		$capability  = 'edit_others_pages',
        $menu_slug   = esc_url( admin_url( 'nav-menus.php' ) ),
		$function    = '',
		$position    = 1
	);

	add_submenu_page(
		$parent_slug = 'wpeb_global_settings',
		$page_title  = __( 'Estilos Globales', 'ecoded_builder' ),
		$menu_title  = __( 'Estilos Globales', 'ecoded_builder' ),
		$capability  = 'edit_others_pages',
        $menu_slug   = 'wpeb_global_styles',
		$function    = 'wpeb_admin_global_styles',
		$position    = 2
	);

	add_submenu_page(
		$parent_slug = 'wpeb_global_settings',
        $page_title = __( 'Selector de tema predefinido', 'ecoded_builder' ),
        $menu_title = __( 'Selector de tema predefinido', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug  = 'ecoded_builder_themes',
        $function   = 'wpeb_admin_builder_themes',
        $position   = 3
    );

	add_submenu_page(
		$parent_slug = 'wpeb_global_settings',
		$page_title  = __( 'Formulario de contacto', 'ecoded_builder' ),
		$menu_title  = __( 'Formulario de contacto', 'ecoded_builder' ),
		$capability  = 'edit_others_pages',
	    $menu_slug   = 'wpeb_contact_form_settings',
		$function    = 'wpeb_admin_contact_form_settings',
		$position    = 4
	);

	add_submenu_page(
        $parent_slug = 'wpeb_global_settings',
        $page_title = __( 'Analítica web integrada', 'ecoded_builder' ),
        $menu_title = __( 'Analítica web integrada', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug = 'wpeb_global_settings_analytics',
        $function = 'wpeb_admin_global_settings_analytics',
        $position = 5
    );

	add_submenu_page(
        $parent_slug = 'wpeb_global_settings',
        $page_title = __( 'Redes Sociales', 'ecoded_builder' ),
        $menu_title = __( 'Redes Sociales', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug = 'wpeb_global_settings_social_networks',
        $function = 'wpeb_admin_global_settings_social_networks',
        $position = 6
    );

	add_submenu_page(
        $parent_slug = 'wpeb_global_settings',
        $page_title = __( 'Cookies', 'frontecode' ),
        $menu_title = __( 'Cookies', 'frontecode' ),
        $capability = 'manage_options',
        $menu_slug = 'wpeb_settings_cookies',
        $function = 'wpeb_settings_cookies_page_content',
        $position = 7
    );

}

function wpeb_admin_builder_page() {

	// Get template builder
	require_once WPEB_PLUGIN_DIR . '/config_pages/ecoded_builder_page.php';

}

function wpeb_admin_builder_themes() {

	// Get template builder
	require_once WPEB_PLUGIN_DIR . '/config_pages/ecoded_builder_themes.php';

}

function wpeb_admin_global_styles() {

	// Get template of global styles
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_global_styles.php';

}

function wpeb_admin_global_settings() {

	// Get template of global settings
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_global_settings.php';

}

function wpeb_admin_global_settings_analytics() {

	// Get template of global settings social networks
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_global_settings_analytics.php';

}

function wpeb_admin_global_settings_social_networks() {

	// Get template of global settings social networks
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_global_settings_social_networks.php';

}

function wpeb_settings_cookies_page_content() {

	// Get template of settings cookies
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_settings_cookies.php';

}

function wpeb_admin_contact_form_settings() {

	// Get template of contact form settings
	require_once WPEB_PLUGIN_DIR . '/config_pages/wpeb_contact_form_settings.php';

}

// Get options of global styles
require_once WPEB_PLUGIN_INC . 'settings/wpeb_global_styles.php';

// Get options of global settings
require_once WPEB_PLUGIN_INC . 'settings/wpeb_global_settings.php';

// Get options of global settings analytics
require_once WPEB_PLUGIN_INC . 'settings/wpeb_global_settings_analytics.php';

// Get options of global settings social networks
require_once WPEB_PLUGIN_INC . 'settings/wpeb_global_settings_social_networks.php';

// Get options of settings cookies
require_once WPEB_PLUGIN_INC . 'settings/wpeb_settings_cookies.php';

?>
