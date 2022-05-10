function add_click_button_select_change_section() {

	check_old_template = false;

	array_sections_templates = response.data;

	return_html = '';

	return_html += '<section class="ecoded_builder_container_popup_width">';

		return_html += '<section class="ecoded_builder_container_popup_header">';

			if ( section_type_id == '1' ) {

				return_html += '<h2>Seleccione un header</h2>';

			} else if ( section_type_id == '2' ) {

				return_html += '<h2>Seleccione un footer</h2>';

			} else {

				return_html += '<h2>Seleccione un bloque</h2>';

			}

			return_html += '<span id="close_popup" class="close_popup"><i>' + array_icons.icon_arrow_right + '</i></span>';

		return_html += '</section>';

		if ( Object.keys( array_categories ).length != 0 ) {

			// Order array
			new_array_categories = [];

			cont_categories_order = 0;

			for ( var category_id in array_categories ) {

				category_data = array_categories[category_id];

				new_array_categories[cont_categories_order] = category_data;

				cont_categories_order++;

			}

			new_array_categories.sort( function( a, b ) {

				var key_a = a.order;
				var key_b = b.order;

				if ( key_a < key_b ) {

					return -1;

				} else if ( key_a > key_b ) {

					return 1;

				} else {

					return 0;

				}

			});

			return_html += '<section id="list_categories" class="list_categories">';

				cont_categories = 0;
				first_category = 0;

				for ( var index in new_array_categories ) {

					category_id = new_array_categories[index].id;

					class_current = '';

					if ( category_of_section != '' ) {

						if ( category_of_section == category_id ) {

							first_category = category_of_section;

							class_current = ' current';

						}

					} else {

						if ( cont_categories == 0 ) {

							first_category = category_id;

							class_current = ' current';

						}

					}

					return_html += '<span class="category_of_section' + class_current + '" data-id="' + category_id + '">' + new_array_categories[index].name + '</span>';

					if ( cont_categories == 0 ) {

						first_category = category_id;

					}

					cont_categories++;

				}

			return_html += '</section>';

		}

		return_html += '<section id="section_sections" class="section_sections">';

		if ( category_of_section == 0 ) {

			for ( var i = 0; i < array_sections_templates.length; i++ ) {

				return_html += '<figure id="section_section_' + array_sections_templates[i].id + '" class="figure_section"><img src="' + array_sections_templates[i].screenshot +'" alt="' + array_sections_templates[i].name + '" /></figure>';

			}

		} else {

			return_html += array_categories[category_of_section].html;

		}

		return_html += '</section>';

	return_html += '</section>';

	document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = return_html;
	document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_show' );
	document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_templates' );

	document.body.classList.add( 'ecoded_builder_body_fixed' );

	add_click_buttons_categories_of_sections( check_old_template );

	add_click_sections_of_section( check_old_template );

	add_events_popup();

}
