var data_element = '';
var edit_element = '';
var section_id_edit_element = '';
var tag_element = '';

function add_event_click_edit() {

	array_elements_edit = document.querySelectorAll( '[data-edit], [data-edit-center], [data-edit-bottom-center], [data-edit-top-center], [data-edit-top-right], [data-edit-center-left]' );

	// Stop submit forms
	if ( document.getElementById( 'ecode_page_template' ) ) {

		array_forms = document.getElementById( 'ecode_page_template' ).querySelectorAll( 'form' );

		for ( var j = 0; j < array_forms.length; j++ ) {

			array_forms[j].onsubmit = function() {

				return false;

			}

		}

	}

	for ( var i = 0; i < array_elements_edit.length; i++ ) {

		array_elements_edit[i].onclick = function(ev) {

			// Stop click overlapped elements.
			event.stopPropagation();

			edit_element = this;

			class_element = edit_element.className;

			tag_element = edit_element.tagName;

			parent_edit = '';

			if ( tag_element == 'A' ) {

				event.preventDefault();

			}

			if ( edit_element.hasAttribute( 'data-edit' ) ) {

				data_element = edit_element.getAttribute( 'data-edit' );

			} else if ( edit_element.hasAttribute( 'data-edit-center' ) ) {

				data_element = edit_element.getAttribute( 'data-edit-center' );

			} else if ( edit_element.hasAttribute( 'data-edit-bottom-center' ) ) {

				data_element = edit_element.getAttribute( 'data-edit-bottom-center' );

			} else if ( edit_element.hasAttribute( 'data-edit-top-center' ) ) {

				data_element = edit_element.getAttribute( 'data-edit-top-center' );

			} else if ( edit_element.hasAttribute( 'data-edit-top-right' ) ) {

				data_element = edit_element.getAttribute( 'data-edit-top-right' );

			} else if ( edit_element.hasAttribute( 'data-edit-center-left' ) ) {

				data_element = edit_element.getAttribute( 'data-edit-center-left' );

			}

			// Get style default to element
			section_id_edit_element = parseInt( get_section_id_to_edit( edit_element ) );

			edit_element.classList.add( 'ecoded_builder_element_selected' );

			// Initialize colorpicker
			if ( new_colorpicker_edit.length == 0 && colorpicker_edit_id.length == 0 ) {

				set_colorpicker_edit();

			}

			// Update values editor
			update_values_editor();

			// Update border radius
			update_border_radius();

			// Update border
			update_border();

			// Check show properties text editor
			array_property_text = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( '.property_text' );

			if (
				tag_element == 'DIV' ||
				tag_element == 'SECTION' ||
				tag_element == 'ARTICLE' ||
				tag_element == 'HEADER' ||
				tag_element == 'FOOTER' ||
				tag_element == 'FIGURE' ||
				tag_element == 'PICTURE' ||
				tag_element == 'I'
			) {

				for ( var i = 0; i < array_property_text.length; i++ ) {

					array_property_text[i].classList.add( 'property_text_hide' );

				}

			} else {

				for ( var i = 0; i < array_property_text.length; i++ ) {

					array_property_text[i].classList.remove( 'property_text_hide' );

				}

			}

			// Check show property background color editor
			array_property_background_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( '.property_background_color' );

			if ( class_element.indexOf( 'property_background_color_hide' ) != -1 ) {

				for ( var i = 0; i < array_property_background_color.length; i++ ) {

					array_property_background_color[i].classList.add( 'property_text_hide' );

				}

			} else {

				for ( var i = 0; i < array_property_background_color.length; i++ ) {

					array_property_background_color[i].classList.remove( 'property_text_hide' );

				}

			}

			// Show editor
			if ( document.getElementsByClassName( 'ecode_button_open_styles' )[0].className.indexOf( 'ecode_button_open_styles_selected' ) == -1 ) {

				document.getElementsByClassName( 'ecode_button_open_styles' )[0].click();

			}

			document.getElementById( 'ecoded_builder_styles' ).classList.add( 'ecoded_builder_styles_show' );
			document.body.classList.add( 'ecoded_builder_body_fixed' );

			return false;

		}

	}

}
