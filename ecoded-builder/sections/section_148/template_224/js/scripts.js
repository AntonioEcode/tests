window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_224' ).length != 0 ) {

		array_sliders_148_224 = document.getElementsByClassName( 'ecode_articles_148_224' );

		for ( var i = 0; i < array_sliders_148_224.length; i++ ) {

			initialize_flickity_slider_148_224( array_sliders_148_224[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_224( container_148_224 ) {

	width_window = document.body.clientWidth;

	if ( container_148_224.className.indexOf( 'ecode_articles_148_224_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_224 = new Flickity( container_148_224, {
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

	} else if ( container_148_224.className.indexOf( 'ecode_articles_148_224_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_224 = new Flickity( container_148_224, {
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

	} else if ( container_148_224.className.indexOf( 'ecode_articles_148_224_full' ) != -1 ) {

		var slider_148_224 = new Flickity( container_148_224, {
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
