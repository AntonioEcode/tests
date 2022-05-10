<?php

/******************************************************************************/
/*                              General queries                               */
/******************************************************************************/

function wpeb_get_posts( $post_type = 'post', $posts_per_page = -1, $category_id = NULL, $tag_id = NULL, $post_status = 'publish', $orderby = 'date', $order = 'DESC' ) {

    $return = NULL;

    $args = array(
        'post_status'    => $post_status,
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'orderby'        => $orderby,
        'order'          => $order,
    );

    if( !empty( $category_id ) ) {

        $args['cat'] = $category_id;

    }

    if( !empty( $tag_id ) ) {

        $args['tag_id'] = $tag_id;

    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        while( $query->have_posts() ) {

            $query->the_post();
            $post_id = get_the_ID();
            $post_title = get_the_title();

            $return[$post_id] = $post_title;

        }

    }

    wp_reset_postdata();

    return $return;

}

/******************************************************************************/
/*                            END General queries                             */
/******************************************************************************/

/******************************************************************************/
/*                            Create plugin tables                            */
/******************************************************************************/

// Create plugin tables
function wpeb_create_init_tables() {

	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();

	require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );

	// Create pages table
    $pages_table = $wpdb->prefix . 'eb_pages';

    // Check if the pages table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $pages_table . "'" ) != $pages_table ) {

		// Insert query
		$insert_pages_table = "CREATE TABLE $pages_table (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(128) DEFAULT NULL,
			`description` varchar(256) DEFAULT NULL,
			`template_name` varchar(256) DEFAULT NULL,
			`template_key` varchar(256) DEFAULT NULL,
			`template_status` varchar(8) DEFAULT NULL,
			`wp_page_id` bigint(20) DEFAULT NULL,
			`in_nav_menu` tinyint(1) DEFAULT NULL,
			`nav_menu_order` int(3) DEFAULT NULL,
			`builder_menu_order` int(3) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;";

		dbDelta( $insert_pages_table );

    }

	// Create sections table
    $sections_table = $wpdb->prefix . 'eb_sections';

	// Check if the sections table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $sections_table . "'" ) != $sections_table ) {

		// Insert query
		$insert_sections_table = "CREATE TABLE $sections_table (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(256) DEFAULT NULL,
			`description` varchar(256) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;";

		dbDelta( $insert_sections_table );

	}

	// Create section_types table
    $section_types_table = $wpdb->prefix . 'eb_section_types';

	// Check if the section_types table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $section_types_table . "'" ) != $section_types_table ) {

		// Insert query
		$insert_section_types_table = "CREATE TABLE $section_types_table (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(128) DEFAULT NULL,
			`description` varchar(256) DEFAULT NULL,
			`is_main_block` TINYINT(1) DEFAULT NULL,
			`menu_order` int(3) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;";

		dbDelta( $insert_section_types_table );

	}

	// Create section_templates table
    $section_templates_table = $wpdb->prefix . 'eb_section_templates';

	// Check if the section_templates table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $section_templates_table . "'" ) != $section_templates_table ) {

		// Insert query
		$insert_section_templates_table = "CREATE TABLE $section_templates_table (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`description` varchar(256) DEFAULT NULL,
			`section_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `section_id` (`section_id`)
		) $charset_collate;";

		dbDelta( $insert_section_templates_table );

	}

	// Create section_section_types table
    $section_section_types_table = $wpdb->prefix . 'eb_section_section_types';

	// Check if the section_section_types table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $section_section_types_table . "'" ) != $section_section_types_table ) {

		// Insert query
		$insert_section_section_types_table = "CREATE TABLE $section_section_types_table (
			`section_id` int(11) DEFAULT NULL,
			`section_type_id` int(11) DEFAULT NULL,
			KEY `section_id` (`section_id`),
			KEY `section_type_id` (`section_type_id`)
		) $charset_collate;";

		dbDelta( $insert_section_section_types_table );

    }

	// Create page_sections table
    $page_sections_table = $wpdb->prefix . 'eb_page_sections';

	// Check if the page_sections table already exists, if not create it
    if( $wpdb->get_var( "SHOW TABLES LIKE '" . $page_sections_table . "'" ) != $page_sections_table ) {

		// Insert query
		$insert_page_sections_table = "CREATE TABLE $page_sections_table (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`order` int(11) DEFAULT NULL,
			`page_id` int(11) DEFAULT NULL,
			`section_type_id` int(11) DEFAULT NULL,
			`section_template_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `page_id` (`page_id`),
			KEY `section_type_id` (`section_type_id`),
			KEY `section_template_id` (`section_template_id`)
		) $charset_collate;";

		dbDelta( $insert_page_sections_table );

    }

}

