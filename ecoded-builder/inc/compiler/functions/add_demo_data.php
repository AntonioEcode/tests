<?php

// Function to add demo data in the compiler
function wpeb_add_demo_data( $pages_sections_grouped ) {

	if( !empty( $pages_sections_grouped ) ) {

		// Foreach page compiled
		foreach( $pages_sections_grouped as $page_id => $page_data ) {

			// Post ID of the generated page
			// $wp_page_id    = $page_data['wp_page_id'];
			$template_name = $page_data['template_name'];

			// Get 'wpeb_%template_name%' with already exist template fields
			$existing_template_fields = !empty( get_option( 'wpeb_' . $template_name ) ) ? maybe_unserialize( get_option( 'wpeb_' . $template_name ) ) : array();

			// Create an array for new fields ( 'wpeb_' . $template_name -> it is updated at the end, when the data is uploaded to all pages with the same template. )
			$new_template_fields = array();

			// Get all post ids with the same template to update all
			$page_ids_by_template = array();

			if( $template_name == 'front-page' ) {

				$page_ids_by_template = array( get_option( 'page_on_front' ) );

			} elseif( $template_name == 'home' ) {

				$page_ids_by_template = array( get_option( 'page_for_posts' ) );

			} elseif( $template_name == 'single-post' ) {

				$page_ids_by_template = get_posts( array(
											'fields'         => 'ids',
											'posts_per_page' => -1
										));

			} else {

				// Get page ids with the same template
				$page_ids_by_template = wpeb_get_template_by_name( $template_name, $results = TRUE );

			}

			// if( !empty( $wp_page_id ) ) {
			if( !empty( $page_ids_by_template ) ) {

				// Foreach page with the current template add the data
				foreach( $page_ids_by_template as $wp_page_id ) {

					// Foreach section of the current page
					foreach( $page_data['sections_data'] as $page_section_data ) {

						$section_type_id = $page_section_data['section_type_id'];

						// In this moment header and footer will not be processed until a new version is released.
						if( $section_type_id != 1 && $section_type_id != 2 ) {

							$page_section_id = $page_section_data['page_section_id'];
							$section_id      = $page_section_data['section_id'];
							$template_id     = $page_section_data['section_template_id'];

							// Get demo content
							$default_config_file    = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/default_config.json';
							$default_config_content = file_exists( $default_config_file ) ? json_decode( file_get_contents( $default_config_file ), TRUE ) : NULL;
							$default_content        = ( $default_config_content !== NULL && array_key_exists( 'default_content', $default_config_content ) ) ? $default_config_content['default_content'] : NULL;
							$skip_demo_content      = ( $default_config_content !== NULL && array_key_exists( 'skip_demo_content', $default_config_content ) ) ? $default_config_content['skip_demo_content'] : array();

							if( !empty( $default_content ) ) {

								// Foreach custom field
								foreach( $default_content as $key => $value ) {

									// Check if current content is for demo data
									if( !in_array( $key, $skip_demo_content ) ) {

										if( $key == 'gallery' ) {

											// Ex: _front-page_gallery_4
											$meta_key = '_' . $template_name . '_' . $key . '_' . $page_section_id;

											// If the field is empty construct group array data, serialize and update_post_meta
											if( !get_post_meta( $wp_page_id, $meta_key, TRUE ) ) {

												$gallery_data = array();

												// Foreach of each image in the group
												foreach( $value as $fields_data ) {

													foreach( $fields_data as $field_key => $field_value ) {

														$image_data = wpeb_add_demo_data_dictionary( $template_name, $page_section_id, $field_key, $field_value, $wp_page_id, $existing_template_fields, $new_template_fields, $is_group = TRUE, $gallery_data );

														if( !empty( $image_data ) ) {

															$image_id = '';
															$image_src = '';

															foreach( $image_data as $image_key => $image_value ) {

																if( strpos( $image_key, '_id' ) !== FALSE ) {

																	$image_id = $image_value;

																} else {

																	$image_src = $image_value;

																}

															}

															if( !empty( $image_id ) && !empty( $image_src ) ) {

																$gallery_data[$image_id] = $image_src;

															}

														}

													}

												}

												if( !wpeb_check_meta_key_already_exits( $meta_key, $existing_template_fields, $new_template_fields ) ) {

													update_post_meta( $wp_page_id, $meta_key, $gallery_data );

												}

											}

										} elseif( strpos( $key, '_loop' ) !== FALSE ) { // Groups

											$real_key = str_replace( '_loop', '', $key );

											// Ex: _front-page_cards_group_3
											$meta_key = '_' . $template_name . '_' . $real_key . '_' . $page_section_id;

											// If the field is empty construct group array data, serialize and update_post_meta
											if( !get_post_meta( $wp_page_id, $meta_key, TRUE ) ) {

												$group_data = array();

												// Foreach of each item in the group
												foreach( $value as $fields_data ) {

													$group_item_data = array();

													// Foreach of each filed in the group item
													foreach( $fields_data as $field_key => $field_value ) {

														// Check if current content is for demo data
														if( !in_array( $field_key, $skip_demo_content ) ) {

															$group_item_data = wpeb_add_demo_data_dictionary( $template_name, $page_section_id, $field_key, $field_value, $wp_page_id, $existing_template_fields, $new_template_fields, $is_group = TRUE, $group_item_data );

														}

													}

													if( !empty( $group_item_data ) ) {

														$group_data[] = $group_item_data;

													}

												}

												if( !empty( $group_data ) ) {

													// Check if not exist in existing_template_fields
													if( !wpeb_check_meta_key_already_exits( $meta_key, $existing_template_fields, $new_template_fields ) ) {

														update_post_meta( $wp_page_id, $meta_key, $group_data );

													}

												}

											}

										} else {

											wpeb_add_demo_data_dictionary( $template_name, $page_section_id, $key, $value, $wp_page_id, $existing_template_fields, $new_template_fields );

										}

									}

								}

							}

						}

					}

				}

			}

			// Update 'wpeb_%template_name%'
			if( !empty( $new_template_fields ) ) {

				$all_existing_template_fields = array_merge( $existing_template_fields, $new_template_fields );
				
				update_option( 'wpeb_' . $template_name, maybe_serialize( $all_existing_template_fields ) );

			}

		}

	}

}

