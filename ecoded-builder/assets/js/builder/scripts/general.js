/******************************************************************************/
/*****                     Functions get scroll page                      *****/
/******************************************************************************/
function scrollTop() {

   return filterResults (
       window.pageYOffset ? window.pageYOffset : 0,
       document.documentElement ? document.documentElement.scrollTop : 0,
       document.body ? document.body.scrollTop : 0
   );

}

function filterResults(n_win, n_docel, n_body) {

   var n_result = n_win ? n_win : 0;
   if (n_docel && (!n_result || (n_result > n_docel)))
       n_result = n_docel;
   return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;

}

function getOffsetTop( elem ) {

    var offsetTop = 0;

    do {

      if ( !isNaN( elem.offsetTop ) ) {

          offsetTop += elem.offsetTop;

      }

    } while ( elem = elem.offsetParent );

    return offsetTop;

}

/******************************************************************************/
/*****                 Functions scroll horizontal mouse                  *****/
/******************************************************************************/
function scroll_horizontal_mouse( element ) {

	const slider = element;
	let isDown = false;
	let startX;
	let scrollLeft;

	slider.addEventListener('mousedown', (e) => {

        isDown = true;
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;

	});

	slider.addEventListener('mouseleave', () => {

        isDown = false;

	});

	slider.addEventListener('mouseup', () => {

        isDown = false;

	});

	slider.addEventListener('mousemove', (e) => {

        if(!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;

	});

}
