var cont_elements_hide_2_2 = 0;
var total_elements_hide_2_2 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_2_template_2' ).length != 0 ) {

		control_scroll_animations_section_2_template_2();

		document.addEventListener( 'scroll', control_scroll_animations_section_2_template_2, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_2_template_2, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_2_template_2, { passive: true } );

		animation_title_2_2();

	}

}, false );

function animation_title_2_2() {

        count_letter = 0;

        text_slogan = document.getElementById( 'ecode_section_2_template_2_title' ).innerHTML;

        width_slogan = document.getElementById( 'ecode_section_2_template_2_title' ).clientWidth + 1;

        text_slogan_length = text_slogan.length;

        text_new = '';

        var interval_2_2 = setInterval( function() {

            if ( count_letter < text_slogan_length ) {

                add_new_letter_2_2();

			} else {

				clearInterval( interval_2_2 );

			}

        }, 30 );

}

function add_new_letter_2_2() {


    new_character_1 = text_slogan[count_letter];

    text_new = text_new + new_character_1;

    document.getElementById( 'ecode_section_2_template_2_title' ).innerHTML = text_new;

    document.getElementById( 'ecode_section_2_template_2_title' ).style.width = width_slogan + "px";

    count_letter++;

}

function control_scroll_animations_section_2_template_2() {

	height_window = document.body.clientHeight;

	array_s2_t2 = document.getElementsByClassName( 'ecode_section_2_template_2' );

	for ( var i = 0; i < array_s2_t2.length; i++ ) {

		distance_top = getOffsetTop( array_s2_t2[i] );
		// height_container_pages = array_s2_t2[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s2_t2[i].className.indexOf( 'ecode_section_2_template_2_show' ) == -1 ) {

			array_s2_t2[i].classList.add( 'ecode_section_2_template_2_show' );

			array_elements_hide = array_s2_t2[i].querySelectorAll( '.content_width' );

			cont_elements_hide_2_2 = 0;
			total_elements_hide_2_2 = 0;

			show_elements_hide_2_2( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_2_2( array_elements_hide ) {

	total_elements_hide_2_2 = array_elements_hide.length;

	if ( total_elements_hide_2_2 > cont_elements_hide_2_2 ) {

		show_element_hide_2_2( array_elements_hide[cont_elements_hide_2_2], array_elements_hide );

	}

}

function show_element_hide_2_2( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'content_width_hide' );
	element.classList.add( 'content_width_show' );

	cont_elements_hide_2_2++;

	show_elements_hide_2_2( array_elements_hide );

	}, 100);

}
