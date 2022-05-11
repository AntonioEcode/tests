window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_countdown_147_217' ) ) {

		initialize_countdown_147_217();

	}

}, false );

function initialize_countdown_147_217() {

	show_countdown_147_217 = false;

	countdown_date_147_217 = document.getElementById( 'ecode_countdown_147_217' ).getAttribute( 'data-countdown' );

	// Update the count down every 1 second
	countdown_147_217 = setInterval(function() {

		if ( document.getElementById( 'ecode_countdown_147_217' ) ) {

			// Get today's date and time
			now = new Date().getTime();

			// Find the distance between now and the count down date
			distance = new Date( countdown_date_147_217 ).getTime() - now;

			// Time calculations for days, hours, minutes and seconds
			days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
			hours = Math.floor( (distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
			minutes = Math.floor( (distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
			seconds = Math.floor( (distance % ( 1000 * 60 ) ) / 1000 );

			if ( days >= 0 && hours >= 0 && minutes >= 0 && seconds >= 0 ) {

				// Change html
				document.getElementById( 'ecode_countdown_147_217_days' ).innerHTML = ( days >= 0 && days < 10 ) ? '0' + days : days;
				document.getElementById( 'ecode_countdown_147_217_hours' ).innerHTML = ( hours >= 0 && hours < 10 ) ? '0' + hours : hours;
				document.getElementById( 'ecode_countdown_147_217_minutes' ).innerHTML = ( minutes >= 0 && minutes < 10 ) ? '0' + minutes : minutes;
				document.getElementById( 'ecode_countdown_147_217_seconds' ).innerHTML = ( seconds >= 0 && seconds < 10 ) ? '0' + seconds : seconds;

			}

			// Show countdown
			if ( !show_countdown_147_217 ) {

				document.getElementById( 'ecode_countdown_147_217' ).classList.add( 'ecode_countdown_147_217_show' );

				show_countdown_147_217 = true;

			}

			// If the count down is over, write some text
			if ( distance < 0 ) {

				clearInterval( countdown_147_217 );

			}

		}

	}, 1000);

}
