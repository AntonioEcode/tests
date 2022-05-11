<?php

// Generate page template file /page-templates/{template_name}.php
function wpeb_generate_page_template( $page_template_name, $page_template_content ) {

	if( $page_template_name == 'front-page' || $page_template_name == 'home' || $page_template_name == 'single-post' ) {

		$page_template_file = fopen( WPEB_THEME . $page_template_name . '.php', 'w+' );

	} else {

		$page_template_file = fopen( WPEB_THEME . 'page-templates/' . $page_template_name . '.php', 'w+' );

	}

	// If current template is home create archive like home template
	if( $page_template_name == 'home' ) {

		$archive_template_file = fopen( WPEB_THEME . 'archive.php', 'w+' );
		fwrite( $archive_template_file, $page_template_content );
		fclose( $archive_template_file );

	}

	fwrite( $page_template_file, $page_template_content );
	fclose( $page_template_file );

}

?>
