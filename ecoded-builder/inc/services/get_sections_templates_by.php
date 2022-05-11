<?php

// AJAX to get sections and templates by section_type_id for popup builder
add_action( 'wp_ajax_wpeb_get_sections_templates_by', 'wpeb_get_sections_templates_by' );
function wpeb_get_sections_templates_by() {

	// Get $_POST
	$section_type_id = !empty( $_POST['section_type_id'] ) ? $_POST['section_type_id'] : NULL;
	$sections_templates_data = array();

	if( wpeb_check_ajax_access() && !empty( $section_type_id ) ) {

		// Get sections templates by section type id
		$sections_data = wpeb_get_sections( $section_type_id );

		if( !empty( $sections_data ) ) {

			$sections_ids = array();

			foreach( $sections_data as $section ) {

				$sections_ids[] = $section->id;

			}

			$templates_data = array();
			$sections_types = array();

			if( !empty( $sections_ids ) ) {

				// Get templates by sections_ids
				$templates_data = wpeb_get_templates( $sections_ids );

				// Get sections types
				$sections_types = wpeb_get_sections_types_by_sections_ids( $sections_ids );

			}

			if( !empty( $templates_data ) ) {

				foreach( $sections_data as $section ) {

					// Add section type ( categories ) and discard block restriction data
					if( !empty( $sections_types ) ) {

						foreach( $sections_types as $section_type ) {

							if( $section->id == $section_type->section_id && strpos( $section_type->name, 'Bloque' ) === false ) {

								$section->categories[] = array(
									'id' => $section_type->section_type_id,
									'name' => $section_type->name,
									'menu_order' => $section_type->menu_order,
								);

							}

						}

					}

					// Add templates data in section object
					$section->screenshot = WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section->id . '/screenshot.png';

					foreach( $templates_data as $template ) {

						if( $section->id == $template->section_id ) {

							$section->templates[] = (object)array(
								'id' => $template->id,
								'description' => $template->description,
								'screenshot' => WPEB_PLUGIN_SECTIONS_FRONT . 'section_' . $section->id . '/template_' . $template->id . '/screenshot.png'
							);

						}

					}

				}

			}

			wp_send_json_success( $sections_data );

		} else {

			wp_send_json_error(
				new WP_Error( 'not_sections_templates_data', __( 'No hay secciones con templates para este tipo de sección.', 'ecoded_builder' ) )
			);

		}

	} else {

		wp_send_json_error(
			new WP_Error( 'required_data_are_missing', __( 'No se han podido obtener las plantillas.', 'ecoded_builder' ) )
		);

	}

	wp_die();

}

?>
