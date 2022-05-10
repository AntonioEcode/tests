<?php

// Redirect direct access to blocked URLs when the user is editor
add_action( 'admin_init', function () {

    global $pagenow;
    $user = wp_get_current_user();

	$pages_without_access = array(
		'index.php',
		'upload.php',
		'admin.php',
		'themes.php',
		'customize.php',
		'tools.php',
		'import.php'
	);

    if( in_array( $pagenow, $pages_without_access ) && in_array( 'editor', $user->roles ) ) {

		if( $pagenow == 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] != 'wpcf7' ) {

			return;

		}

        wp_redirect( admin_url( '/admin.php?page=ecoded_builder_pages&template=front-page' ) );
        exit;

    }

} );

?>