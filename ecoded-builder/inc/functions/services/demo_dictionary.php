<?php

function wpeb_demo_dictionary( $section_type_id, $key, $value, $real_data, $content, $is_gallery = FALSE, $is_group = FALSE ) {

	// // If not is header or footer get real data. Header and footer are not yet ready for real content
	// if( $section_type_id != 1 && $section_type_id != 2 ) {

	// 	// With isset will return false if property is null. For check only if the property exists in the object --> property_exists($ob, 'a')
	// 	if( isset( $real_data->$key ) ) {

	// 		// Change value with real content
	// 		$value = $real_data->$key;

	// 	}

	// 	// echo '<pre>';
	// 	// var_dump( $section_type_id );
	// 	// var_dump( $key );
	// 	// var_dump( $value );
	// 	// var_dump( $real_data );
	// 	// var_dump( $content );
	// 	// echo '</pre>';
	// 	// die;

	// }

	switch( $key ) {

		case ( strpos( $key, '_src' ) !== FALSE || strpos( $key, 'src_' ) !== FALSE ):

			// String to replace
			$str_to_replace = '{{' . $key . '}}';

			if( $is_gallery || strpos( $value, '/wp-content/uploads/' ) !== false ) {

				$content = str_replace( $str_to_replace, $value, $content );

			} else {

				// If the key has value in real_data and if not is header or footer get real data. Header and footer are not yet ready for real content
				// With isset will return false if property is null. For check only if the property exists in the object --> property_exists($ob, 'a')
				if( ( isset( $real_data->$key ) && !empty( $real_data->$key ) ) && ( $section_type_id != 1 && $section_type_id != 2 ) ) {

					// Change value with real content
					$value = $real_data->$key;

					$content = str_replace( $str_to_replace, $value, $content );

				} else { // Demo content

					// Get src rute ( without last directory )
					$src_rute      = WPEB_PLUGIN_SECTIONS_FRONT . 'assets/img/' . $value;
					$src_rute_back = WPEB_PLUGIN_SECTIONS_BACK . 'assets/img/' . $value;

					$content = file_exists( $src_rute_back ) ? str_replace( $str_to_replace, $src_rute, $content ) : str_replace( $str_to_replace, default_image_post( 'url' ), $content );

				}

			}

			break;

		case ( strpos( $key, '_icon' ) !== FALSE || strpos( $key, 'icon_' ) !== FALSE ):

			// String to replace
			$str_to_replace = '{{' . $key . '}}';

			$icon_content = '';

			// If the key has value in real_data and if not is header or footer get real data. Header and footer are not yet ready for real content
			// With isset will return false if property is null. For check only if the property exists in the object --> property_exists($ob, 'a')
			if( ( isset( $real_data->$key ) && !empty( $real_data->$key ) ) && ( $section_type_id != 1 && $section_type_id != 2 ) ) {

				// Change value with real content
				$icon_content = $real_data->$key;

			} elseif( strpos( $value, '<svg' ) !== false || strpos( $value, '<img' ) !== false ) { // The second conditional is for special cases in the builder when an template have conditional png / svg

				$icon_content = $value;

			} else { // Demo content

				// Get rute ( without last directory )
				$icon_rute      = WPEB_PLUGIN_SECTIONS_FRONT . 'assets/img/icons/' . $value;
				$icon_rute_back = WPEB_PLUGIN_SECTIONS_BACK . 'assets/img/icons/' . $value;

				$icon_content = file_exists( $icon_rute_back ) ? file_get_contents( $icon_rute, FILE_USE_INCLUDE_PATH ) : '';

				if( $is_group ) {

					$svg_tags = '<i class="ecode_article_image" data-edit="ecode_article_image">';
					$svg_tags .= $icon_content;
					$svg_tags .= '</i>';

					$icon_content = $svg_tags;

				}

			}

			$content = str_replace( $str_to_replace, $icon_content, $content );

			break;

		default:

			// String to replace
			$str_to_replace = '{{' . $key . '}}';

			// If the key has value in real_data and if not is header or footer get real data. Header and footer are not yet ready for real content
			// With isset will return false if property is null. For check only if the property exists in the object --> property_exists($ob, 'a')
			if( ( isset( $real_data->$key ) && !empty( $real_data->$key ) ) && ( $section_type_id != 1 && $section_type_id != 2 ) ) {

				// Change value with real content
				$value = $real_data->$key;

			}

			$content = str_replace( $str_to_replace, $value, $content );

			break;

	}

	return $content;

}

?>