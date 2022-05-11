function add_event_buttons_global_content() {

	array_button_create = document.getElementsByClassName( 'button_create_global_content' );

	for ( var i = 0; i < array_button_create.length; i++ ) {

		array_button_create[i].onclick = function() {

			section_id = this.getAttribute( 'data-section' );
			template_id = this.getAttribute( 'data-template' );

			this.parentElement.click();

			ajax_create_global_content( section_id, template_id );

		}

	}

}
