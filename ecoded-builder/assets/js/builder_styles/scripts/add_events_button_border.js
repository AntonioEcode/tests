function add_events_button_border() {

	array_button_border = document.getElementsByClassName( 'button_border' );

	for ( var i = 0; i < array_button_border.length; i++ ) {

		array_button_border[i].onclick = function () {

			current_button = this;
			data_border = current_button.getAttribute( 'data-border' );

			if ( document.getElementById( 'container_edit_border_' + data_border ).className.indexOf( 'container_border_show' ) == -1 ) {

				if ( document.querySelectorAll( '.container_border_show' ).length != 0 ) {

					document.querySelectorAll( '.container_border_show' )[0].classList.remove( 'container_border_show' );

				}

				if ( document.querySelectorAll( '.button_border_selected' ).length != 0 ) {

					document.querySelectorAll( '.button_border_selected' )[0].classList.remove( 'button_border_selected' );

				}

				document.getElementById( 'container_edit_border_' + data_border ).classList.add( 'container_border_show' );

				current_button.classList.add( 'button_border_selected' );

			}

		}

	}

}
