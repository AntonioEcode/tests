function add_event_select_page_urls() {

	document.getElementById( 'select_page_urls' ).onchange = function() {

		page_select = this.value;

		if ( page_select != '' ) {

			page_info = wp_page_data[page_select];

			document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_hidden' );
			document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_disabled' );
			document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_hidden' );
			document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_disabled' );

			document.getElementById( 'ecode_button_view_page' ).href = page_info.url;
			document.getElementById( 'ecode_button_edit_page' ).href = page_info.edit_url;

		} else {

			document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_hidden' );
			document.getElementById( 'ecode_button_view_page' ).classList.add( 'ecode_button_builder_disabled' );
			document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_hidden' );
			document.getElementById( 'ecode_button_edit_page' ).classList.add( 'ecode_button_builder_disabled' );

			document.getElementById( 'ecode_button_view_page' ).href = '#';
			document.getElementById( 'ecode_button_edit_page' ).href = '#';

		}

	}

}
