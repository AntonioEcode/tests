var array_sections_templates;
var array_categories;
var category_of_section = 0;

function ajax_get_sections_of_section() {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_get_sections_templates_by';

	params = '';

	params += 'action=' + action;
	params += '&section_type_id=' + section_type_id;

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse(xhttp.responseText);

			if ( response.success ) {

				array_sections_templates = response.data;

				// Get array categories of sections
				array_categories = {};

				return_html_sections = '';

				for ( var i = 0; i < array_sections_templates.length; i++ ) {

					array_categories_by_section = array_sections_templates[i].categories;

					section_is_main_block = array_sections_templates[i].is_main_block;

					if ( array_categories_by_section && section_is_main_block == null ) { // With categories

						for ( var j = 0; j < array_categories_by_section.length; j++ ) {

							return_html_sections = '';

							category = array_categories_by_section[j];

							category_name = category.name;
							category_id = category.id;
							category_order = parseInt( category.menu_order );

							if( array_categories[category_id] ) {

								return_html_sections += array_categories[category_id].html;

							}

							return_html_sections += '<figure id="section_section_' + array_sections_templates[i].id + '" class="figure_section"><img src="' + array_sections_templates[i].screenshot +'" alt="' + array_sections_templates[i].name + '" /></figure>';

							array_categories[category_id] = {
								id: category_id,
								html: return_html_sections,
								name: category_name,
								order: category_order,
							};

						}

					} else { // Without categories

						return_html_sections += '<figure id="section_section_' + array_sections_templates[i].id + '" class="figure_section"><img src="' + array_sections_templates[i].screenshot +'" alt="' + array_sections_templates[i].name + '" /></figure>';

					}

				}

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

								category_data = new_array_categories[index];

								class_current = '';

								if ( cont_categories == 0 ) {

									first_category = category_data.id;

									class_current = ' current';

								}

								return_html += '<span class="category_of_section' + class_current + '" data-id="' + category_data.id + '">' + category_data.name + '</span>';

								cont_categories++;

							}

						return_html += '</section>';

					}

					return_html += '<section id="section_sections" class="section_sections">';

						if ( Object.keys( array_categories ).length == 0 ) {

							category_of_section = 0;

							return_html += return_html_sections;

						} else {

							category_of_section = first_category;

							return_html += array_categories[first_category].html;

						}

					return_html += '</section>';

				return_html += '</section>';

				document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = return_html;
				document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_show' );
				document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_templates' );

				document.body.classList.add( 'ecoded_builder_body_fixed' );

				add_click_buttons_categories_of_sections( check_old_template = true );

				add_click_sections_of_section( check_old_template = true );

				add_events_popup();

			}

		}

	};

	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

}
