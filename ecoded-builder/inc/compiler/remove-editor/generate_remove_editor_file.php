<?php

// Generate /theme/functions/remove-editor.php
function wpeb_generate_remove_editor_file( $remove_editor_content ) {

	// Generate file
	$remove_editor_file = fopen( WPEB_PLUGIN_THEME . 'functions/remove-editor.php', 'w+' );

	fwrite( $remove_editor_file, $remove_editor_content );
	fclose( $remove_editor_file );

}

?>