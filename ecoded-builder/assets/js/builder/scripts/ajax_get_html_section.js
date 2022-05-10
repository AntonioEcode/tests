function ajax_get_html_section() {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_save_selected_template';

	params = '';

	params += 'action=' + action;
	params += '&page_id=' + page_id;
	params += '&page_section_id=' + section_id;
	params += '&section_type_id=' + section_type_id;
	params += '&section_id=' + section_section_id;
	params += '&template_id=' + template_id;
	params += '&old_template_id=' + old_template_id;

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse( xhttp.responseText );

			if ( response.success ) {

				template_code = response.data.template_code;

				array_page_sections = array_page_type.sections;

				for ( var i = 0; i < array_page_sections.length; i++ ) {

					if ( array_page_sections[i].page_section_id == section_id ) {

						// Add template data
						if ( !array_page_sections[i].template_code ) {

							array_page_sections[i].template_code = new Array();

						}

						array_page_sections[i].template_code = template_code;

						break;

					}

				}

				return_html = '';

				return_html += template_code.html_code;

				// Button delete section
				return_html += '<span class="ecoded_builder_button_delete_section" data-section="' + section_id + '" data-type="' + section_type_id + '" data-template="' + template_id + '">' + array_icons.icon_delete + '</span>';

				// Button change section
				return_html += '<span class="ecoded_builder_button_choose_section" data-section="' + section_id + '" data-type="' + section_type_id + '" data-template="' + template_id + '">' + array_icons.icon_edit + '</span>';

				if ( response.data.global_content_ready ) {

					// Button global content
					return_html += '<span class="ecoded_builder_button_global_content" data-section="' + section_id + '" data-section-id="' + section_section_id + '" data-template="' + template_id + '">' + array_icons.icon_content + '</span>';

				}

				if ( template_code.html_code.indexOf( 'hover_effect' ) != -1 ) {

					// Button hover contents
					return_html += '<span class="ecoded_builder_button_hover" data-section="' + section_id + '">' + array_icons.icon_hover + '</span>';

				}

				// Button change position section
				if ( document.getElementById( 'section_' + section_id ).className.indexOf( 'section_template_content' ) != -1 ) {

					return_html += '<span class="ecoded_builder_button_change_section" data-section="' + section_id + '" data-type="' + section_type_id + '" data-template="' + template_id + '">' + array_icons.icon_arrow_switch + '</span>';

				}

				document.getElementById( 'section_' + section_id ).innerHTML = return_html;

				// Get style default
				default_style = template_code.default_style;

				return_default_style = '';

				if ( default_style != '' ) {

					return_default_style = document.createElement('style');

					style_default_style = '';

					for ( var key in default_style ) {

						style = default_style[key];

						style_default_style += '#page_section_' + array_page_type_sections[i].page_section_id + ' .' + key + '{';

						style_default_style += style;

						style_default_style += '}';

					}

					return_default_style.innerHTML = style_default_style;

					document.getElementsByTagName( 'head' )[0].appendChild( return_default_style );

				}

				// Charge CSS and JS
				check_html_page_sections = false;

				array_styles = template_code.styles;

				if ( array_styles.length != 0 ) {

					count_array_styles = 0;

					array_load_style( array_styles );

				} else {

					end_styles = true;

				}

				array_scripts = template_code.scripts;

				if ( array_scripts.length != 0 ) {

					count_array_scripts = 0;

					array_load_script( array_scripts );

				} else {

					end_scripts = true;

				}

				// Change data template selected
				document.getElementById( 'section_' + section_id ).querySelectorAll( '.ecoded_builder_button_choose_section' )[0].setAttribute( 'data-template', template_id );
				document.getElementById( 'section_' + section_id ).querySelectorAll( '.ecoded_builder_button_delete_section' )[0].setAttribute( 'data-template', template_id );

				array_page_type_sections = array_page_type.sections;

				for ( var i = 0; i < array_page_type_sections.length; i++ ) {

					if ( array_page_type_sections[i].page_section_id == section_id ) {

						array_page_type_sections[i].section_template_id = template_id;

						break;

					}

				}

				array_page_type.custom_config[section_id] = '';

				add_events_click_section_template();

				add_event_click_edit();

			}

		}

	};

	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

	document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = '';
	document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
	document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_templates' );

	document.body.classList.remove( 'ecoded_builder_body_fixed' );

	document.getElementById( 'section_' + section_id ).innerHTML = return_html;

	add_event_click_edit();

}
