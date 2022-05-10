window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_23_template_43' ).length != 0 ) {

		add_click_button_scroll();

	}

}, false );

function add_click_button_scroll() {

	array_templates = document.getElementsByClassName( 'ecode_section_23_template_43' );

	for ( var i = 0; i < array_templates.length; i++ ) {

		icon_scroll = array_templates[i].querySelectorAll( '.ecode_icon_scroll' )[0];

		icon_scroll.onclick = function() {

			current_parent = this.parentElement;

			height_parent = current_parent.clientHeight;
			distace_top_parent = getOffsetTop( current_parent );

			total_scroll = height_parent + distace_top_parent;

			window.scroll({
				top: total_scroll,
				left: 0,
				behavior: 'smooth',
			});


		}

	}

}
