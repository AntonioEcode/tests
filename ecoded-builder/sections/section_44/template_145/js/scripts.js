var cont_elements_hide_44_145 = 0;
var total_elements_hide_44_145 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_44_template_145' ).length != 0 ) {

		control_scroll_animations_section_44_template_145();

		document.addEventListener( 'scroll', control_scroll_animations_section_44_template_145, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_44_template_145, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_44_template_145, { passive: true } );

		animation_title_44_145();

	}

}, false );

function animation_title_44_145() {

        count_letter = 0;

        text_slogan = document.getElementById( 'ecode_section_44_template_145_title' ).innerHTML;

        width_slogan = document.getElementById( 'ecode_section_44_template_145_title' ).clientWidth + 1;

        text_slogan_length = text_slogan.length;

        text_new = '';

		var interval_44_145 = setInterval( function() {

            if ( count_letter < text_slogan_length ) {

                add_new_letter_44_145();

            } else {

				clearInterval( interval_44_145 );

			}

        }, 30 );

}

function add_new_letter_44_145() {


    new_character_1 = text_slogan[count_letter];

    text_new = text_new + new_character_1;

    document.getElementById( 'ecode_section_44_template_145_title' ).innerHTML = text_new;

    document.getElementById( 'ecode_section_44_template_145_title' ).style.width = width_slogan + "px";

    count_letter++;

}

function control_scroll_animations_section_44_template_145() {

	height_window = document.body.clientHeight;

	array_s44_t145 = document.getElementsByClassName( 'ecode_section_44_template_145' );

	for ( var i = 0; i < array_s44_t145.length; i++ ) {

		distance_top = getOffsetTop( array_s44_t145[i] );
		// height_container_pages = array_s44_t145[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s44_t145[i].className.indexOf( 'ecode_section_44_template_145_show' ) == -1 ) {

			array_s44_t145[i].classList.add( 'ecode_section_44_template_145_show' );

			array_elements_hide = array_s44_t145[i].querySelectorAll( '.section_width' );

			cont_elements_hide_44_145 = 0;
			total_elements_hide_44_145 = 0;

			show_elements_hide_44_145( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_44_145( array_elements_hide ) {

	total_elements_hide_44_145 = array_elements_hide.length;

	if ( total_elements_hide_44_145 > cont_elements_hide_44_145 ) {

		show_element_hide_44_145( array_elements_hide[cont_elements_hide_44_145], array_elements_hide );

	}

}

function show_element_hide_44_145( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'section_width_hide' );
	element.classList.add( 'section_width_show' );

	cont_elements_hide_44_145++;

	show_elements_hide_44_145( array_elements_hide );

	}, 100);

}
