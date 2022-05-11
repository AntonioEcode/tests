window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_width_142_211' ).length != 0 ) {

		check_scroll_features_95_111();
        document.addEventListener( 'scroll', check_scroll_features_95_111, false );
        document.addEventListener( 'touchmove', check_scroll_features_95_111, false );
        document.addEventListener( 'touchstart', check_scroll_features_95_111, false );

	}

}, false );

function check_scroll_features_95_111() {

	height_window = document.body.clientHeight;

	array_ecode_width_142_211 = document.getElementsByClassName( 'ecode_width_142_211' );

	for ( var i = 0; i < array_ecode_width_142_211.length; i++ ) {

		container_counters = array_ecode_width_142_211[i];

		distance_top = getOffsetTop( container_counters );

		total_scroll = distance_top - ( height_window );

		if ( scrollTop() >= total_scroll ) {

			if ( container_counters.className.indexOf( 'ecode_width_142_211_show' ) == -1 ) {

				container_counters.classList.add( 'ecode_width_142_211_show' );

				initialize_counters_95_111( container_counters );

			}

		}

	}

}

function initialize_counters_95_111( container_counters ) {

	array_counters = container_counters.getElementsByClassName( 'ecode_article_counter' );

	for ( var i = 0; i < array_counters.length; i++ ) {

		init_counter_95_111( array_counters[i], 0, parseInt( array_counters[i].innerHTML ), 2000 );

	}

}

function init_counter_95_111( element, start, end, duration ) {

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
