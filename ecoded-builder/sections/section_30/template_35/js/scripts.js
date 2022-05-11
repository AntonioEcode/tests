window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_image_video' ).length != 0 ) {

        add_click_link_video();

    }

}, false );

function add_click_link_video() {

	array_ecode_image_video = document.getElementsByClassName( 'ecode_image_video' );

	for ( var i = 0; i < array_ecode_image_video.length; i++ ) {

		array_ecode_image_video[i].onclick = function() {

			container_video = this.parentElement;

			video_id = this.getAttribute( 'data-id' );

			url_video = 'https://www.youtube.com/embed/' + video_id;
			// url_video = 'https://www.youtube-nocookie.com/embed/' + video_id;

			url_video += '?autoplay=1';

			iframe = document.createElement( 'IFRAME' );

			iframe.setAttribute( 'src', url_video );
			iframe.setAttribute( 'frameborder', '0' );
			iframe.setAttribute( 'allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' );
			iframe.setAttribute( 'allowfullscreen', 'allowfullscreen' );
			// iframe.setAttribute( 'scrolling', 'no' );
			iframe.style.width = '500px';
			iframe.style.height = '300px';

			container_video.innerHTML = '';

			container_video.appendChild(iframe);

			container_video.classList.add( 'ecode_article_figure_video' );

		}

	}

}
