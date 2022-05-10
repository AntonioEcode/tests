window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_width_160_259' ) ) {

		control_scroll_sidebar_160_259();
		document.addEventListener( 'scroll', control_scroll_sidebar_160_259, { passive: true } );
		document.addEventListener( 'touchmove', control_scroll_sidebar_160_259, { passive: true } );
		document.addEventListener( 'touchstart', control_scroll_sidebar_160_259, { passive: true } );

	}

	if ( document.getElementsByClassName( 'ecode_gallery_160_259' ).length != 0 ) {

		array_gallery_160_259 = document.getElementsByClassName( 'ecode_gallery_160_259' );

		for ( var i = 0; i < array_gallery_160_259.length; i++ ) {

			initialize_gallery_160_259( array_gallery_160_259[i] );

		}

	}

}, false );

function initialize_gallery_160_259( contaier_160_259 ) {

	var gallery_160_259 = lightGallery( contaier_160_259, {
		loop: true,
		download: false,
		closeOnTap: true,
		nextHtml: '<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-469.000000, -190.000000)" fill="#FFFFFF"><g transform="translate(469.000000, 190.000000)"><path d="M14.999,10.0054 C14.999,10.0034 15,10.0024 15,10.0004 C15,9.9674 14.984,9.9404 14.981,9.9084 C14.973,9.8124 14.961,9.7164 14.924,9.6264 C14.897,9.5584 14.851,9.5044 14.81,9.4444 C14.779,9.4004 14.762,9.3494 14.724,9.3094 L11.861,6.30939 C11.479,5.90939 10.847,5.89539 10.447,6.27639 C10.048,6.65739 10.033,7.29039 10.414,7.69039 L11.664,9.0004 L6,9.0004 C5.448,9.0004 5,9.4474 5,10.0004 C5,10.5524 5.448,11.0004 6,11.0004 L11.586,11.0004 L10.293,12.2934 C9.902,12.6834 9.902,13.3164 10.293,13.7074 C10.488,13.9024 10.744,14.0004 11,14.0004 C11.256,14.0004 11.512,13.9024 11.707,13.7074 L14.707,10.7074 C14.798,10.6164 14.872,10.5064 14.922,10.3854 C14.973,10.2644 14.998,10.1354 14.999,10.0054 Z M10,18 C5.589,18 2,14.411 2,10 C2,5.589 5.589,2 10,2 C14.411,2 18,5.589 18,10 C18,14.411 14.411,18 10,18 Z M10,0 C4.486,0 0,4.486 0,10 C0,15.514 4.486,20 10,20 C15.514,20 20,15.514 20,10 C20,4.486 15.514,0 10,0 Z"></path></g></g></g></svg>',
		prevHtml: '<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-469.000000, -190.000000)" fill="#FFFFFF"><g transform="translate(469.000000, 190.000000)"><path d="M14.999,10.0054 C14.999,10.0034 15,10.0024 15,10.0004 C15,9.9674 14.984,9.9404 14.981,9.9084 C14.973,9.8124 14.961,9.7164 14.924,9.6264 C14.897,9.5584 14.851,9.5044 14.81,9.4444 C14.779,9.4004 14.762,9.3494 14.724,9.3094 L11.861,6.30939 C11.479,5.90939 10.847,5.89539 10.447,6.27639 C10.048,6.65739 10.033,7.29039 10.414,7.69039 L11.664,9.0004 L6,9.0004 C5.448,9.0004 5,9.4474 5,10.0004 C5,10.5524 5.448,11.0004 6,11.0004 L11.586,11.0004 L10.293,12.2934 C9.902,12.6834 9.902,13.3164 10.293,13.7074 C10.488,13.9024 10.744,14.0004 11,14.0004 C11.256,14.0004 11.512,13.9024 11.707,13.7074 L14.707,10.7074 C14.798,10.6164 14.872,10.5064 14.922,10.3854 C14.973,10.2644 14.998,10.1354 14.999,10.0054 Z M10,18 C5.589,18 2,14.411 2,10 C2,5.589 5.589,2 10,2 C14.411,2 18,5.589 18,10 C18,14.411 14.411,18 10,18 Z M10,0 C4.486,0 0,4.486 0,10 C0,15.514 4.486,20 10,20 C15.514,20 20,15.514 20,10 C20,4.486 15.514,0 10,0 Z"></path></g></g></g></svg>',
	});

}

var total_scroll_fixed_160_259 = 0;

function control_scroll_sidebar_160_259() {

	width_window = document.body.clientWidth;
	height_window = document.body.clientHeight;

	if ( width_window >= 1024 ) {

		padding = 40;
		height_container_sidebar = document.getElementById( 'ecode_sidebar_160_259' ).clientHeight;
		document.getElementById( 'ecode_width_160_259' ).style.minHeight = ( height_container_sidebar + 50 ) + 'px';

		if( height_window >= ( padding + height_container_sidebar ) ) {

			// Get total scroll fixed
			distance_top = getOffsetTop( document.getElementById( 'ecode_sidebar_160_259' ) );

			if ( total_scroll_fixed_160_259 == 0 ) {

				total_scroll_fixed_160_259 = distance_top - padding;

			}

			// Get total scroll absolute
			distance_top_list_posts = getOffsetTop( document.getElementById( 'ecode_width_160_259' ) );
			height_list_posts = document.getElementById( 'ecode_width_160_259' ).clientHeight;

			total_scroll_absolute = distance_top_list_posts + height_list_posts - 20 - padding - height_container_sidebar;

			if ( scrollTop() >= total_scroll_fixed_160_259 && scrollTop() < total_scroll_absolute ) {

				document.getElementById( 'ecode_sidebar_160_259' ).classList.add( 'ecode_sidebar_160_259_fixed' );
				document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_absolute' );

				// Calculate left
				total_left = ( ( width_window - document.getElementById( 'ecode_width_160_259' ).clientWidth ) / 2 );

				document.getElementById( 'ecode_sidebar_160_259' ).style.left = total_left + 'px';


			} else if ( scrollTop() >= total_scroll_absolute ) {

				document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_fixed' );
				document.getElementById( 'ecode_sidebar_160_259' ).style = '';
				document.getElementById( 'ecode_sidebar_160_259' ).classList.add( 'ecode_sidebar_160_259_absolute' );

			} else {

				document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_fixed' );
				document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_absolute' );
				document.getElementById( 'ecode_sidebar_160_259' ).style = '';

			}

		} else {

			document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_fixed' );
			document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_absolute' );
			document.getElementById( 'ecode_sidebar_160_259' ).style = '';

		}

	} else {

		document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_fixed' );
		document.getElementById( 'ecode_sidebar_160_259' ).classList.remove( 'ecode_sidebar_160_259_absolute' );
		document.getElementById( 'ecode_sidebar_160_259' ).style = '';
		total_scroll_fixed_160_259 = 0;

	}

}

if ( document.getElementById( 'ecode_width_160_259' ) ) {

    window.addEventListener( 'resize', control_scroll_sidebar_160_259 );

}
