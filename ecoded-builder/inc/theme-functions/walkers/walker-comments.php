<?php

class walker_comments extends Walker_Comment {

    protected function comment( $comment, $depth, $args ) {

        if( 'div' == $args['style'] ) {

            $tag = 'div';
            $add_below = 'comment';

        } else {

            $tag = 'li';
            $add_below = 'div-comment';

        }

?>
<<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
    <?php

    if( $args['avatar_size'] != 0 ) {

    ?>
    <figure><?php echo get_avatar( $comment ); ?></figure>
    <?php

    }

    ?>
    <div class="name_date">
        <time><?php echo get_comment_date( '', $comment ); ?></time>
        <h4><?php echo get_comment_author_link( $comment ); ?></h4>
        <?php

        // comment_reply_link( array_merge( $args, array(
        //     'add_below' => $add_below,
        //     'depth'     => $depth,
        //     'max_depth' => $args['max_depth'],
        //     'before'    => '<div class="boton-editar-responder">',
        //     'after'     => '</div>'
        // ) ) );

        ?>
    </div>
    <?php

    edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );

    if( '0' == $comment->comment_approved ) {

    ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
    <?php

    }

    ?>
    <div class="comment_text">
        <?php

        comment_text(
            get_comment_id(),
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        );

        ?>
    </div>
<?php

    }

}

?>
