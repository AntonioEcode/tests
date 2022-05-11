var cont_elements_hide_89_105 = 0;
var total_elements_hide_89_105 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_width_89_105' ).length != 0 ) {

		array_sliders_89_105 = document.getElementsByClassName( 'ecode_width_89_105' );

		for ( var i = 0; i < array_sliders_89_105.length; i++ ) {

			initialize_flickity_slider_89_105( array_sliders_89_105[i] );

		}

	}

}, false );

function initialize_flickity_slider_89_105( container_89_105 ) {

	width_window = document.body.clientWidth;

	array_elements_count = container_89_105.querySelectorAll( 'article' ).length;

	if ( array_elements_count > 5 || width_window < 768 ) {

		var slider_89_105 = new Flickity( container_89_105, {
			// options
			draggable: true,
			prevNextButtons: true,
			pageDots: false,
			freeScroll: false,
			wrapAround: true,
			container: true,
			autoPlay: 2000,
			fade: true,
		});

	} else {

		container_89_105.classList.add( 'ecode_width_89_105_scroll' );

	}

}
