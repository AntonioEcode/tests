function add_links_global_contents( button ) {

	data_section = button.getAttribute( 'data-section' );
	data_section_id = button.getAttribute( 'data-section-id' );
	data_template = button.getAttribute( 'data-template' );

	array_page_type_sections = array_page_type.sections;

	for ( var i = 0; i < array_page_type_sections.length; i++ ) {

		if ( array_page_type_sections[i].page_section_id == data_section ) {

			global_content = array_page_type_sections[i].global_content;

			return_html = '';

			return_html += '<section class="ecoded_builder_container_popup_width">';

				return_html += '<section class="ecoded_builder_container_popup_header">';

					return_html += '<h2>Contenido global</h2>';

					return_html += '<span id="close_popup" class="close_popup"><i>' + array_icons.icon_arrow_right + '</i></span>';

				return_html += '</section>';

				return_html += '<section class="ecoded_builder_container_popup_global_content">';

					return_html += '<p class="title_list_links">Seleccionar el contenido global que se quiere modificar</p>';

					if ( global_content && global_content.length != 0 ) {

						return_html += '<ul>';

							for ( var j = 0; j < global_content.length; j++ ) {

								return_html += '<li><a href="' + global_content[j].global_content_edit_link + '" target="_blank">' + global_content[j].global_content_title + '</a></li>';

							}

						return_html += '</ul>';

					} else {

						return_html += '<p class="title_list_no_links">No existe ningún contenido global creado</p>';

					}

					return_html += '<p class="title_list_links">Crear un contenido global nuevo para este template</p>';

					return_html += '<div class="container_button">';

						return_html += '<button class="button_create_global_content ecode_button_builder ecode_button_builder_c_c" data-section="' + data_section_id + '" data-template="' + data_template + '">Crear contenido global</button>';

					return_html += '</div>';

				return_html += '</section>';

			return_html += '</section>';

			document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = return_html;
			document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_show' );

			add_events_popup();

			add_event_buttons_global_content();

		}

	}

}
