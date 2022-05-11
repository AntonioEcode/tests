window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_15_template_20' ).length != 0 ) {

		control_scroll_animations_section_15_template_20();

		document.addEventListener( 'scroll', control_scroll_animations_section_15_template_20, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_15_template_20, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_15_template_20, { passive: true } );

	}

}, false );

function control_scroll_animations_section_15_template_20() {

	height_window = document.body.clientHeight;

	array_s15_t20 = document.getElementsByClassName( 'ecode_section_15_template_20' );

	for ( var i = 0; i < array_s15_t20.length; i++ ) {

		distance_top = getOffsetTop( array_s15_t20[i] );
		// height_container_pages = array_s15_t20[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s15_t20[i].className.indexOf( 'ecode_section_15_template_20_show' ) == -1 ) {

			array_s15_t20[i].classList.add( 'ecode_section_15_template_20_show' );
			array_s15_t20[i].classList.remove( 'ecode_section_15_template_20_hide' );

		}

	}

}
