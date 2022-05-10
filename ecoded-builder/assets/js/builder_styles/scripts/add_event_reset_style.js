function add_event_reset_style() {

	document.getElementById( 'button_reset_style' ).onclick = function() {

		if ( confirm( '¿Estás seguro de que desea dejar por defecto los ajustes?' ) ) {

			// Reset data custom config
			if ( array_page_type.custom_config[section_id_edit_element] ) {

				if ( array_page_type.custom_config[section_id_edit_element][data_element] ) {

					array_page_type.custom_config[section_id_edit_element][data_element] = '';

				}

			}

			// Reset values editor
			reset_values_editor();

			// Delete styles head
			delete_element_style_of_head();

			// Get custom config section
			section_style = '';

			custom_config_section = array_page_type.custom_config[section_id_edit_element];

			if ( custom_config_section ) {

				for ( var key in custom_config ) {

					style = custom_config[key];

					if ( section_id_edit_element == key ) {

						for ( var element in style ) {

							element_style = style[element];

							if ( element_style != '' ) {

								section_style += '#page_section_' + key + ' .' + element + '{';

									section_style += element_style;

								section_style += '}';

							}

						}

					}

				}

			}

			// Get section_type_id
			array_sections = array_page_type.sections;

			for ( var i = 0; i < array_sections.length; i++ ) {

				if ( array_sections[i].page_section_id == section_id_edit_element ) {

					section_type_id = array_sections[i].section_type_id;

					break;

				}

			}

			// Define params
			action = 'wpeb_delete_custom_element_style';

			params = '';

			params += 'action=' + action;
			params += '&page_id=' + page_id;
			params += '&section_id=' + section_id_edit_element;
			params += '&section_type_id=' + section_type_id;
			params += '&element_id=' + data_element;
			params += '&compile_style=' + section_style;

			xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {

				if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

					response = JSON.parse(xhttp.responseText);

					if ( response.status = 'OK' ) {


						// Remove last style in element
						array_element_styles = edit_element.querySelectorAll( 'style' );

						if ( array_element_styles.length != 0 ) {

							array_element_styles[0].remove();

						}
						
						style_element_initial = '';

					}

				}

			};

			xhttp.open( 'POST', window.atob( ajax_url ), true);
			xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send( params );

		}

	}

}
