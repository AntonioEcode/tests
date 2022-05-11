window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_slider_10_13' ).length != 0 ) {

		array_sliders_10_13 = document.getElementsByClassName( 'ecode_slider_10_13' );

		for ( var i = 0; i < array_sliders_10_13.length; i++ ) {


			initialize_flickity_slider_10_13( array_sliders_10_13[i] );

		}

	}

}, false );

function initialize_flickity_slider_10_13( container_10_13 ) {

	var slider_10_13 = new Flickity( container_10_13, {
		// options
		// draggable: true,
		prevNextButtons: false,
		pageDots: false,
		freeScroll: false,
		wrapAround: true,
		contain: true,
		cellAlign: 'left',
		autoPlay: 3000,
	});

}
