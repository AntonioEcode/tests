window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_container_faq_37_47' ).length != 0 ) {

		add_events_faq_37_47();

	}

}, false );

function add_events_faq_37_47() {

	array_container_faq = document.getElementsByClassName( 'ecode_container_faq_37_47' )[0].querySelectorAll( '.ecode_faq' );

	for ( var i = 0; i < array_container_faq.length; i++ ) {

		array_questions = array_container_faq[i].querySelectorAll( '.ecode_question' );

		for ( var j = 0; j < array_questions.length; j++ ) {

			array_questions[j].onclick = function() {

				current_click = this;

				container_faq = this.parentElement.parentElement;

				faq = this.parentElement;

				if ( faq.className.indexOf( 'ecode_faq_open' ) != -1 ) {

					faq.classList.remove( 'ecode_faq_open' );

				} else {

					array_faq = container_faq.getElementsByClassName( 'faq' );

					for ( var i = 0; i < array_faq.length; i++ ) {

						array_faq[i].classList.remove( 'ecode_faq_open' );

					}

					faq.classList.add( 'ecode_faq_open' );

				}

			}

		}

	}

}
