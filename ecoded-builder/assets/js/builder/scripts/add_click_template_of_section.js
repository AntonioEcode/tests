var template_id = '';

function add_click_template_of_section() {

	array_figures_templates = document.getElementById( 'section_sections' ).querySelectorAll( 'figure.figure_template' );

	for ( var j = 0; j < array_figures_templates.length; j++ ) {

		array_figures_templates[j].onclick = function() {

			template_id = this.id.split( '_' )[2];

			if ( document.querySelectorAll( '.section_selected' ).length != 0 ) {

				document.querySelectorAll( '.section_selected' )[0].classList.remove( 'section_selected' );

			}

			this.classList.add( 'section_selected' );

			// Select template
			if ( old_template_id == template_id ) { // Same template, check resets values

				if ( confirm( 'La plantilla seleccionada es la elegida actualmente, ¿estás seguro de que desea restablecer los valores?' ) ) { // Reset

					document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

					ajax_get_html_section();

				}

			} else {

				document.getElementById( 'ecode_container_loader' ).classList.add( 'ecode_container_loader_show' );

				ajax_get_html_section();

			}

		}

	}

	if ( array_figures_templates.length == 1 ) {

		if ( old_template_id == '' || old_template_id == null ) {

			array_figures_templates[0].click();

		}

	}

}
