<?php

/******************************************************************************/
/*                          Change admin footer text                          */
/******************************************************************************/
add_filter( 'admin_footer_text', 'ecode_admin_footer_text' );

function ecode_admin_footer_text() {

	// echo '<p class="ecode-footer-contact">' . __( 'Si tienes alguna duda consulta nuestras', 'WordPressAdmin' ) . ' <a href="https://ecodegroup.com/contacto/" target="_blank">' . __( 'preguntas frecuentes aquí', 'WordPressAdmin' ) . '</a></p>';

	echo FALSE;

}

/******************************************************************************/
/*                         Remove update footer text                          */
/******************************************************************************/
add_action( 'admin_menu', 'ecode_remove_update_footer_text' );

function ecode_remove_update_footer_text() {

    // if( !current_user_can( 'update_core' ) ) {

        remove_filter( 'update_footer', 'core_update_footer' );

    // }

}

/******************************************************************************/
/*                         Remove update notice text                          */
/******************************************************************************/
add_action( 'admin_menu','ecode_remove_admin_update_notice' );

function ecode_remove_admin_update_notice() {

	if( !current_user_can('update_core') ) {

		remove_action( 'admin_notices', 'update_nag', 3 );

	}

}

/******************************************************************************/
/*                       Change items in top admin bar                        */
/******************************************************************************/
add_action( 'admin_bar_menu', 'ecode_custom_admin_bar_menu', 200 );

