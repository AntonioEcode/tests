var ecode_event_load;

/******************************************************************************/
/*****                              Onload                                *****/
/******************************************************************************/
window.addEventListener("load",function(event) {

	ecode_event_load = new Event( 'ecode_load' );

	if ( document.querySelectorAll( 'ul#adminmenu > li.wp-has-submenu' ).length != 0 ) {

		add_event_admin_menu();

	}

},false);
