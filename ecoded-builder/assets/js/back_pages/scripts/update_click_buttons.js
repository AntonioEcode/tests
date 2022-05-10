function update_click_buttons() {

    setTimeout(function(){

        if ( document.getElementsByClassName( 'ecode_container_list_icons' ).length != 0 && document.getElementsByClassName( 'ecode_container_preview' ).length != 0 ) {

            check_show_preview();

            add_events_click_icons();

        }

    }, 300);

}
