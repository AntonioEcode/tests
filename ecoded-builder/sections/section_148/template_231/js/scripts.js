window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_231' ).length != 0 ) {

		array_sliders_148_231 = document.getElementsByClassName( 'ecode_articles_148_231' );

		for ( var i = 0; i < array_sliders_148_231.length; i++ ) {

			initialize_flickity_slider_148_231( array_sliders_148_231[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_231( container_148_231 ) {

	width_window = document.body.clientWidth;

	if ( container_148_231.className.indexOf( 'ecode_articles_148_231_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_231 = new Flickity( container_148_231, {
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

	} else if ( container_148_231.className.indexOf( 'ecode_articles_148_231_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_231 = new Flickity( container_148_231, {
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

	} else if ( container_148_231.className.indexOf( 'ecode_articles_148_231_full' ) != -1 ) {

		var slider_148_231 = new Flickity( container_148_231, {
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
