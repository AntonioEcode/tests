<?php

/******************************************************************************/
/*                  Add capability to edit menu to editors                    */
/******************************************************************************/
add_action( 'admin_init', 'ecode_add_capability_to_editors' );

function ecode_add_capability_to_editors() {

	// add editor the privilege to edit theme
	if( current_user_can( 'editor' ) ) {

		// get the the role object
		$role_object = get_role( 'editor' );

		if( !$role_object->has_cap( 'edit_theme_options' ) ) {

			// add $cap capability to this role object
			$role_object->add_cap( 'edit_theme_options' );

		}

	}

}

/******************************************************************************/
/*                   Add capability to global styles page                     */
/******************************************************************************/
// https://make.wordpress.org/themes/2011/07/01/wordpress-3-2-fixing-the-edit_theme_optionsmanage_options-bug/
add_filter( 'option_page_capability_wpeb_global_styles', 'wpeb_global_styles_get_options_page_cap' );

function wpeb_global_styles_get_options_page_cap() {

    return 'edit_theme_options';

}

?>
