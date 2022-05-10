var array_style_default = [];
var style_element_custom;
var array_style_custom = [];

function update_values_editor() {

	array_styles = {};

	array_sections = array_page_type.sections;

	for ( var i = 0; i < array_sections.length; i++ ) {

		if ( array_sections[i].page_section_id == section_id_edit_element ) {

			template_code = array_sections[i].template_code;

			break;

		}

	}

	array_style_default = get_properties_style( template_code.default_style[data_element] );

	// Get style custom to element
	if ( array_page_type.custom_config.length != 0 ) {

		if ( array_page_type.custom_config[section_id_edit_element] ) {

			style_element_custom = array_page_type.custom_config[section_id_edit_element][data_element];

			if ( typeof style_element_custom == 'string' ) {

				array_style_custom = get_properties_style( style_element_custom );

			}

		}

	}

	array_styles = array_style_default.concat( array_style_custom );

	// Delete duplicates properties
	array_styles_clear = {};

	for ( var i = 0, len = array_styles.length; i < len; i++ ) {

	    array_styles_clear[array_styles[i]['name']] = array_styles[i];

	}

	array_styles = new Array();

	for ( var key in array_styles_clear ) {

	    array_styles.push(array_styles_clear[key]);

	}

	// Update fields editor
	for ( var i = 0; i < array_styles.length; i++ ) {

		property_name = array_styles[i].name;
		property_name_replace = property_name.replaceAll( '-', '_' );
		property_value = array_styles[i].value;
		property_key = array_styles[i].key;

		if ( property_key == 'primary_color' ) {

			property_value = array_global_colors.primary_color;

		}

		if ( property_key == 'secondary_color' ) {

			property_value = array_global_colors.secondary_color;

		}

		if ( property_name == 'color' ) { // Update color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'background-color' ) { // Update background-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'font-weight' ) { // Update font-weight

			if ( tag_element == 'H1' || tag_element == 'H2' || tag_element == 'H3' || tag_element == 'H4' || tag_element == 'H5' || tag_element == 'H6' ) {

				if ( property_value != 'bold' ) {

					document.getElementById( 'font_weight_bold' ).checked = false;

				} else {

					document.getElementById( 'font_weight_bold' ).checked = true;

				}

			} else {

				document.getElementById( 'font_weight_bold' ).checked = true;

			}

		} else if ( property_name == 'font-style' ) { // Update font-style

			if ( property_value == 'italic' ) {

				document.getElementById( 'font_style_italic' ).checked = true;

			}

		} else if ( property_name == 'text-decoration' ) { // Update text-decoration

			if ( property_value == 'underline' ) {

				document.getElementById( 'text_decoration_underline' ).checked = true;

			}

		} else if ( property_name == 'text-transform' ) { // Update text-transform

			if ( document.getElementById( 'text_transform_' + property_value ) ) {

				document.getElementById( 'text_transform_' + property_value ).checked = true;

			}

		} else if ( property_name == 'text-align' ) { // Update text-align

			if ( document.getElementById( 'text_align_' + property_value ) ) {

				document.getElementById( 'text_align_' + property_value ).checked = true;

			}

		} else if ( property_name == 'text-shadow' ) { // Update text-shadow

			text_shadow_split = property_value.split( ' ' );

			value_shadow_x = text_shadow_split[0];
			value_shadow_y = text_shadow_split[1];
			value_shadow_blue = text_shadow_split[2];
			value_text_shadow_color = text_shadow_split[3];

			set_fields_default( property_name_replace + '_x', value_shadow_x );
			set_fields_default( property_name_replace + '_y', value_shadow_y );
			set_fields_default( property_name_replace + '_blur', value_shadow_blue );

			colorpicker_data_id = document.getElementById( 'colorpicker_' + property_name_replace + '_color_text' ).getAttribute( 'data-id' );

			new_colorpicker_edit[colorpicker_data_id].setColor( value_text_shadow_color );

		} else if ( property_name == 'box-shadow' ) { // Update box-shadow

			box_shadow_split = property_value.split( ' ' );

			value_shadow_x = box_shadow_split[0];
			value_shadow_y = box_shadow_split[1];
			value_shadow_blue = box_shadow_split[2];
			value_shadow_spread = box_shadow_split[3];
			value_box_shadow_color = box_shadow_split[4];

			set_fields_default( property_name_replace + '_x', value_shadow_x );
			set_fields_default( property_name_replace + '_y', value_shadow_y );
			set_fields_default( property_name_replace + '_blur', value_shadow_blue );
			set_fields_default( property_name_replace + '_spread', value_shadow_spread );

			colorpicker_data_id = document.getElementById( 'colorpicker_' + property_name_replace + '_color_text' ).getAttribute( 'data-id' );

			new_colorpicker_edit[colorpicker_data_id].setColor( value_box_shadow_color );

		} else if ( property_name == 'border-color' ) { // Update border-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'border-style' ) { // Update border-style

			document.getElementById( 'editor_border_style' ).value = property_value;

		} else if ( property_name == 'border-top-color' ) { // Update border-top-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'border-top-style' ) { // Update border-top-style

			document.getElementById( 'editor_border_top_style' ).value = property_value;

		} else if ( property_name == 'border-bottom-color' ) { // Update border-bottom-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'border-bottom-style' ) { // Update border-bottom-style

			document.getElementById( 'editor_border_bottom_style' ).value = property_value;

		} else if ( property_name == 'border-left-color' ) { // Update border-left-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'border-left-style' ) { // Update border-left-style

			document.getElementById( 'editor_border_left_style' ).value = property_value;

		} else if ( property_name == 'border-right-color' ) { // Update border-right-color

			set_color_to_field( property_name_replace, property_value );

		} else if ( property_name == 'border-right-style' ) { // Update border-right-style

			document.getElementById( 'editor_border_right_style' ).value = property_value;

		} else {

			set_fields_default( property_name_replace, property_value );

		}

	}

}

function set_fields_default( property, value ) {

	array_fields = document.getElementsByClassName( 'edit_' + property );

	for ( var j = 0; j < array_fields.length; j++ ) {

		array_fields[j].value = value.replace( 'px', '' );

	}

}

function set_color_to_field( property, value ) {

	primary_color = array_global_colors.primary_color;
	secondary_color = array_global_colors.secondary_color;

	if ( value == primary_color ) {

		document.getElementById( property + '_text_primary' ).checked = true;

	} else if ( value == secondary_color ) {

		document.getElementById( property + '_text_secondary' ).checked = true;

	} else if ( value == '#000000' ) {

		document.getElementById( property + '_text_black' ).checked = true;

	} else if ( value == '#FFFFFF' ) {

		document.getElementById( property + '_text_white' ).checked = true;

	} else {

		document.getElementById( property + '_text_primary' ).checked = false;
		document.getElementById( property + '_text_secondary' ).checked = false;
		document.getElementById( property + '_text_black' ).checked = false;
		document.getElementById( property + '_text_white' ).checked = false;

		colorpicker_data_id = document.getElementById( 'colorpicker_' + property + '_text' ).getAttribute( 'data-id' );
		document.getElementById( 'colorpicker_' + property + '_text' ).value = value;

		new_colorpicker_edit[colorpicker_data_id].setColor( value );

	}

}
