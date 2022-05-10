<?php

add_action( 'init', 'ecoded_under_maintenance', 30 );

// Handle Maintenance page
if( !function_exists( 'ecoded_under_maintenance' ) ) {

	function ecoded_under_maintenance() {

		$is_login_page = basename( $_SERVER['PHP_SELF'] ) == 'wp-login.php';
		$is_maintenance_mode_on = get_option( 'ecode_status_website' ) == 'maintenance';

		if( $is_maintenance_mode_on &&
			!$is_login_page &&
			!is_user_logged_in() &&
			!is_admin() &&
			!current_user_can( 'update_plugins' )
		) {

			get_template_part( 'maintenance' );
			exit();

		}

	}

}

?>