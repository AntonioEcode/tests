window.addEventListener( 'ecode_load', function ( event ) {

	width_window = document.body.clientWidth;

	if ( document.getElementsByClassName( 'ecode_articles_141_210' ).length != 0 && width_window < 1024 ) {

		array_sliders_141_210 = document.getElementsByClassName( 'ecode_articles_141_210' );

		for ( var i = 0; i < array_sliders_141_210.length; i++ ) {

			initialize_flickity_slider_141_210( array_sliders_141_210[i] );

		}

	}

}, false );

function initialize_flickity_slider_141_210( container_141_210 ) {

	var slider_141_210 = new Flickity( container_141_210, {
		// options
		draggable: true,
		prevNextButtons: false,
		pageDots: true,
		freeScroll: false,
		wrapAround: false,
		container: true,
		groupCells: 1,
		// autoPlay: 5000,
		// fade: true,
	});

}
