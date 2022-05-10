<?php

// Get start of page-template
function wpeb_get_start_page_template( $page_name, $page_template_name ) {

	$page_template_start = "<?php \n\n";

	if( $page_template_name != 'front-page' && $page_template_name != 'home' && $page_template_name != 'single-post' ) {

		$page_template_start .= "/**\n";
		$page_template_start .= "* Template Name: $page_name\n";
		$page_template_start .= "*/\n";

	}

	$page_template_start .= "get_header();\n\n";

	return $page_template_start;

}

?>