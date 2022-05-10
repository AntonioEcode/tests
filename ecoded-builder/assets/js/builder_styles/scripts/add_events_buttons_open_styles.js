function add_events_buttons_open_styles() {

	array_buttons_open_styles = document.getElementsByClassName( 'ecode_button_open_styles' );

	for ( var i = 0; i < array_buttons_open_styles.length; i++ ) {

		array_buttons_open_styles[i].onclick = function() {

			data_id = this.getAttribute( 'data-id' );
			current_button = this;
			content_styles = document.querySelectorAll( '.content_styles[data-id="' + data_id + '"]' );

			if ( document.querySelectorAll( '.content_styles[data-id="' + data_id + '"]' ).length != 0 ) {

				content_styles = document.querySelectorAll( '.content_styles[data-id="' + data_id + '"]' )[0];

				if ( content_styles.className.indexOf( 'content_styles_show' ) == -1 ) {

					array_content_styles_show = document.getElementsByClassName( 'content_styles_show' );

					if ( array_content_styles_show.length != 0 ) {

						for ( var i = 0; i < array_content_styles_show.length; i++ ) {

							array_content_styles_show[i].classList.remove( 'content_styles_show' );

						}

					}

					array_button_open_styles_selected = document.getElementsByClassName( 'ecode_button_open_styles_selected' );

					if ( array_button_open_styles_selected.length != 0 ) {

						for ( var i = 0; i < array_button_open_styles_selected.length; i++ ) {

							array_button_open_styles_selected[i].classList.remove( 'ecode_button_open_styles_selected' );

						}

					}

					content_styles.classList.add( 'content_styles_show' );
					current_button.classList.add( 'ecode_button_open_styles_selected' );

				} else {

					content_styles.classList.remove( 'content_styles_show' );
					current_button.classList.remove( 'ecode_button_open_styles_selected' );

				}

			}

		}

	}

}
