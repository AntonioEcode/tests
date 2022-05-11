<?php

/******************************************************************************/
/*                                  Template                                  */
/******************************************************************************/
function wpeb_get_template_by_name( $template_name, $results = NULL, $all_data = NULL ) {

    global $wpdb;

    if( $all_data ) {

        $sql = "SELECT ID as post_id, post_title
            FROM wp_posts p
            WHERE ID IN (
                SELECT pm.post_id
                FROM wp_postmeta pm
                WHERE meta_key = '_wp_page_template'
                AND meta_value = 'page-templates/$template_name.php'
            );
        ";

    } else {

        $sql = "SELECT post_id
            FROM $wpdb->postmeta
            WHERE (
                meta_key = '_wp_page_template'
                AND meta_value = 'page-templates/$template_name.php'
            );
        ";

    }

    if( $results ) { // More than one result

        $query = $wpdb->get_results( $sql );

        if( $all_data ) {

            return $query;

        } else {

            $array_ids = array();

            foreach( $query as $page ) {

                array_push( $array_ids, $page->post_id );

            }

            return $array_ids;

        }

    } else { // One result

        $query = $wpdb->get_row( $sql );

        if( $all_data ) {

            return $query;

        } else {

            return $query->post_id;

        }

    }

}
/******************************************************************************/
/*                                END Template                                */
/******************************************************************************/

/******************************************************************************/
/*                            Post ID by template                             */
/******************************************************************************/
function wpeb_get_selector_options_by_template( $template_name ) {

    $pages = wpeb_get_template_by_name( $template_name, $results = TRUE, $all_data = TRUE );

    $array_pages = array();

    foreach( $pages as $page ) {

        $array_pages[$page->post_id] = $page->post_title;

    }

    return $array_pages;

}
/******************************************************************************/
/*                          END Post ID by template                           */
/******************************************************************************/

/******************************************************************************/
/*                                  Post ID                                   */
/******************************************************************************/
function wpeb_get_id() {

    $current_id = '';

    return $current_id = ( is_home() || is_category() ) ? get_option( 'page_for_posts' ) : get_the_ID();

}
/******************************************************************************/
/*                                END Post ID                                 */
/******************************************************************************/

/*************************************************************************************/
/*   Filter to get custom format of title when call get_the_archive_title function   */
/*************************************************************************************/

add_filter( 'get_the_archive_title', 'wpeb_theme_archive_title' );

function wpeb_theme_archive_title( $title ) {

    if ( is_category() ) {
        
        $title = single_cat_title( __( 'Categoría', 'frontecode' ) . ' ', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( __( 'Etiqueta', 'frontecode' ) . ' ', false );

    } elseif ( is_author() ) {

        $title = '<span class="vcard">' . get_the_author() . '</span>';

    } elseif ( is_post_type_archive() ) {

        $title = post_type_archive_title( '', false );

    } elseif ( is_tax() ) {

        $title = single_term_title( '', false );

    }

    return $title;

}

/*************************************************************************************/
/* END Filter to get custom format of title when call get_the_archive_title function */
/*************************************************************************************/

?>
