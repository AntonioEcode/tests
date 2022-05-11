window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_slider_10_14' ).length != 0 ) {

		array_sliders_10_14 = document.getElementsByClassName( 'ecode_slider_10_14' );

		for ( var i = 0; i < array_sliders_10_14.length; i++ ) {


			initialize_flickity_slider_10_14( array_sliders_10_14[i] );

		}

	}

}, false );

function initialize_flickity_slider_10_14( container_10_14 ) {

	var slider_10_14 = new Flickity( container_10_14, {
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
