/******************************************************************************/
/*                                Ecode search                                */
/******************************************************************************/
function initialize_ecode_search() {

    add_events_ecode_search();

    add_event_button_delete();

    add_event_button_close_search();

    initialize_sortable();

}

function initialize_sortable() {

    array_ecode_drag = document.getElementsByClassName( 'ecode_drag' );

    for ( var i = 0; i < array_ecode_drag.length; i++ ) {

        container_drag_sortable = array_ecode_drag[i];

        var drag_sortable = new Sortable( container_drag_sortable, {
    	    animation: 150,
    		onChange: function(evt) {

                parent = evt.srcElement.parentElement;

                update_results_companies_selected( parent );

            },

    	});

    }

}

var last_input_action;
var array_data;
var typing_timer = "";
var done_typing_interval = 500;

function add_events_ecode_search() {

    array_ecode_search = document.getElementsByClassName( 'ecode_search' );

    for ( var i = 0; i < array_ecode_search.length; i++ ) {

        input_search = array_ecode_search[i].querySelectorAll( 'input.ecode_input_search' )[0];

        input_search.onkeyup = function() {

			input_action = this;

			clearTimeout( typing_timer );

			typing_timer = setTimeout(function(){

				input_value = input_action.value;
				input_parent = input_action.parentElement;

	            if ( input_value != '' ) {

					if ( ( last_input_action != input_action ) && !array_data ) {

						last_input_action = input_action;

	                	ajax_get_array_results( input_value, input_parent );

					} else {

						set_html_list_companies( input_value, input_parent );

					}

	            } else {

	                input_parent.querySelectorAll( '.ecode_list' )[0].innerHTML = '';

	            }

			}, done_typing_interval );

    	};

        input_search.onfocus = function() {

			input_action = this;

			clearTimeout( typing_timer );

			typing_timer = setTimeout(function(){

	            array_ecode_list = document.getElementsByClassName( 'ecode_list' );

	            for ( var i = 0; i < array_ecode_list.length; i++ ) {

	                array_ecode_list[i].innerHTML = '';

	            }

	            input_value = input_action.value;
	            input_parent = input_action.parentElement;

	            if ( input_value != '' ) {

					if ( ( last_input_action != input_action ) && !array_data ) {

						last_input_action = input_action;

	                	ajax_get_array_results( input_value, input_parent );

					} else {

						set_html_list_companies( input_value, input_parent );

					}

	            }

			}, done_typing_interval );

    	};

    }

}

function set_html_list_companies( query_text, parent ) {

	return_html = '';

    for ( var data_id in array_data ) {

        container_hidden_id = parent.querySelectorAll( 'input[name="meta_key_hidden_id"]' )[0].value;
        container_hidden_value = document.getElementById( container_hidden_id ).value;

        container_hidden_value_array = container_hidden_value.split( ',' );

        if ( container_hidden_value_array.indexOf( data_id ) == -1 ) {

            data_name = array_data[data_id];

            data_name_clear = clear_text_accents( data_name );
            query_text_clear = clear_text_accents( query_text );

            if ( data_name_clear.indexOf( query_text_clear ) != -1 ) {

    			return_html += '<p data-id="' + data_id + '">' + data_name + '</p>';

    		}

        }

    }

    container_list = parent.querySelectorAll( '.ecode_list' )[0];
	container_list.innerHTML = '';
	container_list.innerHTML = return_html;

	add_clicks_companies( container_list, parent );

}

function add_clicks_companies( container_list, parent ) {

	array_list_companies = container_list.querySelectorAll( 'p' );

	for ( var i = 0; i < array_list_companies.length; i++ ) {

		array_list_companies[i].onclick = function() {

            // Get data selected
            data_selected_id = this.getAttribute( 'data-id' );
            data_selected_name = this.innerHTML;

            // Get html container drag
            container_drag = parent.querySelectorAll( '.ecode_drag' )[0];
			drag_companies_html = container_drag.innerHTML;

            // Add data selected to container drag
			container_drag.innerHTML = drag_companies_html + '<p data-id="' + data_selected_id + '">' + data_selected_name + '<span class="button_delete"></span></p>';

            // Delete data selected
            this.remove();

            update_results_companies_selected( parent );

            add_event_button_delete();

		}

	}

}

