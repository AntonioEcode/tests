function ajax_change_order_sections( array_new_order ) {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_change_order_sections';

	params = '';
	params += 'action=' + action;
	params += '&page_sections_orders=' + JSON.stringify(array_new_order);

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse( xhttp.responseText );

			document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );

		}
	};
	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

}
