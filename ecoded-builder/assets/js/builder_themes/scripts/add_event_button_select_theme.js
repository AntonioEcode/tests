function add_event_button_select_theme() {

	document.getElementById( 'ecode_select_theme' ).onclick = function() {

		data_theme = this.getAttribute( 'data-theme' );

		document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
		document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

		ajax_select_theme( data_theme );

	}

}
