<?php

// Check if the user can call AJAX
function wpeb_check_ajax_access() {

	// Grab the current user's ID
	$user_id = get_current_user_id();

	// If the user is logged in and the user exists, return TRUE
	if( is_user_logged_in() && wpeb_user_exists( $user_id ) ) {

		return TRUE;

	} else {

        wp_send_json_error(

			new WP_Error( 'notlogged', __( 'El usuario no ha iniciado sesión.', 'ecoded_builder' ) )

        );

	}

}

?>