<div class="wrap">
	<h1><?php echo __( 'Redes sociales', 'ecoded_builder' ); ?></h1>
	<form action="options.php" method="POST" class="form_page_default">
		<?php

		settings_fields( 'wpeb_global_settings_social_networks' );
		do_settings_sections( 'wpeb_global_settings_social_networks' );

		?>
		<div class="save_page">
			<i><?php echo get_icon_dashboard( 'icon_save' ); ?></i>
			<?php

			submit_button( '', 'submit-global-styles' );

			?>
		</div>
	</form>
</div>
