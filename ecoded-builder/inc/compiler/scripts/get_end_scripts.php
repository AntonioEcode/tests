<?php

// End content scripts file 'content-scripts.php'
function wpeb_get_end_scripts( $scripts_content ) {

		$scripts_content .= "\t?>\n";
	$scripts_content .= "</script>";

	return $scripts_content;

}

?>
