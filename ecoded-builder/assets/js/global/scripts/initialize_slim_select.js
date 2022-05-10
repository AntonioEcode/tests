var new_slim_select = [];
var slim_select_id = [];
var slim_select_id_font = [];

function initialize_slim_select() {

	array_slim_select = document.querySelectorAll( 'select.slim_select' );

	if ( array_slim_select.length != 0 ) {

		new_slim_select = [];
		slim_select_id = [];
		slim_select_id_font = [];

		for ( var i = 0; i < array_slim_select.length; i++ ) {

			slim_select_id[i] = array_slim_select[i].id;
			slim_select_id_font[i] = array_slim_select[i].getAttribute( 'value' );

			init_slim_select( i );

		}

	}

}

function init_slim_select( i ) {

	new_slim_select[i] = new SlimSelect({
		select: document.getElementById( slim_select_id[i] ),
		valuesUseText: true,
		showSearch: false,
		value: slim_select_id_font[i],
		data: [
			{ innerHTML: '<div><p>Abrilfatface</p></div>', text: 'Abrilfatface', value: 'abrilfatface', },
			{ innerHTML: '<div><p>Aller</p></div>', text: 'Aller', value: 'aller', },
			{ innerHTML: '<div><p>Anton</p></div>', text: 'Anton', value: 'anton', },
			{ innerHTML: '<div><p>Arimo</p></div>', text: 'Arimo', value: 'arimo', },
			{ innerHTML: '<div><p>Barlow</p></div>', text: 'Barlow', value: 'barlow', },
			{ innerHTML: '<div><p>Bebas Neue</p></div>', text: 'Bebas Neue', value: 'bebasneue', },
			{ innerHTML: '<div><p>Catamaran</p></div>', text: 'Catamaran', value: 'catamaran', },
			{ innerHTML: '<div><p>CircularStd</p></div>', text: 'CircularStd', value: 'circularstd', },
			{ innerHTML: '<div><p>Crimson Text</p></div>', text: 'Crimson Text', value: 'crimsontext', },
			{ innerHTML: '<div><p>Darker Grotesque</p></div>', text: 'Darker Grotesque', value: 'darkergrotesque', },
			{ innerHTML: '<div><p>Dosis</p></div>', text: 'Dosis', value: 'dosis', },
			{ innerHTML: '<div><p>Economica</p></div>', text: 'Economica', value: 'economica', },
			{ innerHTML: '<div><p>Encode Sans Semi Expanded</p></div>', text: 'Encode Sans Semi Expanded', value: 'encodesanssemiexpanded', },
			{ innerHTML: '<div><p>Fira Sans</p></div>', text: 'Fira Sans', value: 'firasans', },
			{ innerHTML: '<div><p>Heebo</p></div>', text: 'Heebo', value: 'heebo', },
			{ innerHTML: '<div><p>Helvetica</p></div>', text: 'Helvetica', value: 'helvetica', },
			{ innerHTML: '<div><p>Hind Siliguri</p></div>', text: 'Hind Siliguri', value: 'hindsiliguri', },
			{ innerHTML: '<div><p>Inconsolata</p></div>', text: 'Inconsolata', value: 'inconsolata', },
			{ innerHTML: '<div><p>Inter</p></div>', text: 'Inter', value: 'inter', },
			{ innerHTML: '<div><p>Josefin Sans</p></div>', text: 'Josefin Sans', value: 'josefinsans', },
			{ innerHTML: '<div><p>Kanit</p></div>', text: 'Kanit', value: 'kanit', },
			{ innerHTML: '<div><p>Karla</p></div>', text: 'Karla', value: 'karla', },
			{ innerHTML: '<div><p>Lato</p></div>', text: 'Lato', value: 'lato', },
			{ innerHTML: '<div><p>Libre Baskerville</p></div>', text: 'Libre Baskerville', value: 'librebaskerville', },
			{ innerHTML: '<div><p>Libre Franklin</p></div>', text: 'Libre Franklin', value: 'librefranklin', },
			{ innerHTML: '<div><p>Lora</p></div>', text: 'Lora', value: 'lora', },
			{ innerHTML: '<div><p>Merriweather</p></div>', text: 'Merriweather', value: 'merriweather', },
			{ innerHTML: '<div><p>Metrophobic</p></div>', text: 'Metrophobic', value: 'metrophobic', },
			{ innerHTML: '<div><p>Metropolis</p></div>', text: 'Metropolis', value: 'metropolis', },
			{ innerHTML: '<div><p>Monda</p></div>', text: 'Monda', value: 'monda', },
			{ innerHTML: '<div><p>Montserrat</p></div>', text: 'Montserrat', value: 'montserrat', },
			{ innerHTML: '<div><p>Mukta</p></div>', text: 'Mukta', value: 'mukta', },
			{ innerHTML: '<div><p>Nanum Gothic</p></div>', text: 'Nanum Gothic', value: 'nanumgothic', },
			{ innerHTML: '<div><p>Noto Sans</p></div>', text: 'Noto Sans', value: 'notosans', },
			{ innerHTML: '<div><p>Nunito Sans</p></div>', text: 'Nunito Sans', value: 'nunitosans', },
			{ innerHTML: '<div><p>Open Sans</p></div>', text: 'Open Sans', value: 'opensans', },
			{ innerHTML: '<div><p>Open Sans Condensed</p></div>', text: 'Open Sans Condensed', value: 'opensanscondensed', },
			{ innerHTML: '<div><p>Oswald</p></div>', text: 'Oswald', value: 'oswald', },
			{ innerHTML: '<div><p>Oxygen</p></div>', text: 'Oxygen', value: 'oxygen', },
			{ innerHTML: '<div><p>Padauk</p></div>', text: 'Padauk', value: 'padauk', },
			{ innerHTML: '<div><p>Playfair Display</p></div>', text: 'Playfair Display', value: 'playfairdisplay', },
			{ innerHTML: '<div><p>Poppins</p></div>', text: 'Poppins', value: 'poppins', },
			{ innerHTML: '<div><p>PT Sans</p></div>', text: 'PT Sans', value: 'ptsans', },
			{ innerHTML: '<div><p>PT Sans Narrow</p></div>', text: 'PT Sans Narrow', value: 'ptsansnarrow', },
			{ innerHTML: '<div><p>PT Serif</p></div>', text: 'PT Serif', value: 'ptserif', },
			{ innerHTML: '<div><p>Quicksand</p></div>', text: 'Quicksand', value: 'quicksand', },
			{ innerHTML: '<div><p>Raleway</p></div>', text: 'Raleway', value: 'raleway', },
			{ innerHTML: '<div><p>Roboto</p></div>', text: 'Roboto', value: 'roboto', },
			{ innerHTML: '<div><p>Roboto Condensed</p></div>', text: 'Roboto Condensed', value: 'robotocondensed', },
			{ innerHTML: '<div><p>Roboto Slab</p></div>', text: 'Roboto Slab', value: 'robotoslab', },
			{ innerHTML: '<div><p>Rubik</p></div>', text: 'Rubik', value: 'rubik', },
			{ innerHTML: '<div><p>Saira</p></div>', text: 'Saira', value: 'saira', },
			{ innerHTML: '<div><p>Sharp Groteske</p></div>', text: 'Sharp Groteske', value: 'sharpgroteske', },
			{ innerHTML: '<div><p>Source Sans Pro</p></div>', text: 'Source Sans Pro', value: 'sourcesanspro', },
			{ innerHTML: '<div><p>Titillium Web</p></div>', text: 'Titillium Web', value: 'titilliumweb', },
			{ innerHTML: '<div><p>Ubuntu</p></div>', text: 'Ubuntu', value: 'ubuntu', },
			{ innerHTML: '<div><p>Vidaloka</p></div>', text: 'Vidaloka', value: 'vidaloka', },
			{ innerHTML: '<div><p>Work Sans</p></div>', text: 'Work Sans', value: 'worksans', },
			{ innerHTML: '<div><p>Yanone Kaffeesatz</p></div>', text: 'Yanone Kaffeesatz', value: 'yanonekaffeesatz', },
		],
		onChange: (info) => {

			if ( ( info.value != slim_select_id_font[i] ) && document.getElementById( 'fonts-changed' ) ) {

				document.getElementById( 'fonts-changed' ).value = '1';

			}

		}
	});

	new_slim_select[i].set( slim_select_id_font[i] );

}
