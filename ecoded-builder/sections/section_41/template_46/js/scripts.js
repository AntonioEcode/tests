window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_slider_41_46' ) ) {

		initialize_flickity_ecode_slider_41_46();

	}

}, false );

function initialize_flickity_ecode_slider_41_46() {

	ecode_slider_41_46 = new Flickity( document.getElementById( 'ecode_slider_41_46' ), {
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
