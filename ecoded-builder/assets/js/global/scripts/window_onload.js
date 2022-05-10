/******************************************************************************/
/*****                              Onload                                *****/
/******************************************************************************/
window.addEventListener("load",function(event) {

	if ( document.getElementsByClassName( 'colorpicker' ).length != 0 ) {

		initialize_colorpicker();

	}

	if ( document.getElementsByClassName( 'slim_select' ).length != 0 ) {

		initialize_slim_select();

	}

},false);
