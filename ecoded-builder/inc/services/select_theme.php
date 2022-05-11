<?php

// AJAX to select theme
add_action( 'wp_ajax_wpeb_select_theme_ajax', 'wpeb_select_theme_ajax' );

function wpeb_select_theme_ajax() {

	// Get $_POST
	$theme = !empty( $_POST['theme'] ) ? $_POST['theme'] : NULL;

	if( !empty( $theme ) ) {

		global $wpdb;

		// Get URL config theme
		$url_config_theme = WPEB_PLUGIN_DIR . '/themes/' . $theme . '/config.json';

		// Read config.json
		$config_db_json = file_get_contents( $url_config_theme );

		$inserts_db = array();

		if( $config_db_json !== FALSE ) {

			$config_db = json_decode( $config_db_json, TRUE );
			$inserts_db = $config_db !== NULL ? $config_db : array();

		}

		// Update all sections to NULL
		$query = '';

		$query .= "TRUNCATE TABLE " . $wpdb->prefix  . "eb_page_sections";

		$wpdb->query( $query );

		// Update DB data
		if( !empty( $inserts_db ) ) {

			foreach( $inserts_db['tables'] as $table_name => $inserts_data ) {

				wpeb_insert_data( $table_name, $inserts_data );

			}

			// Call to compile theme
			wpeb_compile_theme();

			// Return
			wp_send_json_success();

		} else {

			wp_send_json_error(
				new WP_Error( 'not_theme_data', __( 'No hay datos sobre el tema seleccionado.', 'ecoded_builder' ) )
			);

		}

	} else {

		wp_send_json_error(
			new WP_Error( 'not_theme_selected', __( 'No se ha recibido ningún tema seleccionado.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

?>
