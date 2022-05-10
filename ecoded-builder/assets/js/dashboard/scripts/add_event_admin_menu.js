function add_event_admin_menu() {

	array_li_submenu = document.querySelectorAll( 'ul#adminmenu > li.wp-has-submenu' );

	for ( var i = 0; i < array_li_submenu.length; i++ ) {

		array_li_submenu[i].onmouseover = function(){

			hover_admin_menu( this );

		};

		array_li_submenu[i].onmousemove = function(){

			hover_admin_menu( this );

		};

		array_li_submenu[i].onwheel = function(){

			hover_admin_menu( this );

		};

	}

}

function hover_admin_menu( object ) {

	width_window = document.body.clientWidth;
	height_window = document.body.clientHeight;

	object_height = object.clientHeight;

	current_ul = object.querySelectorAll( 'ul.wp-submenu' )[0];
	current_ul_height = current_ul.clientHeight;

	if ( width_window >= 1024 ) {

		total_scroll_menu = document.getElementById( 'adminmenuwrap' ).scrollTop;

		distance_top = getOffsetTop( object ) - total_scroll_menu;

		if ( height_window < ( current_ul_height + distance_top ) ) {

			distance_top = distance_top - current_ul_height + object_height;

		}

		current_ul.style.top = distance_top + 'px';

	} else {

		current_ul.style = '';

	}

}
