function ajax_create_global_content( section_id, template_id ) {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_create_new_global_content';

	params = '';

	params += 'action=' + action;
	params += '&section_id=' + section_id;
	params += '&template_id=' + template_id;

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse(xhttp.responseText);

			if ( response.success ) {

				window.open( response.data, '_blank' );

			}

		}

	};

	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

}
