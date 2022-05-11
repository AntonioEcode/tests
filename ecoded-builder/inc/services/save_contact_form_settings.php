<?php

// Save contact form configuration in wp-options and configure in cf7
add_action( 'admin_post_wpeb_save_contact_form_settings', 'wpeb_save_contact_form_settings' );

function wpeb_save_contact_form_settings() {

	// Get nonce
	$nonce = !empty( $_POST['nonce'] ) ? $_POST['nonce'] : NULL;

	if( wpeb_check_ajax_access() && wp_verify_nonce( $nonce, 'wpeb_save_contact_form_settings' ) ) {

		// Get $_POST
		$wpeb_cf_to_field = !empty( $_POST['wpeb_cf_to_field'] ) ? $_POST['wpeb_cf_to_field'] : '';
		$wpeb_cf_subject_field = !empty( $_POST['wpeb_cf_subject_field'] ) ? $_POST['wpeb_cf_subject_field'] : '';
		$wpeb_cf_fields = !empty( $_POST['wpeb_cf_fields'] ) ? $_POST['wpeb_cf_fields'] : array();

		$wpeb_cf_fields_object = array();

		if( !empty( $wpeb_cf_fields )  ) {

			foreach ( $wpeb_cf_fields as $wpeb_cf_field ) {

				array_push( $wpeb_cf_fields_object, (object)$wpeb_cf_field );

			}

		}

		// Save wpeb_cf_to_field in wp_options
		update_option( 'wpeb_cf_to_field', $wpeb_cf_to_field );

		// Save wpeb_cf_subject_field in wp_options
		update_option( 'wpeb_cf_subject_field', $wpeb_cf_subject_field );

		// Save wpeb_cf_fields in wp_options
		update_option( 'wpeb_cf_fields', $wpeb_cf_fields_object );

		// Get form data. Assume that when installing cf7 the default contact form has been created.
		$form_data = !empty( ecode_get_cf7_by_name( 'contact-form-1' ) ) ? ecode_get_cf7_by_name( 'contact-form-1' ) : ecode_get_cf7_by_name( 'formulario-de-contacto-1' );

		if( !empty( $form_data ) ) {

			$form_id = !empty( (array)$form_data ) ? $form_data->ID : NULL;

			// Update cf7 form
			$keys_fields_labels = wpeb_update_cf7_form( $form_id, $wpeb_cf_fields_object );

			// Update cf7 mail ( 'To', 'Subject', 'Message body' )
			wpeb_update_cf7_mail( $form_id, $wpeb_cf_to_field, $wpeb_cf_subject_field, $keys_fields_labels );

		}

	}

	wp_redirect( admin_url( 'admin.php?page=wpeb_contact_form_settings&save=success') );

	die;

}

