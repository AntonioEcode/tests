<?php

// Generate HTML with demo content to show it in the builder
function wpeb_get_html_demo( $page_id, $page_section_id, $section_type_id, $section_id, $template_id ) {

	// Get HTML file
	$html_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/html.php';
	$html_content = file_exists( $html_file ) ? file_get_contents( $html_file ) : FALSE;

	if( !empty( $html_content ) ) {

		$original_html_content = $html_content;

		// Get demo content
		$default_config_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/default_config.json';
		$default_config_content = file_exists( $default_config_file ) ? json_decode( file_get_contents( $default_config_file ), TRUE ) : NULL;
		$default_content        = ( $default_config_content !== NULL && array_key_exists( 'default_content', $default_config_content ) ) ? $default_config_content['default_content'] : NULL;

		// Delete all template keys {{php}} blocks
		while( !empty( $php_block = wpeb_get_content_matches( '{{php}}', '{{/php}}', $html_content ) ) ) {

			$html_content = str_replace( $php_block, '', $html_content );

		}

		// Remove template key on all {{builder}} blocks
		while( !empty( $builder_block = wpeb_get_content_matches( '{{builder}}', '{{/builder}}', $html_content ) ) ) {

			$builder_block_content = wpeb_get_content_matches( '{{builder}}', '{{/builder}}', $html_content, $without_template_key = 1 );

			$html_content = str_replace( $builder_block, $builder_block_content, $html_content );

		}

		// Replace template key {{page_section_id}}
		$html_content = str_replace( '{{page_section_id}}', $page_section_id, $html_content );

		if( !empty( $default_content ) ) {

			// Get real data if have
			$real_data = wpeb_get_real_data( $page_section_id, $page_id, $section_id, $template_id );

			foreach( $default_content as $key => $value ) {

				if( strpos( $key, '_loop' ) !== FALSE || strpos( $key, 'gallery' ) !== FALSE ) {

					$loop_start_open  = '{{' . $key . '_start}}';
					$loop_start_close = '{{/' . $key . '_start}}';
					$loop_end_open    = '{{' . $key . '_end}}';
					$loop_end_close   = '{{/' . $key . '_end}}';
					$loop_content     = trim( wpeb_get_content_matches( $loop_start_close, $loop_end_open, $html_content, $without_template_key = 1  ) );
					$html_to_search   = wpeb_get_content_matches( $loop_start_open, $loop_end_close, $html_content );

					// Get real key for loop cases. In real_data dont have '_loop' part, necessary remove it.
					$real_key = $key;

					if( strpos( $key, '_loop' ) !== FALSE ) {

						$real_key = str_replace( '_loop', '', $real_key );

					}

					$html_to_replace = '';

					$cont = 0;

					if( strpos( $key, 'gallery' ) !== FALSE && !empty( $real_data->$real_key ) ) {

						$html_to_replace_item = $loop_content;

						foreach( $real_data->$real_key as $element_value ) {

							// Get element_key from default content array because, in real content not have the element key, use the image id as array key
							$element_key = array_keys( $value[0] )[0];

							$new_html_to_replace = wpeb_demo_dictionary( $section_type_id, $element_key, $element_value, $real_data, $html_to_replace_item, $is_gallery = TRUE );

							$html_to_replace .= $new_html_to_replace;

						}

					} else {

						$cont_elements = 0;

						// Modify the iteration limit in case we have real content, in case it has fewer elements than the default.
						$end_elements = ( ( isset( $real_data->$real_key ) && !empty( $real_data->$real_key ) ) && ( $section_type_id != 1 && $section_type_id != 2 ) ) ? count( $real_data->$real_key ) : count( $value );

						foreach( $value as $elements ) {

							$html_to_replace_item = $loop_content;

							// Check and get real data if have
							if( $cont_elements == $end_elements ) {

								continue;

							}

							foreach( $elements as $element_key => $element_value ) {

								// Check and get real data if have
								if( ( isset( $real_data->$real_key ) && !empty( $real_data->$real_key ) ) && ( $section_type_id != 1 && $section_type_id != 2 ) ) {

									if( array_key_exists( $cont, $real_data->$real_key ) ) {

										if( array_key_exists( $element_key, $real_data->$real_key[$cont] ) ) {

											if( !empty( $real_data->$real_key[$cont][$element_key] ) ) {

												// If is svg type is necessary add HTML structure
												if( strpos( $element_key, '_svg_icon' ) !== false ) {

													$svg_tags = '<i class="ecode_article_image" data-edit="ecode_article_image">';
													$svg_tags .= $real_data->$real_key[$cont][$element_key];
													$svg_tags .= '</i>';

													$element_value = $svg_tags;

												} else {

													// When default content contain '<p>' we assume that we have to apply the_content filter
													// $element_value = $real_data->$real_key[$cont][$element_key];
													$element_value = strpos( $element_value, '<p>' ) !== false ? apply_filters( 'the_content', $real_data->$real_key[$cont][$element_key] ) : $real_data->$real_key[$cont][$element_key];

												}

											} else {

												$element_value = get_icon_image_special_case( $element_key, $real_data, $elements, $element_value, $real_key, $cont, $original_html_content );

											}

										} else {

											$element_value = get_icon_image_special_case( $element_key, $real_data, $elements, $element_value, $real_key, $cont, $original_html_content );

										}

									}

								}

								$html_to_replace_item = wpeb_demo_dictionary( $section_type_id, $element_key, $element_value, $real_data, $html_to_replace_item, $is_gallery = FALSE, $is_group = TRUE );

							}

							$html_to_replace .= $html_to_replace_item;

							$cont++;

							$cont_elements++;

						}

					}

					$html_content = str_replace( $html_to_search, $html_to_replace, $html_content );

				} else {

					$html_content = wpeb_demo_dictionary( $section_type_id, $key, $value, $real_data, $html_content );

				}

			}

		}

	}

	return !empty( $html_content ) ? $html_content: '';

}

