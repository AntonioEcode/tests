function add_event_reset_border() {

	document.getElementById( 'button_reset_border' ).onclick = function() {

		current_border_active = document.getElementsByClassName( 'container_border_show' )[0];

		// Resets values current border active
		array_inputs = current_border_active.querySelectorAll( 'input[type="range"], input[type="number"], input[type="radio"], select' );

		for ( var i = 0; i < array_inputs.length; i++ ) {

			if ( array_inputs[i].type == 'radio' ) {

				array_inputs[i].checked = false;

			} else {

				array_inputs[i].value = '';

			}

		}

		colorpicker_data_id = current_border_active.querySelectorAll( '.container_colorpicker' )[0].getAttribute( 'data-id' );

		destroy_colorpicker( colorpicker_data_id );

		update_border();

	}

}