// Fuction to generate and update form in contact form 7 plugin
function wpeb_update_cf7_form( $form_id, $wpeb_cf_fields ) {

	$form_content = '';

	if( !empty( $wpeb_cf_fields ) ) {

		$cont = 1;

		// Array to add each label and key_field created to use after create it.
		$keys_fields_labels = array();

		// Through each preconfigure field
		foreach( $wpeb_cf_fields as $form_field_conf ) {

			// Get configuration
			$hide_field_form = !empty( $form_field_conf->hide_field_form ) ? $form_field_conf->hide_field_form : 'off';
			$text_field_name = !empty( $form_field_conf->text_field_name ) ? $form_field_conf->text_field_name : '';
			$required_field_form = !empty( $form_field_conf->required_field_form ) ? $form_field_conf->required_field_form : 'off';
			$full_width_field_form = !empty( $form_field_conf->full_width_field_form ) ? $form_field_conf->full_width_field_form : 'off';
			$field_type = !empty( $form_field_conf->field_type ) ? $form_field_conf->field_type : '';
			$select_options_field_form = !empty( $form_field_conf->select_options_field_form ) ? $form_field_conf->select_options_field_form : '';

			// If not hide field, have field type, text_field_name
			if( $hide_field_form != 'on' && !empty( $field_type ) && !empty( $text_field_name ) ) {

				$full_width = $full_width_field_form == 'on' ? ' container_input_full' : '';
				$required = $required_field_form == 'on' ? '*' : '';
				$field_type_form = $field_type . $required;
				$field_key_name = $field_type . '-' . $cont;

				if( $field_type != 'select' ) {

					$form_content .= "<div class=\"container_input$full_width\">\n";
					$form_content .= "<label>$text_field_name</label>[$field_type_form $field_key_name placeholder \"$text_field_name\"]\n";
					$form_content .= "</div>\n";

				} else {

					if( !empty( $select_options_field_form ) ) {

						$select_options = preg_split( '/\r\n|\r|\n/', $select_options_field_form );

						$select_options_content = '';

						foreach( $select_options as $select_option ) {

							$select_options_content .= ' "' . $select_option . '"';

						}

						$form_content .= "<div class=\"container_input container_input_select$full_width\">\n";
							$form_content .= "<label>$text_field_name</label>[$field_type_form $field_key_name id:select_field$select_options_content]\n";
						$form_content .= "</div>\n";

					}

				}

				// Add field to generate the email after create
				$keys_fields_labels[$field_key_name] = $text_field_name;

				$cont++;

			}

		}

		if( !empty( $form_content ) ) {

			// Add legal texts shortcode and privacy policy check
			$form_content .= "[wpeb_form_legal_texts]\n";
			$form_content .= "<div class='acceptance'>[acceptance acceptance]<p>He leído y acepto la política de privacidad</p>[/acceptance]</div>\n";

			// Add submit button
			$form_content .= "<div class='container_button'>\n";
			$form_content .= "[submit class:button class:button_primary \"Enviar\"]\n";
			$form_content .= "</div>\n";

			// Update form content
			update_post_meta( $form_id, '_form', $form_content );

		}

	}

	return $keys_fields_labels;

}

// Fuction to generate and update mail ( 'To', 'Subject', 'Message body' ) in contact form 7 plugin
function wpeb_update_cf7_mail( $form_id, $wpeb_cf_to_field, $wpeb_cf_subject_field, $keys_fields_labels ) {

	// Generate a message body for cantact form
	$message_body = wpeb_generate_cf7_message_body( $keys_fields_labels );

	// Generate sender with domain mail contacto@dominio.com
	$sender = '[_site_title] contacto@' . $_SERVER['HTTP_HOST'];

	$cf7_mail_content = array(
		'active' => true,
		'subject' => $wpeb_cf_subject_field,
		'sender' => $sender,
		'recipient' => $wpeb_cf_to_field,
		'body' => $message_body,
		'additional_headers' => '',
		'attachments' => '',
		'use_html' => true,
		'exclude_blank' => false,
	);

	// Update _mail content
	update_post_meta( $form_id, '_mail', $cf7_mail_content );

}

// Function to generate a message body for cantact form
function wpeb_generate_cf7_message_body( $keys_fields_labels ) {

	$message_template_file = WPEB_PLUGIN_SECTIONS_BACK . 'email_template/contact_form_template.php';
	$message_template_content = file_exists( $message_template_file ) ? file_get_contents( $message_template_file ) : '';

	if( !empty( $message_template_content ) ) {

		// Get logo src to replace {{mail_logo_src}} in the template
		$logo_id = get_option( 'wpeb_logo' );

		// Check if contains URL or int
	    if( !empty( $logo_id ) ) {

	        if( is_numeric( $logo_id ) ) {

	            $mail_logo_src = wp_get_attachment_image_src( $logo_id, 'full' )[0];

	        } elseif( is_string( $logo_id ) ) {

	            $mail_logo_src = $logo_id;

	        }

	    }

		// Generate form field content to replace {{cf7_form_fields}} in the template
		$cf7_form_fields = '';

		foreach( $keys_fields_labels as $key_field => $label_field ) {

			$cf7_form_fields .= "<p>$label_field: <strong>[$key_field]</strong></p>\n";

		}

		// Replaces in the template content
		$message_template_content = str_replace( '{{mail_logo_src}}', $mail_logo_src, $message_template_content );
		$message_template_content = str_replace( '{{cf7_form_fields}}', $cf7_form_fields, $message_template_content );

	}

	return $message_template_content;

}

?>
