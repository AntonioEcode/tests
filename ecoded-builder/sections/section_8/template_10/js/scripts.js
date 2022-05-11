window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_slider_8_1' ) ) {

		initialize_flickity_slider_8_1();

	}

}, false );

function initialize_flickity_slider_8_1() {

	slider_8_1 = new Flickity( document.getElementById( 'ecode_slider_8_1' ), {
		// options
		draggable: true,
		prevNextButtons: false,
		pageDots: true,
		freeScroll: false,
		wrapAround: true,
		container: true,
		groupCells: 1,
		autoPlay: 5000,
		fade: true,
	});

}