function add_event_button_delete() {

    array_button_delete = document.getElementsByClassName( 'button_delete' );

    for ( var i = 0; i < array_button_delete.length; i++ ) {

        array_button_delete[i].onclick = function() {

            parent = this.parentElement.parentElement.parentElement;

            this.parentElement.remove();

            hidden_id = parent.querySelectorAll( 'input[name="meta_key_hidden_id"]' )[0].value;

            if ( hidden_id.indexOf( 'widget-' ) != -1 ) {

                array_hidden_id = hidden_id.split( '-' );

                last_part_hidden_id = array_hidden_id[array_hidden_id.length - 1];

                button_save_id = hidden_id.replace( last_part_hidden_id, '' ) + 'savewidget';

                document.getElementById( button_save_id ).value = 'Guardar';
                document.getElementById( button_save_id ).disabled = false;

            }

            update_results_companies_selected( parent );

        }

    }

}

function add_event_button_close_search() {

    array_button_close_searcher = document.getElementsByClassName( 'ecode_button_close_searcher' );

    for ( var i = 0; i < array_button_close_searcher.length; i++ ) {

        array_button_close_searcher[i].onclick = function() {

            parent = this.parentElement;

            parent.querySelectorAll( '.ecode_input_search' )[0].value = '';
            parent.querySelectorAll( '.ecode_list' )[0].innerHTML = '';

        }

    }

}

function update_results_companies_selected( parent ) {

    // Add ids data to hidden
    container_hidden_id = parent.querySelectorAll( 'input[name="meta_key_hidden_id"]' )[0].value;

    container_drag = parent.querySelectorAll( '.ecode_drag' )[0];

    array_data_order = container_drag.querySelectorAll( 'p' );

    array_ids = '';

    for ( var i = 0; i < array_data_order.length; i++ ) {

        if ( i != 0 ) {

            array_ids += ',';

        }

        array_ids += array_data_order[i].getAttribute( 'data-id' );

    }

    if ( array_ids != '' ) {

        document.getElementById( container_hidden_id ).value = array_ids;

        parent.querySelectorAll( '.text_not_results' )[0].classList.add( 'text_not_results_hide' );

    } else {

        document.getElementById( container_hidden_id ).value = '';

        parent.querySelectorAll( '.text_not_results' )[0].classList.remove( 'text_not_results_hide' );

    }

}

function ajax_get_array_results( query_text, parent ) {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_get_posts_by';

	params = '';
	params += 'action=' + action;
	params += '&post_type=' + 'post';
	params += '&posts_per_page=' + '-1';
	params += '&status=' + 'publish';
	params += '&orderby=' + 'date';
	params += '&order=' + 'DESC';

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse( xhttp.responseText );

			array_data = response.data;

			set_html_list_companies( query_text, parent );

		}
	};

	xhttp.open( 'POST', window.atob( ajax_url ), true);
	xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhttp.send( params );

}

/******************************************************************************/
/*****                            Clear text                              *****/
/******************************************************************************/
function clear_text_accents( text ) {

    // Change all letter to lowercase
    text = text.toLowerCase();

    // Delete all acents
    text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, "");

    // Delete spaces at the beginning and end of string
    text = text.trim();

    // Delete double spaces of string
    text = delete_doble_spaces( text );

    return text;

}

function clear_text_accents_stop_words( text ) {

    // Change all letter to lowercase
    text = text.toLowerCase();

    // Delete all acents
    text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, "");

    // Delete spaces at the beginning and end of string
    text = text.trim();

    // Delete double spaces of string
    text = delete_doble_spaces( text );

    // Clean stop words to string
    text = delete_stop_words( text );

    return text;

}

new_text = '';

function delete_doble_spaces( text ) {

    check_double_spaces = text.indexOf('  ');

    if ( check_double_spaces != -1 ) {

        new_text = '';

        new_text = text.replace('  ', ' ');

        delete_doble_spaces( new_text );

        text = new_text;

    }

    return text;

}

