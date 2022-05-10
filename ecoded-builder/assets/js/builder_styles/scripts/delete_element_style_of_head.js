function delete_element_style_of_head() {

	array_tags_styles = document.querySelectorAll( 'style' );

	array_delete_styles = [];

	for ( var i = 0; i < array_tags_styles.length; i++ ) {

		style_inner = array_tags_styles[i].innerHTML;

		string_element_style = '#page_section_' + section_id_edit_element + ' .' + data_element + '{';

		if ( style_inner.indexOf( string_element_style ) != -1 ) {

			array_style_inner = style_inner.split( '#page_section_' );

			for ( var j = 0; j < array_style_inner.length; j++ ) {

				string_properties_by_element = '#page_section_' + array_style_inner[j];

				if ( string_properties_by_element.indexOf( string_element_style ) != -1 ) {

					new_inner_style = style_inner.replace( string_properties_by_element, '' );

					array_tags_styles[i].innerHTML = new_inner_style;

				}

			}

		}

	}

}
