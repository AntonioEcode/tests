<?php

/******************************************************************************/
/*                               Menus WordPress                              */
/******************************************************************************/

register_nav_menus(
    array(
        'menu_header_main' => 'Menú principal',
        'menu_footer'      => 'Menú footer',
        'menu_sidebar'     => 'Menú sidebar',
    )
);

/******************************************************************************/
/*                             END Menus WordPress                            */
/******************************************************************************/

/******************************************************************************/
/*                          Select current nav menu                           */
/******************************************************************************/

add_action( 'init', 'ecode_select_nav_menu' );

function ecode_select_nav_menu() {

    //Get all locations ( including the one we just created above )
    $locations = get_theme_mod( 'nav_menu_locations' );

    if( empty( $locations['menu_header_main'] ) ) {

        // Set the menu to the new location and save into database
        $menu = get_term_by( 'name', 'Menú principal', 'nav_menu' );

        if( !empty( $menu ) ) {

            $locations['menu_header_main'] = $menu->term_id;
            set_theme_mod( 'nav_menu_locations', $locations );

        }

    }

    if( empty( $locations['menu_footer'] ) ) {

        // Set the menu to the new location and save into database
        $menu = get_term_by( 'name', 'Menú footer', 'nav_menu' );

        if( !empty( $menu ) ) {

            $locations['menu_footer'] = $menu->term_id;
            set_theme_mod( 'nav_menu_locations', $locations );

        }

    }

    if( empty( $locations['menu_sidebar'] ) ) {

        // Set the menu to the new location and save into database
        $menu = get_term_by( 'name', 'Menú sidebar', 'nav_menu' );

        if( !empty( $menu ) ) {

            $locations['menu_sidebar'] = $menu->term_id;
            set_theme_mod( 'nav_menu_locations', $locations );

        }

    }

}

/******************************************************************************/
/*                        END Select current nav menu                         */
/******************************************************************************/

/******************************************************************************/
/*                              Sidebars WordPress                            */
/******************************************************************************/

register_sidebar(
    array(
        'id'            => 'ecoded_sidebar_blog',
        'name'          => __( 'Sidebar Blog', 'WordPressAdmin' ),
        'description'   => __( 'Sidebar general para el listado de artículos', 'WordPressAdmin' ),
        // 'before_widget' => '',
        // 'after_widget'  => '',
        // 'before_title'  => '',
        // 'after_title'   => '',
    )
);

register_sidebar(
    array(
        'id'          => 'ecoded_sidebar_posts',
        'name'        => __( 'Sidebar Artículos', 'WordPressAdmin' ),
        'description' => __( 'Sidebar general para el detalle de artículos', 'WordPressAdmin' ),
    )
);

/******************************************************************************/
/*                            END Sidebars WordPress                          */
/******************************************************************************/

/******************************************************************************/
/*                         Remove all default widgets                         */
/******************************************************************************/

add_action( 'widgets_init', 'wpeb_remove_default_widgets', 11 );

function wpeb_remove_default_widgets() {

	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'Twenty_Eleven_Ephemera_Widget' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Image' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Custom_HTML' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );

}

/******************************************************************************/
/*                       END Remove all default widgets                       */
/******************************************************************************/

/******************************************************************************/
/*                              Widgets WordPress                             */
/******************************************************************************/

add_action( 'widgets_init', 'wpeb_register_widgets' );

function wpeb_register_widgets() {

    register_widget( 'widget_ecoded_featured_posts' );
    register_widget( 'widget_ecoded_rrss_links' );
    register_widget( 'widget_ecoded_menu_links' );

}

/******************************************************************************/
/*                            END Widgets WordPress                           */
/******************************************************************************/

?>
