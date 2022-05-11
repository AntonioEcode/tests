var parent_edit = '';

function get_section_id_to_edit( element ) {

	section_id_edit_element = '';

	if ( parent_edit == '' || ( parent_edit.className != undefined && parent_edit.className.indexOf( 'section_template' ) == -1 ) ) {

		if ( parent_edit == '' ) {

			parent_edit = element.parentElement;

		} else {

			parent_edit = parent_edit.parentElement;

		}

		get_section_id_to_edit( element )

	} else {

		section_id_edit_element = parent_edit.id.split( '_' )[1];

	}

	return section_id_edit_element;

}