function ecode_custom_admin_bar_menu( $wp_admin_bar ) {

	if( !is_object( $wp_admin_bar ) ) { return; }

	if( !current_user_can( 'manage_options' ) ) {

		// Current items
		$nodes = $wp_admin_bar->get_nodes();

		foreach( $nodes as $node ) {

			$wp_admin_bar->remove_menu( $node->id );

		}

		// New items ordered
		$args = array(
			'id'     => 'menu-toggle',
			'parent' => FALSE,
			'title'  => '<i class="menu_toggle">' . get_icon_dashboard( 'icon_menu-toggle' ) . '</i><i class="menu_arrow">' . get_icon_dashboard( 'icon_arrow_right' ) . '</i>',
			'href'   => '#',
			'group'  => FALSE,
			'meta'   => array()
		);
		$wp_admin_bar->add_node( $args );

		$args = array(
			'id'     => 'ecode-logo',
			'parent' => FALSE,
			'title'  => '<i>' . get_icon_dashboard( 'icon_ecode' ) . '</i>',
			'href'   => esc_url( 'https://ecodegroup.com/' ),
			'meta'   => array(
                'class'  => 'ecode-logo',
				'target' => '_blank'
            )
		);
		$wp_admin_bar->add_node( $args );

		$args = array(
			'id'     => 'ecode-site-name',
			'parent' => FALSE,
			'title'  => '<i>' . get_icon_dashboard( 'icon_dashboard' ) . '</i>',
			'href'   => esc_url( get_site_url() ),
			'meta'   => array(
                'class' => 'ecode-site-name-item',
            )
		);
		$wp_admin_bar->add_node( $args );

		if( wp_count_comments()->moderated != 0 ) {

			$args = array(
				'id'     => 'comments',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_comments' ) . '</i><span>' . wp_count_comments()->moderated . '</span>',
				'href'   => esc_url( get_site_url() . '/wp-admin/edit-comments.php' ),
				'group'  => FALSE,
				'meta'   => array()
			);
			$wp_admin_bar->add_node( $args );

		}

	} else {

		// Remove items
		$wp_admin_bar->remove_menu( 'archive' );
		$wp_admin_bar->remove_menu( 'user-actions' );
		$wp_admin_bar->remove_menu( 'user-info' );
		$wp_admin_bar->remove_menu( 'edit-profile' );
		$wp_admin_bar->remove_menu( 'logout' );
		$wp_admin_bar->remove_menu( 'my-account' );
		$wp_admin_bar->remove_menu( 'wp-logo' );
		$wp_admin_bar->remove_menu( 'about' );
		$wp_admin_bar->remove_menu( 'wporg' );
		$wp_admin_bar->remove_menu( 'documentation' );
		$wp_admin_bar->remove_menu( 'support-forums' );
		$wp_admin_bar->remove_menu( 'feedback' );
		$wp_admin_bar->remove_menu( 'site-name' );
		$wp_admin_bar->remove_menu( 'view-site' );
		$wp_admin_bar->remove_menu( 'updates' );
		$wp_admin_bar->remove_menu( 'new-content' );
		$wp_admin_bar->remove_menu( 'new-post' );
		$wp_admin_bar->remove_menu( 'new-media' );
		$wp_admin_bar->remove_menu( 'new-page' );
		$wp_admin_bar->remove_menu( 'new-user' );
		$wp_admin_bar->remove_menu( 'view' );
		$wp_admin_bar->remove_menu( 'menu-toggle' );
		$wp_admin_bar->remove_menu( 'comments' );
		$wp_admin_bar->remove_menu( 'wpseo-menu' );
		$wp_admin_bar->remove_menu( 'wpseo-notifications' );
		$wp_admin_bar->remove_menu( 'wpseo-configuration-wizard' );
		$wp_admin_bar->remove_menu( 'wpseo-kwresearch' );
		$wp_admin_bar->remove_menu( 'wpseo-kwresearchtraining' );
		$wp_admin_bar->remove_menu( 'wpseo-adwordsexternal' );
		$wp_admin_bar->remove_menu( 'wpseo-googleinsights' );
		$wp_admin_bar->remove_menu( 'wpseo-settings' );
		$wp_admin_bar->remove_menu( 'wpseo-general' );
		$wp_admin_bar->remove_menu( 'wpseo-titles' );
		$wp_admin_bar->remove_menu( 'wpseo-social' );
		$wp_admin_bar->remove_menu( 'wpseo-tools' );
		$wp_admin_bar->remove_menu( 'wpseo-licenses' );

		// New items ordered
		$args = array(
			'id'     => 'menu-toggle',
			'parent' => FALSE,
			'title'  => '<i class="menu_toggle">' . get_icon_dashboard( 'icon_menu-toggle' ) . '</i><i class="menu_arrow">' . get_icon_dashboard( 'icon_arrow_right' ) . '</i>',
			'href'   => '#',
			'group'  => FALSE,
			'meta'   => array()
		);
		$wp_admin_bar->add_node( $args );

		$args = array(
			'id'     => 'ecode-logo',
			'parent' => '0',
			'title'  => '<i>' . get_icon_dashboard( 'icon_ecode' ) . '</i>',
			'href'   => esc_url( 'https://ecodegroup.com/' ),
			'meta'   => array(
                'class'  => 'ecode-logo',
				'target' => '_blank'
            )
		);
		$wp_admin_bar->add_node( $args );

		$args = array(
			'id'     => 'ecode-site-name',
			'parent' => '0',
			'title'  => '<i>' . get_icon_dashboard( 'icon_dashboard' ) . '</i>',
			'href'   => esc_url( get_site_url() ),
			'meta'   => array(
                'class' => 'ecode-site-name-item',
            )
		);

		$wp_admin_bar->add_node( $args );

		if( get_post_type( get_the_ID() ) == 'page'  && isset( $_GET['action'] ) && $_GET['action'] == 'edit' ) {

			$args = array(
				'id'     => 'view_page',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_view_page' ) . '</i>' . __( 'Ver página', 'frontecode' ),
				'href'   => esc_url( get_permalink( get_the_ID() ) ),
				'group'  => FALSE,
				'meta'   => array()
			);

			$wp_admin_bar->add_node( $args );

		}

		if( get_post_type( get_the_ID() ) == 'post' && isset( $_GET['action'] ) && $_GET['action'] == 'edit' ) {

			$args = array(
				'id'     => 'view_post',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_view_page' ) . '</i>' . __( 'Ver post', 'frontecode' ),
				'href'   => esc_url( get_permalink( get_the_ID() ) ),
				'group'  => FALSE,
				'meta'   => array()
			);

			$wp_admin_bar->add_node( $args );

		}

		if( ecode_check_edit_builder_sections( $_GET, get_the_ID() ) ) {

			$args = array(
				'id'     => 'edit_builder',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_edit_builder' ) . '</i>' . __( 'Editar bloques de contenido', 'frontecode' ),
				'href'   => esc_url( get_site_url() . '/wp-admin/admin.php?page=ecoded_builder_pages&template=' . ecode_get_template_name_by_id( get_the_ID() ) ),
				'group'  => FALSE,
				'meta'   => array()
			);

			$wp_admin_bar->add_node( $args );

		}

		if( wp_count_comments()->moderated != 0 ) {

			$args = array(
				'id'     => 'comments',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_comments' ) . '</i><span>' . wp_count_comments()->moderated . '</span>',
				'href'   => esc_url( get_site_url() . '/wp-admin/edit-comments.php' ),
				'group'  => FALSE,
				'meta'   => array()
			);
			$wp_admin_bar->add_node( $args );

		}

	}

}

