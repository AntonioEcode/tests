<?php

// Function that is executed when the plugin is installed
function wpeb_activate_ecoded_builder() {

	// If not exists create base theme in /wp-content/themes/
	wpeb_create_base_ecodethemes( WPEB_THEME, WP_CONTENT_DIR . '/themes/', 'ecodetheme.zip' );

	// If not exists create base theme in /wp-content/plugins/ecoded_builder/
	wpeb_create_base_ecodethemes( WPEB_PLUGIN_THEME, WPEB_PLUGIN_DIR . '/', 'themeinplugin.zip' );

	// Select base theme
	switch_theme( 'ecodetheme' );

	// Change permalinks config
	wpeb_change_permalinks_to_post_name();

	// Create plugin tables
	wpeb_create_init_tables();

	// Check if the inserts are already made
	if( !get_option( 'wpeb_table_inserts_ready' ) ) {

		// Get inserts tablets
		$inserts_tables_db = wpeb_read_config_db();

		// Insert DB data
		foreach( $inserts_tables_db['tables'] as $table_name => $inserts_data ) {

			wpeb_insert_data( $table_name, $inserts_data );

		}

		// Save a token that we have already made the inserts and not to execute them again when activating the plugin again.
		add_option( 'wpeb_table_inserts_ready', '1', '', 'yes' );

	}

	// Get the different templates of the contracted plan and create her page-templates and demo base pages
	$page_templates = wpeb_get_page_types( $id = NULL, $order = NULL );

	// Create page templates and demo menú
	if( !empty( $page_templates ) && !get_option( 'wpeb_base_pages_menu_ready' ) ) {

		// Array to save created pages and add in the menú
		$nav_menu_pages = array();

		// Create base pages
		wpeb_create_base_page_templates( $page_templates, $nav_menu_pages );

		// Create base nav menu
		if( !empty( $nav_menu_pages ) ) {

			wpeb_create_nav_menu_items( $nav_menu_pages, $menu_name = 'Menú principal' );
			wpeb_create_nav_menu_items( $nav_menu_pages, $menu_name = 'Menú footer' );
			wpeb_create_nav_menu_items( $nav_menu_pages = array(), $menu_name = 'Menú sidebar' );

		}

		// Save a token that we have already made the inserts and not to execute them again when activating the plugin again.
		add_option( 'wpeb_base_pages_menu_ready', '1', '', 'yes' );

	}

	// Create demo global settings
	wpeb_create_demo_global_settings();

	// Check if exists global styles or set default styles
	wpeb_check_global_styles();

	// Download and install necessary plugins
	wpeb_install_plugins();

	// Set current plugin version to wp_options
	update_option( 'ecoded_version', WPEB_VERSION );

}

// Function to create ecode themes base if not exists
function wpeb_create_base_ecodethemes( $theme_path, $theme_directory, $zip_file ) {

	// If directory not exists create it
	if( !file_exists( $theme_path ) && !is_dir( $theme_path ) ) {

		$zip = new ZipArchive;
		$res = $zip->open( WPEB_PLUGIN_CONFIG . $zip_file );

		if( $res === TRUE ) {

			for( $i = 0; $i < $zip->numFiles; $i++ ) {

				$zip->extractTo( $theme_directory );

			}

			$zip->close();

		}

		ecode_rmdir( $theme_directory . '__MACOSX' );

	}

}

// Function to change permalinks to /post-name/
function wpeb_change_permalinks_to_post_name() {

	global $wp_rewrite;

	// Write the rule
	$wp_rewrite->set_permalink_structure( '/%postname%/' );

	// Set the option
	update_option( 'rewrite_rules', FALSE );

	// Flush the rules and tell it to write htaccess
	$wp_rewrite->flush_rules( TRUE );

}

