<?php

// Editors cannot save default theme options.
// You have to add a specific filter and indicate the page to which they will have access.
// More info: https://make.wordpress.org/themes/2011/07/01/wordpress-3-2-fixing-the-edit_theme_optionsmanage_options-bug/

add_filter( 'option_page_capability_wpeb_global_settings', 'wpeb_get_options_page_cap' );
add_filter( 'option_page_capability_wpeb_global_settings_analytics', 'wpeb_get_options_page_cap' );
add_filter( 'option_page_capability_wpeb_global_settings_social_networks', 'wpeb_get_options_page_cap' );
add_filter( 'option_page_capability_wpeb_settings_footer', 'wpeb_get_options_page_cap' );

function wpeb_get_options_page_cap() {

    return 'edit_theme_options';

}

?>