function delete_stop_words( text ) {

    new_text = '';

    array_stop_words = ['a','actualmente','adelante','además','afirmó','agregó','ahí','ahora','al','algo','algún','alguna','algunas','alguno','algunos','alrededor','ambos','ampleamos','añadió','ante','anterior','antes','apenas','aproximadamente','aquel','aquellas','aquellos','aqui','aquí','arriba','aseguró','así','atras','aún','aunque','ayer','bajo','bastante','bien','buen','buena','buenas','bueno','buenos','cada','casi','cerca','cierta','ciertas','cierto','ciertos','cinco','comentó','como','cómo','con','conocer','conseguimos','conseguir','considera','consideró','consigo','consigue','consiguen','consigues','contra','cosas','creo','cual','cuales','cualquier','cuando','cuanto','cuatro','cuenta','da','dado','dan','dar','de','debe','deben','debido','decir','dejó','del','demás','dentro','desde','después','dice','dicen','dicho','dieron','diferente','diferentes','dijeron','dijo','dio','donde','dos','durante','e','ejemplo','el','él','ella','ellas','ello','ellos','embargo','empleais','emplean','emplear','empleas','empleo','en','encima','encuentra','entonces','entre','era','eramos','eran','eras','eres','es','esa','esas','ese','eso','esos','esta','está','ésta','estaba','estaban','estado','estais','estamos','estan','están','estar','estará','estas','éstas','este','éste','esto','estos','éstos','estoy','estuvo','ex','existe','existen','explicó','expresó','fin','fue','fuera','fueron','fui','fuimos','gran','grandes','gueno','ha','haber','había','habían','habrá','hace','haceis','hacemos','hacen','hacer','hacerlo','haces','hacia','haciendo','hago','han','hasta','hay','haya','he','hecho','hemos','hicieron','hizo','hoy','hubo','igual','incluso','indicó','informó','intenta','intentais','intentamos','intentan','intentar','intentas','intento','ir','junto','la','lado','largo','las','le','les','llegó','lleva','llevar','lo','los','luego','lugar','manera','manifestó','más','mayor','me','mediante','mejor','mencionó','menos','mi','mientras','mio','misma','mismas','mismo','mismos','modo','momento','mucha','muchas','mucho','muchos','muy','nada','nadie','ni','ningún','ninguna','ningunas','ninguno','ningunos','no','nos','nosotras','nosotros','nuestra','nuestras','nuestro','nuestros','nueva','nuevas','nuevo','nuevos','nunca','o','ocho','otra','otras','otro','otros','para','parece','parte','partir','pasada','pasado','pero','pesar','poca','pocas','poco','pocos','podeis','podemos','poder','podrá','podrán','podria','podría','podriais','podriamos','podrian','podrían','podrias','poner','por','por qué','porque','posible','primer','primera','primero','primeros','principalmente','propia','propias','propio','propios','próximo','próximos','pudo','pueda','puede','pueden','puedo','pues','que','qué','quedó','queremos','quien','quién','quienes','quiere','realizado','realizar','realizó','respecto','sabe','sabeis','sabemos','saben','saber','sabes','se','sea','sean','según','segunda','segundo','seis','señaló','ser','será','serán','sería','si','sí','sido','siempre','siendo','siete','sigue','siguiente','sin','sino','sobre','sois','sola','solamente','solas','solo','sólo','solos','somos','son','soy','su','sus','tal','también','tampoco','tan','tanto','tendrá','tendrán','teneis','tenemos','tener','tenga','tengo','tenía','tenido','tercera','tiempo','tiene','tienen','toda','todas','todavía','todo','todos','total','trabaja','trabajais','trabajamos','trabajan','trabajar','trabajas','trabajo','tras','trata','través','tres','tuvo','tuyo','última','últimas','ultimo','último','últimos','un','una','unas','uno','unos','usa','usais','usamos','usan','usar','usas','uso','usted','va','vais','valor','vamos','van','varias','varios','vaya','veces','ver','verdad','verdadera','verdadero','vez','vosotras','vosotros','voy','y','ya','yo']

    array_string_words = text.split(' ');

    for ( var i = 0; i < array_string_words.length; i++ ) {

        if ( array_stop_words.indexOf( array_string_words[i] ) == -1 ) {

            new_text += array_string_words[i] + ' ';

        }

    }

    new_text = new_text.trim();

    return new_text;

}
