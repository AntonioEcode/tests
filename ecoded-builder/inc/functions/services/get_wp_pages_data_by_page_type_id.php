<?php

// Function to get data of wp pages to link in the builder
function wpeb_get_wp_pages_data_by_page_type_id( $page_id ) {

	$wp_page_data = array();

	$page_data = wpeb_get_page_types( $page_id, $order = NULL );

	// If pilot page not empty
	if( !empty( $page_data->wp_page_id ) ) {

		$page_status = get_post_status( $page_data->wp_page_id );

		// If pilot page exist and is published
		if( !empty( $page_status ) && $page_status == 'publish' ) {

			$wp_page_data[] = array(
				'name' => get_the_title( $page_data->wp_page_id ),
				'url' => get_the_permalink( $page_data->wp_page_id ),
				'edit_url' => get_edit_post_link( $page_data->wp_page_id, TRUE )
			);

		}

	}

	// If not exist pilot page try get pages with the template
	if( empty( $wp_page_data ) ) {

		$template_name = $page_data->template_name;

		// Puede ser página, blog, home, entradas

		$page_ids_by_template = array();

		// If is a normal template
		if( $template_name != 'front-page' && $template_name != 'home' && $template_name != 'single-post' ) {

			// Get page ids with the current template
			$page_ids_by_template = wpeb_get_template_by_name( $template_name, $results = TRUE );

			if( !empty( $page_ids_by_template ) ) {

				foreach( $page_ids_by_template as $page_id_by_template ) {

					$page_status = get_post_status( $page_id_by_template );

					// If page is published get data and add to $wp_page_data
					if( $page_status == 'publish' ) {

						$wp_page_data[] = array(
							'name' => get_the_title( $page_id_by_template ),
							'url' => get_the_permalink( $page_id_by_template ),
							'edit_url' => get_edit_post_link( $page_id_by_template, TRUE )
						);

					}

				}

			}

		} else {

			// Get page if is front-page or home
			$frontpage_home_id = '';

			// If is front-page
			if( $template_name == 'front-page' || $template_name == 'home' ) {

				$frontpage_home_id = get_option( 'page_on_front' );

			}

			// If is home ( blog )
			if( $template_name == 'home' ) {

				$frontpage_home_id = get_option( 'page_for_posts' );

			}

			if( !empty( $frontpage_home_id ) ) {

				$page_status = get_post_status( $frontpage_home_id );

				// If page is published get data and add to $wp_page_data
				if( $page_status == 'publish' ) {

					$wp_page_data[] = array(
						'name' => get_the_title( $frontpage_home_id ),
						'url' => get_the_permalink( $frontpage_home_id ),
						'edit_url' => get_edit_post_link( $frontpage_home_id, TRUE )
					);

				}

			}

			// If is single-post
			if( $template_name == 'single-post' ) {

				$array_posts = ecode_get_posts( $post_type = 'post', $post_per_page = '50' );

				foreach( $array_posts as $post_id => $post_title ) {

					$wp_page_data[] = array(
						'name' => get_the_title( $post_id ),
						'url' => get_the_permalink( $post_id ),
						'edit_url' => get_edit_post_link( $post_id, TRUE )
					);

				}

			}

		}

	}

	return $wp_page_data;

}

?>
