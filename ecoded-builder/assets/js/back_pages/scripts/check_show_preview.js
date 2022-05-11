function check_show_preview() {

    array_container_preview = document.getElementsByClassName( 'ecode_container_preview' );

    for ( var i = 0; i < array_container_preview.length; i++ ) {

        current_preview = array_container_preview[i];

        container_parent = current_preview.parentElement;

        container_parent.classList.add( 'ecode_fields_icons' );

        container_textarea = current_preview.parentElement.querySelectorAll( 'pre textarea' )[0];

        if ( container_textarea.value != '' ) {

            container_textarea_value = container_textarea.value;

            if ( !check_value_with_default_icons( container_textarea_value, container_parent ) ) {

                // check_color = check_dark_color( '#ffffff' );

                if ( container_textarea_value.indexOf( '#ffffff' ) != -1 ) {

                    current_preview.classList.add( 'ecode_container_preview_dark' );

                } else {

                    current_preview.classList.remove( 'ecode_container_preview_dark' );

                }

                current_preview.innerHTML = '<i>' + container_textarea_value + '</i>';

            } else {

                current_preview.innerHTML = '';

            }

        } else {

            current_preview.innerHTML = '';

        }

    }

}

function check_value_with_default_icons( value, parent ) {

    check_icons = false;

    if ( parent.querySelectorAll( 'i.selected' ).length != 0 ) {

        parent.querySelectorAll( 'i.selected' )[0].classList.remove( 'selected' );

    }

    array_list_icons = parent.querySelectorAll( '.ecode_container_list_icons i' );

    for ( var i = 0; i < array_list_icons.length; i++ ) {

        if ( array_list_icons[i].innerHTML == value ) {

            array_list_icons[i].classList.add( 'selected' );

            check_icons = true;

            break;

        }

    }

    return check_icons;

}

// function check_dark_color( c ) {
//
//     var c = c.substring(1);      // strip #
//     var rgb = parseInt(c, 16);   // convert rrggbb to decimal
//     var r = (rgb >> 16) & 0xff;  // extract red
//     var g = (rgb >>  8) & 0xff;  // extract green
//     var b = (rgb >>  0) & 0xff;  // extract blue
//
//     var luma = 0.2126 * r + 0.7152 * g + 0.0722 * b; // per ITU-R BT.709
//
//     // if (luma < 40) {
//     //     // pick a different colour
//     // }
//
//     return luma;
//
// }
