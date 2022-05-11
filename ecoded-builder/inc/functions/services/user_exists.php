<?php

// Check if user exists in DB by user id
function wpeb_user_exists( $user_id ) {

	return (bool) get_users( [ 'include' => $user_id, 'fields' => 'ID' ] );

}

?>