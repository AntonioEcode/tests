<div class="wrap">
	<h1><?php esc_html_e( 'Cookies - Ecoded', 'frontecode' ); ?></h1>
	<form action="options.php" class="ecode_form_admin" method="POST">
		<?php

		settings_fields( 'wpeb_settings_cookies' );
		do_settings_sections( 'wpeb_settings_cookies' );
		submit_button();

		?>
	</form>
</div>
