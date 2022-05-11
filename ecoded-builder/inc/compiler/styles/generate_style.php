<?php

// Generate style file
function wpeb_generate_style( $styles_content ) {

	$style_file = fopen( WPEB_THEME . 'style.css', 'w+' );

	fwrite( $style_file, $styles_content );
	fclose( $style_file );

}

?>
