var cont_elements_hide_47_55 = 0;
var total_elements_hide_47_55 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_slider_47_55' ) ) {

		initialize_flickity_ecode_slider_47_55();

	}

	if ( document.getElementsByClassName( 'ecode_section_47_template_55' ).length != 0 ) {

		control_scroll_animations_section_47_template_55();

		document.addEventListener( 'scroll', control_scroll_animations_section_47_template_55, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_47_template_55, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_47_template_55, { passive: true } );

	}

}, false );

function initialize_flickity_ecode_slider_47_55() {

	width_window = document.body.clientWidth;

	if ( width_window < 768 ) {

		ecode_slider_47_55 = new Flickity( document.getElementById( 'ecode_slider_47_55' ), {
			// options
			draggable: true,
			prevNextButtons: true,
			pageDots: false,
			freeScroll: false,
			wrapAround: true,
			contain: true,
			cellAlign: 'left',
			// autoPlay: 3000,
		});

	}

}

function control_scroll_animations_section_47_template_55() {

	height_window = document.body.clientHeight;

	array_s47_t55 = document.getElementsByClassName( 'ecode_section_47_template_55' );

	for ( var i = 0; i < array_s47_t55.length; i++ ) {

		distance_top = getOffsetTop( array_s47_t55[i] );
		// height_container_pages = array_s47_t55[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s47_t55[i].className.indexOf( 'ecode_section_47_template_55_show' ) == -1 ) {

			array_s47_t55[i].classList.add( 'ecode_section_47_template_55_show' );

			array_elements_hide = array_s47_t55[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_47_55 = 0;
			total_elements_hide_47_55 = 0;

			show_elements_hide_47_55( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_47_55( array_elements_hide ) {

	total_elements_hide_47_55 = array_elements_hide.length;

	if ( total_elements_hide_47_55 > cont_elements_hide_47_55 ) {

		show_element_hide_47_55( array_elements_hide[cont_elements_hide_47_55], array_elements_hide );

	}

}

function show_element_hide_47_55( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_47_55++;

	show_elements_hide_47_55( array_elements_hide );

	}, 100);

}
