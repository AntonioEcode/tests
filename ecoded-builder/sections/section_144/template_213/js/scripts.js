window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_144_213' ).length != 0 ) {

		array_sliders_144_213 = document.getElementsByClassName( 'ecode_articles_144_213' );

		for ( var i = 0; i < array_sliders_144_213.length; i++ ) {

			initialize_flickity_slider_144_213( array_sliders_144_213[i] );

		}

	}

}, false );

function initialize_flickity_slider_144_213( container_144_213 ) {

	var slider_144_213 = new Flickity( container_144_213, {
		// options
		draggable: true,
		prevNextButtons: false,
		pageDots: true,
		freeScroll: false,
		wrapAround: false,
		container: true,
		groupCells: 1,
		autoPlay: 5000,
		// fade: true,
	});

}
