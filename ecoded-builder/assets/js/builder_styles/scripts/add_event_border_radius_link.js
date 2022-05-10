function add_event_border_radius_link() {

	document.getElementById( 'button_border_radius_link' ).onclick = function() {

		if ( document.getElementById( 'button_border_radius_link' ).className.indexOf( 'button_border_radius_link_show' ) == -1 ) {

			document.getElementById( 'button_border_radius_link' ).classList.add( 'button_border_radius_link_show' );

			// Border radius all equal. Get the biggest border-radius
			border_radius_big = 0;

			array_inputs_border_radius = document.getElementById( 'container_border_radius' ).querySelectorAll( 'input[type="number"]' );

			for ( var i = 0; i < array_inputs_border_radius.length; i++ ) {

				border_radius_big = ( parseInt( array_inputs_border_radius[i].value ) > border_radius_big ) ? parseInt( array_inputs_border_radius[i].value ) : border_radius_big;

			}

			for ( var j = 0; j < array_inputs_border_radius.length; j++ ) {

				array_inputs_border_radius[j].value = border_radius_big;

			}

			update_border_radius();

		} else {

			document.getElementById( 'button_border_radius_link' ).classList.remove( 'button_border_radius_link_show' );

		}

	}

}
