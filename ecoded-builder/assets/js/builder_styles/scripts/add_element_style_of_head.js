function add_element_style_of_head( new_style ) {

	style_element = document.createElement('style');
	style_element_content = '';
	style_element_content += '#page_section_' + section_id_edit_element + ' .' + data_element + '{';

	style_element_content += new_style;

	style_element_content += '}';
	style_element.innerHTML = style_element_content;
	document.getElementsByTagName( 'head' )[0].appendChild( style_element );

}
