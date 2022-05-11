function get_modified_properties() {

	custom_style = '';

	// font-size
	if ( document.getElementById( 'edit_font_size' ) && document.getElementById( 'edit_font_size' ).value != '' ) {

		value = document.getElementById( 'edit_font_size' ).value + 'px';

		if ( check_modified_properties( 'font-size', value ) ) {

			style = 'font-size:' + value + ';';

			custom_style += style;

		}

	}
	// letter-spacing
	if ( document.getElementById( 'edit_letter_spacing' ) && document.getElementById( 'edit_letter_spacing' ).value != '' ) {

		value = document.getElementById( 'edit_letter_spacing' ).value + 'px';

		if ( check_modified_properties( 'letter-spacing', value ) ) {

			style = 'letter-spacing:' + value + ';';

			custom_style += style;

		}

	}
	// line-height
	if ( document.getElementById( 'edit_line_height' ) && document.getElementById( 'edit_line_height' ).value != '' ) {

		value = document.getElementById( 'edit_line_height' ).value + 'px';

		if ( check_modified_properties( 'line-height', value ) ) {

			style = 'line-height:' + value + ';';

			custom_style += style;

		}

	}

	// color
	check_color = false;
	color_value = '';

	if ( document.getElementById( 'color_text_primary' ) && document.getElementById( 'color_text_primary' ).checked == true ) {

		check_color = true;
		color_value = document.getElementById( 'color_text_primary' ).value;

	}

	if ( document.getElementById( 'color_text_secondary' ) && document.getElementById( 'color_text_secondary' ).checked == true ) {

		check_color = true;
		color_value = document.getElementById( 'color_text_secondary' ).value;

	}

	if ( document.getElementById( 'color_text_black' ) && document.getElementById( 'color_text_black' ).checked == true ) {

		check_color = true;
		color_value = document.getElementById( 'color_text_black' ).value;

	}

	if ( document.getElementById( 'color_text_white' ) && document.getElementById( 'color_text_white' ).checked == true ) {

		check_color = true;
		color_value = document.getElementById( 'color_text_white' ).value;

	}

	if ( document.getElementById( 'colorpicker_color_text_hidden' ) && document.getElementById( 'colorpicker_color_text_hidden' ).value != '' ) {

		if ( !check_color ) {

			color_value = document.getElementById( 'colorpicker_color_text_hidden' ).value;

		}

	}

	if ( check_modified_properties( 'color', color_value ) && color_value != '' ) {

		style = 'color:' + color_value + ';';

		custom_style += style;

	}

	// background-color
	check_bg_color = false;
	bg_color_value = '';

	if ( document.getElementById( 'background_color_text_primary' ) && document.getElementById( 'background_color_text_primary' ).checked == true ) {

		check_bg_color = true;
		bg_color_value = document.getElementById( 'background_color_text_primary' ).value;

	}

	if ( document.getElementById( 'background_color_text_secondary' ) && document.getElementById( 'background_color_text_secondary' ).checked == true ) {

		check_bg_color = true;
		bg_color_value = document.getElementById( 'background_color_text_secondary' ).value;

	}

	if ( document.getElementById( 'background_color_text_black' ) && document.getElementById( 'background_color_text_black' ).checked == true ) {

		check_bg_color = true;
		bg_color_value = document.getElementById( 'background_color_text_black' ).value;

	}

	if ( document.getElementById( 'background_color_text_white' ) && document.getElementById( 'background_color_text_white' ).checked == true ) {

		check_bg_color = true;
		bg_color_value = document.getElementById( 'background_color_text_white' ).value;

	}

	if ( document.getElementById( 'colorpicker_background_color_text_hidden' ) && document.getElementById( 'colorpicker_background_color_text_hidden' ).value != '' ) {

		if ( !check_bg_color ) {

			bg_color_value = document.getElementById( 'colorpicker_background_color_text_hidden' ).value;

		}

	}

	if ( bg_color_value != '' ) {

		if ( check_modified_properties( 'background-color', bg_color_value ) ) {

			style = 'background-color:' + bg_color_value + ';';

			custom_style += style;

		}

	}

	// font-weight bold
	if ( document.getElementById( 'font_weight_bold' ) ) {

		font_weight = document.getElementById( 'font_weight_bold' ).checked == true ? 'bold' : 'normal';

		if ( check_modified_properties( 'font-weight', font_weight ) ) {

			style = 'font-weight:' + font_weight + ';';

			custom_style += style;

		}

	}

	// font-styly italic
	if ( document.getElementById( 'font_style_italic' ) ) {

		font_style = document.getElementById( 'font_style_italic' ).checked == true ? 'italic' : 'normal';

		if ( check_modified_properties( 'font-style', font_style ) ) {

			style = 'font-style:' + font_style + ';';

			custom_style += style;

		}

	}

	// font-styly underline
	if ( document.getElementById( 'text_decoration_underline' ) ) {

		text_decoration = document.getElementById( 'text_decoration_underline' ).checked == true ? 'underline' : 'initial';

		if ( check_modified_properties( 'text-decoration', text_decoration ) ) {

			style = 'text-decoration:' + text_decoration + ';';

			custom_style += style;

		}

	}

	// text-transform initial
	if ( document.getElementById( 'text_transform_initial' ) && document.getElementById( 'text_transform_initial' ).checked == true ) {

		value = 'initial';

		if ( check_modified_properties( 'text-transform', value ) ) {

			style = 'text-transform:' + value + ';';

			custom_style += style;

		}

	}

	// text-transform uppercase
	if ( document.getElementById( 'text_transform_uppercase' ) && document.getElementById( 'text_transform_uppercase' ).checked == true ) {

		value = 'uppercase';

		if ( check_modified_properties( 'text-transform', value ) ) {

			style = 'text-transform:' + value + ';';

			custom_style += style;

		}

	}

	// text-transform lowercase
	if ( document.getElementById( 'text_transform_lowercase' ) && document.getElementById( 'text_transform_lowercase' ).checked == true ) {

		value = 'lowercase';

		if ( check_modified_properties( 'text-transform', value ) ) {

			style = 'text-transform:' + value + ';';

			custom_style += style;

		}

	}

	// text-align left
	if ( document.getElementById( 'text_align_left' ) && document.getElementById( 'text_align_left' ).checked == true ) {

		value = 'left';

		if ( check_modified_properties( 'text-align', value ) ) {

			style = 'text-align:' + value + ';';

			custom_style += style;

		}

	}

	// text-align center
	if ( document.getElementById( 'text_align_center' ) && document.getElementById( 'text_align_center' ).checked == true ) {

		value = 'center';

		if ( check_modified_properties( 'text-align', value ) ) {

			style = 'text-align:' + value + ';';

			custom_style += style;

		}

	}

	// text-align right
	if ( document.getElementById( 'text_align_right' ) && document.getElementById( 'text_align_right' ).checked == true ) {

		value = 'right';

		if ( check_modified_properties( 'text-align', value ) ) {

			style = 'text-align:' + value + ';';

			custom_style += style;

		}

	}

	// text-align justify
	if (
		document.getElementById( 'text_align_justify' ) &&
		document.getElementById( 'text_align_justify' ).checked == true
	) {

		value = 'justify';

		if ( check_modified_properties( 'text-align', value ) ) {

			style = 'text-align:' + value + ';';

			custom_style += style;

		}

	}

	// text-shadow
	if (
		document.getElementById( 'edit_text_shadow_x' ) &&
		document.getElementById( 'edit_text_shadow_x' ).value != '' &&
		document.getElementById( 'edit_text_shadow_y' ) &&
		document.getElementById( 'edit_text_shadow_y' ).value != '' &&
		document.getElementById( 'edit_text_shadow_blur' ) &&
		document.getElementById( 'edit_text_shadow_blur' ).value != '' &&
		document.getElementById( 'colorpicker_text_shadow_color_text_hidden' ) &&
		document.getElementById( 'colorpicker_text_shadow_color_text_hidden' ).value != ''
	) {

		value_text_shadow_x = document.getElementById( 'edit_text_shadow_x' ).value + 'px';
		value_text_shadow_y = document.getElementById( 'edit_text_shadow_y' ).value + 'px';
		value_text_shadow_blur = document.getElementById( 'edit_text_shadow_blur' ).value + 'px';
		value_text_shadow_color = document.getElementById( 'colorpicker_text_shadow_color_text_hidden' ).value;

		value = value_text_shadow_x + ' ' + value_text_shadow_y + ' ' + value_text_shadow_blur + ' ' + value_text_shadow_color;

		if ( check_modified_properties( 'text-shadow', value ) ) {

			style = 'text-shadow:' + value + ';';

			custom_style += style;

		}

	}

	// box-shadow
	if (
		document.getElementById( 'edit_box_shadow_x' ) &&
		document.getElementById( 'edit_box_shadow_x' ).value != '' &&
		document.getElementById( 'edit_box_shadow_y' ) &&
		document.getElementById( 'edit_box_shadow_y' ).value != '' &&
		document.getElementById( 'edit_box_shadow_blur' ) &&
		document.getElementById( 'edit_box_shadow_blur' ).value != '' &&
		document.getElementById( 'edit_box_shadow_spread' ) &&
		document.getElementById( 'edit_box_shadow_spread' ).value != '' &&
		document.getElementById( 'colorpicker_box_shadow_color_text_hidden' ) &&
		document.getElementById( 'colorpicker_box_shadow_color_text_hidden' ).value != ''
	) {

		value_box_shadow_x = document.getElementById( 'edit_box_shadow_x' ).value + 'px';
		value_box_shadow_y = document.getElementById( 'edit_box_shadow_y' ).value + 'px';
		value_box_shadow_blur = document.getElementById( 'edit_box_shadow_blur' ).value + 'px';
		value_box_shadow_spread = document.getElementById( 'edit_box_shadow_spread' ).value + 'px';
		value_box_shadow_color = document.getElementById( 'colorpicker_box_shadow_color_text_hidden' ).value;

		value = value_box_shadow_x + ' ' + value_box_shadow_y + ' ' + value_box_shadow_blur + ' ' + value_box_shadow_spread + ' ' + value_box_shadow_color;

		if ( check_modified_properties( 'box-shadow', value ) ) {

			style = 'box-shadow:' + value + ';';

			custom_style += style;

		}

	}

	// margin-top
	if ( document.getElementById( 'edit_margin_top' ) && document.getElementById( 'edit_margin_top' ).value != '' ) {

		value = document.getElementById( 'edit_margin_top' ).value + 'px';

		if ( check_modified_properties( 'margin-top', value ) ) {

			style = 'margin-top:' + value + ';';

			custom_style += style;

		}

	}

	// margin-bottom
	if ( document.getElementById( 'edit_margin_bottom' ) && document.getElementById( 'edit_margin_bottom' ).value != '' ) {

		value = document.getElementById( 'edit_margin_bottom' ).value + 'px';

		if ( check_modified_properties( 'margin-bottom', value ) ) {

			style = 'margin-bottom:' + value + ';';

			custom_style += style;

		}

	}

	// margin-left
	if ( document.getElementById( 'edit_margin_left' ) && document.getElementById( 'edit_margin_left' ).value != '' ) {

		value = document.getElementById( 'edit_margin_left' ).value + 'px';

		if ( check_modified_properties( 'margin-left', value ) ) {

			style = 'margin-left:' + value + ';';

			custom_style += style;

		}

	}

	// margin-right
	if ( document.getElementById( 'edit_margin_right' ) && document.getElementById( 'edit_margin_right' ).value != '' ) {

		value = document.getElementById( 'edit_margin_right' ).value + 'px';

		if ( check_modified_properties( 'margin-right', value ) ) {

			style = 'margin-right:' + value + ';';

			custom_style += style;

		}

	}

	// padding-top
	if ( document.getElementById( 'edit_padding_top' ) && document.getElementById( 'edit_padding_top' ).value != '' ) {

		value = document.getElementById( 'edit_padding_top' ).value + 'px';

		if ( check_modified_properties( 'padding-top', value ) ) {

			style = 'padding-top:' + value + ';';

			custom_style += style;

		}

	}

	// padding-bottom
	if ( document.getElementById( 'edit_padding_bottom' ) && document.getElementById( 'edit_padding_bottom' ).value != '' ) {

		value = document.getElementById( 'edit_padding_bottom' ).value + 'px';

		if ( check_modified_properties( 'padding-bottom', value ) ) {

			style = 'padding-bottom:' + value + ';';

			custom_style += style;

		}

	}

	// padding-left
	if ( document.getElementById( 'edit_padding_left' ) && document.getElementById( 'edit_padding_left' ).value != '' ) {

		value = document.getElementById( 'edit_padding_left' ).value + 'px';

		if ( check_modified_properties( 'padding-left', value ) ) {

			style = 'padding-left:' + value + ';';

			custom_style += style;

		}

	}

	// padding-right
	if ( document.getElementById( 'edit_padding_right' ) && document.getElementById( 'edit_padding_right' ).value != '' ) {

		value = document.getElementById( 'edit_padding_right' ).value + 'px';

		if ( check_modified_properties( 'padding-right', value ) ) {

			style = 'padding-right:' + value + ';';

			custom_style += style;

		}

	}

	// border-top-left-radius
	if ( document.getElementById( 'edit_border_top_left_radius' ) && document.getElementById( 'edit_border_top_left_radius' ).value != '' ) {

		value = document.getElementById( 'edit_border_top_left_radius' ).value + 'px';

		if ( check_modified_properties( 'border-top-left-radius', value ) ) {

			style = 'border-top-left-radius:' + value + ';';

			custom_style += style;

		}

	}

	// border-top-right-radius
	if ( document.getElementById( 'edit_border_top_right_radius' ) && document.getElementById( 'edit_border_top_right_radius' ).value != '' ) {

		value = document.getElementById( 'edit_border_top_right_radius' ).value + 'px';

		if ( check_modified_properties( 'border-top-right-radius', value ) ) {

			style = 'border-top-right-radius:' + value + ';';

			custom_style += style;

		}

	}

	// border-bottom-left-radius
	if ( document.getElementById( 'edit_border_bottom_left_radius' ) && document.getElementById( 'edit_border_bottom_left_radius' ).value != '' ) {

		value = document.getElementById( 'edit_border_bottom_left_radius' ).value + 'px';

		if ( check_modified_properties( 'border-bottom-left-radius', value ) ) {

			style = 'border-bottom-left-radius:' + value + ';';

			custom_style += style;

		}

	}

	// border-bottom-right-radius
	if ( document.getElementById( 'edit_border_bottom_right_radius' ) && document.getElementById( 'edit_border_bottom_right_radius' ).value != '' ) {

		value = document.getElementById( 'edit_border_bottom_right_radius' ).value + 'px';

		if ( check_modified_properties( 'border-bottom-right-radius', value ) ) {

			style = 'border-bottom-right-radius:' + value + ';';

			custom_style += style;

		}

	}

	// border
	if (
		document.getElementById( 'edit_border_width' ) &&
		document.getElementById( 'editor_border_style' )
	) {

		border_width = document.getElementById( 'edit_border_width' ).value;
		border_style = document.getElementById( 'editor_border_style' ).value;
		border_color = get_color_property( 'border' );

		if ( border_width != '' && border_style != '' && border_color != '' ) {

			value = border_width + 'px ' + border_style + ' ' + border_color;

			if ( check_modified_properties( 'border', value ) ) {

				style = 'border:' + value + ';';

				custom_style += style;

			}

		}

	}

	// border-top
	if (
		document.getElementById( 'edit_border_top_width' ) &&
		document.getElementById( 'editor_border_top_style' )
	) {

		border_width = document.getElementById( 'edit_border_top_width' ).value;
		border_style = document.getElementById( 'editor_border_top_style' ).value;
		border_color = get_color_property( 'border_top' );

		if ( border_width != '' && border_style != '' && border_color != '' ) {

			value = border_width + 'px ' + border_style + ' ' + border_color;

			if ( check_modified_properties( 'border-top', value ) ) {

				style = 'border-top:' + value + ';';

				custom_style += style;

			}

		}

	}

	// border-bottom
	if (
		document.getElementById( 'edit_border_bottom_width' ) &&
		document.getElementById( 'editor_border_bottom_style' )
	) {

		border_width = document.getElementById( 'edit_border_bottom_width' ).value;
		border_style = document.getElementById( 'editor_border_bottom_style' ).value;
		border_color = get_color_property( 'border_bottom' );

		if ( border_width != '' && border_style != '' && border_color != '' ) {

			value = border_width + 'px ' + border_style + ' ' + border_color;

			if ( check_modified_properties( 'border-bottom', value ) ) {

				style = 'border-bottom:' + value + ';';

				custom_style += style;

			}

		}

	}

	// border-left
	if (
		document.getElementById( 'edit_border_left_width' ) &&
		document.getElementById( 'editor_border_left_style' )
	) {

		border_width = document.getElementById( 'edit_border_left_width' ).value;
		border_style = document.getElementById( 'editor_border_left_style' ).value;
		border_color = get_color_property( 'border_left' );

		if ( border_width != '' && border_style != '' && border_color != '' ) {

			value = border_width + 'px ' + border_style + ' ' + border_color;

			if ( check_modified_properties( 'border-left', value ) ) {

				style = 'border-left:' + value + ';';

				custom_style += style;

			}

		}

	}

	// border-right
	if (
		document.getElementById( 'edit_border_right_width' ) &&
		document.getElementById( 'editor_border_right_style' )
	) {

		border_width = document.getElementById( 'edit_border_right_width' ).value;
		border_style = document.getElementById( 'editor_border_right_style' ).value;
		border_color = get_color_property( 'border_right' );

		if ( border_width != '' && border_style != '' && border_color != '' ) {

			value = border_width + 'px ' + border_style + ' ' + border_color;

			if ( check_modified_properties( 'border-right', value ) ) {

				style = 'border-right:' + value + ';';

				custom_style += style;

			}

		}

	}

	return custom_style;

}
