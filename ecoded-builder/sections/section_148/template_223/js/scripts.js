window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_223' ).length != 0 ) {

		array_sliders_148_223 = document.getElementsByClassName( 'ecode_articles_148_223' );

		for ( var i = 0; i < array_sliders_148_223.length; i++ ) {

			initialize_flickity_slider_148_223( array_sliders_148_223[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_223( container_148_223 ) {

	width_window = document.body.clientWidth;

	if ( container_148_223.className.indexOf( 'ecode_articles_148_223_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_223 = new Flickity( container_148_223, {
				// options
				draggable: true,
				prevNextButtons: false,
				pageDots: true,
				freeScroll: false,
				wrapAround: false,
				container: true,
				groupCells: 1,
				// autoPlay: 5000,
				fade: false,
				cellAlign: 'left',
			});

		}

	} else if ( container_148_223.className.indexOf( 'ecode_articles_148_223_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_223 = new Flickity( container_148_223, {
				// options
				draggable: true,
				prevNextButtons: false,
				pageDots: true,
				freeScroll: false,
				wrapAround: false,
				container: true,
				groupCells: 1,
				autoPlay: 5000,
				fade: false,
				cellAlign: 'left',
			});

		}

	} else if ( container_148_223.className.indexOf( 'ecode_articles_148_223_full' ) != -1 ) {

		var slider_148_223 = new Flickity( container_148_223, {
			// options
			draggable: true,
			prevNextButtons: false,
			pageDots: true,
			freeScroll: false,
			wrapAround: false,
			container: true,
			groupCells: 1,
			// autoPlay: 5000,
			fade: false,
			cellAlign: 'left',
		});

	}

}
