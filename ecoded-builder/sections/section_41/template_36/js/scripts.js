window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_slider_41_36' ) ) {

		initialize_flickity_ecode_slider_41_36();

	}

}, false );

function initialize_flickity_ecode_slider_41_36() {

	ecode_slider_41_36 = new Flickity( document.getElementById( 'ecode_slider_41_36' ), {
		// options
		draggable: false,
		prevNextButtons: false,
		pageDots: false,
		wrapAround: false,
		contain: true,
		fade: true,
		autoPlay: 2000,
	});

}
