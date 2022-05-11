<?php

// Get content for /theme/functions/remove-editor.php file
function wpeb_get_remove_editor_content( $pages_templates ) {

	$remove_editor_content = "<?php \n\n";

	if( !empty( $pages_templates ) ) {

		// If the front-page template exists in the array, add its code block and remove of the array
		if( ( $front_page_key = array_search( 'front-page', $pages_templates ) ) !== false ) {

			$remove_editor_content .= "// Delete Home Editor\n";
			$remove_editor_content .= "add_action( 'admin_init', 'wpeb_hide_editor' );\n\n";
			$remove_editor_content .= "function wpeb_hide_editor() {\n\n";
				$remove_editor_content .= "\tif( !empty( \$_GET['post'] ) || !empty( \$_POST['post_ID'] ) ) {\n\n";
					// $remove_editor_content .= "\t\t\$post_id = \$_GET['post'] ? \$_GET['post'] : \$_POST['post_ID'];\n\n";
					$remove_editor_content .= "\t\t\$post_id = isset( \$_GET['post'] ) && !empty( \$_GET['post'] ) ? \$_GET['post'] : \$_POST['post_ID'];\n\n";
					$remove_editor_content .= "\t\tif( get_option( 'page_on_front' ) == \$post_id ) {\n\n";
						$remove_editor_content .= "\t\t\tremove_post_type_support( 'page', 'editor' );\n\n";
					$remove_editor_content .= "\t\t}\n\n";
				$remove_editor_content .= "\t}\n\n";
			$remove_editor_content .= "}\n\n";

			// Remove 'front-page' of the array
			unset( $pages_templates[$front_page_key] );

			// Re-indexed array
			$pages_templates = array_values( $pages_templates );

		}

		// Add each created template to remove editor
		if( !empty( $pages_templates ) ) {

			$remove_editor_content .= "// Remove editor in pages templates\n";
			$remove_editor_content .= "add_action( 'add_meta_boxes', 'wpeb_remove_pages_editor' );\n\n";
			$remove_editor_content .= "function wpeb_remove_pages_editor() {\n\n";
				$remove_editor_content .= "\tglobal \$wpdb;\n\n";
				$remove_editor_content .= "\t\$query_results = \$wpdb->get_results( \"SELECT ID, post_title as plantilla\n";
					$remove_editor_content .= "\t\tFROM \$wpdb->posts p\n";
					$remove_editor_content .= "\t\tWHERE p.ID IN (\n";
						$remove_editor_content .= "\t\t\tSELECT post_id\n";
						$remove_editor_content .= "\t\t\tFROM \$wpdb->postmeta\n";
						$remove_editor_content .= "\t\t\tWHERE meta_key = '_wp_page_template'\n";

						for( $i = 0; $i < count( $pages_templates ); $i++ ) { 

							if( $i == 0 ) {

								$remove_editor_content .= "\t\t\tAND (meta_value = 'page-templates/" . $pages_templates[$i] . ".php'\n";

							} else {

								if( $pages_templates[$i] != 'single-post' ) {

									$remove_editor_content .= "\t\t\t\tOR meta_value = 'page-templates/" . $pages_templates[$i] . ".php'\n";

								}

							}

						}

						$remove_editor_content .= "\t\t\t)\n";
					$remove_editor_content .= "\t\t)\", ARRAY_A );\n\n";
				$remove_editor_content .= "\t\$page_ids = array();\n\n";
				$remove_editor_content .= "\tforeach( \$query_results as \$result ) {\n\n";
					$remove_editor_content .= "\t\tarray_push( \$page_ids, \$result['ID'] );\n\n";
				$remove_editor_content .= "\t}\n\n";
				$remove_editor_content .= "\t\$page_ids_without_editor = \$page_ids;\n\n";
				$remove_editor_content .= "\tforeach( \$page_ids_without_editor as \$id ) {\n\n";
					$remove_editor_content .= "\t\tif( get_the_ID() == \$id ) {\n\n";
						$remove_editor_content .= "\t\t\tremove_post_type_support( 'page', 'editor' );\n\n";
					$remove_editor_content .= "\t\t}\n\n";
				$remove_editor_content .= "\t}\n\n";
			$remove_editor_content .= "}\n";

		}

	}

	$remove_editor_content .= "\n?>";

	return $remove_editor_content;

}

?>