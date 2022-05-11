window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_225' ).length != 0 ) {

		array_sliders_148_225 = document.getElementsByClassName( 'ecode_articles_148_225' );

		for ( var i = 0; i < array_sliders_148_225.length; i++ ) {

			initialize_flickity_slider_148_225( array_sliders_148_225[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_225( container_148_225 ) {

	width_window = document.body.clientWidth;

	if ( container_148_225.className.indexOf( 'ecode_articles_148_225_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_225 = new Flickity( container_148_225, {
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

	} else if ( container_148_225.className.indexOf( 'ecode_articles_148_225_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_148_225 = new Flickity( container_148_225, {
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

	} else if ( container_148_225.className.indexOf( 'ecode_articles_148_225_full' ) != -1 ) {

		var slider_148_225 = new Flickity( container_148_225, {
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
