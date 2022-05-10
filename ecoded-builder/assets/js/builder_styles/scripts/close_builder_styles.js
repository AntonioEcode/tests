function close_builder_styles() {

	document.getElementById( 'ecoded_builder_styles' ).classList.remove( 'ecoded_builder_styles_show' );
	document.body.classList.remove( 'ecoded_builder_body_fixed' );

	// Remove last style in element
	array_element_styles = edit_element.querySelectorAll( 'style' );

	if ( array_element_styles.length != 0 ) {

		array_element_styles[0].remove();

	}

	style_element_initial = '';
	data_element = '';
	edit_element = '';
	section_id_edit_element = '';
	tag_element = '';
	array_style_default = [];
	style_element_custom = '';
	array_style_custom = [];

	// Reset values editor
	reset_values_editor();

}
