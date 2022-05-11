<?php

// Close template_metabox_content
function wpeb_get_end_template_metabox( $template_metabox_content ) {

	$template_metabox_content .= "} \n\n?>";

	return $template_metabox_content;

}

?>
