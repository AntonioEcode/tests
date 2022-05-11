/******************************************************************************/
/*****                           Add JS sections                          *****/
/******************************************************************************/
var total_array_scripts;
var count_array_scripts = 0;
var list_scripts = new Array();
var end_scripts = false;

function load_script( src, download_scripts ) {

    done_script = false;

	script = document.createElement('script');
    script.setAttribute( 'src', src + '?v=' + css_version );
    script.setAttribute( 'type', 'text/javascript' );
    script.setAttribute( 'charset', 'utf-8' );

    script.onload = script.onreadstatechange = function() {

        if ( !done_script && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete') ) {

            done_script = true;

            script.onload = script.onreadystatechange = null;

			count_array_scripts++;

			list_scripts.push( src );

			array_load_script( download_scripts );

        }

    }

    document.getElementsByTagName('head')[0].insertBefore(script, document.getElementsByTagName('head')[0].firstChild);

}

function array_load_script( download_scripts ) {

	total_array_scripts = download_scripts.length;

	if ( total_array_scripts > count_array_scripts ) {

		// document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

		if ( !list_scripts.includes( download_scripts[count_array_scripts] ) ) {

			load_script( download_scripts[count_array_scripts], download_scripts );

		} else {

			count_array_scripts++;
			array_load_script( download_scripts );

		}

	} else {

		end_scripts = true;

		if ( end_styles && end_scripts && check_html_page_sections ) {

			count_sections_page++;
			add_sections_page( array_page_type );

		}

		if ( end_styles && end_scripts && !check_html_page_sections ) {

			window.dispatchEvent( ecode_event_load );

			document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );


		}


	}

}
