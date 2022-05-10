window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_92_108' ) ) {

		show_button_whatsapp_92_108();
        document.addEventListener( 'scroll', show_button_whatsapp_92_108, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_92_108, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_92_108, false );

    }

}, false );

function show_button_whatsapp_92_108() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_92_108' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_92_108' ).classList.add( 'ecode_tabbar_whatsapp_92_108_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_92_108' ).classList.remove( 'ecode_tabbar_whatsapp_92_108_show' );

		}

	}

}
