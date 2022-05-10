<div class="ecode_page">
	<h1 class="ecoded_builder_title"><?php echo __( 'Estilos globales del tema', 'ecoded_builder' ); ?></h1>
	<p class="ecoded_builder_description"><?php echo __( 'Aquí podrás modificar los diferentes valores globales de la web (iconos, tipografías, colores, ...)', 'ecoded_builder' ); ?></p>
	<form action="options.php" method="POST" class="form_global">
		<?php

		settings_fields( 'wpeb_global_styles' );
		do_settings_sections( 'wpeb_global_styles' );

		?>
		<div class="save_page">
			<i><?php echo get_icon_dashboard( 'icon_save' ); ?></i>
			<?php

			submit_button( '', 'submit-global-styles' );

			?>
		</div>
	</form>
</div>
