window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_71_template_83' ).length != 0 ) {

		check_scroll_features_71_83();
        document.addEventListener( 'scroll', check_scroll_features_71_83, false );
        document.addEventListener( 'touchmove', check_scroll_features_71_83, false );
        document.addEventListener( 'touchstart', check_scroll_features_71_83, false );

	}

}, false );

function check_scroll_features_71_83() {

	height_window = document.body.clientHeight;

	// Control scroll features
	array_ecode_features_71_83 = document.getElementsByClassName( 'ecode_features_71_83' );

	for ( var i = 0; i < array_ecode_features_71_83.length; i++ ) {

		container_features = array_ecode_features_71_83[i];

		distance_top = getOffsetTop( container_features );

		total_scroll = distance_top - ( height_window / 2 );

		if ( scrollTop() >= total_scroll ) {

			if ( container_features.className.indexOf( 'ecode_features_show' ) == -1 ) {

				container_features.classList.add( 'ecode_features_show' );

				initialize_counters_71_83( container_features );

			}

		}

	}

	// Control scroll articles
	array_s71_t83 = document.getElementsByClassName( 'ecode_section_71_template_83' );

	for ( var i = 0; i < array_s71_t83.length; i++ ) {

		distance_top = getOffsetTop( array_s71_t83[i] );
		// height_container_pages = array_s71_t83[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s71_t83[i].className.indexOf( 'ecode_section_71_template_83_show' ) == -1 ) {

			array_s71_t83[i].classList.add( 'ecode_section_71_template_83_show' );

			array_elements_hide = array_s71_t83[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_71_83 = 0;
			total_elements_hide_71_83 = 0;

			show_elements_hide_71_83( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_71_83( array_elements_hide ) {

	total_elements_hide_71_83 = array_elements_hide.length;

	if ( total_elements_hide_71_83 > cont_elements_hide_71_83 ) {

		show_element_hide_71_83( array_elements_hide[cont_elements_hide_71_83], array_elements_hide );

	}

}

function show_element_hide_71_83( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_71_83++;

	show_elements_hide_71_83( array_elements_hide );

	}, 100);

}

function initialize_counters_71_83( container_features ) {

	array_counters = container_features.getElementsByClassName( 'ecode_counter_71_83' );

	for ( var i = 0; i < array_counters.length; i++ ) {

		init_counter_71_83( array_counters[i], 0, parseInt( array_counters[i].innerHTML ), 2000 );

	}

}

function init_counter_71_83( element, start, end, duration ) {

    // assumes integer values for start and end
    var obj = element;
    var range = end - start;

    // no timer shorter than 50ms (not really visible any way)
    var minTimer = 50;
    // calc step time to show all interediate values
    var stepTime = Math.abs(Math.floor(duration / range));

    // never go below minTimer
    stepTime = Math.max(stepTime, minTimer);

    // get current time and calculate desired end time
    var startTime = new Date().getTime();
    var endTime = startTime + duration;
    var timer;

	function run() {
		var now = new Date().getTime();
		var remaining = Math.max((endTime - now) / duration, 0);
		var value = Math.round(end - (remaining * range));
		obj.innerHTML = value;
		if ( value == end ) {

			clearInterval(timer);

		}
	}

    timer = setInterval(run, stepTime);
    run();

}
