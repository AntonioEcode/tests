function add_events_click_icons() {

    array_list_icons = document.getElementsByClassName( 'ecode_container_list_icons' );

    for ( var i = 0; i < array_list_icons.length; i++ ) {

        array_icons = array_list_icons[i].querySelectorAll( 'i' );

        array_textareas = array_list_icons[i].parentElement.querySelectorAll( 'pre textarea' )[0];

        for ( var j = 0; j < array_icons.length; j++ ) {

            array_icons[j].onclick = function() {

                container_parent = this.parentElement;
                current_icon = this;

                if ( container_parent.querySelectorAll( 'i.selected' ).length != 0 ) {

                    container_parent.querySelectorAll( 'i.selected' )[0].classList.remove( 'selected' );

                }

                current_icon.classList.add( 'selected' );

                container_textarea = container_parent.parentElement.querySelectorAll( 'pre textarea' )[0];

                container_textarea.value = current_icon.innerHTML;

                check_show_preview();

            }

        }

        array_textareas.onchange = function() {

            check_show_preview()

        }

        array_textareas.onkeyup = function() {

            check_show_preview()

        }

    }

}
