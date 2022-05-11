<?php

// Generate content-head file /themes/ecodetheme/template-parts/header/content-head.php
function wpeb_generate_content_head( $content_head ) {

	$template_content_head = fopen( WPEB_THEME . 'template-parts/header/content-head.php', 'w+' );

	$new_content = '';

	foreach( $content_head as $page_type => $contents_template ) {

		if( !empty( $contents_template ) ) {

			$new_content .= "<?php\n\n";
			$new_content .= "\$current_id = wpeb_get_id();\n\n";

			// Add content condition for front-page
			if( $page_type == 'front-page' ) {

				$new_content .= "\tif( is_front_page() ) {\n\n";

			} elseif( $page_type == 'home' ) { // Add content condition for home

				$new_content .= "\tif( is_home() ) {\n\n";

			} elseif( $page_type == 'single-post' ) { // Add content condition for single-post

				$new_content .= "\tif( is_single( \$current_id ) ) {\n\n";

			} else {

				$new_content .= "\tif( in_array( \$current_id,  wpeb_get_template_by_name( '$page_type', \$results = true ) ) ) {\n\n";

			}

			$new_content .= "?>\n";

			// Add content for specific page_type
			foreach( $contents_template as $content ) {

				$new_content .= $content . "\n";

			}

			// Close content condition for specific page type
			$new_content .= "<?php\n\n";
			$new_content .= "\t}\n\n";
			$new_content .= "?>";

		}

	}

	fwrite( $template_content_head, $new_content );
	fclose( $template_content_head );

}

?>