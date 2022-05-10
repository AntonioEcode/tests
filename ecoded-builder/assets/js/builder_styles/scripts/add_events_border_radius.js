function add_events_border_radius() {

	array_inputs_border_radius = document.getElementById( 'container_border_radius' ).querySelectorAll( 'input[type="number"]' );

	for ( var i = 0; i < array_inputs_border_radius.length; i++ ) {

		array_inputs_border_radius[i].oninput = function() {

			if ( document.getElementById( 'button_border_radius_link' ).className.indexOf( 'button_border_radius_link_show' ) != -1 ) {

				value_border_radius = this.value;

				array_inputs_border_radius = document.getElementById( 'container_border_radius' ).querySelectorAll( 'input[type="number"]' );

				for ( var j = 0; j < array_inputs_border_radius.length; j++ ) {

					array_inputs_border_radius[j].value = value_border_radius;

				}

			}

			update_border_radius();

		}

	}

}
