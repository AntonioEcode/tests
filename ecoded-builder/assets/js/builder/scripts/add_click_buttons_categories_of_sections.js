function add_click_buttons_categories_of_sections( check_old_template ) {

	array_category_of_section = document.getElementsByClassName( 'category_of_section' );

	if ( array_category_of_section.length != 0 ) {

		scroll_horizontal_mouse( document.getElementById( 'list_categories' ) );

		for ( var i = 0; i < array_category_of_section.length; i++ ) {

			array_category_of_section[i].onclick = function() {

				if ( document.getElementsByClassName( 'category_of_section current' ).length != 0 ) {

					document.getElementsByClassName( 'category_of_section current' )[0].classList.remove( 'current' );

				}

				category_id = this.getAttribute( 'data-id' );

				this.classList.add( 'current' );

				category_of_section = category_id;

				document.getElementById( 'section_sections' ).innerHTML = array_categories[category_id].html;

				add_click_sections_of_section( check_old_template = true );

			}

		}

		if ( check_old_template == true && old_template_id != '' ) {

			for ( var l = 0; l < array_sections_templates.length; l++ ) {

				array_templates = array_sections_templates[l].templates;

				for ( var k = 0; k < array_templates.length; k++ ) {

					if ( array_templates[k].id == old_template_id ) {

						for ( var category_id in array_categories ) {

							category_html = array_categories[category_id].html;

							if ( category_html.indexOf( 'id="section_section_' + array_sections_templates[l].id + '"' ) != -1 ) {

								if ( document.querySelectorAll( '.category_of_section[data-id="' + category_id + '"]' ).length != 0 ) {

									document.querySelectorAll( '.category_of_section[data-id="' + category_id + '"]' )[0].click();

									old_template_id = '';

								}

							}

						}

					}

				}

			}

		}

	}

}