/******************************************************************************/
/*                      Change items in left admin bar                        */
/******************************************************************************/
// add_action( 'admin_init', 'ecode_remove_dashboard_menu_pages' );
add_action( 'admin_menu', 'ecode_remove_dashboard_menu_pages', 999 );

function ecode_remove_dashboard_menu_pages() {

    if( !current_user_can( 'manage_options' ) ) {

		// Use $GLOBALS[ 'menu' ] to show all

		remove_menu_page( 'index.php' );           // Desktop
		remove_menu_page( 'upload.php' );          // Media
		remove_menu_page( 'edit-comments.php' );   // Comments
		remove_menu_page( 'themes.php' );          // Appearance
		remove_menu_page( 'users.php' );           // Users
		remove_menu_page( 'tools.php' );           // Tools
		remove_menu_page( 'options-general.php' ); // Settings
		remove_menu_page( 'profile.php' );         // Profile
		remove_menu_page( 'wpcf7' );               // Contact Form 7

	}

	// TODO commented because in this moment don't remove the submenú
	// remove_submenu_page( 'themes.php', 'customize.php' );

	// Get if has blog
	$page_types = wpeb_get_page_types();
	$has_blog = FALSE;

	foreach( $page_types as $page_type ) {

		if( $page_type->template_name == 'home' ) {

			$has_blog = TRUE;

		}

	}

	// If not has blog remove item from left admin menu
	if( !$has_blog ) {

		remove_menu_page( 'edit.php' ); // Posts

	}

	// Add logout
	global $_wp_last_object_menu;

	$_wp_last_object_menu++;

	add_menu_page(
        $page_title = __( 'Cerrar sesión', 'ecoded_builder' ),
        $menu_title = __( 'Cerrar sesión', 'ecoded_builder' ),
        $capability = 'edit_others_pages',
        $menu_slug  = wp_logout_url(),
        $function   = '',
        $icon_url   = WPEB_PLUGIN_FRONT_DIR . '/assets/img/icons/icon_menu_logout.svg',
        $position   = $_wp_last_object_menu
    );

}

/******************************************************************************/
/*                     Change order left admin menu items                     */
/******************************************************************************/
add_filter('custom_menu_order', 'ecode_custom_menu_order');
add_filter('menu_order', 'ecode_custom_menu_order');

function ecode_custom_menu_order( $menu_ord ) {

	if( !$menu_ord ) { return TRUE; }

	if( !current_user_can( 'manage_options' ) ) {

		return array(
			'wpeb_global_styles',
			'ecoded_builder_pages',
			'ecoded_builder_themes',
			'wpeb_global_settings',
			'wpeb_contact_form_settings',
			'edit.php?post_type=page',    // Pages
			'edit.php',                   // Posts
		);

	}

	return $menu_ord;

}

/******************************************************************************/
/*                         Change front end admin bar                         */
/******************************************************************************/
add_action( 'admin_bar_menu', 'ecode_custom_front_admin_bar', 999 );

