<?php

/******************************************************************************/
/*                        Delete WordPress Version Header                     */
/******************************************************************************/

add_filter( 'the_generator', 'kill_version' );

function kill_version() {

	return '';

}

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

remove_action( 'wp_head', 'wp_generator' );

/******************************************************************************/
/*                      END Delete WordPress Version Header                   */
/******************************************************************************/

/******************************************************************************/
/*                      Compatibility theme with WordPress                    */
/******************************************************************************/

add_action( 'after_setup_theme', 'compatibility_theme' );

function compatibility_theme() {

	add_theme_support( 'woocommerce' );

}

/******************************************************************************/
/*                    END Compatibility theme with WordPress                  */
/******************************************************************************/

/******************************************************************************/
/*                        Delete errors login WordPress                       */
/******************************************************************************/

add_filter( 'login_errors', 'no_wordpress_errors' );

function no_wordpress_errors() {

  // return 'Something is wrong!';
  return "Oops, you don't have access. Are you a thief?";

}

/******************************************************************************/
/*                      END Delete errors login WordPress                     */
/******************************************************************************/

/******************************************************************************/
/*                                Featured images                             */
/******************************************************************************/

add_theme_support( 'post-thumbnails' );

/******************************************************************************/
/*                              END Featured images                           */
/******************************************************************************/

/******************************************************************************/
/*                         Custom fields in profiles                          */
/******************************************************************************/

add_action( 'cmb2_admin_init', 'wpeb_custom_profile_fields' );

function wpeb_custom_profile_fields() {

	$prefix = '_user_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'custom_fields',
		'title'        => __( 'Campos personalizados para los perfiles', 'cmb2' ),
		'object_types' => array( 'user' )
	) );

	$cmb->add_field( array(
        'name' => __( 'Avatar personalizado', 'cmb2' ),
		'id'   => $prefix . 'profile_image_title',
		'type' => 'title'
	) );

	$cmb->add_field( array(
        'name' => __( 'Avatar personalizado', 'cmb2' ),
		'id'   => $prefix . 'profile_image',
		'type' => 'file'
	) );

}

/******************************************************************************/
/*                       END Custom fields in profiles                        */
/******************************************************************************/

/******************************************************************************/
/*                          Edit post show excerpt                            */
/******************************************************************************/

add_action( 'wp_login', 'wpeb_edit_post_show_excerpt', 10, 2 );

function wpeb_edit_post_show_excerpt( $user_login, $user ) {

    $unchecked = get_user_meta( $user->ID, 'metaboxhidden_post', true );

    $key = array_search( 'postexcerpt', $unchecked );

    if( FALSE !== $key ) {

        array_splice( $unchecked, $key, 1 );

        update_user_meta( $user->ID, 'metaboxhidden_post', $unchecked );

    }

}

/******************************************************************************/
/*                        END Edit post show excerpt                          */
/******************************************************************************/

?>
