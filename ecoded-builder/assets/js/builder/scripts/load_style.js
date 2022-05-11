/******************************************************************************/
/*****                          Add CSS sections                          *****/
/******************************************************************************/

var total_array_styles;
var count_array_styles = 0;
var list_styles = new Array();
var end_styles = false;

function load_style( src, styles ) {

    done_style = false;

	style = document.createElement( 'LINK' );
    style.setAttribute( 'rel', 'stylesheet' );
    style.setAttribute( 'type', 'text/css' );
    style.setAttribute( 'href', src + '?v=' + css_version );

    style.onload = style.onreadstatechange = function() {

        if ( !done_style && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete') ) {

            done_style = true;

            style.onload = style.onreadystatechange = null;

			count_array_styles++;

			list_styles.push( src );

			array_load_style( styles );

        }

    }

    document.getElementsByTagName('head')[0].insertBefore(style, document.getElementsByTagName('head')[0].firstChild);

}

function array_load_style( styles ) {

	total_array_styles = styles.length;

	if ( total_array_styles > count_array_styles ) {

		// document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

		if ( !list_styles.includes( styles[count_array_styles] ) ) {

			load_style( styles[count_array_styles], styles );

		} else {

			count_array_styles++;

			array_load_style( styles );

		}

	} else {

		end_styles = true;

		if ( end_styles && end_scripts && check_html_page_sections ) {

			count_sections_page++;
			add_sections_page( array_page_type );

		}

		if ( end_styles && end_scripts && !check_html_page_sections ) {

			document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );

		}

	}

}
