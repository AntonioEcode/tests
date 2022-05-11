<?php

// Close page_template_content
function wpeb_get_end_page_template( $page_template_content ) {

	$page_template_content .= "\nget_footer();\n\n";
	$page_template_content .= "?>";

	return $page_template_content;

}

?>
