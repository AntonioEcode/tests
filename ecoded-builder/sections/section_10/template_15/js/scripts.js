window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_slider_10_15' ).length != 0 ) {

		array_sliders_10_15 = document.getElementsByClassName( 'ecode_slider_10_15' );

		for ( var i = 0; i < array_sliders_10_15.length; i++ ) {


			initialize_flickity_slider_10_15( array_sliders_10_15[i] );

		}

	}

}, false );

function initialize_flickity_slider_10_15( container_10_15 ) {

	var slider_10_15 = new Flickity( container_10_15, {
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