function ecode_custom_front_admin_bar( $wp_admin_bar ) {

	if( !is_object( $wp_admin_bar ) ) { return; }

	if ( !is_admin() ) {

		// Remove nodes
		$wp_admin_bar->remove_node( 'menu-toggle' );
		$wp_admin_bar->remove_node( 'search' );
		$wp_admin_bar->remove_node( 'appearance' );
		$wp_admin_bar->remove_node( 'customize' );
		$wp_admin_bar->remove_node( 'ecode-site-name' );
		$wp_admin_bar->remove_node( 'ecode-logo' );
		$wp_admin_bar->remove_node( 'edit' );
		$wp_admin_bar->remove_node( 'view_page' );
		$wp_admin_bar->remove_node( 'view_post' );
		$wp_admin_bar->remove_node( 'comments' );

		// New items ordered
		$args = array(
			'id'     => 'ecode-site-name',
			'parent' => '0',
			'title'  => '<i>' . get_icon_dashboard( 'icon_dashboard' ) . '</i>',
			'href'   => esc_url( admin_url( 'admin.php?page=wpeb_global_styles' ) ),
			'meta'   => array(
				'class' => 'ecode-site-name-item',
			)
		);
		$wp_admin_bar->add_node( $args );

		if( is_page() || is_single() || is_home() ) {

			$post_id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();

			$args = array(
				'id'     => 'edit',
				'parent' => FALSE,
				'title'  => __( 'Editar contenido', 'frontecode' ),
				'href'   => esc_url( get_site_url() . '/wp-admin/post.php?post=' . $post_id . '&action=edit' ),
				'group'  => FALSE,
				'meta'   => array()
			);

			$wp_admin_bar->add_node( $args );

		}

		$args = array(
			'id'     => 'edit_builder',
			'parent' => FALSE,
			'title'  => '<i>' . get_icon_dashboard( 'icon_edit_builder' ) . '</i>' . __( 'Editar bloques de contenido', 'frontecode' ),
			'href'   => esc_url( get_site_url() . '/wp-admin/admin.php?page=ecoded_builder_pages&template=' . ecode_get_template_name_by_id( get_the_ID() ) ),
			'group'  => FALSE,
			'meta'   => array()
		);

		$wp_admin_bar->add_node( $args );

		if( wp_count_comments()->moderated != 0 ) {

			$args = array(
				'id'     => 'comments',
				'parent' => FALSE,
				'title'  => '<i>' . get_icon_dashboard( 'icon_comments' ) . '</i><span>' . wp_count_comments()->moderated . '</span>',
				'href'   => esc_url( get_site_url() . '/wp-admin/edit-comments.php' ),
				'group'  => FALSE,
				'meta'   => array()
			);
			$wp_admin_bar->add_node( $args );

		}

	}

}

/******************************************************************************/
/*                   Login redirect for Admins and Editors                    */
/******************************************************************************/
add_filter( 'login_redirect', 'ecode_login_redirect', 10, 3 );

function ecode_login_redirect( $redirect_to, $user ) {

    global $user;

    if( isset( $user->roles ) && is_array( $user->roles ) ) {

        if( in_array( 'editor', $user->roles ) || in_array( 'administrator', $user->roles ) ) {

            // redirect them to the default place
            $data_login = get_option('axl_jsa_login_wid_setup');

			return admin_url( 'admin.php?page=wpeb_global_styles' );

        }

    }

	return $redirect_to;

}

/******************************************************************************/
/*                           Remove screen options                            */
/******************************************************************************/
add_filter( 'screen_options_show_screen', 'ecode_remove_screen_options' );

function ecode_remove_screen_options() {

	$current_screen = get_current_screen();

	$ecoded_builder_screens = array(
		'toplevel_page_wpeb_global_styles',
		'toplevel_page_ecoded_builder_pages',
		'toplevel_page_ecoded_builder_themes',
		'toplevel_page_wpeb_global_settings',
		'toplevel_page_wpeb_contact_form_settings',
		'ajustes-globales_page_wpeb_global_settings_social_networks',
		'ajustes-globales_page_wpeb_global_settings_analytics',
		'ajustes-globales_page_wpeb_global_styles',
		'nav-menus'
	);

	if( in_array( $current_screen->id, $ecoded_builder_screens ) ) {

		return false;

	}

	return true;

}

/******************************************************************************/
/*                           Remove help top tabs                             */
/******************************************************************************/
add_action( 'admin_head', 'ecode_remove_help_tabs' );

function ecode_remove_help_tabs() {

    $screen = get_current_screen();
    $screen->remove_help_tabs();

}

?>
