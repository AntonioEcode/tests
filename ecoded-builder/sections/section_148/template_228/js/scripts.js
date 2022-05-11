window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_228' ).length != 0 ) {

		array_sliders_148_228 = document.getElementsByClassName( 'ecode_articles_148_228' );

		for ( var i = 0; i < array_sliders_148_228.length; i++ ) {

			initialize_flickity_slider_148_228( array_sliders_148_228[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_228( container_148_228 ) {

	width_window = document.body.clientWidth;

	if ( container_148_228.className.indexOf( 'ecode_articles_148_228_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_228 = new Flickity( container_148_228, {
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

	} else if ( container_148_228.className.indexOf( 'ecode_articles_148_228_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_228 = new Flickity( container_148_228, {
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

	} else if ( container_148_228.className.indexOf( 'ecode_articles_148_228_full' ) != -1 ) {

		var slider_148_228 = new Flickity( container_148_228, {
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
