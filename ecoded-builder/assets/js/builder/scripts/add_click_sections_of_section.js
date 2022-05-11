var section_section_id = '';

function add_click_sections_of_section( check_old_template ) {

	array_figures_sections = document.getElementById( 'section_sections' ).querySelectorAll( 'figure.figure_section' );

	for ( var j = 0; j < array_figures_sections.length; j++ ) {

		array_figures_sections[j].onclick = function() {

			section_section_id = this.id.split( '_' )[2];

			if ( document.querySelectorAll( '.section_selected' ).length != 0 ) {

				document.querySelectorAll( '.section_selected' )[0].classList.remove( 'section_selected' );

			}

			this.classList.add( 'section_selected' );

			get_templates_of_section();

		}

	}

	if ( check_old_template == true && old_template_id != '' ) {

		for ( var i = 0; i < array_sections_templates.length; i++ ) {

			array_templates = array_sections_templates[i].templates;

			for ( var k = 0; k < array_templates.length; k++ ) {

				if ( array_templates[k].id == old_template_id ) {

					if ( document.getElementById( 'section_section_' + array_sections_templates[i].id ) ) {

						document.getElementById( 'section_section_' + array_sections_templates[i].id ).click();

					}

					break;

				}

			}

		}

	}

}
