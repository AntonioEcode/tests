function add_event_button_close_styles() {

	document.getElementById( 'close_popup_styles' ).onclick = function() {

		if ( document.getElementById( 'ecoded_builder_styles' ) ) {

			change_style_editor = false;

			if ( style_element_initial != '' ) {

				array_element_style = edit_element.querySelectorAll( 'style' );

				element_style = array_element_style[array_element_style.length - 1];

				style = element_style.innerHTML.split( '{' )[1];
				style = style.replace( '}', '' );

				if ( style_element_initial != style ) {

					change_style_editor = true;

				}

			}

			if ( !change_style_editor ) {

				// Append new style in head
				if ( style_element_initial != '' ) {

					add_element_style_of_head( style_element_initial );

				}

				close_builder_styles();

			} else {

				if ( confirm( "¿Estás seguro de que desea salir sin guardar?" ) ) {

					close_builder_styles();

				}

			}

		}

	}

}
