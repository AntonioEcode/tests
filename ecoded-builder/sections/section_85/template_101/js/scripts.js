var cont_elements_hide_85_101 = 0;
var total_elements_hide_85_101 = 0;
var active_show_elements_85_101 = false;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_85_template_101' ).length != 0 ) {

		control_scroll_animations_section_85_template_101();

		document.addEventListener( 'scroll', control_scroll_animations_section_85_template_101, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_85_template_101, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_85_template_101, { passive: true } );

	}

}, false );

function control_scroll_animations_section_85_template_101() {

	height_window = document.body.clientHeight;

	array_s85_t101 = document.getElementsByClassName( 'ecode_section_85_template_101' );

	for ( var i = 0; i < array_s85_t101.length; i++ ) {

		distance_top = getOffsetTop( array_s85_t101[i] );
		// height_container_pages = array_s85_t101[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s85_t101[i].className.indexOf( 'ecode_section_85_template_101_show' ) == -1 && active_show_elements_85_101 == false ) {

			active_show_elements_85_101 = true;

			array_s85_t101[i].classList.add( 'ecode_section_85_template_101_show' );

			array_elements_hide = array_s85_t101[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_85_101 = 0;
			total_elements_hide_85_101 = 0;

			show_elements_hide_85_101( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_85_101( array_elements_hide ) {

	total_elements_hide_85_101 = array_elements_hide.length;

	if ( total_elements_hide_85_101 > cont_elements_hide_85_101 ) {

		show_element_hide_85_101( array_elements_hide[cont_elements_hide_85_101], array_elements_hide );

	} else {

		active_show_elements_85_101 = false;

	}

}

function show_element_hide_85_101( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_85_101++;

	show_elements_hide_85_101( array_elements_hide );

	}, 100);

}
