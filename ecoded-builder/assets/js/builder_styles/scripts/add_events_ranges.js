function add_events_ranges() {

	array_ranges = document.getElementsByClassName( 'style_range' );

	for ( var i = 0; i < array_ranges.length; i++ ) {

		input_range = array_ranges[i].querySelectorAll( 'input[type="range"]' )[0];
		input_number = array_ranges[i].querySelectorAll( 'input[type="number"]' )[0];

		input_range.onchange = function() {

			container_parent = this.parentElement;
			value = this.value;
			container_parent.querySelectorAll( 'input[type="number"]' )[0].value = value;

			if ( this.className.indexOf( 'edit_border' ) != -1 ) {

				update_border()

			} else {

				update_element();

			}

		};

		input_range.oninput = function() {

			container_parent = this.parentElement;
			value = this.value;
			container_parent.querySelectorAll( 'input[type="number"]' )[0].value = value;

			if ( this.className.indexOf( 'edit_border' ) != -1 ) {

				update_border()

			} else {

				update_element();

			}

		};

		input_number.onchange = function() {

			container_parent = this.parentElement;
			value = this.value;
			container_parent.querySelectorAll( 'input[type="range"]' )[0].value = value;

			if ( this.className.indexOf( 'edit_border' ) != -1 ) {

				update_border()

			} else {

				update_element();

			}

		};

		input_number.oninput = function() {

			container_parent = this.parentElement;
			value = this.value;
			container_parent.querySelectorAll( 'input[type="range"]' )[0].value = value;

			if ( this.className.indexOf( 'edit_border' ) != -1 ) {

				update_border()

			} else {

				update_element();

			}

		};

	}

}
