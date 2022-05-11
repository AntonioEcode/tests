<?php

/******************************************************************************/
/*                       Custom style and login WordPress                     */
/******************************************************************************/

add_action( 'login_head', 'wpeb_custom_login_wordpress' );

function wpeb_custom_login_wordpress() {

	echo '<style type="text/css">
		.login {
			background: #122532;
		}
		.login h1 {
			margin-bottom: 10px;
		}
		.login h1 a {
			background-image:url(' . WPEB_PLUGIN_THEME_FRONT . 'img/logo_ecoded_white.png) !important;
			background-size: 240px !important;
			height: 50px !important;
			width: 240px !important;
			margin: 0 auto !important;
		}
		.login form {
			background: none;
			box-shadow: none;
			margin: 0;
			padding-bottom: 0;
			border: none;
		}
		.login label {
			color: #ffffff;
			font-size: 16px;
			letter-spacing: 1px;
		}
		.login form .input, .login form input[type=checkbox], .login input[type=text] {
			background: #ffffff;
			border: 1px solid #ffffff;
			box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.5);
			font-size: 16px;
			-webkit-appearance: none;
			-moz-appearance: none;
   			appearance: none;
		}
		.forgetmenot label input {
			border: 1px solid #397AF6;
			border-bottom: 1px solid #397AF6;
		}
		.wp-core-ui .button-primary {
			position: relative;
			display: block;
			background: #397AF6;
			color: #ffffff;
			border: none;
			font-size: 16px;
			letter-spacing: 1px;
			display: block;
			padding: 5px 0px 35px;
			width: 70%;
			box-shadow: none;
			text-shadow: none;
		}
		#login form p.submit {
			text-align: center;
			padding: 0px;
			margin: 50px 55px 0 auto;
		}
		.wp-core-ui .button-primary:hover {
			background: #0b57e8;
			border-color: #0b57e8;
			box-shadow: none;
		}
		.login #backtoblog a, .login #nav a, .login h1 a, a {
			color: #ffffff;
		}
		.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover, a:hover {
			color: #0b57e8;
		}
		.forgetmenot input[type=checkbox] {
			border: none;
		}
		input[type=checkbox]:checked:before {
			color: #ffffff;
			margin: -2px 0 0 -3px;
		}
		.notice_login {
			background-color: #ffffff;
			padding: 20px 10px;
			text-align: center;
			font-size: 18px;
			line-height: 20px;
			font-weight: bold;
		}
	</style>';

}

add_action( 'login_head', 'wpeb_check_notice_first_login' );

function wpeb_check_notice_first_login() {

	if( !empty( $_GET['customiser_login'] ) &&  $_GET['customiser_login'] == 'true' ) {

		echo '<p class="notice_login">Se le ha enviado un correo electrónico con sus datos de acceso</p>';

	}

}

/******************************************************************************/
/*                     END Custom style and login WordPress                   */
/******************************************************************************/

?>
