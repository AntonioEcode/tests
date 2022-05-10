<?php

function textbox_callback( $args ) {

?>
    <input type="text" id="<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" value="<?php echo get_option( $args[0] ); ?>">
    <?php if( !empty( $args[1] ) ) { ?>
    <p class="description">
        <?php echo $args[1]; ?>
    </p>
    <?php } ?>
<?php

}

function textareabox_callback( $args ) {

?>
    <textarea id="<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" rows="4" cols="50"><?php echo get_option( $args[0] ); ?></textarea>
    <?php if( !empty( $args[1] ) ) { ?>
    <p class="description">
        <?php echo $args[1]; ?>
    </p>
    <?php } ?>
<?php

}

function filebox_callback( $args ) {

    $attachment_id = !empty( get_option( $args[0] ) ) ? get_option( $args[0] ) : NULL;

    // Check if contains URL or int
    if( !empty( $attachment_id ) ) {

        if( is_numeric( $attachment_id ) ) {

            $attachment_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];

        } elseif( is_string( $attachment_id ) ) {

            $attachment_url = $attachment_id;

        } else {

            $attachment_url = NULL;

        }

    }

    $text_button = __( 'Añadir imagen', 'ecoded_builder' );

    // jQuery
    wp_enqueue_script( 'jquery' );

    // This will enqueue the Media Uploader script
    wp_enqueue_media();

?>
    <div class="ecode_container_file container_file">
        <input id="<?php echo $args[0]; ?>" type="hidden" name="<?php echo $args[0]; ?>" value="<?php echo $attachment_id; ?>" />
        <?php

        if ( !empty( $attachment_url ) ) {

            $text_button = __( 'Cambiar imagen', 'ecoded_builder' );

            $array_attachment_url = explode( '/', $attachment_url );

            $attachment_weight = filesize( get_attached_file( $attachment_id ) );
            $attachment_weight_kb = size_format( $attachment_weight, 2 );

        ?>
        <figure class="<?php echo $args[1]; ?>">
            <img id="img_<?php echo $args[0]; ?>" src="<?php echo $attachment_url; ?>" alt="<?php echo end( $array_attachment_url ); ?>">
        </figure>
        <p class="name_size">
            <span id="img_filename_<?php echo $args[0]; ?>"><?php echo end( $array_attachment_url ); ?></span>
            <span id="img_size_<?php echo $args[0]; ?>"><?php echo $attachment_weight_kb; ?></span>
        </p>
        <?php

        } else {

        ?>
        <figure>
            <img id="img_<?php echo $args[0]; ?>">
        </figure>
        <p class="name_size">
            <span id="img_filename_<?php echo $args[0]; ?>"></span>
            <span id="img_size_<?php echo $args[0]; ?>"></span>
        </p>
        <?php

        }

        ?>
        <input id="upload_<?php echo $args[0]; ?>" type="button" class="ecode_button_builder ecode_button_builder_grey" value="<?php echo $text_button; ?>" />
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var mediaUploader;
                $( '#upload_<?php echo $args[0]; ?>' ).click(function(e) {
                    e.preventDefault();
                    if( mediaUploader ) {
                        mediaUploader.open();
                        return;
                    }
                    mediaUploader = wp.media.frames.file_frame = wp.media({
                      title: '<?php echo $text_button; ?>',
                      button: {
                      text: '<?php echo $text_button; ?>'
                    }, multiple: false });
                    mediaUploader.on( 'select', function() {
                        var attachment = mediaUploader.state().get( 'selection' ).first().toJSON();
                        console.log(attachment);
                        $( '#<?php echo $args[0]; ?>' ).val( attachment.id );
                        $( '#img_<?php echo $args[0]; ?>' ).attr( 'src', attachment.url );
                        $( '#img_filename_<?php echo $args[0]; ?>' ).html( attachment.filename );
                        $( '#img_size_<?php echo $args[0]; ?>' ).html( attachment.filesizeHumanReadable );
                    });
                    mediaUploader.open();
                });
            });
        </script>
    </div>
<?php

}

function radiobox_callback( $args ) {

    $development = !empty( get_option( $args[0] ) ) && get_option( $args[0] ) == 'development' ? 'checked' : '';
    $maintenance = !empty( get_option( $args[0] ) ) && get_option( $args[0] ) == 'maintenance' ? 'checked' : '';
    $production = !empty( get_option( $args[0] ) ) && get_option( $args[0] ) == 'production' ? 'checked' : '';

?>
    <div><input type="radio" name="<?php echo $args[0]; ?>" value="development" <?php echo $development; ?>><?php echo __( 'Desarrollo', 'ecoded_builder' ); ?></div>
    <div><input type="radio" name="<?php echo $args[0]; ?>" value="maintenance" <?php echo $maintenance; ?>><?php echo __( 'Mantenimiento', 'ecoded_builder' ); ?></div>
    <div><input type="radio" name="<?php echo $args[0]; ?>" value="production" <?php echo $production; ?>><?php echo __( 'Producción', 'ecoded_builder' ); ?></div>
<?php

}

function selectfontbox_callback( $args ) {

?>
    <div class="container_slim_select">
        <select id="slim_select-<?php echo $args[0]; ?>" name="<?php echo $args[0]; ?>" class="slim_select" value="<?php echo get_option( $args[0] ); ?>"></select>
    </div>
<?php

}

function colorpickerbox_callback( $args ) {

?>
    <div class="container_colorpicker">
        <div id="colorpicker-<?php echo $args[0]; ?>" class="colorpicker" data-color="<?php echo get_option( $args[0] ); ?>" style="background: <?php echo get_option( $args[0] ); ?>"></div>
        <input type="hidden" class="property" name="<?php echo $args[0]; ?>" value="<?php echo get_option( $args[0] ); ?>">
    </div>
<?php

}

function colorschangedhiddenbox_callback( $args ) {

?>
    <input id="colors-changed" type="hidden" name="<?php echo $args['id']; ?>" value="">
<?php

}

function checkbox_callback( $args ) {

    $active = !empty( get_option( $args[0] ) ) ? 'checked' : '';

?>
    <input type="checkbox" name="<?php echo $args[0]; ?>" value="enable" <?php echo $active; ?>>
<?php

}

?>
