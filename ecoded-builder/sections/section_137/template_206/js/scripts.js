window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_countdown_137_206' ) ) {

		initialize_countdown_137_206();

	}

}, false );

function initialize_countdown_137_206() {

	show_countdown_137_206 = false;

	countdown_date_137_206 = document.getElementById( 'ecode_countdown_137_206' ).getAttribute( 'data-countdown' );

	// Update the count down every 1 second
	countdown_137_206 = setInterval(function() {

		if ( document.getElementById( 'ecode_countdown_137_206' ) ) {

			// Get today's date and time
			now = new Date().getTime();

			// Find the distance between now and the count down date
			distance = new Date( countdown_date_137_206 ).getTime() - now;

			// Time calculations for days, hours, minutes and seconds
			days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
			hours = Math.floor( (distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
			minutes = Math.floor( (distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
			seconds = Math.floor( (distance % ( 1000 * 60 ) ) / 1000 );

			if ( days >= 0 && hours >= 0 && minutes >= 0 && seconds >= 0 ) {

				// Change html
				document.getElementById( 'ecode_countdown_137_206_days' ).innerHTML = ( days >= 0 && days < 10 ) ? '0' + days : days;
				document.getElementById( 'ecode_countdown_137_206_hours' ).innerHTML = ( hours >= 0 && hours < 10 ) ? '0' + hours : hours;
				document.getElementById( 'ecode_countdown_137_206_minutes' ).innerHTML = ( minutes >= 0 && minutes < 10 ) ? '0' + minutes : minutes;
				document.getElementById( 'ecode_countdown_137_206_seconds' ).innerHTML = ( seconds >= 0 && seconds < 10 ) ? '0' + seconds : seconds;

			}

			// Show countdown
			if ( !show_countdown_137_206 ) {

				document.getElementById( 'ecode_countdown_137_206' ).classList.add( 'ecode_countdown_137_206_show' );

				show_countdown_137_206 = true;

			}

			// If the count down is over, write some text
			if ( distance < 0 ) {

				clearInterval( countdown_137_206 );

			}

		}

	}, 1000);

}