// Create base page-templates and demo base pages with her template assigned
function wpeb_create_base_page_templates( $page_templates, &$nav_menu_pages ) {

	// Page-template functions
	require_once WPEB_PLUGIN_COMPILER . 'page-template/get_start_page_template.php';
	require_once WPEB_PLUGIN_COMPILER . 'page-template/get_end_page_template.php';
	require_once WPEB_PLUGIN_COMPILER . 'page-template/generate_page_template.php';

	// Create each page template
	foreach( $page_templates as $template_data ) {

		$page_template_content = '';

		// Start page-template file
		$page_template_content = wpeb_get_start_page_template( $template_data->name, $template_data->template_name );

		// End page template file
		$page_template_content = wpeb_get_end_page_template( $page_template_content );

		// Generate page template file
		wpeb_generate_page_template( $template_data->template_name, $page_template_content );

		$page_template_file = '';

		// If is a normal page template get name
		if( $template_data->template_name != 'front-page' && $template_data->template_name != 'home' && $template_data->template_name != 'single-post' ) {

			$page_template_file = 'page-templates/' . $template_data->template_name . '.php';

		}

		if( $template_data->template_name != 'single-post' ) {

			// Create de base page with template assigned
			$post_config = array(
				'post_title' => $template_data->name,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_type' => 'page'
			);

			$new_page_id = '';
			$new_page_id = wp_insert_post( $post_config );

			update_post_meta( $new_page_id, '_wp_page_template', $page_template_file );

			// Save in eb_pages
			wpeb_update_wp_page_id( $template_data->id, $new_page_id );

			// If the status for this template is trash, send to trash
			if( $template_data->template_status == 'trash' ) {

				wp_trash_post( $new_page_id );

			}

			// If the new post is created, update 'wp_page_id' in 'wp_eb_pages'
			if( !empty( $new_page_id ) && $template_data->template_status != 'trash' ) {

				// If is front-page page, select in settings
				if( $template_data->template_name == 'front-page' ) {

					// Select front-page page
					update_option( 'page_on_front', $new_page_id );

					// Select specific page for home and blog ( Settingd -> Reading in dashboard )
					update_option( 'show_on_front', 'page' );

				}

				// If is blog page, select in settings
				if( $template_data->template_name == 'home' ) {

					// Select blog page
					update_option( 'page_for_posts', $new_page_id );

					// Select specific page for home and blog ( Settingd -> Reading in dashboard )
					update_option( 'show_on_front', 'page' );

				}

				// Add in nav menu array
				if( $template_data->template_name != 'front-page' && $template_data->template_name != 'home' ) {

					if( $template_data->in_nav_menu ) {

						$nav_menu_pages[$template_data->nav_menu_order] = array(
							'name' => $template_data->name,
							'url'  => get_permalink( $new_page_id )
						);

					}

				} else {

					if( $template_data->template_name == 'front-page' ) {

						$nav_menu_pages[$template_data->nav_menu_order] = array(
							'name' => $template_data->name,
							'url'  => get_home_url( '/' )
						);

					} elseif( $template_data->template_name == 'home' ) {

						$nav_menu_pages[$template_data->nav_menu_order] = array(
							'name' => $template_data->name,
							'url'  => get_permalink( get_option( 'page_for_posts' ) )
						);

					}

				}

			}

		}

	}

}

// Create demo nav menu items
function wpeb_create_nav_menu_items( $nav_menu_pages, $menu_name ) {

	$menu_exists = wp_get_nav_menu_object( $menu_name );

	// If it doesn't exist, let's create it.
	if( !$menu_exists ) {

		$menu_id = wp_create_nav_menu( $menu_name );

		if( !empty( $nav_menu_pages ) ) {

			// Order array by 'nav_menu_order' ( KEY )
			ksort( $nav_menu_pages );

			// Set up default menu items
			foreach( $nav_menu_pages as $item_data ) {

				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'   => $item_data['name'],
					'menu-item-url'     => $item_data['url'],
					'menu-item-status'  => 'publish'
				) );

			}

		}

	}

}

// Delete hidden folders
function ecode_rmdir( $src ) {

    $dir = opendir( $src );

    while( false !== ( $file = readdir( $dir ) ) ) {

        if( ( $file != '.' ) && ( $file != '..' ) ) {

            $full = $src . '/' . $file;

            if ( is_dir( $full ) ) {

                ecode_rmdir( $full );

            } else {

                unlink( $full );

            }

        }

    }

    closedir( $dir );

    rmdir( $src );

}

