function get_templates_of_section() {

	for ( var i = 0; i < array_sections_templates.length; i++ ) {

		id = array_sections_templates[i].id;

		if ( section_section_id == id ) {

			array_templates = array_sections_templates[i].templates;

			return_html = '';

			return_html += '<section class="ecoded_builder_container_popup_width">';

				return_html += '<section class="ecoded_builder_container_popup_header">';

					return_html += '<div class="arrow_title">';

						return_html += '<span id="return_sections" class="return_sections"><i>' + array_icons.icon_arrow_right + '</i></span>';

						return_html += '<h2>Seleccione una plantilla</h2>';

					return_html += '</div>';

					return_html += '<span id="close_popup" class="close_popup"><i>' + array_icons.icon_arrow_right + '</i></span>';

				return_html += '</section>';

				return_html += '<section id="section_sections" class="section_sections">';

				for ( var i = 0; i < array_templates.length; i++ ) {

					return_html += '<figure id="section_section_' + array_templates[i].id + '" class="figure_template"><img src="' + array_templates[i].screenshot +'" alt="' + array_templates[i].description + '" /></figure>';

				}

				return_html += '</section>';

				return_html += '<section class="ecoded_builder_container_popup_footer">';

					return_html += '<button id="select_change_section" class="ecode_button_builder ecode_button_builder_grey_2">Cambiar sección</button>';

				return_html += '</section>';

			return_html += '</section>';

			document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = return_html;
			document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_show' );
			document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_templates' );

			document.body.classList.add( 'ecoded_builder_body_fixed' );

			add_click_template_of_section();

			add_click_button_select_template();

			add_events_popup();

			break;

		}

	}

}
