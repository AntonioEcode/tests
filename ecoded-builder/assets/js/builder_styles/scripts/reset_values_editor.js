function reset_values_editor() {

	// font-size
	array_font_size = document.getElementsByClassName( 'edit_font_size' );

	if ( array_font_size.length != 0 ) {

		for ( var i = 0; i < array_font_size.length; i++ ) {

			array_font_size[i].value = '';

		}

	}

	// letter-spacing
	array_letter_spacing = document.getElementsByClassName( 'edit_letter_spacing' );

	if ( array_letter_spacing.length != 0 ) {

		for ( var i = 0; i < array_letter_spacing.length; i++ ) {

			array_letter_spacing[i].value = '';

		}

	}

	// line-height
	array_line_height = document.getElementsByClassName( 'edit_line_height' );

	if ( array_line_height.length != 0 ) {

		for ( var i = 0; i < array_line_height.length; i++ ) {

			array_line_height[i].value = '';

		}

	}

	// color
	array_inputs_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="color_text"]' );

	if ( array_inputs_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_color.length; i++ ) {

			array_inputs_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_color_text' ) ) {

		index_colorpicker_color_text = document.getElementById( 'colorpicker_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_color_text );

	}

	// bg-color
	array_inputs_bg_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="background_color_text"]' );

	if ( array_inputs_bg_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_bg_color.length; i++ ) {

			array_inputs_bg_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_background_color_text' ) ) {

		index_colorpicker_bg_color_text = document.getElementById( 'colorpicker_background_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_bg_color_text );

	}

	// font-weight bold
	if ( document.getElementById( 'font_weight_bold' ) )  {

		document.getElementById( 'font_weight_bold' ).checked = false;

	}

	// font-style italic
	if ( document.getElementById( 'font_style_italic' ) )  {

		document.getElementById( 'font_style_italic' ).checked = false;

	}

	// text-decoration underline
	if ( document.getElementById( 'text_decoration_underline' ) )  {

		document.getElementById( 'text_decoration_underline' ).checked = false;

	}

	// text-transform
	array_inputs_text_transform = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="text_transform"]' );

	if ( array_inputs_text_transform.length != 0 ) {

		for ( var i = 0; i < array_inputs_text_transform.length; i++ ) {

			array_inputs_text_transform[i].checked = false;

		}

	}

	// text-align
	array_inputs_text_align = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="text_align"]' );

	if ( array_inputs_text_align.length != 0 ) {

		for ( var i = 0; i < array_inputs_text_align.length; i++ ) {

			array_inputs_text_align[i].checked = false;

		}

	}

	// text-shadow
	array_text_shadow_x = document.getElementsByClassName( 'edit_text_shadow_x' );

	if ( array_text_shadow_x.length != 0 ) {

		for ( var i = 0; i < array_text_shadow_x.length; i++ ) {

			array_text_shadow_x[i].value = '';

		}

	}

	array_text_shadow_y = document.getElementsByClassName( 'edit_text_shadow_y' );

	if ( array_text_shadow_y.length != 0 ) {

		for ( var i = 0; i < array_text_shadow_y.length; i++ ) {

			array_text_shadow_y[i].value = '';

		}

	}

	array_text_shadow_blur = document.getElementsByClassName( 'edit_text_shadow_blur' );

	if ( array_text_shadow_blur.length != 0 ) {

		for ( var i = 0; i < array_text_shadow_blur.length; i++ ) {

			array_text_shadow_blur[i].value = '';

		}

	}

	if ( document.getElementById( 'colorpicker_text_shadow_color_text' ) ) {

		index_colorpicker_text_shadow_color = document.getElementById( 'colorpicker_text_shadow_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_text_shadow_color );

	}

	// box-shadow
	array_box_shadow_x = document.getElementsByClassName( 'edit_box_shadow_x' );

	if ( array_box_shadow_x.length != 0 ) {

		for ( var i = 0; i < array_box_shadow_x.length; i++ ) {

			array_box_shadow_x[i].value = '';

		}

	}

	array_box_shadow_y = document.getElementsByClassName( 'edit_box_shadow_y' );

	if ( array_box_shadow_y.length != 0 ) {

		for ( var i = 0; i < array_box_shadow_y.length; i++ ) {

			array_box_shadow_y[i].value = '';

		}

	}

	array_box_shadow_blue = document.getElementsByClassName( 'edit_box_shadow_blur' );

	if ( array_box_shadow_blue.length != 0 ) {

		for ( var i = 0; i < array_box_shadow_blue.length; i++ ) {

			array_box_shadow_blue[i].value = '';

		}

	}

	array_box_shadow_spread = document.getElementsByClassName( 'edit_box_shadow_spread' );

	if ( array_box_shadow_spread.length != 0 ) {

		for ( var i = 0; i < array_box_shadow_spread.length; i++ ) {

			array_box_shadow_spread[i].value = '';

		}

	}

	if ( document.getElementById( 'colorpicker_box_shadow_color_text' ) ) {

		index_colorpicker_box_shadow_color = document.getElementById( 'colorpicker_box_shadow_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_box_shadow_color );

	}

	// margin-top
	if ( document.getElementById( 'edit_margin_top' ) ) {

		document.getElementById( 'edit_margin_top' ).value = '';

	}

	// margin-bottom
	if ( document.getElementById( 'edit_margin_bottom' ) ) {

		document.getElementById( 'edit_margin_bottom' ).value = '';

	}

	// margin-left
	if ( document.getElementById( 'edit_margin_left' ) ) {

		document.getElementById( 'edit_margin_left' ).value = '';

	}

	// margin-right
	if ( document.getElementById( 'edit_margin_right' ) ) {

		document.getElementById( 'edit_margin_right' ).value = '';

	}

	// padding-top
	if ( document.getElementById( 'edit_padding_top' ) ) {

		document.getElementById( 'edit_padding_top' ).value = '';

	}

	// padding-bottom
	if ( document.getElementById( 'edit_padding_bottom' ) ) {

		document.getElementById( 'edit_padding_bottom' ).value = '';

	}

	// padding-left
	if ( document.getElementById( 'edit_padding_left' ) ) {

		document.getElementById( 'edit_padding_left' ).value = '';

	}

	// padding-right
	if ( document.getElementById( 'edit_padding_right' ) ) {

		document.getElementById( 'edit_padding_right' ).value = '';

	}

	// border-top-left-radius
	if ( document.getElementById( 'edit_border_top_left_radius' ) ) {

		document.getElementById( 'edit_border_top_left_radius' ).value = '';

	}

	// border-top-right-radius
	if ( document.getElementById( 'edit_border_top_right_radius' ) ) {

		document.getElementById( 'edit_border_top_right_radius' ).value = '';

	}

	// border-bottom-left-radius
	if ( document.getElementById( 'edit_border_bottom_left_radius' ) ) {

		document.getElementById( 'edit_border_bottom_left_radius' ).value = '';

	}

	// border-bottom-right-radius
	if ( document.getElementById( 'edit_border_bottom_right_radius' ) ) {

		document.getElementById( 'edit_border_bottom_right_radius' ).value = '';

	}


	// Border
	array_border_width = document.getElementsByClassName( 'edit_border_width' );

	if ( array_border_width.length != 0 ) {

		for ( var i = 0; i < array_border_width.length; i++ ) {

			array_border_width[i].value = '';

		}

	}

	array_inputs_border_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="border_color_text"]' );

	if ( array_inputs_border_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_border_color.length; i++ ) {

			array_inputs_border_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_border_color_text' ) ) {

		index_colorpicker_border_color_text = document.getElementById( 'colorpicker_border_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_border_color_text );

	}

	if ( document.getElementById( 'editor_border_style' ) ) {

		document.getElementById( 'editor_border_style' ).value = '';

	}

	// Border-top
	array_border_top_width = document.getElementsByClassName( 'edit_border_top_width' );

	if ( array_border_top_width.length != 0 ) {

		for ( var i = 0; i < array_border_top_width.length; i++ ) {

			array_border_top_width[i].value = '';

		}

	}

	array_inputs_border_top_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="border_top_color_text"]' );

	if ( array_inputs_border_top_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_border_top_color.length; i++ ) {

			array_inputs_border_top_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_border_top_color_text' ) ) {

		index_colorpicker_border_top_color_text = document.getElementById( 'colorpicker_border_top_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_border_top_color_text );

	}

	if ( document.getElementById( 'editor_border_top_style' ) ) {

		document.getElementById( 'editor_border_top_style' ).value = '';

	}

	// Border-bottom
	array_border_bottom_width = document.getElementsByClassName( 'edit_border_bottom_width' );

	if ( array_border_bottom_width.length != 0 ) {

		for ( var i = 0; i < array_border_bottom_width.length; i++ ) {

			array_border_bottom_width[i].value = '';

		}

	}

	array_inputs_border_bottom_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="border_bottom_color_text"]' );

	if ( array_inputs_border_bottom_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_border_bottom_color.length; i++ ) {

			array_inputs_border_bottom_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_border_bottom_color_text' ) ) {

		index_colorpicker_border_bottom_color_text = document.getElementById( 'colorpicker_border_bottom_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_border_bottom_color_text );

	}

	if ( document.getElementById( 'editor_border_bottom_style' ) ) {

		document.getElementById( 'editor_border_bottom_style' ).value = '';

	}

	// Border-left
	array_border_left_width = document.getElementsByClassName( 'edit_border_left_width' );

	if ( array_border_left_width.length != 0 ) {

		for ( var i = 0; i < array_border_left_width.length; i++ ) {

			array_border_left_width[i].value = '';

		}

	}

	array_inputs_border_left_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="border_left_color_text"]' );

	if ( array_inputs_border_left_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_border_left_color.length; i++ ) {

			array_inputs_border_left_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_border_left_color_text' ) ) {

		index_colorpicker_border_left_color_text = document.getElementById( 'colorpicker_border_left_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_border_left_color_text );

	}

	if ( document.getElementById( 'editor_border_left_style' ) ) {

		document.getElementById( 'editor_border_left_style' ).value = '';

	}

	// Border-right
	array_border_right_width = document.getElementsByClassName( 'edit_border_right_width' );

	if ( array_border_right_width.length != 0 ) {

		for ( var i = 0; i < array_border_right_width.length; i++ ) {

			array_border_right_width[i].value = '';

		}

	}

	array_inputs_border_right_color = document.getElementById( 'ecoded_builder_styles' ).querySelectorAll( 'input[type="radio"][name="border_right_color_text"]' );

	if ( array_inputs_border_right_color.length != 0 ) {

		for ( var i = 0; i < array_inputs_border_right_color.length; i++ ) {

			array_inputs_border_right_color[i].checked = false;

		}

	}

	if ( document.getElementById( 'colorpicker_border_right_color_text' ) ) {

		index_colorpicker_border_right_color_text = document.getElementById( 'colorpicker_border_right_color_text' ).getAttribute( 'data-id' );

		destroy_colorpicker( index_colorpicker_border_right_color_text );

	}

	if ( document.getElementById( 'editor_border_right_style' ) ) {

		document.getElementById( 'editor_border_right_style' ).value = '';

	}

}
