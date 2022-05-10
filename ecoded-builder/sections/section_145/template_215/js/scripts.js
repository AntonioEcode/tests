window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_articles_145_215' ).length != 0 ) {

		array_sliders_145_215 = document.getElementsByClassName( 'ecode_articles_145_215' );

		for ( var i = 0; i < array_sliders_145_215.length; i++ ) {

			initialize_flickity_slider_145_215( array_sliders_145_215[i] );

		}

	}

}, false );

function initialize_flickity_slider_145_215( container_145_215 ) {

	var slider_145_215 = new Flickity( container_145_215, {
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
