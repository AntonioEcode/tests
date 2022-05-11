function add_sections_to_move_section( section_to_move ) {

	next_section_to_move = section_to_move.nextElementSibling;

	arrar_sections_contents = document.getElementsByClassName( 'section_template_content' );

	last_section_to_move = arrar_sections_contents[arrar_sections_contents.length - 1];

	for ( var i = 0; i < arrar_sections_contents.length; i++ ) {

		section_content = arrar_sections_contents[i];

		if ( section_content != section_to_move && section_content != next_section_to_move ) {

			return_html = '<section class="section_select_to_move"><p>Mover aquí</p></section>';

			section_content.insertAdjacentHTML('beforebegin', return_html);

			if ( section_content == last_section_to_move ) {

				section_content.insertAdjacentHTML('afterend', return_html);

			}

		}

	}

	array_section_select_to_move = document.getElementsByClassName( 'section_select_to_move' );

	for ( var i = 0; i < array_section_select_to_move.length; i++ ) {

		array_section_select_to_move[i].onclick = function() {

			section_select_to_move = this;

			return_html = '<section id="' + section_to_move.id + '" class="' + section_to_move.className + '">' + section_to_move.innerHTML + '</section>';

			section_to_move.remove();

			section_select_to_move.insertAdjacentHTML( 'beforebegin', return_html );

			delete_array_elements_dom( array_section_select_to_move );

			add_events_click_section_template();

			add_event_click_edit();

			new_order_sections_templates = document.getElementsByClassName( 'section_template' );

			array_new_order = {};

			for ( var l = 0; l < new_order_sections_templates.length; l++ ) {

				section_id = new_order_sections_templates[l].id.split( '_' )[1];
				order = l + 1;

				array_new_order[l] = {
					id: parseInt( section_id ),
					order: order,
				};

			}

			array_ecoded_builder_button_change_section = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.ecoded_builder_button_change_section' );

			for ( var k = 0; k < array_ecoded_builder_button_change_section.length; k++ ) {

				array_ecoded_builder_button_change_section[k].classList.remove( 'ecode_button_builder_disabled' );

			}

			document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

			ajax_change_order_sections( array_new_order );

		}

	}

}

function delete_array_elements_dom( array_elements ) {

	last_element_to_remove = array_elements[array_elements.length - 1];

	last_element_to_remove.remove();

	if ( array_elements.length != 0 ) {

		delete_array_elements_dom( array_elements );

	}

}
