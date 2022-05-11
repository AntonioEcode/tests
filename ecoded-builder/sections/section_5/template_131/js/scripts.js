window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_5_template_131' ).length != 0 ) {

		check_scroll_5_131();
        document.addEventListener( 'scroll', check_scroll_5_131, false );
        document.addEventListener( 'touchmove', check_scroll_5_131, false );
        document.addEventListener( 'touchstart', check_scroll_5_131, false );

	}

}, false );

function check_scroll_5_131() {

	height_window = document.body.clientHeight;

	array_ecode_section_5_template_131 = document.getElementsByClassName( 'ecode_section_5_template_131' );

	for ( var i = 0; i < array_ecode_section_5_template_131.length; i++ ) {

		container_counters = array_ecode_section_5_template_131[i];

		distance_top = getOffsetTop( container_counters );

		total_scroll = distance_top - ( height_window / 4 );

		if ( scrollTop() >= total_scroll ) {

			if ( container_counters.className.indexOf( 'ecode_section_5_template_131_show' ) == -1 ) {

				container_counters.classList.add( 'ecode_section_5_template_131_show' );

				initialize_counters_5_131( container_counters );

			}

		}

	}

}

function initialize_counters_5_131( container_counters ) {

	array_counters = container_counters.getElementsByClassName( 'counter' );

	for ( var i = 0; i < array_counters.length; i++ ) {

		init_counter_5_131( array_counters[i], 0, parseInt( array_counters[i].innerHTML ), 2000 );

	}

}

function init_counter_5_131( element, start, end, duration ) {

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
