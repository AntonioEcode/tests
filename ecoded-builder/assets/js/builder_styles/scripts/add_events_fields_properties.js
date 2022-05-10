function add_events_fields_properties() {

	// color
	array_inputs_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="color_text"]' );

	if ( array_inputs_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_color.length; i++ ) {

			array_inputs_color[i].onchange = function() {

				update_element();

				index_colorpicker = document.getElementById( 'colorpicker_color_text' ).getAttribute( 'data-id' );

				destroy_colorpicker( index_colorpicker );

			}

		}

	}

	// backgrond-color
	array_inputs_bg_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="background_color_text"]' );

	if ( array_inputs_bg_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_bg_color.length; i++ ) {

			array_inputs_bg_color[i].onchange = function() {

				update_element();

				index_colorpicker = document.getElementById( 'colorpicker_background_color_text' ).getAttribute( 'data-id' );

				destroy_colorpicker( index_colorpicker );

			}

		}

	}

	// font-weight bold
	if ( document.getElementById( 'font_weight_bold' ) ) {

		document.getElementById( 'font_weight_bold' ).onchange = function() {

			update_element();

		}

	}

	// font-style italic
	if ( document.getElementById( 'font_style_italic' ) ) {

		document.getElementById( 'font_style_italic' ).onchange = function() {

			update_element();

		}

	}

	// text-decoration underline
	if ( document.getElementById( 'text_decoration_underline' ) ) {

		document.getElementById( 'text_decoration_underline' ).onchange = function() {

			update_element();

		}

	}

	// text-transform
	array_inputs_text_transform = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="text_transform"]' );

	if ( array_inputs_text_transform.length != 0 ) {

		for ( var i = 0; i < array_inputs_text_transform.length; i++ ) {

			array_inputs_text_transform[i].onchange = function() {

				update_element();

			}

		}

	}

	// text-align
	array_inputs_text_align = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="text_align"]' );

	if ( array_inputs_text_align.length != 0 ) {

		for ( var i = 0; i < array_inputs_text_align.length; i++ ) {

			array_inputs_text_align[i].onchange = function() {

				update_element();

			}

		}

	}

	// margin-top
	if ( document.getElementById( 'edit_margin_top' ) ) {

		document.getElementById( 'edit_margin_top' ).oninput = function() {

			update_element();

		}

	}

	// margin-bottom
	if ( document.getElementById( 'edit_margin_bottom' ) ) {

		document.getElementById( 'edit_margin_bottom' ).oninput = function() {

			update_element();

		}

	}

	// margin-left
	if ( document.getElementById( 'edit_margin_left' ) ) {

		document.getElementById( 'edit_margin_left' ).oninput = function() {

			update_element();

		}

	}

	// margin-right
	if ( document.getElementById( 'edit_margin_right' ) ) {

		document.getElementById( 'edit_margin_right' ).oninput = function() {

			update_element();

		}

	}

	// padding-top
	if ( document.getElementById( 'edit_padding_top' ) ) {

		document.getElementById( 'edit_padding_top' ).oninput = function() {

			update_element();

		}

	}

	// padding-bottom
	if ( document.getElementById( 'edit_padding_bottom' ) ) {

		document.getElementById( 'edit_padding_bottom' ).oninput = function() {

			update_element();

		}

	}

	// padding-left
	if ( document.getElementById( 'edit_padding_left' ) ) {

		document.getElementById( 'edit_padding_left' ).oninput = function() {

			update_element();

		}

	}

	// padding-right
	if ( document.getElementById( 'edit_padding_right' ) ) {

		document.getElementById( 'edit_padding_right' ).oninput = function() {

			update_element();

		}

	}

	// _border-top-left-radius
	if ( document.getElementById( 'edit_border_top_left_radius' ) ) {

		document.getElementById( 'edit_border_top_left_radius' ).oninput = function() {

			update_element();

		}

	}
	// _border-top-right-radius
	if ( document.getElementById( 'edit_border_top_right_radius' ) ) {

		document.getElementById( 'edit_border_top_right_radius' ).oninput = function() {

			update_element();

		}

	}
	// _border-bottom-left-radius
	if ( document.getElementById( 'edit_border_bottom_left_radius' ) ) {

		document.getElementById( 'edit_border_bottom_left_radius' ).oninput = function() {

			update_element();

		}

	}
	// _border-bottom-right-radius
	if ( document.getElementById( 'edit_border_bottom_right_radius' ) ) {

		document.getElementById( 'edit_border_bottom_right_radius' ).oninput = function() {

			update_element();

		}

	}

}
