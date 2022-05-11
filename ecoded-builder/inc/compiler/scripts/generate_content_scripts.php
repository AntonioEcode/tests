<?php

// Generate content-scripts file
function wpeb_generate_content_scripts( $scripts_content ) {

	$content_scripts_file = fopen( WPEB_THEME . 'template-parts/footer/content-scripts.php', 'w+' );

	fwrite( $content_scripts_file, $scripts_content );
	fclose( $content_scripts_file );

}

?>