// Function to add demo content in the DB depending on the type of content
function wpeb_add_demo_data_dictionary( $template_name, $page_section_id, $key, $value, $wp_page_id, $existing_template_fields, &$new_template_fields, $is_group = FALSE, $group_item_data = NULL ) {

	switch( $key ) {

		case ( strpos( $key, '_src' ) !== FALSE ):

			$file = WPEB_PLUGIN_SECTIONS_BACK . 'assets/img/' . $value;

			$image_data = wpeb_upload_image_to_media( $file );

			if( !empty( $image_data ) ) {

				$real_key = str_replace( '_src', '', $key );

				// Ex: _front-page_image_hd_2
				$image_meta_key = !$is_group ? '_' . $template_name . '_' . $real_key . '_' . $page_section_id : $real_key;

				// Ex: Ej: _front-page_image_hd_2_id
				$image_id_meta_key = $image_meta_key . '_id';

				if( $is_group ) {

					$group_item_data[$image_id_meta_key] = $image_data['image_id'];
					$group_item_data[$image_meta_key] = $image_data['image_src'];

				} else {

					// Check if not exist in existing_template_fields
					if( !wpeb_check_meta_key_already_exits( $image_id_meta_key, $existing_template_fields, $new_template_fields ) ) {
					
						// If the field is empty save demo data
						if( !get_post_meta( $wp_page_id, $image_id_meta_key, TRUE ) && !empty( $image_data['image_id'] ) ) {

							update_post_meta( $wp_page_id, $image_id_meta_key, $image_data['image_id'] );

						}

					}

					// Check if not exist in existing_template_fields
					if( !wpeb_check_meta_key_already_exits( $image_meta_key, $existing_template_fields, $new_template_fields ) ) {

						// If the field is empty save demo data
						if( !get_post_meta( $wp_page_id, $image_meta_key, TRUE )  && !empty( $image_data['image_src'] ) ) {

							update_post_meta( $wp_page_id, $image_meta_key, $image_data['image_src'] );

						}

					}

				}

			}

			break;

		case ( strpos( $key, '_icon' ) !== FALSE ):

			$meta_key = !$is_group ? '_' . $template_name . '_' . $key . '_' . $page_section_id : $key;

			// Get rute ( without last directory )
			$icon_rute      = WPEB_PLUGIN_SECTIONS_FRONT . 'assets/img/icons/' . $value;
			$icon_rute_back = WPEB_PLUGIN_SECTIONS_BACK . 'assets/img/icons/' . $value;

			$icon_content = file_exists( $icon_rute_back ) ? file_get_contents( $icon_rute, FILE_USE_INCLUDE_PATH ) : '';

			if( $is_group ) {

				$group_item_data[$meta_key] = $icon_content;

			} else {

				// Check if not exist in existing_template_fields
				if( !wpeb_check_meta_key_already_exits( $meta_key, $existing_template_fields, $new_template_fields ) ) {

					// If the field is empty save demo data
					if( !get_post_meta( $wp_page_id, $meta_key, TRUE ) ) {

						// Save demo content
						update_post_meta( $wp_page_id, $meta_key, $icon_content );

					}

				}

			}

			break;

		case ( strpos( $key, '_alt' ) !== FALSE ):

			// Nothing to do

			break;

		default:

			$meta_key = !$is_group ? '_' . $template_name . '_' . $key . '_' . $page_section_id : $key;

			if( $is_group ) {

				$group_item_data[$meta_key] = $value;

			} else {

				// Check if not exist in existing_template_fields
				if( !wpeb_check_meta_key_already_exits( $meta_key, $existing_template_fields, $new_template_fields ) ) {

					// If the field is empty save demo data
					if( !get_post_meta( $wp_page_id, $meta_key, TRUE ) ) {

						update_post_meta( $wp_page_id, $meta_key, $value );

					}

				}

			}

			break;

	}

	if( $is_group ) {

		return $group_item_data;

	}

}

// Check if field meta_key already exits in template
function wpeb_check_meta_key_already_exits( $meta_key, $existing_template_fields, &$new_template_fields ) {

	$already_exist = TRUE;

	// If not exist return false and add to $new_template_fields
	if( !in_array( $meta_key, $existing_template_fields ) ) {

		$already_exist = FALSE;

		$new_template_fields[] = $meta_key;

	}

	return $already_exist;

}

?>