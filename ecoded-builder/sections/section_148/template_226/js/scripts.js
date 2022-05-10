window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_148_226' ).length != 0 ) {

		array_sliders_148_226 = document.getElementsByClassName( 'ecode_articles_148_226' );

		for ( var i = 0; i < array_sliders_148_226.length; i++ ) {

			initialize_flickity_slider_148_226( array_sliders_148_226[i] );

		}

	}

}, false );

function initialize_flickity_slider_148_226( container_148_226 ) {

	width_window = document.body.clientWidth;

	if ( container_148_226.className.indexOf( 'ecode_articles_148_226_mob' ) != -1 ) {

		if ( width_window < 1024 ) {

			var slider_148_226 = new Flickity( container_148_226, {
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

	} else if ( container_148_226.className.indexOf( 'ecode_articles_148_226_des' ) != -1 ) {

		if ( width_window >= 1024 && container_148_226.querySelectorAll( 'article' ).length > 3 ) {

			var slider_148_226 = new Flickity( container_148_226, {
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

		} else {

			container_148_226.classList.remove( 'ecode_articles_148_226_des' );

		}

	} else if ( container_148_226.className.indexOf( 'ecode_articles_148_226_full' ) != -1 ) {

		if ( width_window < 1024 || ( width_window >= 1024 && container_148_226.querySelectorAll( 'article' ).length > 3 ) ) {

			var slider_148_226 = new Flickity( container_148_226, {
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

		} else {

			container_148_226.classList.remove( 'ecode_articles_148_226_full' );

		}

	}

}
