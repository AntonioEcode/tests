<?php

// Upload image to 'Media'
function wpeb_upload_image_to_media( $file ) {

	$result = array();

	if( !empty( $file ) ) {

		$file_name = basename( $file );

		// Check if the image already exists to get data, else create it
		if( !empty( $image_id = wpeb_check_image_already_exists( $file_name ) ) ) {

			$imager_src = get_post_meta( $image_id, '_wp_attached_file', TRUE );

			$result = array(
				'image_id'  => $image_id,
				'image_src' => !empty( $imager_src ) ? WPEB_UPLOADS . $imager_src : ''
			);

		} else {

			$upload_file = wp_upload_bits( $file_name, NULL, file_get_contents( $file ) );

			if( !$upload_file['error'] ) {			

				if( !function_exists( 'wp_get_current_user' ) ) {

					include( ABSPATH . 'wp-includes/pluggable.php' ); 

				}

				$wp_filetype = wp_check_filetype( $file_name, NULL );

				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_parent' => NULL,
					'post_title' => preg_replace( '/\.[^.]+$/', '', $file_name ),
					'post_content' => '',
					'post_status' => 'inherit'
				);

				$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $post_id = NULL );

				if( !is_wp_error( $attachment_id ) ) {

					require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
					$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
					wp_update_attachment_metadata( $attachment_id,  $attachment_data );

					$result = array(
						'image_id'  => $attachment_id,
						'image_src' => WPEB_UPLOADS . $attachment_data['file']
					);

				}

			}

		}

	}

	return $result;

}

// Check if an image already exists
function wpeb_check_image_already_exists( $file_name ) {

	global $wpdb;

	$query = "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE '%/$file_name'";
	$image_id = $wpdb->get_var( $query );

	return $image_id;

}

?>