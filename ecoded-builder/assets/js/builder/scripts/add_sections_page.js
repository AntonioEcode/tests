var total_sections_page;
var count_sections_page = 0;
var return_html_sections_page = '';

function add_sections_page( array_page_type ) {

	array_page_type_sections = array_page_type.sections;

	total_sections_page = array_page_type_sections.length;

	if ( total_sections_page > count_sections_page ) {

		template_code = array_page_type_sections[count_sections_page].template_code;

		// Class of sections of content
		class_section = 'section_template';

		if ( array_page_type_sections[count_sections_page].section_type_name == 'Bloque content' ) {

			class_section += ' section_template_content';

		}

		// Get HTML section
		return_html_sections_page += '<section id="section_' + array_page_type_sections[count_sections_page].page_section_id + '" class="' + class_section + '">';

		section_template_id = ( array_page_type_sections[count_sections_page].section_template_id != null ) ? array_page_type_sections[count_sections_page].section_template_id : '';

		// Get HTML template
		if ( template_code ) {

			// Button delete section
			return_html_sections_page += '<span class="ecoded_builder_button_delete_section" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '" data-type="' + array_page_type_sections[count_sections_page].section_type_id + '" data-template="' + section_template_id + '">' + array_icons.icon_delete + '</span>';

			// Button change section
			return_html_sections_page += '<span class="ecoded_builder_button_choose_section" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '" data-type="' + array_page_type_sections[count_sections_page].section_type_id + '" data-template="' + section_template_id + '">' + array_icons.icon_edit + '</span>';

			if ( array_page_type_sections[count_sections_page].global_content_ready == true ) {

				// Button global contents
				return_html_sections_page += '<span class="ecoded_builder_button_global_content" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '" data-section-id="' + array_page_type_sections[count_sections_page].section_id + '" data-template="' + section_template_id + '">' + array_icons.icon_content + '</span>';

			}

			if ( template_code.html_code.indexOf( 'hover_effect' ) != -1 ) {

				// Button hover contents
				return_html_sections_page += '<span class="ecoded_builder_button_hover" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '">' + array_icons.icon_hover + '</span>';

			}

			// Button change position section
			if ( array_page_type_sections[count_sections_page].section_type_name == 'Bloque content' ) {

				return_html_sections_page += '<span class="ecoded_builder_button_change_section" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '" data-type="' + array_page_type_sections[count_sections_page].section_type_id + '" data-template="' + section_template_id + '">' + array_icons.icon_arrow_switch + '</span>';

			}

			// Get style default
			default_style = template_code.default_style;

			return_html_sections_page += template_code.html_code;
			return_html_sections_page += '</section>';

			// Load CSS and JS
			array_styles = template_code.styles;

			if ( array_styles.length != 0 ) {

				end_styles = false;

				count_array_styles = 0;

				array_load_style( array_styles );

			} else {

				end_styles = true;

			}

			if ( template_code ) {

				array_scripts = template_code.scripts;

				if ( array_scripts.length != 0 ) {

					end_scripts = false;

					count_array_scripts = 0;

					array_load_script( array_scripts );

				} else {

					end_scripts = true;

				}

			}

		} else {

				return_html_sections_page += '<section class="section_template_without">';

					icon_template = array_icons.icon_content_1;

					text_button = 'Elegir un bloque';

					if ( array_page_type_sections[count_sections_page].section_type_id == '1' ) {

						icon_template = array_icons.icon_header;

						text_button = 'Elegir un header';

					}

					if ( array_page_type_sections[count_sections_page].section_type_id == '2' ) {

						icon_template = array_icons.icon_footer;

						text_button = 'Elegir un footer';

					}

					if ( array_page_type_sections[count_sections_page].section_type_main == '1' ) {

						icon_template = array_icons.icon_main;

					}

					return_html_sections_page += '<i>' + icon_template + '</i>';

					return_html_sections_page += '<div>';

						return_html_sections_page += '<p class="title">' + array_page_type_sections[count_sections_page].section_type_name + '</p>';

						return_html_sections_page += '<p class="desc">' + array_page_type_sections[count_sections_page].section_type_description + '</p>';

					return_html_sections_page += '</div>';

					return_html_sections_page += '<span class="ecode_button_builder ecode_button_builder_grey button_choose_section" data-section="' + array_page_type_sections[count_sections_page].page_section_id + '" data-type="' + array_page_type_sections[count_sections_page].section_type_id + '" data-template="' + section_template_id + '">' + text_button + '</span>';

				return_html_sections_page += '</section>';

			return_html_sections_page += '</section>';

		}

		if ( !template_code ) {

			count_sections_page++;
			add_sections_page( array_page_type );

		}

	} else {

		return_custom_config = '';

		if ( custom_config != '' ) {

			return_custom_config = document.createElement('style');

			style_custom_config = '';

			for ( var key in custom_config ) {

				style = custom_config[key];

				for ( var element in style ) {

					element_style = style[element];

					style_custom_config += '#page_section_' + key + ' .' + element + '{';

					style_custom_config += element_style;

					style_custom_config += '}';

				}

			}

			return_custom_config.innerHTML = style_custom_config;

			document.getElementsByTagName( 'head' )[0].appendChild( return_custom_config );

		}

		document.getElementById( 'ecode_page_template' ).innerHTML = return_html_sections_page;

		window.dispatchEvent( ecode_event_load );

		add_events_click_section_template();

		add_event_click_edit();

		setTimeout(function(){

			document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );

		}, 200);

	}

}
