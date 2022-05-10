function ajax_delete_section() {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_delete_selected_template';

	params = '';

	params += 'action=' + action;
	params += '&page_id=' + page_id;
	params += '&page_section_id=' + section_id;
	params += '&section_type_id=' + section_type_id;

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse(xhttp.responseText);

			if ( response.success ) {

				document.getElementById( 'section_' + section_id ).innerHTML = '';

				// Get contents page
				array_page_type_sections = array_page_type.sections;

				for ( var i = 0; i < array_page_type_sections.length; i++ ) {

					if ( array_page_type_sections[i].page_section_id == section_id ) {

						return_html = '';

						return_html += '<section class="section_template_without">';

							icon_template = array_icons.icon_content_1;

							text_button = 'Elegir un bloque';

							if ( array_page_type_sections[i].section_type_id == '1' ) {

								icon_template = array_icons.icon_header;

								text_button = 'Elegir un header';

							}

							if ( array_page_type_sections[i].section_type_id == '2' ) {

								icon_template = array_icons.icon_footer;

								text_button = 'Elegir un footer';

							}

							if ( array_page_type_sections[i].section_type_main == '1' ) {

								icon_template = array_icons.icon_main;

							}

							return_html += '<i>' + icon_template + '</i>';

							return_html += '<div>';

								return_html += '<p class="title">' + array_page_type_sections[i].section_type_name + '</p>';

								return_html += '<p class="desc">' + array_page_type_sections[i].section_type_description + '</p>';

							return_html += '</div>';

							return_html += '<span class="ecode_button_builder ecode_button_builder_grey button_choose_section" data-section="' + array_page_type_sections[i].page_section_id + '" data-type="' + array_page_type_sections[i].section_type_id + '">' + text_button + '</span>';

						return_html += '</section>';

					}

				}

				// Delete custom config
				delete array_page_type.custom_config[parseInt( section_id )];

				// Add HTML default to section
				document.getElementById( 'section_' + section_id ).innerHTML = return_html;

				add_events_click_section_template();

				add_event_click_edit();

				old_template_id = '';

			}

		}

	};

	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

}
