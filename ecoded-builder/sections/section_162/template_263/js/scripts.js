window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_162_263' ).length != 0 ) {

		array_sliders_162_263 = document.getElementsByClassName( 'ecode_articles_162_263' );

		for ( var i = 0; i < array_sliders_162_263.length; i++ ) {

			initialize_flickity_slider_162_263( array_sliders_162_263[i] );

		}

	}

}, false );

function initialize_flickity_slider_162_263( container_162_263 ) {

	width_window = document.body.clientWidth;

	if ( container_162_263.className.indexOf( 'ecode_articles_162_263_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_162_263 = new Flickity( container_162_263, {
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

	} else if ( container_162_263.className.indexOf( 'ecode_articles_162_263_des' ) != -1 ) {

		if ( width_window >= 1024 ) {

			var slider_162_263 = new Flickity( container_162_263, {
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

	} else if ( container_162_263.className.indexOf( 'ecode_articles_162_263_full' ) != -1 ) {

		var slider_162_263 = new Flickity( container_162_263, {
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
