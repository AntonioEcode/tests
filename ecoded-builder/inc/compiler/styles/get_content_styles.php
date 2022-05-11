<?php

// Get style content file
function wpeb_get_content_styles( $styles, $styles_content ) {

	// Add sections base styles
	$styles_content .= "/* SECTION STYLES */\n";

	foreach( $styles['sections_styles'] as $section_key => $section_style ) {

		$styles_content .= "/* SECTION $section_key */\n";
		$styles_content .= $section_style;

	}

	// Add libraries styles
	$styles_content .= "/* LIBRARIES STYLES */\n";

	foreach( $styles['libraries_styles'] as $library_style ) {

		$styles_content .= $library_style;

	}

	// Add custom styles
	$styles_content .= "/* CUSTOM STYLES */\n";

	foreach( $styles['custom_styles'] as $page_section_key => $custom_style ) {

		$styles_content .= "/* PAGE SECTION $page_section_key */\n";
		$styles_content .= $custom_style;

	}

	return $styles_content;

}

// Get base section styles content without duplicate ( base and libraries if is neccesary )
function wpeb_get_base_section_content_styles( $section_id, $template_id, $styles ) {

	// Add base section style if not already in the array
	$styles = wpeb_add_base_section_style_content( $section_id, $template_id, $styles );

	// Add from assets_config.json css of the libraries if have them
	$styles = wpeb_add_library_style_content( $section_id, $template_id, $styles );

	// Add from assets_config.json icons if have them
	wpeb_add_icons_content( $section_id, $template_id );

	return $styles;

}

// Add base section style if not already in the array
function wpeb_add_base_section_style_content( $section_id, $template_id, $styles ) {

	// Unique key to know if the style of this template is already in the array.
	$template_style_key = $section_id . '.' . $template_id;

	// Get base section style if not already in the array
	if( !array_key_exists( $template_style_key, $styles['sections_styles'] ) ) {

		$base_style_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/css/style.css';
		$base_style_content = file_exists( $base_style_file ) ? file_get_contents( $base_style_file ) : FALSE;

		if( !empty( $base_style_content ) ) {

			$styles['sections_styles'][$template_style_key] = $base_style_content;

		}

	}

	return $styles;

}

// Add from assets_config.json css of the libraries if have them
function wpeb_add_library_style_content( $section_id, $template_id, $styles ) {

	// Get from assets_config.json css of the libraries if have them
	$assets_config_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/assets_config.json';
	$assets_config_json = file_exists( $assets_config_file ) ? file_get_contents( $assets_config_file ) : FALSE;

	if( $assets_config_json !== FALSE ) {

		$assets_config = json_decode( $assets_config_json, TRUE );

		if( !empty( $assets_config ) ) {

			if( array_key_exists( 'css', $assets_config ) ) {

				foreach( $assets_config['css'] as $library_css_file_name ) {

					// If already not exists, add it
					if( !array_key_exists( $library_css_file_name, $styles['libraries_styles'] ) ) {

						$css_library_file    = WPEB_PLUGIN_SECTIONS_BACK . 'assets/css/' . $library_css_file_name;
						$css_library_content = file_exists( $css_library_file ) ? file_get_contents( $css_library_file ) : FALSE;

						if( !empty( $css_library_content ) ) {

							$styles['libraries_styles'][$library_css_file_name] = $css_library_content;

						}

					}

				}

			}

		}

	}

	return $styles;

}

// Add from assets_config.json icons if have them
function wpeb_add_icons_content( $section_id, $template_id ) {

	// Get from assets_config.json icons if have them
	$assets_config_file = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/assets_config.json';
	$assets_config_json = file_exists( $assets_config_file ) ? file_get_contents( $assets_config_file ) : FALSE;

	if( $assets_config_json !== FALSE ) {

		$assets_config = json_decode( $assets_config_json, TRUE );

		if( !empty( $assets_config ) ) {

			if( array_key_exists( 'icons', $assets_config ) ) {

				$theme_img_dir   = WPEB_THEME . 'img';
				$theme_icons_dir = WPEB_THEME . 'img/icons';

				// If img directory not exists create it
				if( !file_exists( $theme_img_dir ) && !is_dir( $theme_img_dir ) ) {

					mkdir( $theme_img_dir, 0755 );

				}

				// If icons directory not exists create it
				if( !file_exists( $theme_icons_dir ) && !is_dir( $theme_icons_dir ) ) {

					mkdir( $theme_icons_dir, 0755 );

				}

				// For each icons necessary for this section, copy to the theme img directory
				foreach( $assets_config['icons'] as $icon_file_name ) {

					// Original icon
					$icon_file_path = WPEB_PLUGIN_SECTIONS_BACK . 'assets/img/icons/' . $icon_file_name;

					// Icon for the compile theme
					$theme_icon_file_path = WPEB_THEME . '/img/icons/' . $icon_file_name;

					// Copy the icon to the compile theme
					copy( $icon_file_path, $theme_icon_file_path );

				}

			}

		}

	}

}

// Get custom styles
function wpeb_get_custom_content_styles( $page_id, $styles ) {

	// Get from custom_compile_style_{page_id}.json custom css
	$custom_compile_style_file = WPEB_PLUGIN_CUSTOM . 'custom_compile_style_' . $page_id . '.json';
	$custom_compile_style_json = file_exists( $custom_compile_style_file ) ? file_get_contents( $custom_compile_style_file ) : FALSE;

	if( $custom_compile_style_json !== FALSE ) {

		$custom_compile_style = json_decode( $custom_compile_style_json, TRUE );

		if( !empty( $custom_compile_style ) ) {

			foreach( $custom_compile_style as $page_section_id => $custom_style ) {

				if( !empty( $custom_style ) ) {

					$styles['custom_styles'][$page_section_id] = $custom_style;

				}

			}

		}

	}

	return $styles;

}

?>
