var ecode_event_load;

window.addEventListener("load",function(event) {

	ecode_event_load = new Event( 'ecode_load' );

	if ( document.getElementById( 'ecoded_builder_styles' ) ) {

		add_events_fields_properties();

	}

	if ( document.getElementsByClassName( 'ecode_button_open_styles' ).length != 0 ) {

		add_events_buttons_open_styles();

	}

	if ( document.querySelectorAll( '[data-edit], [data-edit-center], [data-edit-bottom-center], [data-edit-top-center], [data-edit-top-right], [data-edit-center-left]' ).length != 0 ) {

		add_event_click_edit();

	}

	if ( document.getElementsByClassName( 'style_range' ).length != 0 ) {

		add_events_ranges();

	}

	if ( document.getElementById( 'container_border_radius' ) ) {

		add_events_border_radius();

	}

	if ( document.getElementsByClassName( 'button_border' ).length != 0 ) {

		add_events_button_border();

		add_events_border();

	}

	if ( document.getElementById( 'button_border_radius_link' ) ) {

		add_event_border_radius_link();

	}

	if ( document.getElementById( 'button_reset_border' ) ) {

		add_event_reset_border();

	}

	if ( document.getElementById( 'button_save_style' ) ) {

		add_event_save_style();

	}

	if ( document.getElementById( 'button_reset_style' ) ) {

		add_event_reset_style();

	}

	if ( document.getElementById( 'close_popup_styles' ) ) {

		add_event_button_close_styles();

	}

},false);
