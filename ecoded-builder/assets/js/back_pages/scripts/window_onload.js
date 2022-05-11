var ecode_event_load;

/******************************************************************************/
/*****                              Onload                                *****/
/******************************************************************************/
window.addEventListener( 'load', function(event) {

	ecode_event_load = new Event( 'ecode_load' );

	// Add events check default icons
	if ( document.getElementsByClassName( 'ecode_container_list_icons' ).length != 0 && document.getElementsByClassName( 'ecode_container_preview' ).length != 0 ) {

        check_show_preview();

        add_events_click_icons();

    }

    if ( document.querySelectorAll( 'button[type="button"]' ).length != 0 ) {

        array_button = document.querySelectorAll( 'button[type="button"]' );

        for ( var i = 0; i < array_button.length; i++ ) {

            array_button[i].onclick = function() {

                update_click_buttons();

            }

        }

    }

    if ( document.querySelectorAll( '.cmb-shift-rows' ).length != 0 ) {

        array_shift_rows = document.querySelectorAll( '.cmb-shift-rows' );

        for ( var i = 0; i < array_shift_rows.length; i++ ) {

            array_shift_rows[i].onclick = function() {

                update_click_buttons();

            }

        }

    }

	// Add description field classes wp_nav_menu
    if ( document.getElementsByClassName( 'field-css-classes' ).length != 0 ) {

        array_field_css_clases = document.getElementsByClassName( 'field-css-classes' );

        for ( var i = 0; i < array_field_css_clases.length; i++ ) {

            label_field = array_field_css_clases[i].querySelectorAll( 'label' )[0];

            span_description = document.createElement( 'SPAN' );
            span_description.className = 'description';
            span_description.innerHTML = 'Clases disponibles: button_primary';

            label_field.appendChild( span_description );

        }

    }

	// Buttons global content
	if ( document.getElementsByClassName( 'button_create_global_content' ).length != 0 ) {

		add_event_buttons_global_content();

	}

	if ( document.getElementsByClassName( 'wpeb_global_content_radios' ).length != 0 ) {

		add_event_global_content_radios();

	}

	// Ecode search
    if ( document.getElementsByClassName( 'ecode_search' ).length != 0 ) {

        initialize_ecode_search();

    }

	// Reload page when add widget
    jQuery( document ).on( 'widget-added', function() {

        return_loader = '';
		return_loader += '<div class="ecode_container_loader_widget_width">';
			return_loader += '<span class="loader"></span>';
			return_loader += '<p>Cargando datos...</p>';
		return_loader += '</div>';

		loader = document.createElement( 'SECTION' );
		loader.id = 'ecode_container_loader_widget';
		loader.className = 'ecode_container_loader_widget';
		loader.innerHTML = return_loader;

		document.body.appendChild(loader);

        setTimeout(function(){

            location.reload();

        }, 2000);

    });

    // Add events when save widget
    jQuery( document ).on( 'widget-updated', function() {

        initialize_ecode_search();

    });

},false);
