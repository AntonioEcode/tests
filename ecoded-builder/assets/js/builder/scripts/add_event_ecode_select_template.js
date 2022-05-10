var page_id = '';

function add_event_ecode_select_template() {

	array_ecode_button_template = document.getElementsByClassName( 'ecode_button_template' );

	for ( var i = 0; i < array_ecode_button_template.length; i++ ) {

		array_ecode_button_template[i].onclick = function() {

			if ( page_id != this.name ) {

				if ( document.getElementsByClassName( 'ecode_button_template_current' ).length != 0 ) {

					document.getElementsByClassName( 'ecode_button_template_current' )[0].classList.remove( 'ecode_button_template_current' );

				}

				this.classList.add( 'ecode_button_template_current' );

				document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

				document.getElementById( 'ecode_page_template' ).innerHTML = '';

				count_sections_page = 0;
				return_html_sections_page = '';

				page_id = this.name;

				// Update URL
				data_template = this.getAttribute( 'data-template' );

				window.history.replaceState( '', '', update_url_parameter( window.location.href, 'template', data_template)  );

				// Se localiza el cambio de template y se ejecuta el AJAX para recibir las secciones de dicho template.
				ajax_get_sections_template( page_id );

			}

		}

	}

	if ( template_selected != '' ) {

		if ( document.querySelectorAll( '.ecode_button_template[data-template="' + template_selected + '"]' ).length != 0 ) {

			document.querySelectorAll( '.ecode_button_template[data-template="' + template_selected + '"]' )[0].click();

		}

	} else {

		document.getElementsByClassName( 'ecode_button_template' )[0].click();

	}

}

function update_url_parameter( url, param, param_val ) {

    var new_additional_url = '';
    var temp_array = url.split("?");
    var base_url = temp_array[0];
    var additional_url = temp_array[1];
    var temp = "";

    if ( additional_url ) {

        temp_array = additional_url.split( '&' );

        for ( var i = 0; i < temp_array.length; i++ ) {

            if ( temp_array[i].split( '=' )[0] != param ) {

                new_additional_url += temp + temp_array[i];

                temp = '&';

            }

        }

    }

    var rows_txt = temp + '' + param + '=' + param_val;
    return base_url + '?' + new_additional_url + rows_txt;

}
