<?php

// Get start of /functions/templates/template-{template_name}.php ( metabox file of each page template )
function wpeb_get_start_template_metabox( $page_id, $page_template_name ) {

	$template_metabox_start = "<?php \n\n";

	switch( $page_template_name ) {

		case 'front-page':

			$template_metabox_start .= "add_action( 'cmb2_admin_init', 'wpeb_template_front_page' );\n\n";
			$template_metabox_start .= "function get_if_show_on_$page_id( \$cmb ) {\n\n";
				$template_metabox_start .= "\treturn get_option( 'page_on_front' ) == \$cmb->object_id;\n\n";
			$template_metabox_start .= "}\n\n";
			$template_metabox_start .= "function wpeb_template_front_page() {\n\n";
				$template_metabox_start .= "\t\$object_type = array( 'page' );\n\n";
				$template_metabox_start .= "\t\$prefix = '_front-page_';\n";

			break;

		case 'home':

			$template_metabox_start .= "add_action( 'cmb2_admin_init', 'wpeb_template_home' );\n\n";
			$template_metabox_start .= "function get_if_show_on_$page_id( \$cmb ) {\n\n";
				$template_metabox_start .= "\treturn get_option( 'page_for_posts' ) == \$cmb->object_id;\n\n";
			$template_metabox_start .= "}\n\n";
			$template_metabox_start .= "function wpeb_template_home() {\n\n";
				$template_metabox_start .= "\t\$object_type = array( 'page' );\n\n";
				$template_metabox_start .= "\t\$prefix = '_home_';\n";

			break;

		case 'single-post':

			$template_metabox_start .= "add_action( 'cmb2_admin_init', 'wpeb_template_posts' );\n\n";
			$template_metabox_start .= "function get_if_show_on_$page_id( \$cmb ) {\n\n";
				$template_metabox_start .= "\treturn TRUE;\n\n";
			$template_metabox_start .= "}\n\n";
			$template_metabox_start .= "function wpeb_template_posts() {\n\n";
				$template_metabox_start .= "\t\$object_type = array( 'post' );\n\n";
				$template_metabox_start .= "\t\$prefix = '_single-post_';\n";

			break;

		default: // page templates

			$template_metabox_start .= "add_action( 'cmb2_admin_init', 'wpeb_template_" . $page_template_name . "' );\n\n";
			$template_metabox_start .= "function get_if_show_on_$page_id( \$cmb ) {\n\n";
				$template_metabox_start .= "\treturn get_page_template_slug( \$cmb->object_id ) == 'page-templates/" . $page_template_name . ".php';\n\n";
			$template_metabox_start .= "}\n\n";
			$template_metabox_start .= "function wpeb_template_" . $page_template_name . "() {\n\n";
				$template_metabox_start .= "\t\$object_type = array( 'page' );\n\n";
				$template_metabox_start .= "\t\$prefix = '_" . $page_template_name . "_';\n\n";

			break;

	}

	$template_metabox_start .= "\t\$current_page_id = isset( \$_GET['post'] ) ? \$_GET['post'] : NULL;\n";

	return $template_metabox_start;

}

?>