// Function to create demo global settings
function wpeb_create_demo_global_settings() {

	// Get 'config_global_settings.json'
	$config_global_settings_path = WPEB_PLUGIN_CONFIG . 'config_global_settings.json';
	$global_settings = file_exists( $config_global_settings_path ) ? json_decode( file_get_contents( $config_global_settings_path ) ) : array();

	// Get custom config for global settings
	$custom_config_global_settings_path = WP_PLUGIN_DIR . '/ecoded_builder/config/custom/config_global_settings.json';
	$custom_global_settings = file_exists( $custom_config_global_settings_path ) ? json_decode( file_get_contents( $custom_config_global_settings_path ) ) : array();

	// For each base config and check if has custom and save base or custom
	foreach( $global_settings as $global_setting_key => $global_setting_value ) {

		if( array_key_exists( $global_setting_key, (array)$custom_global_settings )
			&& !empty( $custom_global_settings->$global_setting_key )
		) {

			$global_setting_value = $custom_global_settings->$global_setting_key;

		}

		add_option( $global_setting_key, $global_setting_value, '', 'yes' );

	}

}

// Function to check if already exists global styles or create it
function wpeb_check_global_styles() {

	// Get 'config_global_styles.json'
	$config_global_styles_path = WPEB_PLUGIN_CONFIG . 'config_global_styles.json';

	$config_global_styles = file_exists( $config_global_styles_path ) ? json_decode( file_get_contents( $config_global_styles_path ) ) : array();

	// Get 'custom/config_global_styles.json'
	$custom_config_global_styles_path = WPEB_PLUGIN_CONFIG . 'custom/config_global_styles.json';

	$custom_config_global_styles = file_exists( $custom_config_global_styles_path ) ? json_decode( file_get_contents( $custom_config_global_styles_path ) ) : array();

	// Get each config and save it
	foreach( $config_global_styles as $global_style_key => $global_style_value ) {

		// If have custom config save this
		if( array_key_exists( $global_style_key, (array)$custom_config_global_styles ) && !empty( $custom_config_global_styles->$global_style_key ) ) {

			// If is an image/icon
			if( strpos( $global_style_key, '_logo' ) !== false || strpos( $global_style_key, '_favicon' ) !== false || strpos( $global_style_key, '_icon' ) !== false ) {

				// Upload image to media
				$image_media = wpeb_upload_image_to_media( $custom_config_global_styles->$global_style_key );

				add_option( $global_style_key, $image_media['image_id'] );

			} else {

				add_option( $global_style_key, $custom_config_global_styles->$global_style_key );

			}

		} else {

			// If is an image/icon
			if( strpos( $global_style_key, '_logo' ) !== false || strpos( $global_style_key, '_favicon' ) !== false || strpos( $global_style_key, '_icon' ) !== false ) {

				add_option( $global_style_key, WPEB_PLUGIN_THEME_FRONT . $global_style_value );

			} else {

				add_option( $global_style_key, $global_style_value );

			}

		}

	}

}

