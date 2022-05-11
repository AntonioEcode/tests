window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_110_172' ) ) {

		show_button_whatsapp_110_172();
        document.addEventListener( 'scroll', show_button_whatsapp_110_172, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_110_172, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_110_172, false );

    }

}, false );

function show_button_whatsapp_110_172() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_110_172' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_110_172' ).classList.add( 'ecode_tabbar_whatsapp_110_172_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_110_172' ).classList.remove( 'ecode_tabbar_whatsapp_110_172_show' );

		}

	}

}
