window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_145_214' ).length != 0 ) {

		array_sliders_145_214 = document.getElementsByClassName( 'ecode_articles_145_214' );

		for ( var i = 0; i < array_sliders_145_214.length; i++ ) {

			initialize_flickity_slider_145_214( array_sliders_145_214[i] );

		}

	}

}, false );

function initialize_flickity_slider_145_214( container_145_214 ) {

	var slider_145_214 = new Flickity( container_145_214, {
		// options
		draggable: true,
		prevNextButtons: true,
		pageDots: true,
		freeScroll: false,
		wrapAround: false,
		container: true,
		groupCells: 1,
		// autoPlay: 5000,
		fade: true,
	});

}
