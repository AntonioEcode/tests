<?php

// Get content scripts file
function wpeb_get_content_scripts( $scripts, $scripts_content ) {

	// Generate necessary scripts and return names group by page type
	$page_scripts = wpeb_generate_js_files( $scripts );

	foreach( $page_scripts as $page_type => $scripts_files_names ) {

		if( !empty( $scripts_files_names ) ) {

			// Add scripts condition for front-page
			if( $page_type == 'general' ) {

				$scripts_content .= "\t// General scripts\n";
				
			} elseif( $page_type == 'front-page' ) {

				$scripts_content .= "\tif( is_front_page() ) {\n\n";

			} elseif( $page_type == 'home' ) { // Add scripts condition for home

				$scripts_content .= "\tif( is_home() || is_category() ) {\n\n";

			} elseif( $page_type == 'single-post' ) { // Add scripts condition for single-post

				$scripts_content .= "\tif( is_single( \$current_id ) ) {\n\n";

			} else {

				$scripts_content .= "\tif( in_array( \$current_id,  wpeb_get_template_by_name( '$page_type', \$results = true ) ) ) {\n\n";

			}

			// Add scripts for specific page_type
			foreach( $scripts_files_names as $script_name ) {

				$scripts_content .= $page_type != 'general' ? "\t\tinclude_once( 'scripts/$script_name' );\n\n" : "\tinclude_once( 'scripts/$script_name' );\n";

			}

			// Close scripts condition for specific page type
			$scripts_content .= $page_type != 'general' ? "\t}\n\n" : "\n";

		}

	}

	return $scripts_content;

}

// Get section scripts content without duplicate ( base and libraries if is neccesary )
function wpeb_get_base_section_content_scripts( $section_id, $template_id, $scripts ) {

	// Add base section scripts if not already in the array
	$scripts = wpeb_add_base_section_scripts_content( $section_id, $template_id, $scripts );

	// Add from assets_config.json js of the libraries if have them
	$scripts = wpeb_add_library_scripts_content( $section_id, $template_id, $scripts );

	return $scripts;

}

// Add base section scripts if not already in the array
function wpeb_add_base_section_scripts_content( $section_id, $template_id, $scripts ) {

	// Unique key to know if the script of this template is already in the array.
	$template_script_key = $section_id . '-' . $template_id;

	// Get base section script if not already in the array
	if( !array_key_exists( $template_script_key, $scripts['sections_scripts'] ) ) {

		$base_script_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/js/scripts.min.js';
		$base_script_content = file_exists( $base_script_file ) ? file_get_contents( $base_script_file ) : FALSE;

		if( !empty( $base_script_content ) ) {

			$scripts['sections_scripts'][$template_script_key] = $base_script_content;

		}

	}

	return $scripts;

}

// Add from assets_config.json js of the libraries if have them
function wpeb_add_library_scripts_content( $section_id, $template_id, $scripts ) {

	// Get from assets_config.json css of the libraries if have them
	$assets_config_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/assets_config.json';
	$assets_config_json = file_exists( $assets_config_file ) ? file_get_contents( $assets_config_file ) : FALSE;

	if( $assets_config_json !== FALSE ) {

		$assets_config = json_decode( $assets_config_json, TRUE );

		if( !empty( $assets_config ) ) {

			if( array_key_exists( 'js', $assets_config ) ) {

				foreach( $assets_config['js'] as $library_js_file_name ) {

					// If already not exists, add it
					if( !array_key_exists( $library_js_file_name, $scripts['libraries_scripts'] ) ) {

						$js_library_file    = WPEB_PLUGIN_SECTIONS_BACK . 'assets/js/' . $library_js_file_name;
						$js_library_content = file_exists( $js_library_file ) ? file_get_contents( $js_library_file ) : FALSE;

						if( !empty( $js_library_content ) ) {

							$scripts['libraries_scripts'][$library_js_file_name] = $js_library_content;

						}

					}

				}

			}

		}

	}

	return $scripts;

}

// Generate each js file necessary for the theme in WPEB_THEME . 'template-parts/footer/scripts/' and return an array with page template and her scripts
function wpeb_generate_js_files( $scripts ) {

	$page_scripts = array();

	foreach( $scripts as $template_name => $scripts_data ) {

		// Array to add paths of necessary scripts for sections in this page
		$scripts_file_names = array();

		// If have sections scripts add it
		if( !empty( $scripts_data['libraries_scripts'] ) ) {

			foreach( $scripts_data['libraries_scripts'] as $library_name => $library_content ) {

				$scripts_file_names[] = wpeb_create_js_file( $library_name, $library_content, $js_type = 'library' );

			}

		}

		// If have sections scripts add it
		if( !empty( $scripts_data['sections_scripts'] ) ) {

			foreach( $scripts_data['sections_scripts'] as $section_name => $script_content ) {

				$scripts_file_names[] = wpeb_create_js_file( $section_name, $script_content, $js_type = 'template' );

			}

		}

		$page_scripts[$template_name] = $scripts_file_names;

	}

	return $page_scripts;

}

function wpeb_create_js_file( $dinamic_name, $js_content, $js_type ) {

	$script_name = 'js-' . $js_type . '-' . $dinamic_name  . '.min.php';
	$script_path = WPEB_THEME . 'template-parts/footer/scripts/' . $script_name;

	$script_file = fopen( $script_path, 'w+' );

	fwrite( $script_file, $js_content );
	fclose( $script_file );

	// Add current script name in scripts_file_names array for this page type
	return $script_name;

}

?>
