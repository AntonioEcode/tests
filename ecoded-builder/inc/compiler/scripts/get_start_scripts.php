<?php

// Start content scripts file 'content-scripts.php' ( post id variable and general scripts )
function wpeb_get_start_scripts() {

	$content_scripts_start = "<?php\n\n";
	$content_scripts_start .= "\$current_id = get_the_ID();\n\n";
	$content_scripts_start .= "?>\n";
	$content_scripts_start .= "<script type='text/javascript'>\n";
		$content_scripts_start .= "\t<?php\n\n";
		$content_scripts_start .= "\tinclude_once( 'scripts/js-ecode-general.min.php' );\n\n";

	return $content_scripts_start;

}

?>
