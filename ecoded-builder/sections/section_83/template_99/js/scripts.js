window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_width_83_99' ).length != 0 ) {

		array_sliders_83_99 = document.getElementsByClassName( 'ecode_width_83_99' );

		for ( var i = 0; i < array_sliders_83_99.length; i++ ) {


			initialize_flickity_slider_83_99( array_sliders_83_99[i] );

		}

	}

}, false );

function initialize_flickity_slider_83_99( container_83_99 ) {

	var slider_83_99 = new Flickity( container_83_99, {
		// options
		draggable: true,
		prevNextButtons: false,
		pageDots: true,
		freeScroll: false,
		wrapAround: true,
		container: true,
		groupCells: 1,
		autoPlay: 5000,
		// fade: true,
	});

}
