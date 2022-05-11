<?php

// Purge all litespeed caches
function wpeb_clear_all_caches() {

	$option_page = !empty( $_POST['option_page'] ) ? $_POST['option_page'] : NULL;

	if( $option_page != 'wpeb_global_styles' ) {

		// get array of active plugins
		$active_plugins = (array)get_option( 'active_plugins', array() );

		// Check if litespeed already exists and is activate
		if( !empty( $active_plugins ) && in_array( 'litespeed-cache/litespeed-cache.php', $active_plugins ) ) {

			// Purge all
			do_action( 'litespeed_purge_all' );

		}

	}

}

?>