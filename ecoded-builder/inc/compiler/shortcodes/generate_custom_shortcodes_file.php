<?php

// Generate /theme/functions/shortcodes/custom-shortcodes.php
function wpeb_generate_custom_shortcodes_file( $shortcodes_content ) {

	$custom_shortcodes_content = "<?php \n\n";

	if( !empty( $shortcodes_content ) ) {

		foreach( $shortcodes_content as $shortcode_content ) {

			$custom_shortcodes_content .= $shortcode_content;
			$custom_shortcodes_content .= "\n";

		}

	}

	$custom_shortcodes_content .= "\n?>";

	// Generate file
	$custom_shortcodes_file = fopen( WPEB_PLUGIN_THEME . 'functions/shortcodes/custom-shortcodes.php', 'w+' );

	fwrite( $custom_shortcodes_file, $custom_shortcodes_content );
	fclose( $custom_shortcodes_file );

}

?>