function get_icon_image_special_case( $element_key, $real_data, $elements, $element_value, $real_key, $cont, $original_html_content ) {

	if( strpos( $element_key, '_svg_icon' ) !== false ) {

		// When is optional image or icon if the real content not is the default field obtain the other field.
		// To check use s7t9 for example and add in real content an image icon not svg

		// Generate the possible else key 'element_image_src' or 'card_image_src' or 'slide_image_src'
		$else_key = str_replace( '_svg_icon', '_image_src', $element_key );

		// In real content array not have '_src' part
		$else_key_real_content = str_replace( '_src', '', $else_key );

		// Key to faind in the html content
		$else_key_template = '{{' . $else_key . '}}';

		// Check if not exists in default content but exists in real data we assume that is the special case
		if(
			!array_key_exists( $else_key, $elements ) &&
			array_key_exists( $else_key_real_content, $real_data->$real_key[$cont] ) &&
			strpos( $original_html_content, $else_key_template ) !== false
		) {

			// If the conditional key have data, save the value with de HTML structure
			if( !empty( $real_data->$real_key[$cont][$else_key_real_content] ) ) {

				$img_tags = '<figure class="ecode_article_image" data-edit="ecode_article_image"><img src="';
				$img_tags .= $real_data->$real_key[$cont][$else_key_real_content];
				$img_tags .= '"></figure>';

				$element_value = $img_tags;

			}

		}

	} elseif( strpos( $element_key, '_image_src' ) !== false ) {

		$alternative_element_key = str_replace( '_image_src', '_image', $element_key );

		if( array_key_exists( $alternative_element_key, $real_data->$real_key[$cont] ) ) {

			if( !empty( $real_data->$real_key[$cont][$alternative_element_key] ) ) {

				$element_value = $real_data->$real_key[$cont][$alternative_element_key];

			}

		}

	}

	return $element_value;

}

?>
