var ecode_event_load;

/******************************************************************************/
/*****                              Onload                                *****/
/******************************************************************************/
window.addEventListener("load",function(event) {

	ecode_event_load = new Event( 'ecode_load' );

	if ( document.getElementsByClassName( 'ecode_button_template' ).length != 0 ) {

		add_event_ecode_select_template();

	}

	if ( document.getElementById( 'button_compile_theme' ) ) {

		ajax_compile_theme();

	}

	if ( document.getElementById( 'select_page_urls' ) ) {

		add_event_select_page_urls();

	}

	add_event_click_edit();

	// Events key ESC and click
	/******************************************************************************/
	/*****                    Hide elements click key ESC                     *****/
	/******************************************************************************/
	document.addEventListener('keydown', function(evt) {

	    evt = evt || window.event;

	    if ( evt.keyCode == 27 ) {

	        if ( document.getElementById( 'ecoded_builder_container_popup' ) ) {

				document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = '';
    			document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
    			document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_templates' );

				document.body.classList.remove( 'ecoded_builder_body_fixed' );

				if ( document.getElementsByClassName( 'ecoded_builder_element_selected' ).length != 0 ) {

					document.getElementsByClassName( 'ecoded_builder_element_selected' )[0].classList.remove( 'ecoded_builder_element_selected' );

				}

	        }

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

	});

	/******************************************************************************/
	/*****                  Hide elements click out of popup                  *****/
	/******************************************************************************/
	document.addEventListener('click', function(evt) {

	    id_element_click = evt.srcElement.id;
	    class_element_click = evt.srcElement.class;

		if ( id_element_click == 'ecoded_builder_container_popup' ) {

			document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = '';
			document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
			document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_templates' );

			document.body.classList.remove( 'ecoded_builder_body_fixed' );

			if ( document.getElementsByClassName( 'ecoded_builder_element_selected' ).length != 0 ) {

				document.getElementsByClassName( 'ecoded_builder_element_selected' )[0].classList.remove( 'ecoded_builder_element_selected' );

			}

		}

		if ( id_element_click == 'ecoded_builder_styles' ) {

			change_style_editor = false;

			if ( style_element_initial != '' ) {

				array_element_style = edit_element.querySelectorAll( 'style' );
				element_style = array_element_style[array_element_style.length - 1];

				style = element_style.innerHTML.split( '{' )[1];
				style = style.replace( '};', '' );

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

	});

},false);
