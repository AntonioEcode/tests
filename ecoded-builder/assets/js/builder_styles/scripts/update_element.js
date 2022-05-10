var style_element_initial = '';

function update_element() {

	if ( edit_element ) {

		modified_properties = get_modified_properties();

		// Remove last style in element
		array_element_styles = edit_element.querySelectorAll( 'style' );

		if ( array_element_styles.length != 0 ) {

			array_element_styles[0].remove();

		}

		// Create style
		var styles = '#page_section_' + section_id_edit_element + ' .' + data_element + ' {' + modified_properties + '}';

		// Create style element
	    var element_style = document.createElement('style');

	    element_style.type = 'text/css';

	    if ( element_style.styleSheet ) {

	        element_style.styleSheet.cssText = styles;

	    } else {

	        element_style.appendChild(document.createTextNode(styles));

		}

	    edit_element.appendChild( element_style );

		// Delete styles head
		// delete_element_style_of_head();
		//
		// if ( style_element_initial == '' ) {
		//
		// 	if ( edit_element != '' ) {
		//
		// 		// style_element_initial = edit_element.getAttribute( 'style' );
		// 		style_element_initial = modified_properties;
		//
		// 	}
		//
		// }

	}

}
