var ecode_event_load;

/******************************************************************************/
/*****                              Onload                                *****/
/******************************************************************************/
window.addEventListener("load",function(event) {

	ecode_event_load = new Event( 'ecode_load' );

	if ( document.getElementById( 'ecode_themes' ) ) {

		add_events_ecode_themes();

	}

},false);
