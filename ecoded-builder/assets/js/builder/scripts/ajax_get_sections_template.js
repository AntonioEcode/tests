var array_page_type;
var custom_config;
var check_html_page_sections = false;
var wp_page_data;

function ajax_get_sections_template( page_id ) {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_get_page_type_sections';

	params = '';

    params += 'action=' + action;
    params += '&page_id=' + page_id;

    xhttp.onreadystatechange = function() {

        if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

            response = JSON.parse(xhttp.responseText);

			if ( response.success ) {

				array_page_type = response.data;

				// Get custom config
				custom_config = response.data.custom_config;

				// Get contents page
				check_html_page_sections = true;

				// Add href buttons view and edit page
				wp_page_data = response.data.wp_page_data;

				if ( wp_page_data.length == 0 ) {

					document.getElementById( 'ecode_button_view_page' ).classList.add( 'ecode_button_builder_hidden' );
					document.getElementById( 'ecode_button_view_page' ).classList.add( 'ecode_button_builder_disabled' );
					document.getElementById( 'ecode_button_edit_page' ).classList.add( 'ecode_button_builder_hidden' );
					document.getElementById( 'ecode_button_edit_page' ).classList.add( 'ecode_button_builder_disabled' );
					document.getElementById( 'select_page_urls' ).classList.add( 'ecode_button_builder_hidden' );
					document.getElementById( 'select_page_urls' ).classList.add( 'ecode_button_builder_disabled' );

				} else {

					if ( wp_page_data.length == 1 ) {

						document.getElementById( 'select_page_urls' ).classList.add( 'ecode_button_builder_hidden' );
						document.getElementById( 'select_page_urls' ).classList.add( 'ecode_button_builder_disabled' );

						document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_hidden' );
						document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_disabled' );
						document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_hidden' );
						document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_disabled' );

						document.getElementById( 'ecode_button_view_page' ).href = wp_page_data[0].url;
						document.getElementById( 'ecode_button_edit_page' ).href = wp_page_data[0].edit_url;

					} else {

						document.getElementById( 'select_page_urls' ).classList.remove( 'ecode_button_builder_hidden' );
						document.getElementById( 'select_page_urls' ).classList.remove( 'ecode_button_builder_disabled' );

						document.getElementById( 'ecode_button_view_page' ).classList.remove( 'ecode_button_builder_hidden' );
						document.getElementById( 'ecode_button_view_page' ).classList.add( 'ecode_button_builder_disabled' );
						document.getElementById( 'ecode_button_edit_page' ).classList.remove( 'ecode_button_builder_hidden' );
						document.getElementById( 'ecode_button_edit_page' ).classList.add( 'ecode_button_builder_disabled' );

						return_html = '';
						return_html += '<option value="">--- Seleccionar página ---</option>';

						for ( var key in wp_page_data ) {

							return_html += '<option value="' + key + '">' + wp_page_data[key].name + '</option>';

						}

						document.getElementById( 'select_page_urls' ).innerHTML = return_html;

					}

				}

				add_sections_page( array_page_type );

			} else {

				return_html = '<p class="ecode_error">' + response.data[0].message + '</p>';

				document.getElementById( 'ecode_page_template' ).innerHTML = return_html;

				add_events_click_section_template();

				add_event_click_edit();

				document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );

				document.getElementById( 'ecode_button_view_page' ).href = '';
				document.getElementById( 'ecode_button_view_page' ).classList.add( 'ecode_button_builder_disabled' );

				document.getElementById( 'ecode_button_edit_page' ).href = '';
				document.getElementById( 'ecode_button_edit_page' ).classList.add( 'ecode_button_builder_disabled' );

			}

        }

    };

    xhttp.open( 'POST', window.atob( ajax_url ), true);
    xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send( params );

}