// Insert initial data according to the contracted plan
function wpeb_insert_data( $table_name, $inserts_data ) {

	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . $table_name;

	// Get columns
	$array_columns = array();

	// Get values
	$array_values = array();

	foreach( $inserts_data as $cont => $data ) {

		foreach( $data as $key => $value ) {

			// Add columns names
			if( $cont == 0 ) {

				$array_columns[] = '`' . $key . '`';

			}

			// Add values
			$array_values[$cont][] = $value;

		}

	}

	$query = '';
	$query .= "INSERT INTO " . $table_name . " ( " . implode( ', ', $array_columns ) . " ) VALUES ";

	foreach( $array_values as $key => $values ) {

		$query .= '( "';
		$query .= implode( '", "', $values );

		if( count( $array_values ) == $key + 1 ) {

			$query .= '");';

		} else {

			$query .= '"), ';

		}

	}

	$query = str_replace( '""', 'NULL', $query );

	$wpdb->query( $query );

}

/******************************************************************************/
/*                          END Create plugin tables                          */
/******************************************************************************/

/******************************************************************************/
/*                             Create base pages                              */
/******************************************************************************/

// Function to update wp_page_id in eb_pages
function wpeb_update_wp_page_id( $page_id, $wp_page_id ) {

	$results = array();

	if( !empty( $page_id ) && !empty( $wp_page_id ) ) {

		global $wpdb;

		// Tables
		$page_table = $wpdb->prefix . 'eb_pages';

		// Update query
		$result = $wpdb->update( $page_table,
			array(
				'wp_page_id' => $wp_page_id
			),
			array( 'id' => $page_id )
		);

	}

	return !empty( $result ) ? $result : FALSE;

}

/******************************************************************************/
/*                           END Create base pages                            */
/******************************************************************************/

/******************************************************************************/
/*                                  Builder                                   */
/******************************************************************************/

