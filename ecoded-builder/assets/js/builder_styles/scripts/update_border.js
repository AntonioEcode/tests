function update_border() {

	return_style = '';

	// Border all
	border_width = document.getElementById( 'edit_border_width' ).value;
	border_style = document.getElementById( 'editor_border_style' ).value;
	border_color = get_color_property( 'border' );

	if ( border_width != '' && border_style != '' && border_color != '' ) {

		return_style += 'border:' + border_width + 'px ' + border_style + ' ' + border_color + ';';

	}

	// Border top
	border_top_width = document.getElementById( 'edit_border_top_width' ).value;
	border_top_style = document.getElementById( 'editor_border_top_style' ).value;
	border_top_color = get_color_property( 'border_top' );

	if ( border_top_width != '' && border_top_style != '' && border_top_color != '' ) {

		return_style += 'border-top:' + border_top_width + 'px ' + border_top_style + ' ' + border_top_color + ';';

	}

	// Border bottom
	border_bottom_width = document.getElementById( 'edit_border_bottom_width' ).value;
	border_bottom_style = document.getElementById( 'editor_border_bottom_style' ).value;
	border_bottom_color = get_color_property( 'border_bottom' );

	if ( border_bottom_width != '' && border_bottom_style != '' && border_bottom_color != '' ) {

		return_style += 'border-bottom:' + border_bottom_width + 'px ' + border_bottom_style + ' ' + border_bottom_color + ';';

	}

	// Border left
	border_left_width = document.getElementById( 'edit_border_left_width' ).value;
	border_left_style = document.getElementById( 'editor_border_left_style' ).value;
	border_left_color = get_color_property( 'border_left' );

	if ( border_left_width != '' && border_left_style != '' && border_left_color != '' ) {

		return_style += 'border-left:' + border_left_width + 'px ' + border_left_style + ' ' + border_left_color + ';';

	}

	// Border right
	border_right_width = document.getElementById( 'edit_border_right_width' ).value;
	border_right_style = document.getElementById( 'editor_border_right_style' ).value;
	border_right_color = get_color_property( 'border_right' );

	if ( border_right_width != '' && border_right_style != '' && border_right_color != '' ) {

		return_style += 'border-right:' + border_right_width + 'px ' + border_right_style + ' ' + border_right_color + ';';

	}

	// Add style border
	document.getElementById( 'border_example' ).style = return_style;

	update_element();

}

function get_color_property( property ) {

	color_code = '';

	// Checks colors default
	array_colors_default = document.querySelectorAll( 'input[type="radio"][name="' + property + '_color_text"]' );

	if ( array_colors_default.length != 0 ) {

		for ( var j = 0; j < array_colors_default.length; j++ ) {

			if ( array_colors_default[j].checked == true ) {

				color_code = array_colors_default[j].value;

				break;

			}

		}

	}

	if ( color_code == '' ) {

		color_code = document.getElementById( 'colorpicker_' + property + '_color_text_hidden' ).value;

	}

	return color_code;

}
