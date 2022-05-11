window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_33_template_40' ).length != 0 ) {

		add_click_categories_33_40();

	}

}, false );

function add_click_categories_33_40() {

	array_categories = document.getElementsByClassName( 'ecode_section_33_template_40' )[0].querySelectorAll( 'span.ecode_category' );

	if ( array_categories.length != 0 ) {

		for ( var i = 0; i < array_categories.length; i++ ) {

			array_categories[i].onclick = function() {

				for (var l = 0; l < array_categories.length; l++) {

					array_categories[l].classList.remove( 'ecode_category_current' );

				}

				data_cat = this.getAttribute( 'data-cat' );

				this.classList.add( 'ecode_category_current' );

				array_projects = document.getElementsByClassName( 'ecode_projects' )[0].querySelectorAll( 'article.ecode_article' );

				if ( data_cat != '' ) {

					for ( var j = 0; j < array_projects.length; j++ ) {

						project_cat = array_projects[j].getAttribute( 'data-cat' );

						if ( project_cat.indexOf( data_cat ) != -1 ) {

							array_projects[j].classList.remove( 'ecode_article_hide' );

						} else {

							array_projects[j].classList.add( 'ecode_article_hide' );

						}

					}

				} else {

					for ( var j = 0; j < array_projects.length; j++ ) {

						array_projects[j].classList.remove( 'ecode_article_hide' );

					}

				}

			}

		}

	}

}
