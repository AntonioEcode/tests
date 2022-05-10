window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_slider_23_28' ) ) {

		initialize_flickity_ecode_slider_23_28();

	}

}, false );

function initialize_flickity_ecode_slider_23_28() {

	width_window = document.body.clientWidth;

	if ( width_window < 768 ) {

		ecode_slider_23_28 = new Flickity( document.getElementById( 'ecode_slider_23_28' ), {
			// options
			draggable: true,
			prevNextButtons: false,
			pageDots: false,
			freeScroll: false,
			wrapAround: true,
			contain: true,
			cellAlign: 'left',
			fade: true,
			on: {
				ready: function() {

					setTimeout(function(){

						array_slider_23_28_info = document.getElementById( 'ecode_slider_23_28' ).querySelectorAll( '.ecode_info' );

						array_slider_23_28_info[0].classList.add( 'ecode_info_show' );

					}, 500);

			    },
				change: function( index ) {

					array_slider_23_28_info = document.getElementById( 'ecode_slider_23_28' ).querySelectorAll( '.ecode_info' );

					for (var i = 0; i < array_slider_23_28_info.length; i++) {

						array_slider_23_28_info[i].classList.remove( 'ecode_info_show' );

					}

					setTimeout(function(){

						array_slider_23_28_info[index].classList.add( 'ecode_info_show' );

					}, 500);

				}
			},
		});

	} else {

		ecode_slider_23_28 = new Flickity( document.getElementById( 'ecode_slider_23_28' ), {
			// options
			draggable: true,
			prevNextButtons: true,
			pageDots: true,
			wrapAround: true,
			contain: true,
			cellAlign: 'left',
			fade: true,
			on: {
				ready: function() {

					setTimeout(function(){

						array_slider_23_28_info = document.getElementById( 'ecode_slider_23_28' ).querySelectorAll( '.ecode_info' );

						array_slider_23_28_info[0].classList.add( 'ecode_info_show' );

					}, 500);

			    },
				change: function( index ) {

					array_slider_23_28_info = document.getElementById( 'ecode_slider_23_28' ).querySelectorAll( '.ecode_info' );

					for (var i = 0; i < array_slider_23_28_info.length; i++) {

						array_slider_23_28_info[i].classList.remove( 'ecode_info_show' );

					}

					setTimeout(function(){

						array_slider_23_28_info[index].classList.add( 'ecode_info_show' );

					}, 500);

				}
			},
		});

	}

}