// Get the types of pages available ( tabs Home, Service, Blog Detail... )
function wpeb_get_page_types( $id = NULL, $order = NULL ) {

	global $wpdb;

	// Pages table
	$pages_table = $wpdb->prefix . 'eb_pages';

	// Select query
	$query = "SELECT
		id,
		name,
		description,
		template_name,
		template_status,
		wp_page_id,
		in_nav_menu,
		nav_menu_order
		FROM $pages_table
		WHERE template_status != 'trash'";

	if( !empty( $id ) ) {

		$query .= " AND id = $id";

	}

	if( !empty( $order ) ) {

		$query .= " ORDER BY builder_menu_order $order";

	}

	$query .= ';';

	if( !empty( $id ) ) {

		$results = $wpdb->get_row( $query, OBJECT );

	} else {

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Get the structure of a page ( block of sections ) by page_id
function wpeb_get_page_sections( $page_id ) {

	$results = array();

	if( !empty( $page_id ) ) {

		global $wpdb;

		// Tables
		$pages_table         = $wpdb->prefix . 'eb_pages';
		$page_sections_table = $wpdb->prefix . 'eb_page_sections';
		$section_types_table = $wpdb->prefix . 'eb_section_types';

		// Select query
		$query = "SELECT
			ps.id as page_section_id,
			st.id as section_type_id,
			st.name as section_type_name,
			st.description as section_type_description,
			ps.section_template_id as section_template_id,
			st.is_main_block as section_type_main
			FROM $pages_table pg, $page_sections_table ps, $section_types_table st
			WHERE pg.id = ps.page_id
			AND st.id = ps.section_type_id
			AND pg.id = $page_id
			ORDER BY ps.order;";

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Get section data and template data by section_template_ids
function wpeb_get_selected_section_template( $section_template_ids ) {

	$results = array();

	if( !empty( $section_template_ids ) ) {

		global $wpdb;

		// Tables
		$section_templates_table = $wpdb->prefix . 'eb_section_templates';
		$sections_table          = $wpdb->prefix . 'eb_sections';

		$section_template_ids = implode( ',', $section_template_ids );

		// Select query
		$query = "SELECT
			st.id as section_template_id,
			st.description as section_template_name,
			st.section_id as section_id,
			s.name as section_name,
			s.description as section_description
			FROM $section_templates_table st, $sections_table s
			WHERE st.section_id = s.id
			AND st.id IN ( $section_template_ids );";

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Get sections by section_type_id
function wpeb_get_sections( $section_type_id ) {

	$results = array();

	if( !empty( $section_type_id ) ) {

		global $wpdb;

		// Tables
		$sections_table              = $wpdb->prefix . 'eb_sections';
		$section_types_table         = $wpdb->prefix . 'eb_section_types';
		$section_section_types_table = $wpdb->prefix . 'eb_section_section_types';

		// Select query
		$query = "SELECT s.id, s.name
			FROM $sections_table s, $section_types_table st, $section_section_types_table sst
			WHERE s.id = sst.section_id
			AND st.id = sst.section_type_id
			AND st.id = $section_type_id";

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Get section by template_id
function wpeb_get_section_by_template_id( $template_id ) {

	$result = array();

	if( !empty( $template_id ) ) {

		global $wpdb;

		// Tables
		$sections_table    = $wpdb->prefix . 'eb_sections';
		$section_templates = $wpdb->prefix . 'eb_section_templates';

		// Select query
		$query = "SELECT s.id, s.name
			FROM $sections_table s, $section_templates st
			WHERE s.id = st.section_id
			AND st.id = '" . $template_id . "'";

		$result = $wpdb->get_row( $query, OBJECT );

	}

	return !empty( $result ) ? $result : FALSE;

}

// Get templates by sectios ids
function wpeb_get_templates( $sections_ids ) {

	$results = array();

	if( !empty( $sections_ids ) ) {

		global $wpdb;

		// Tables
		$section_templates_table = $wpdb->prefix . 'eb_section_templates';

		$sections_ids = implode( ',', $sections_ids );

		// Select query
		$query = "SELECT id, description, section_id
			FROM $section_templates_table
			WHERE section_id IN ( $sections_ids );";

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Get sections types by sections_ids
function wpeb_get_sections_types_by_sections_ids( $sections_ids ) {

	$results = array();

	if( !empty( $sections_ids ) ) {

		global $wpdb;

		// Tables
		$section_section_types_table = $wpdb->prefix . 'eb_section_section_types sst';
		$section_types_table         = $wpdb->prefix . 'eb_section_types st';

		$sections_ids = implode( ',', $sections_ids );

		// Select query
		$query = "SELECT sst.section_id, sst.section_type_id, st.name, st.is_main_block, st.menu_order
			FROM $section_section_types_table, $section_types_table
			WHERE sst.section_type_id = st.id
			AND sst.section_id IN ( $sections_ids );";

		$results = $wpdb->get_results( $query, OBJECT );

	}

	return !empty( $results ) ? $results : FALSE;

}

// Function to update selected template in specific eb_page_sections
function wpeb_update_template( $page_section_id, $template_id = NULL, $section_type_id = NULL ) {

	$results = array();

	if( !empty( $page_section_id ) ) {

		global $wpdb;

		// Tables
		$page_sections_table = $wpdb->prefix . 'eb_page_sections';

		// If section type is 1 or 2 ( Header and footer ) update section template in all pages, else, only the especific page_section
		if( $section_type_id == 1 || $section_type_id == 2 ) {

			// Update query
			$result = $wpdb->update( $page_sections_table,
				array(
					'section_template_id' => $template_id
				),
				array( 'section_type_id' => $section_type_id )
			);

		} else {

			// Update query
			$result = $wpdb->update( $page_sections_table,
				array(
					'section_template_id' => $template_id
				),
				array( 'id' => $page_section_id )
			);

		}

	}

	return !empty( $result ) ? $result : FALSE;

}

// Function to get rows from wp_eb_page_sections by page_section_id
function wpeb_get_page_sections_by_page_section_id( $page_section_id ) {

	global $wpdb;

	// Page sections table
	$page_sections_table = $wpdb->prefix . 'eb_page_sections';

	// Select query
	$query = "SELECT
		id,
		page_id,
		section_type_id,
		section_template_id
		FROM $page_sections_table
		WHERE id = $page_section_id;";

	$results = $wpdb->get_row( $query, OBJECT );

	return !empty( $results ) ? $results : FALSE;

}

// Function to get rows from wp_eb_page_sections by specific section_type_id
function wpeb_get_page_sections_by_section_type_id( $section_type_id ) {

	global $wpdb;

	// Page sections table
	$page_sections_table = $wpdb->prefix . 'eb_page_sections';

	// Select query
	$query = "SELECT
		id,
		page_id
		FROM $page_sections_table
		WHERE section_type_id = $section_type_id;";

	$results = $wpdb->get_results( $query, OBJECT );

	return !empty( $results ) ? $results : FALSE;

}

// Function to update order columns in eb_page_sections
function wpeb_update_page_section_order( $page_section_id, $order ) {

	$results = array();

	if( !empty( $page_section_id ) && !empty( $order ) ) {

		global $wpdb;

		// Table
		$page_sections_table = $wpdb->prefix . 'eb_page_sections';

		// Update query
		$result = $wpdb->update( $page_sections_table,
			array(
				'order' => $order
			),
			array( 'id' => $page_section_id )
		);

	}

	return !empty( $result ) ? $result : FALSE;

}

// Function to get global conten by template_id
function wpeb_get_global_content_by_template( $template_id, $only_ids = FALSE ) {

    $return = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'global_content',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key'   => '_global_template_id',
				'value' => $template_id,
			),
		),
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        while( $query->have_posts() ) {

            $query->the_post();

            $post_id    = get_the_ID();
            $post_title = get_the_title();
			$edit_link  = get_edit_post_link( $post_id, '&' );

			if( !$only_ids ) {

				$return[] = array(
					'global_content_id'        => $post_id,
					'global_content_title'     => $post_title,
					'global_content_edit_link' => $edit_link
				);

			} else {

				$return[] = $post_id;

			}

        }

    }

    wp_reset_postdata();

    return $return;

}

/******************************************************************************/
/*                                END Builder                                 */
/******************************************************************************/

/******************************************************************************/
/*                                 Compiler                                   */
/******************************************************************************/

// Get the structure of all pages and templates.
function wpeb_get_pages_sections() {

	$results = array();

	global $wpdb;

	// Tables
	$pages_table             = $wpdb->prefix . 'eb_pages';
	$page_sections_table     = $wpdb->prefix . 'eb_page_sections';
	$section_templates_table = $wpdb->prefix . 'eb_section_templates';

	// Select query
	$query = "SELECT
		ps.id as page_section_id,
		ps.order,
		ps.page_id,
		p.name as page_name,
		p.template_name,
		p.template_status,
		p.wp_page_id,
		ps.section_type_id,
		st.section_id,
		ps.section_template_id
		FROM $page_sections_table ps, $pages_table p, $section_templates_table st
		WHERE ps.page_id = p.id
		AND ps.section_template_id = st.id
		AND p.template_status != 'trash'
		ORDER BY ps.page_id, ps.order;";

	$results = $wpdb->get_results( $query, OBJECT );

	return !empty( $results ) ? $results : FALSE;

}

// Function to update css version
function wpeb_update_css_version() {

	global $wpdb;

	if( $wpeb_css_version = get_option( 'wpeb_css_version' ) ) {

		$wpeb_css_version = (int)$wpeb_css_version + 1;

		// Update query
		$wpdb->query(
			$wpdb->prepare(
				"UPDATE $wpdb->options SET option_value = %s WHERE option_name = 'wpeb_css_version'",
				$wpeb_css_version
			)
		);

	} else {

		$wpeb_css_version = 1;

		// Insert query
		$wpdb->query(
			$wpdb->prepare(
				"INSERT INTO $wpdb->options ( option_name, option_value, autoload ) VALUES ( 'wpeb_css_version', %s, 'yes' )",
				$wpeb_css_version
			)
		);

	}

}

// Function to update options without use default updete_option()
function wpeb_update_option( $option_name, $option_value ) {

	global $wpdb;

	$serialized_data = maybe_serialize( $option_value );

	// Update query
	$wpdb->query(
		$wpdb->prepare(
			"UPDATE $wpdb->options SET option_value = %s WHERE option_name = %s",
			$serialized_data,
			$option_name
		)
	);

	// Clean cache to remove all get_options
	// WordPress uses cache for any get_option used before to avoid multiple calls
	wp_cache_flush();

}

/******************************************************************************/
/*                               END Compiler                                 */
/******************************************************************************/

/******************************************************************************/
/*                                 Widgets                                    */
/******************************************************************************/

function wpeb_get_featured_posts_widget( $posts_ids, $input_hidden_id ) {

    $return = '';

    if( !empty( $input_hidden_id ) ) {

        $class_text_not_results = 'text_not_results';

        $return .= '<section class="ecode_search">';
            $return .= '<p class="ecode_title">Buscar artículo</p>';
            $return .= '<input class="ecode_input_search" type="text">';
            $return .= '<span class="ecode_button_close_searcher"></span>';
            $return .= '<section class="ecode_list"></section>';
            $return .= '<p class="ecode_title">Ordenar artículos</p>';
            $return .= '<section class="ecode_drag">';

                if( !empty( $posts_ids ) ) {

                    $class_text_not_results = 'text_not_results text_not_results_hide';

                    foreach( $posts_ids as $id ) {

                        $name = get_the_title( $id );

                        $return .= '<p data-id="' . $id . '">' . $name . '<span class="button_delete"></span></p>';

                    }

                }

            $return .= '</section>';

            $return .= '<p class="' . $class_text_not_results . '">No hay ningún artículo seleccionado.</p>';

            $return .= '<input type="hidden" name="meta_key_hidden_id" value="' . $input_hidden_id . '">';

        $return .= '</section>';

    }

    return $return;

}

function ecoded_get_related_img_posts_sidebar( $post_id, $meta_key_ddbb ) {

    $return = '';

    if( !empty( $meta_key_ddbb ) && !empty( $post_id ) ) {

        $posts_data = get_post_meta( $post_id, $meta_key_ddbb, TRUE );

        $posts_data = !empty( $posts_data ) ? explode( ',', $posts_data ) : array();

        $class_text_not_results = 'text_not_results';

        $return .= '<section class="ecode_search">';
            $return .= '<p class="ecode_title">Buscar artículo</p>';
            $return .= '<input class="ecode_input_search" type="text">';
            $return .= '<span class="ecode_button_close_searcher"></span>';
            $return .= '<section class="ecode_list"></section>';
            $return .= '<p class="ecode_title">Ordenar artículos</p>';
            $return .= '<section class="ecode_drag">';

                if( !empty( $posts_data ) ) {

                    $class_text_not_results = 'text_not_results text_not_results_hide';

                    foreach( $posts_data as $id ) {

                        $name = get_the_title( $id );

                        $return .= '<p data-id="' . $id . '">' . $name . '<span class="button_delete"></span></p>';

                    }

                }

            $return .= '</section>';

            $return .= '<p class="' . $class_text_not_results . '">No hay ningún artículo seleccionado.</p>';

			$return .= '<input type="hidden" name="meta_key_hidden_id" value="' . $meta_key_ddbb . '">';

        $return .= '</section>';

    }

    return $return;

}

/******************************************************************************/
/*                               END Widgets                                  */
/******************************************************************************/

?>
