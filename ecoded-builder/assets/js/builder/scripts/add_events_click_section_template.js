var section_id = '';
var section_type_id = '';
var old_template_id = '';

function add_events_click_section_template() {

	array_button_choose_section = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.button_choose_section, .ecoded_builder_button_choose_section' );

	if ( array_button_choose_section.length != 0 ) {

		for ( var i = 0; i < array_button_choose_section.length; i++ ) {

			array_button_choose_section[i].onclick = function() {

				section_id = this.getAttribute( 'data-section' );
				section_type_id = this.getAttribute( 'data-type' );
				old_template_id = this.getAttribute( 'data-template' );

				ajax_get_sections_of_section();

			}

		}

	}

	array_ecoded_builder_button_delete_section = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.ecoded_builder_button_delete_section' );

	if ( array_ecoded_builder_button_delete_section.length != 0 ) {

		for ( var i = 0; i < array_ecoded_builder_button_delete_section.length; i++ ) {

			array_ecoded_builder_button_delete_section[i].onclick = function() {

				if ( confirm( "¿Estás seguro de que desea eliminar el template?" ) ) {

					section_id = this.getAttribute( 'data-section' );
					section_type_id = this.getAttribute( 'data-type' );

					ajax_delete_section();

				}

			}

		}

	}

	array_ecoded_builder_button_change_section = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.ecoded_builder_button_change_section' );

	if ( array_ecoded_builder_button_change_section.length != 0 ) {

		for ( var i = 0; i < array_ecoded_builder_button_change_section.length; i++ ) {

			array_ecoded_builder_button_change_section[i].onclick = function() {

				section_to_move = this.parentElement;

				for ( var j = 0; j < array_ecoded_builder_button_change_section.length; j++ ) {

					array_ecoded_builder_button_change_section[j].classList.add( 'ecode_button_builder_disabled' );

				}

				add_sections_to_move_section( section_to_move );

			}

		}

	}


	array_ecoded_builder_button_global_content = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.ecoded_builder_button_global_content' );

	if ( array_ecoded_builder_button_global_content.length != 0 ) {

		for ( var i = 0; i < array_ecoded_builder_button_global_content.length; i++ ) {

			array_ecoded_builder_button_global_content[i].onclick = function() {

				add_links_global_contents( this );

			}

		}

	}

	array_ecoded_builder_button_hover = document.getElementById( 'ecode_page_template' ).querySelectorAll( '.ecoded_builder_button_hover' );

	if ( array_ecoded_builder_button_hover.length != 0 ) {

		for ( var i = 0; i < array_ecoded_builder_button_hover.length; i++ ) {

			array_ecoded_builder_button_hover[i].onclick = function() {

				data_section = this.getAttribute( 'data-section' );

				container_hover_effect = document.getElementById( 'section_' + data_section ).querySelectorAll( '.hover_effect' )[0];

				if ( container_hover_effect.className.indexOf( 'hover_effect_show' ) == -1 ) {

					container_hover_effect.classList.add( 'hover_effect_show' );

				} else {

					container_hover_effect.classList.remove( 'hover_effect_show' );

				}

			}

		}

	}

}
