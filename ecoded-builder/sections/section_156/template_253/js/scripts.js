window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_156_template_253' ).length != 0 ) {

		add_events_156_253();

	}

}, false );

function add_events_156_253() {

	array_156_253 = document.getElementsByClassName( 'ecode_section_156_template_253' );

	for ( var i = 0; i < array_156_253.length; i++ ) {

		array_articles_event = array_156_253[i].querySelectorAll( '.ecode_article_event' );

		if ( array_articles_event.length != 0 ) {

			for (var j = 0; j < array_articles_event.length; j++) {

				array_articles_event[j].onclick = function() {

					current = this;

					if ( current.className.indexOf( 'ecode_article_event_show' ) == -1 ) {

						current.classList.add( 'ecode_article_event_show' );

					} else {

						current.classList.remove( 'ecode_article_event_show' );

					}

				}
			}

		}

	}

}
