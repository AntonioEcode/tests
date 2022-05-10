window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_139_template_208' ).length != 0 ) {

		add_events_139_208();

	}

}, false );

function add_events_139_208() {

	array_139_208 = document.getElementsByClassName( 'ecode_section_139_template_208' );

	for ( var i = 0; i < array_139_208.length; i++ ) {

		array_days = array_139_208[i].querySelectorAll( '.ecode_days' );

		if ( array_days.length != 0 ) {

			ecode_days = array_days[0];

			array_ecode_day = ecode_days.getElementsByClassName( 'ecode_day' );

			if ( array_ecode_day.length != 0 ) {

				for ( var j = 0; j < array_ecode_day.length; j++ ) {

					array_ecode_day[j].onclick = function() {

						current = this;

						if ( current.className.indexOf( 'ecode_day_current' ) == -1 ) {

							if ( current.parentElement.querySelectorAll( '.ecode_day_current' ).length != 0 ) {

								current.parentElement.querySelectorAll( '.ecode_day_current' )[0].classList.remove( 'ecode_day_current' );

							}

							current.classList.add( 'ecode_day_current' );

							current_id = parseInt( this.getAttribute( 'data-id' ) );

							ecode_section = current.parentElement.nextElementSibling;

							array_ecode_article = ecode_section.querySelectorAll( '.ecode_article' );

							for ( var l = 0; l < array_ecode_article.length; l++ ) {

								array_ecode_article[l].classList.add( 'ecode_article_hide' );

							}

							array_ecode_article[current_id].classList.remove( 'ecode_article_hide' );

						}

					}

				}

			}

		}

	}

}
