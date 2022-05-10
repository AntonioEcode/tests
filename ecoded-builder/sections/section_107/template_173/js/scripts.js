var cont_elements_hide_107_173 = 0;
var total_elements_hide_107_173 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_107_template_173' ).length != 0 ) {

		control_scroll_animations_section_107_template_173();

		document.addEventListener( 'scroll', control_scroll_animations_section_107_template_173, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_107_template_173, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_107_template_173, { passive: true } );

	}

}, false );

function control_scroll_animations_section_107_template_173() {

	height_window = document.body.clientHeight;

	array_s107_t173 = document.getElementsByClassName( 'ecode_section_107_template_173' );

	for ( var i = 0; i < array_s107_t173.length; i++ ) {

		distance_top = getOffsetTop( array_s107_t173[i] );
		// height_container_pages = array_s107_t173[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s107_t173[i].className.indexOf( 'ecode_section_107_template_173_show' ) == -1 ) {

			array_s107_t173[i].classList.add( 'ecode_section_107_template_173_show' );

			array_elements_hide = array_s107_t173[i].querySelectorAll( '.ecode_titles' );

			cont_elements_hide_107_173 = 0;
			total_elements_hide_107_173 = 0;

			show_elements_hide_107_173( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_107_173( array_elements_hide ) {

	total_elements_hide_107_173 = array_elements_hide.length;

	if ( total_elements_hide_107_173 > cont_elements_hide_107_173 ) {

		show_element_hide_107_173( array_elements_hide[cont_elements_hide_107_173], array_elements_hide );

	}

}

function show_element_hide_107_173( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_titles_hide' );
	element.classList.add( 'ecode_titles_show' );

	cont_elements_hide_107_173++;

	show_elements_hide_107_173( array_elements_hide );

	}, 100);

}
