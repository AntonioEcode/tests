var cont_elements_hide_85_261 = 0;
var total_elements_hide_85_261 = 0;
var active_show_elements_85_261 = false;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_85_template_261' ).length != 0 ) {

		control_scroll_animations_section_85_template_261();

		document.addEventListener( 'scroll', control_scroll_animations_section_85_template_261, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_85_template_261, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_85_template_261, { passive: true } );

		add_events_section_85_template_261();

	}

}, false );

function control_scroll_animations_section_85_template_261() {

	height_window = document.body.clientHeight;

	array_s85_t260 = document.getElementsByClassName( 'ecode_section_85_template_261' );

	for ( var i = 0; i < array_s85_t260.length; i++ ) {

		distance_top = getOffsetTop( array_s85_t260[i] );

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s85_t260[i].className.indexOf( 'ecode_section_85_template_261_show' ) == -1 && active_show_elements_85_261 == false ) {

			active_show_elements_85_261 = true;

			array_s85_t260[i].classList.add( 'ecode_section_85_template_261_show' );

			array_elements_hide = array_s85_t260[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_85_261 = 0;
			total_elements_hide_85_261 = 0;

			show_elements_hide_85_261( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_85_261( array_elements_hide ) {

	total_elements_hide_85_261 = array_elements_hide.length;

	if ( total_elements_hide_85_261 > cont_elements_hide_85_261 ) {

		show_element_hide_85_261( array_elements_hide[cont_elements_hide_85_261], array_elements_hide );

	} else {

		active_show_elements_85_261 = false;

	}

}

function show_element_hide_85_261( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_85_261++;

	show_elements_hide_85_261( array_elements_hide );

	}, 100);

}

function add_events_section_85_template_261() {

	array_list_ul = document.querySelectorAll( '.ecode_section_85_template_261 ul.ecode_ul li' );

	if ( array_list_ul.length != 0 ) {

		for ( var i = 0; i < array_list_ul.length; i++ ) {

			array_list_ul[i].onclick = function() {

				current = this;
				current_id = current.getAttribute( 'data-id' );
				current_parent = current.parentElement;

				array_li = current_parent.querySelectorAll( 'li' );

				for ( var j = 0; j < array_li.length; j++ ) {

					if ( array_li[j].getAttribute( 'data-id' ) == current_id ) {

						array_li[j].classList.add( 'ecode_current' );

					} else {

						array_li[j].classList.remove( 'ecode_current' );

					}

				}

				array_ecode_list = current_parent.parentElement.querySelectorAll( '.ecode_list' );

				for ( var l = 0; l < array_ecode_list.length; l++ ) {

					if ( l == parseInt( current_id ) ) {

						array_ecode_list[l].classList.remove( 'ecode_list_hide' );

					} else {

						array_ecode_list[l].classList.add( 'ecode_list_hide' );

					}


				}

			}

		}

	}

}
