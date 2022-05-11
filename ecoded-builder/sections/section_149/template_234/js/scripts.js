window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_width_149_234' ) && document.body.className.indexOf( 'wp-admin' ) == -1 ) {

		control_scroll_sidebar_142_234();
		document.addEventListener( 'scroll', control_scroll_sidebar_142_234, { passive: true } );
		document.addEventListener( 'touchmove', control_scroll_sidebar_142_234, { passive: true } );
		document.addEventListener( 'touchstart', control_scroll_sidebar_142_234, { passive: true } );

	}

}, false );

var total_scroll_fixed_149_234 = 0;

function control_scroll_sidebar_142_234() {

	if ( document.getElementById( 'ecode_width_149_234' ) ) {

		width_window = document.body.clientWidth;
		height_window = document.body.clientHeight;

		if ( width_window >= 1024 ) {

			padding = 40;
			height_container_sidebar = document.getElementById( 'ecode_sidebars_149_234' ).clientHeight;
			document.getElementById( 'ecode_width_149_234' ).style.minHeight = ( height_container_sidebar + 50 ) + 'px';

			if( height_window >= ( padding + height_container_sidebar ) ) {

				// Get total scroll fixed
				distance_top = getOffsetTop( document.getElementById( 'ecode_sidebars_149_234' ) );

				if ( total_scroll_fixed_149_234 == 0 ) {

					total_scroll_fixed_149_234 = distance_top - padding;

				}

				// Get total scroll absolute
				distance_top_list_posts = getOffsetTop( document.getElementById( 'ecode_width_149_234' ) );
				height_list_posts = document.getElementById( 'ecode_width_149_234' ).clientHeight;

				total_scroll_absolute = distance_top_list_posts + height_list_posts - 20 - padding - height_container_sidebar;

				if ( scrollTop() >= total_scroll_fixed_149_234 && scrollTop() < total_scroll_absolute ) {

					document.getElementById( 'ecode_sidebars_149_234' ).classList.add( 'ecode_sidebars_149_234_fixed' );
					document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_absolute' );

					// Calculate right
					total_right = ( ( width_window - document.getElementById( 'ecode_width_149_234' ).clientWidth ) / 2 ) + 30;

					document.getElementById( 'ecode_sidebars_149_234' ).style.right = total_right + 'px';


				} else if ( scrollTop() >= total_scroll_absolute ) {

					document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_fixed' );
					document.getElementById( 'ecode_sidebars_149_234' ).style = '';
					document.getElementById( 'ecode_sidebars_149_234' ).classList.add( 'ecode_sidebars_149_234_absolute' );

				} else {

					document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_fixed' );
					document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_absolute' );
					document.getElementById( 'ecode_sidebars_149_234' ).style = '';

				}

			} else {

				document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_fixed' );
				document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_absolute' );
				document.getElementById( 'ecode_sidebars_149_234' ).style = '';

			}

		} else {

			document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_fixed' );
			document.getElementById( 'ecode_sidebars_149_234' ).classList.remove( 'ecode_sidebars_149_234_absolute' );
			document.getElementById( 'ecode_sidebars_149_234' ).style = '';
			total_scroll_fixed_149_234 = 0;

		}

	}

}

if ( document.getElementById( 'ecode_width_149_234' ) ) {

    window.addEventListener( 'resize', control_scroll_sidebar_142_234 );

}
