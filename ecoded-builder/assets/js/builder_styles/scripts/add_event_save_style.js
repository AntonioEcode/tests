function add_event_save_style() {

	document.getElementById( 'button_save_style' ).onclick = function() {

		modified_properties = get_modified_properties();

		// Append new style in head
		if ( modified_properties != '' ) {

			add_element_style_of_head( modified_properties );

		}

		// Update style element in JSON
		if ( array_page_type.custom_config[section_id_edit_element] ) {

			if ( array_page_type.custom_config[section_id_edit_element][data_element] ) {

				array_page_type.custom_config[section_id_edit_element][data_element] = new Array();

			}

		} else {

			array_page_type.custom_config[section_id_edit_element] = new Array();

			array_page_type.custom_config[section_id_edit_element][data_element] = new Array();

		}

		array_page_type.custom_config[section_id_edit_element][data_element] = 	modified_properties;


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

		// Select service
		if ( modified_properties != '' ) {

			action = 'wpeb_update_custom_element_style';

		} else {

			action = 'wpeb_delete_custom_element_style';

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
		params = '';

		params += 'action=' + action;
		params += '&page_id=' + page_id;
		params += '&section_id=' + section_id_edit_element;
		params += '&section_type_id=' + section_type_id;
		params += '&element_id=' + data_element;

		if ( modified_properties != '' ) {

			params += '&style=' + modified_properties;

		}

		params += '&compile_style=' + section_style;

		xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function() {

			if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

				response = JSON.parse(xhttp.responseText);

				if ( response.status = 'OK' ) {

					close_builder_styles();

				}

			}

		};

		xhttp.open( 'POST', window.atob( ajax_url ), true);
		xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send( params );


	}

}
