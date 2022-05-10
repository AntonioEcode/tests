window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_227' ).length != 0 ) {

		array_sliders_148_227 = document.getElementsByClassName( 'ecode_articles_148_227' );

		for ( var i = 0; i < array_sliders_148_227.length; i++ ) {

			initialize_flickity_slider_148_227( array_sliders_148_227[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_227( container_148_227 ) {

	width_window = document.body.clientWidth;

	if ( container_148_227.className.indexOf( 'ecode_articles_148_227_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_227 = new Flickity( container_148_227, {
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

	} else if ( container_148_227.className.indexOf( 'ecode_articles_148_227_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_227 = new Flickity( container_148_227, {
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

	} else if ( container_148_227.className.indexOf( 'ecode_articles_148_227_full' ) != -1 ) {

		var slider_148_227 = new Flickity( container_148_227, {
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
