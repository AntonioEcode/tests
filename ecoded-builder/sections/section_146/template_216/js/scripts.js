window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_slide_146_216' ).length != 0 ) {

		array_sliders_146_216 = document.getElementsByClassName( 'ecode_slide_146_216' );

		for ( var i = 0; i < array_sliders_146_216.length; i++ ) {

			initialize_flickity_slider_146_216( array_sliders_146_216[i] );

		}

	}

	if ( document.getElementById( 'ecode_countdown_146_216' ) ) {

		initialize_countdown_146_216();

	}

}, false );

function initialize_flickity_slider_146_216( container_146_216 ) {

	var slider_146_216 = new Flickity( container_146_216, {
		// options
		draggable: false,
		prevNextButtons: false,
		pageDots: false,
		freeScroll: false,
		wrapAround: false,
		container: false,
		groupCells: 1,
		autoPlay: 3000,
		fade: true,
	});

}

function initialize_countdown_146_216() {

	show_countdown_146_216 = false;

	countdown_date_146_216 = document.getElementById( 'ecode_countdown_146_216' ).getAttribute( 'data-countdown' );

	// Update the count down every 1 second
	countdown_146_216 = setInterval(function() {

		if ( document.getElementById( 'ecode_countdown_146_216' ) ) {

			// Get today's date and time
			now = new Date().getTime();

			// Find the distance between now and the count down date
			distance = new Date( countdown_date_146_216 ).getTime() - now;

			// Time calculations for days, hours, minutes and seconds
			days = Math.floor( distance / ( 1000 * 60 * 60 * 24 ) );
			hours = Math.floor( (distance % ( 1000 * 60 * 60 * 24 ) ) / ( 1000 * 60 * 60 ) );
			minutes = Math.floor( (distance % ( 1000 * 60 * 60 ) ) / ( 1000 * 60 ) );
			seconds = Math.floor( (distance % ( 1000 * 60 ) ) / 1000 );

			if ( days >= 0 && hours >= 0 && minutes >= 0 && seconds >= 0 ) {

				// Change html
				document.getElementById( 'ecode_countdown_146_216_days' ).innerHTML = ( days >= 0 && days < 10 ) ? '0' + days : days;
				document.getElementById( 'ecode_countdown_146_216_hours' ).innerHTML = ( hours >= 0 && hours < 10 ) ? '0' + hours : hours;
				document.getElementById( 'ecode_countdown_146_216_minutes' ).innerHTML = ( minutes >= 0 && minutes < 10 ) ? '0' + minutes : minutes;
				document.getElementById( 'ecode_countdown_146_216_seconds' ).innerHTML = ( seconds >= 0 && seconds < 10 ) ? '0' + seconds : seconds;

			}

			// Show countdown
			if ( !show_countdown_146_216 ) {

				document.getElementById( 'ecode_countdown_146_216' ).classList.add( 'ecode_countdown_146_216_show' );

				show_countdown_146_216 = true;

			}

			// If the count down is over, write some text
			if ( distance < 0 ) {

				clearInterval( countdown_146_216 );

			}

		}

	}, 1000);

}
