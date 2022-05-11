function add_events_ecode_themes() {

	array_articles_themes = document.getElementById( 'ecode_themes' ).querySelectorAll( '.ecode_theme' );

	for ( var i = 0; i < array_articles_themes.length; i++ ) {

		array_articles_themes[i].onclick = function() {

			theme_index = this.getAttribute( 'data-id' );

			array_images = array_themes[theme_index].images;

			return_html = '';

			return_html += '<section class="ecoded_builder_container_popup_width">';

				return_html += '<section class="ecode_theme_images">';

					for ( var j = 0; j < array_images.length; j++ ) {

						image_url = array_images[j];

						// Get parts url
						array_parts_image_url = array_images[j].split( '/' );

						// Get image name
						image_name = array_parts_image_url[array_parts_image_url.length - 1];

						// Delete extesion name
						image_name = image_name.split( '.' )[0];

						// Clear name
						image_name = image_name.split( '-' )[1];
						image_name = image_name.replaceAll( '_', ' ' );

						// Convert first letter to uppercase
						image_name = image_name.charAt(0).toUpperCase() + image_name.slice(1);

						return_html += '<article>';
							return_html += '<figure>';
								return_html += '<img src="' + image_url + '">';
							return_html += '</figure>';
							return_html += '<h2>' + image_name + '</h2>';
						return_html += '</article>';

					}

				return_html += '</section>';

				return_html += '<section class="ecoded_builder_container_popup_footer">';
					return_html += '<button id="ecode_select_theme" class="ecode_button_builder ecode_button_builder_c_c" data-theme="theme_' + array_themes[theme_index].name + '">Seleccionar tema</button>';
				return_html += '</section>';

			return_html += '</section>';

			document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = return_html;
			document.getElementById( 'ecoded_builder_container_popup' ).classList.add( 'ecoded_builder_container_popup_show' );

			add_event_button_select_theme();

		}

	}

}
