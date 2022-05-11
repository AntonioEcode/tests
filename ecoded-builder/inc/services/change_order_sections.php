<?php

// AJAX to update page section order
add_action( 'wp_ajax_wpeb_change_order_sections', 'wpeb_change_order_sections' );

function wpeb_change_order_sections() {

	// Get $_POST
	$page_sections_orders = !empty( $_POST['page_sections_orders'] ) ? json_decode( str_replace( '\\', '',  $_POST['page_sections_orders'] ) ) : NULL;

	if( wpeb_check_ajax_access() && !empty( $page_sections_orders ) ) {

		foreach( $page_sections_orders as $page_section_data ) {

			// Update order in BD
			wpeb_update_page_section_order( $page_section_data->id, $page_section_data->order );

		}

		wp_send_json_success();

	} else {

		wp_send_json_error(
			new WP_Error( 'required_new_order_sections', __( 'No se ha podido cambiar el orden, faltan datos.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}