// Download and install necessary plugins
function wpeb_install_plugins() {

	// Include required libs for installation
	require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
	require_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
	require_once( ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php' );
	require_once( ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php' );

	$plugins = array(
		'classic-editor' => array(
			'activate' => 'classic-editor',
			'version' => '1.6',
		),
		'contact-form-7' => array(
			'activate' => 'wp-contact-form-7',
			'version' => '5.4.1',
		),
		'wordpress-seo' => array(
			'activate' => 'wp-seo',
			'version' => '16.3',
		),
		'classic-widgets' => array(
			'activate' => 'classic-widgets',
			'version' => '0.2',
		)
	);

	foreach( $plugins as $plugin_slug => $plugin_data ) {

		$plugin_dir_path = WP_PLUGIN_DIR . '/' . $plugin_slug;
		$plugin_activate_path = WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_data['activate'] . '.php';

		// Check if already exists
		if( !file_exists( $plugin_dir_path ) && !is_dir( $plugin_dir_path ) && !is_plugin_active( $plugin_slug ) ) {

			// Get Plugin Info
			$api = plugins_api( 'plugin_information',
			    array(
			        'slug' => $plugin_slug,
			        'fields' => array(
			            'short_description' => false,
			            'sections' => false,
			            'requires' => false,
			            'rating' => false,
			            'ratings' => false,
			            'downloaded' => false,
			            'last_updated' => false,
			            'added' => false,
			            'tags' => false,
			            'compatibility' => false,
			            'homepage' => false,
			            'donate_link' => false,
			        ),
			    )
			);
			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$upgrader->install( $api->versions[$plugin_data['version']] );

			// Activate plugin
			activate_plugin( $plugin_activate_path );

			// If current plugin is Contact Form 7, set initial config
			if( $plugin_slug == 'contact-form-7' ) {

				wpeb_set_initial_cf7_config();

			}

			// If current plugin is Yoast SEO, set initial config
			if( $plugin_slug == 'wordpress-seo' ) {

				wpeb_set_initial_yoast_seo_config();

			}

		} else {

			// Activate plugin
			activate_plugin( $plugin_activate_path );

		}

	}

}

// Function to load initial configuration of the Yoast SEO
function wpeb_set_initial_yoast_seo_config() {

	// Separator between breadcrumbs
	if( $wpseo_titles = get_option( 'wpseo_titles' ) ) {

		if( array_key_exists( 'breadcrumbs-sep', $wpseo_titles ) ) {

			if( $wpseo_titles['breadcrumbs-sep'] != '/' ) {

				$wpseo_titles['breadcrumbs-sep'] = '/';

				update_option( 'wpseo_titles', $wpseo_titles );

			}

		} else {

			$wpseo_titles['breadcrumbs-sep'] = '/';

			update_option( 'wpseo_titles', $wpseo_titles );

		}

	}

	// Show blog page
	if( $wpseo_titles = get_option( 'wpseo_titles' ) ) {

		if( array_key_exists( 'breadcrumbs-display-blog-page', $wpseo_titles ) ) {

			if( $wpseo_titles['breadcrumbs-display-blog-page'] != FALSE ) {

				$wpseo_titles['breadcrumbs-display-blog-page'] = FALSE;

				update_option( 'wpseo_titles', $wpseo_titles );

			}

		} else {

			$wpseo_titles['breadcrumbs-display-blog-page'] = FALSE;

			update_option( 'wpseo_titles', $wpseo_titles );

		}

	}

	// Taxonomy to show in breadcrumbs for content types
	if( $wpseo_titles = get_option( 'wpseo_titles' ) ) {

		if( array_key_exists( 'post_types-post-maintax', $wpseo_titles ) ) {

			if( $wpseo_titles['post_types-post-maintax'] !== 'category' ) {

				$wpseo_titles['post_types-post-maintax'] = 'category';

				update_option( 'wpseo_titles', $wpseo_titles );

			}

		} else {

			$wpseo_titles['post_types-post-maintax'] = 'category';

			update_option( 'wpseo_titles', $wpseo_titles );

		}

	}

}

// Function to load initial configuration of the contact form 7
function wpeb_set_initial_cf7_config() {

	$wpeb_cf_to_field       = '[_site_admin_email]';
	$wpeb_cf_subject_field  = 'Nuevo contacto';
	$wpeb_cf_fields         = wpeb_initial_fields_cf7();

	// Save wpeb_cf_to_field in wp_options
	update_option( 'wpeb_cf_to_field', $wpeb_cf_to_field );

	// Save wpeb_cf_subject_field in wp_options
	update_option( 'wpeb_cf_subject_field', $wpeb_cf_subject_field );

	// Save wpeb_cf_fields in wp_options
	update_option( 'wpeb_cf_fields', $wpeb_cf_fields );

	// Get form data. Assume that when installing cf7 the default contact form has been created.
	$form_data = !empty( ecode_get_cf7_by_name( 'contact-form-1' ) ) ? ecode_get_cf7_by_name( 'contact-form-1' ) : ecode_get_cf7_by_name( 'formulario-de-contacto-1' );

	if( !empty( $form_data ) ) {

		$form_id   = !empty( (array)$form_data ) ? $form_data->ID : NULL;

		// Update cf7 form
		$keys_fields_labels = wpeb_update_cf7_form( $form_id, $wpeb_cf_fields );

		// Update cf7 mail ( 'To', 'Subject', 'Message body' )
		wpeb_update_cf7_mail( $form_id, $wpeb_cf_to_field, $wpeb_cf_subject_field, $keys_fields_labels );

	}

}

// Initial configuration fields cf7
function wpeb_initial_fields_cf7() {

	// Get custom config for contact form
	$custom_config_contact_form_path = WP_PLUGIN_DIR . '/ecoded_builder/config/custom/config_contact_form.json';
	$global_settings = file_exists( $custom_config_contact_form_path ) ? json_decode( file_get_contents( $custom_config_contact_form_path ) ) : array();

	// If empty default config, get default
	if( empty( $global_settings ) ) {

		// Get 'config_contact_form.json'
		$config_contact_form_path = WPEB_PLUGIN_CONFIG . 'config_contact_form.json';
		$global_settings = file_exists( $config_contact_form_path ) ? json_decode( file_get_contents( $config_contact_form_path ) ) : array();

	}

	return $global_settings;

}

?>
