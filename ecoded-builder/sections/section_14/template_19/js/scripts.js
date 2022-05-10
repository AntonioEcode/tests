window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_14_template_19' ).length != 0 ) {

		create_menu_headers();

		control_scroll_contents();
        document.addEventListener( 'scroll', control_scroll_contents, false );
        document.addEventListener( 'touchmove', control_scroll_contents, false );
        document.addEventListener( 'touchstart', control_scroll_contents, false );

		control_scroll_titles();
        document.addEventListener( 'scroll', control_scroll_titles, false );
        document.addEventListener( 'touchmove', control_scroll_titles, false );
        document.addEventListener( 'touchstart', control_scroll_titles, false );

	}

}, false );

function create_menu_headers() {

	array_contents = document.querySelectorAll( '.ecode_section_14_template_19 .ecode_container_content' );

	for ( var i = 0; i < array_contents.length; i++ ) {

		container_headers = array_contents[i].nextElementSibling;
		array_titles = array_contents[i].querySelectorAll( 'h2[data-title]' );

		return_titles = '';

		for ( var j = 0; j < array_titles.length; j++ ) {

			text_title = array_titles[j].getAttribute( 'data-title' );

			return_titles += '<p data-title="' + text_title + '">' + text_title + '</p>';

		}

		container_headers.innerHTML = return_titles;

	}

	add_click_headers();

}

function add_click_headers() {

	array_container_headers = document.querySelectorAll( '.ecode_container_content_headers' );

	for ( var i = 0; i < array_container_headers.length; i++ ) {

		array_titles = array_container_headers[i].querySelectorAll( 'p' );

		array_container_headers[i].onclick = function() {

			this.classList.add( 'ecode_container_content_headers_show_all' );

		}

		for ( var j = 0; j < array_titles.length; j++ ) {

			array_titles[j].onclick = function() {

				width_window = document.body.clientWidth;

				ecode_container_content = this.parentElement.parentElement.querySelectorAll( '.ecode_container_content' )[0];

				text_title = this.getAttribute( 'data-title' );

				title_selected = ecode_container_content.querySelectorAll( 'h2[data-title="' + text_title + '"]' )[0];

				if ( width_window < 1024 ) {

					distance_top = getOffsetTop( title_selected ) - 100;

				} else {

					distance_top = getOffsetTop( title_selected ) - 50;

				}

				window.scroll({
					top: distance_top,
					left: 0,
					behavior: 'smooth',
				});

				setTimeout(function(){

					for ( var l = 0; l < array_container_headers.length; l++ ) {

						array_container_headers[l].classList.remove( 'ecode_container_content_headers_show_all' );

					}

				}, 50);

			}

		}

	}

}

function control_scroll_contents() {

	array_contents = document.querySelectorAll( '.ecode_section_14_template_19 .ecode_container_content' );

	for ( var i = 0; i < array_contents.length; i++ ) {

		width_window = document.body.clientWidth;
		height_window = document.body.clientHeight;

		ecode_container_content = array_contents[i];
		container_headers = array_contents[i].nextElementSibling;

		container_content_height = ecode_container_content.clientHeight;

		if ( width_window < 1024 ) { // Mobile / tablet

			distance_top = getOffsetTop( ecode_container_content );

			first_point = distance_top - ( height_window / 2 );

			last_point = distance_top + container_content_height - ( height_window / 2 );

			if ( scrollTop() >= first_point && scrollTop() < last_point ) { // Show headers

				container_headers.classList.add( 'ecode_container_content_headers_show' );

			} else if ( scrollTop() >= last_point ) { // Hide headers

				container_headers.classList.remove( 'ecode_container_content_headers_show' );

			} else { // Hide headers

				container_headers.classList.remove( 'ecode_container_content_headers_show' );

			}

		} else { // Desktop

			container_headers_height = container_headers.clientHeight;

			distance_top = getOffsetTop( ecode_container_content );

			first_point = distance_top - 50;

			last_point_headers = container_headers_height + 50;

			last_point = distance_top + container_content_height - last_point_headers;

			if ( scrollTop() >= first_point && scrollTop() < last_point ) {

				container_headers.classList.remove( 'ecode_container_content_headers_absolute' );
				container_headers.classList.add( 'ecode_container_content_headers_fixed' );

				if ( width_window >= 1200 ) {

					total_left = ( width_window - 1200 ) / 2 + 30;

					container_headers.style.left = total_left + 'px';

				} else {

					container_headers.style = '';

				}

			} else if ( scrollTop() >= last_point ) {

				container_headers.classList.remove( 'ecode_container_content_headers_fixed' );
				container_headers.classList.add( 'ecode_container_content_headers_absolute' );
				container_headers.style = '';

			} else {

				container_headers.classList.remove( 'ecode_container_content_headers_fixed' );
				container_headers.classList.remove( 'ecode_container_content_headers_absolute' );
				container_headers.style = '';

			}

		}

	}

}

function control_scroll_titles() {

	array_contents = document.querySelectorAll( '.ecode_section_14_template_19 .ecode_container_content' );

	for ( var i = 0; i < array_contents.length; i++ ) {

		container_headers = array_contents[i].nextElementSibling;
		array_titles = array_contents[i].querySelectorAll( 'h2[data-title]' );

		for ( var j = 0; j < array_titles.length; j++ ) {

			height_window = document.body.clientHeight;

			distance_top = getOffsetTop( array_titles[j] ) - ( height_window / 2 );

			text_title = array_titles[j].getAttribute( 'data-title' );

			if ( scrollTop() >= distance_top ) { // Show header

				array_headers = container_headers.querySelectorAll( 'p' );

				for ( var l = 0; l < array_headers.length; l++ ) {

					array_headers[l].classList.remove( 'show' );

				}

				current_title_header = container_headers.querySelectorAll( 'p[data-title="' + text_title + '"]' )[0];

				current_title_header.classList.add( 'show' );

			}

		}

	}

}
