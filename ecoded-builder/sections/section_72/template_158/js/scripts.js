window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_reviews_slider_72_158' ).length != 0 ) {

		array_sliders_72_158 = document.getElementsByClassName( 'ecode_reviews_slider_72_158' );

		for ( var i = 0; i < array_sliders_72_158.length; i++ ) {


			initialize_flickity_slider_72_158( array_sliders_72_158[i] );

		}

		control_scroll_animations_section_72_template_158();

		document.addEventListener( 'scroll', control_scroll_animations_section_72_template_158, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_72_template_158, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_72_template_158, { passive: true } );

	}

}, false );

function initialize_flickity_slider_72_158( container_72_158 ) {

	var slider_72_158 = new Flickity( container_72_158, {
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

function control_scroll_animations_section_72_template_158() {

	height_window = document.body.clientHeight;

	array_s72_t158 = document.getElementsByClassName( 'ecode_section_72_template_158' );

	for ( var i = 0; i < array_s72_t158.length; i++ ) {

		distance_top = getOffsetTop( array_s72_t158[i] );
		height_container_pages = array_s72_t158[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s72_t158[i].className.indexOf( 'ecode_section_72_template_158_show' ) == -1 ) {

			array_s72_t158[i].classList.add( 'ecode_section_72_template_158_show' );

			array_elements_hide = array_s72_t158[i].querySelectorAll( '.ecode_reviews_slider, .ecode_review_feature' );

			cont_elements_hide_72_158 = 0;
			total_elements_hide_72_158 = 0;

			show_elements_hide_72_158( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_72_158( array_elements_hide ) {

	total_elements_hide_72_158 = array_elements_hide.length;

	if ( total_elements_hide_72_158 > cont_elements_hide_72_158 ) {

		show_element_hide_72_158( array_elements_hide[cont_elements_hide_72_158], array_elements_hide );

	}

}

function show_element_hide_72_158( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_review_hide' );
	element.classList.add( 'ecode_review_show' );

	cont_elements_hide_72_158++;

	show_elements_hide_72_158( array_elements_hide );

	}, 100);

}
