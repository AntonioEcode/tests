window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_50_58' ) ) {

		show_button_whatsapp_50_58();
        document.addEventListener( 'scroll', show_button_whatsapp_50_58, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_50_58, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_50_58, false );

    }

}, false );

function show_button_whatsapp_50_58() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_50_58' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_50_58' ).classList.add( 'ecode_tabbar_whatsapp_50_58_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_50_58' ).classList.remove( 'ecode_tabbar_whatsapp_50_58_show' );

		}

	}

}
