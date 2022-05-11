<?php

// Get metabox content
function wpeb_get_content_page_template( $page_template_name, $page_section_id, $section_type_id, $section_id, $template_id, $page_template_content ) {

	// Generate template part content
	$template_part_content = wpeb_generate_template_part_content( $page_template_name, $page_section_id, $section_id, $template_id );

	// If current section is header or footer
	if( $section_type_id == '1' || $section_type_id == '2' ) {

		// Generate footer template part file
		generate_template_part_content_footer_header_file( $section_type_id, $template_part_content );

	} else {

		// Generate template part file
		generate_template_part_file( $page_template_name, $page_section_id, $section_id, $template_id, $template_part_content );

		// Add include for the new template-part
		$page_template_content .= "get_template_part( 'template-parts/$page_template_name/content', '$page_section_id' );\n";

	}

	return $page_template_content;

}

// Generate template part with the template
function wpeb_generate_template_part_content( $page_template_name, $page_section_id, $section_id, $template_id ) {

	$template_file         = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/html.php';
	$template_part_content = file_exists( $template_file ) ? file_get_contents( $template_file ) : FALSE;

	if( !empty( $template_part_content ) ) {

		// Remove template key {{php}} {{/php}} for the inside content
		while( !empty( $php_block = wpeb_get_content_matches( '{{php}}', '{{/php}}', $template_part_content ) ) ) {

			$php_block_content = wpeb_get_content_matches( '{{php}}', '{{/php}}', $template_part_content, $without_template_key = 1 );

			$template_part_content = str_replace( $php_block, $php_block_content, $template_part_content );

		}

		// Delete all template keys {{builder}} blocks ( inside content included )
		while( !empty( $builder_block = wpeb_get_content_matches( '{{builder}}', '{{/builder}}', $template_part_content ) ) ) {

			$template_part_content = str_replace( $builder_block, '', $template_part_content );

		}

		// Replace template key {{template_name}}
		$template_part_content = str_replace( '{{template_name}}', $page_template_name, $template_part_content );

		// Replace template key {{page_section_id}}
		$template_part_content = str_replace( '{{page_section_id}}', $page_section_id, $template_part_content );

		// Replace template key {{section_id}}
		$template_part_content = str_replace( '{{section_id}}', $section_id, $template_part_content );

		// Replace template key {{template_id}}
		$template_part_content = str_replace( '{{template_id}}', $template_id, $template_part_content );

		// Replace template key with echo variable or white space if is a template key for loops
		while( !empty( $variable_to_print = wpeb_get_content_matches( '{{', '}}', $template_part_content, $without_template_key = 1 ) ) ) {

			$key_template = '{{' . $variable_to_print . '}}';

			if( strpos( $variable_to_print, '_loop_' ) !== FALSE || strpos( $variable_to_print, 'gallery' ) !== FALSE ) {

				$template_part_content = str_replace( $key_template, '', $template_part_content );

			} else {

				// Check if this template is ready for global content to use $data-> or not
				if( check_is_global_template( $section_id, $template_id ) ) {

					if( strpos( $variable_to_print, 'slide_' ) !== FALSE || strpos( $variable_to_print, 'card_' ) !== FALSE || strpos( $variable_to_print, 'element_' ) !== FALSE ) {

						$echo_variable = "<?php echo \$$variable_to_print; ?>";

					} else {

						$echo_variable = "<?php echo \$data->$variable_to_print; ?>";						

					}

				} else {

					$echo_variable = "<?php echo \$$variable_to_print; ?>";

				}

				$template_part_content = str_replace( $key_template, $echo_variable, $template_part_content );

			}

		}

	}

	return $template_part_content;

}

// Generate template part file
function generate_template_part_file( $page_template_name, $page_section_id, $section_id, $template_id, $template_part_content ) {

	// Directory path
	$templates_parts_dir = WPEB_THEME . 'template-parts/' . $page_template_name;

	// If directory not exists create it
	if( !file_exists( $templates_parts_dir ) && !is_dir( $templates_parts_dir ) ) {

		mkdir( $templates_parts_dir, 0755 );

	}

	// Template part path
	$template_part_path = $templates_parts_dir . '/content-' . $page_section_id . '.php';

	// Generate template part file
	$template_part_file = fopen( $template_part_path, 'w+' );

	// Add content
	fwrite( $template_part_file, $template_part_content );
	fclose( $template_part_file );

}

// Generate template part content footer file
function generate_template_part_content_footer_header_file( $section_type_id, $template_part_content ) {

	// If == '1' header else footer
	if( $section_type_id == '1' ) {

		// Header emplate part path
		$template_part_path =  WPEB_THEME . 'template-parts/header/content-header.php';

	} else {

		// Footer emplate part path
		$template_part_path =  WPEB_THEME . 'template-parts/footer/content-footer.php';

	}

	// Generate template part file
	$template_part_file = fopen( $template_part_path, 'w+' );

	// Add content
	fwrite( $template_part_file, $template_part_content );
	fclose( $template_part_file );

}

?>
