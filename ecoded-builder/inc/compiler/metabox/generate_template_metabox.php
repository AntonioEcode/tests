<?php

// Generate metabox file /functions/templates/template-{template_name}.php
function wpeb_generate_template_metabox( $page_template_name, $template_metabox_content ) {

	$template_metabox_file = fopen( WPEB_PLUGIN_THEME . 'functions/templates/template-' . $page_template_name . '.php', 'w+' );

	fwrite( $template_metabox_file, $template_metabox_content );
	fclose( $template_metabox_file );

}

function wpeb_generate_load_templates( $pages_templates_names ) {

	if( !empty( $pages_templates_names ) ) {

		$template_metabox_content = "<?php \n\n";
		$template_metabox_content .= "/******************************************************************************/\n";
		$template_metabox_content .= "/*                               Custom metabox                               */\n";
		$template_metabox_content .= "/******************************************************************************/\n\n";

		foreach( $pages_templates_names as $page_template_name ) {

			$template_metabox_content .= "require WPEB_PLUGIN_THEME . 'functions/templates/template-$page_template_name.php';\n";			

		}

		$template_metabox_content .= "\n?>";

		$load_templates_file = fopen( WPEB_PLUGIN_THEME . 'functions/templates/load-templates.php', 'w+' );

		fwrite( $load_templates_file, $template_metabox_content );
		fclose( $load_templates_file );

	}

}

?>