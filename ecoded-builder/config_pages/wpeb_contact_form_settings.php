<?php

	// Generate a key
	$nonce = wp_create_nonce( 'wpeb_save_contact_form_settings' );

	// Get saved wpeb_cf_to_field from wp-options
	$wpeb_cf_to_field = get_option( 'wpeb_cf_to_field' );

	// Get saved wpeb_cf_subject_field from wp-options
	$wpeb_cf_subject_field = get_option( 'wpeb_cf_subject_field' );

	// Get saved wpeb_cf_fields from wp-options
	$wpeb_cf_fields = get_option( 'wpeb_cf_fields' );

?>
<section class="ecoded_builder_form">
	<h1 class="ecoded_builder_title"><?php echo __( 'Configuración del formulario de contacto', 'ecoded_builder' ); ?></h1>
	<p class="ecoded_builder_description"><?php echo __( 'Aquí podrás personalizar el estilo del formulario que aparece en los bloques de formulario.', 'ecoded_builder' ); ?></p>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
		<input name="action" type="hidden" value="wpeb_save_contact_form_settings">
		<input name="nonce" type="hidden" value="<?php echo $nonce; ?>">
		<h2 class="title_section"><?php echo __( 'Datos del envío del correo', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<div class="container_input">
				<label for="wpeb_cf_to_field"><?php echo __( 'Email al que llegará el correo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_to_field" id="wpeb_cf_to_field" type="email" value="<?php echo !empty( $wpeb_cf_to_field ) ? $wpeb_cf_to_field : ''; ?>">
			</div>
			<div class="container_input">
				<label for="wpeb_cf_subject_field"><?php echo __( 'Asunto del correo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_subject_field" id="wpeb_cf_subject_field" type="text" value="<?php echo !empty( $wpeb_cf_subject_field ) ? $wpeb_cf_subject_field : ''; ?>">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campos de tipo texto', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<h3><?php echo __( 'Primer campo tipo texto', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_0"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[0][text_field_name]" id="text_field_name_0" type="text" value="<?php echo !empty( $wpeb_cf_fields[0]->text_field_name ) ? $wpeb_cf_fields[0]->text_field_name : ''; ?>">
			</div>
			<div class="container_input container_input_checkbox">
				<input name="wpeb_cf_fields[0][hide_field_form]" id="hide_field_form_0" type="checkbox" <?php echo isset( $wpeb_cf_fields[0]->hide_field_form ) && $wpeb_cf_fields[0]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_0"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input container_input_checkbox  container_input_checkbox">
				<input name="wpeb_cf_fields[0][required_field_form]" id="required_field_form_0" type="checkbox" <?php echo isset( $wpeb_cf_fields[0]->required_field_form ) && $wpeb_cf_fields[0]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_0"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[0][full_width_field_form]" id="full_width_field_form_0" type="checkbox" <?php echo isset( $wpeb_cf_fields[0]->full_width_field_form ) && $wpeb_cf_fields[0]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_0"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[0][field_type]" id="field_type_0" type="hidden" value="text">
			</div>
		</section>
		<section class="container_section">
			<h3><?php echo __( 'Segundo campo tipo texto', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_1"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[1][text_field_name]" id="text_field_name_1" type="text" value="<?php echo !empty( $wpeb_cf_fields[1]->text_field_name ) ? $wpeb_cf_fields[1]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[1][hide_field_form]" id="hide_field_form_1" type="checkbox" <?php echo isset( $wpeb_cf_fields[1]->hide_field_form ) && $wpeb_cf_fields[1]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_1"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[1][required_field_form]" id="required_field_form_1" type="checkbox" <?php echo isset( $wpeb_cf_fields[1]->required_field_form ) && $wpeb_cf_fields[1]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_1"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[1][full_width_field_form]" id="full_width_field_form_1" type="checkbox" <?php echo isset( $wpeb_cf_fields[1]->full_width_field_form ) && $wpeb_cf_fields[1]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_1"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[1][field_type]" id="field_type_1" type="hidden" value="text">
			</div>
		</section>
		<section class="container_section">
			<h3><?php echo __( 'Tercer campo tipo texto', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_2"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[2][text_field_name]" id="text_field_name_2" type="text" value="<?php echo !empty( $wpeb_cf_fields[2]->text_field_name ) ? $wpeb_cf_fields[2]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[2][hide_field_form]" id="hide_field_form_2" type="checkbox" <?php echo isset( $wpeb_cf_fields[2]->hide_field_form ) && $wpeb_cf_fields[2]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_2"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[2][required_field_form]" id="required_field_form_2" type="checkbox" <?php echo isset( $wpeb_cf_fields[2]->required_field_form ) && $wpeb_cf_fields[2]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_2"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[2][full_width_field_form]" id="full_width_field_form_2" type="checkbox" <?php echo isset( $wpeb_cf_fields[2]->full_width_field_form ) && $wpeb_cf_fields[2]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_2"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[2][field_type]" id="field_type_2" type="hidden" value="text">
			</div>
		</section>
		<section class="container_section">
			<h3><?php echo __( 'Cuarto campo tipo texto', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_3"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[3][text_field_name]" id="text_field_name_3" type="text" value="<?php echo !empty( $wpeb_cf_fields[3]->text_field_name ) ? $wpeb_cf_fields[3]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[3][hide_field_form]" id="hide_field_form_3" type="checkbox" <?php echo isset( $wpeb_cf_fields[3]->hide_field_form ) && $wpeb_cf_fields[3]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_3"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[3][required_field_form]" id="required_field_form_3" type="checkbox" <?php echo isset( $wpeb_cf_fields[3]->required_field_form ) && $wpeb_cf_fields[3]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_3"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[3][full_width_field_form]" id="full_width_field_form_3" type="checkbox" <?php echo isset( $wpeb_cf_fields[3]->full_width_field_form ) && $wpeb_cf_fields[3]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_3"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[3][field_type]" id="field_type_3" type="hidden" value="text">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campo de tipo teléfono', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<div class="container_input">
				<label for="text_field_name_4"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[4][text_field_name]" id="text_field_name_4" type="text" value="<?php echo !empty( $wpeb_cf_fields[4]->text_field_name ) ? $wpeb_cf_fields[4]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[4][hide_field_form]" id="hide_field_form_4" type="checkbox" <?php echo isset( $wpeb_cf_fields[4]->hide_field_form ) && $wpeb_cf_fields[4]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_4"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[4][required_field_form]" id="required_field_form_4" type="checkbox" <?php echo isset( $wpeb_cf_fields[4]->required_field_form ) && $wpeb_cf_fields[4]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_4"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[4][full_width_field_form]" id="full_width_field_form_4" type="checkbox" <?php echo isset( $wpeb_cf_fields[4]->full_width_field_form ) && $wpeb_cf_fields[4]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_4"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[4][field_type]" id="field_type_4" type="hidden" value="tel">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campo de tipo correo electrónico', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<div class="container_input">
				<label for="text_field_name_5"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[5][text_field_name]" id="text_field_name_5" type="text" value="<?php echo !empty( $wpeb_cf_fields[5]->text_field_name ) ? $wpeb_cf_fields[5]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[5][hide_field_form]" id="hide_field_form_5" type="checkbox" <?php echo isset( $wpeb_cf_fields[5]->hide_field_form ) && $wpeb_cf_fields[5]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_5"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[5][required_field_form]" id="required_field_form_5" type="checkbox" <?php echo isset( $wpeb_cf_fields[5]->required_field_form ) && $wpeb_cf_fields[5]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_5"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[5][full_width_field_form]" id="full_width_field_form_5" type="checkbox" <?php echo isset( $wpeb_cf_fields[5]->full_width_field_form ) && $wpeb_cf_fields[5]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_5"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[5][field_type]" id="field_type_5" type="hidden" value="email">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campos de tipo fecha', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<h3><?php echo __( 'Primer campo tipo fecha', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_6"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[6][text_field_name]" id="text_field_name_6" type="text" value="<?php echo !empty( $wpeb_cf_fields[6]->text_field_name ) ? $wpeb_cf_fields[6]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[6][hide_field_form]" id="hide_field_form_6" type="checkbox" <?php echo isset( $wpeb_cf_fields[6]->hide_field_form ) && $wpeb_cf_fields[6]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_6"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
			<input name="wpeb_cf_fields[6][required_field_form]" id="required_field_form_6" type="checkbox" <?php echo isset( $wpeb_cf_fields[6]->required_field_form ) && $wpeb_cf_fields[6]->required_field_form == 'on' ? 'checked' : ''; ?>>
			<label for="required_field_form_6"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[6][full_width_field_form]" id="full_width_field_form_6" type="checkbox" <?php echo isset( $wpeb_cf_fields[6]->full_width_field_form ) && $wpeb_cf_fields[6]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_6"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[6][field_type]" id="field_type_6" type="hidden" value="date">
			</div>
		</section>
		<section class="container_section">
			<h3><?php echo __( 'Segundo campo tipo fecha', 'ecoded_builder' ); ?></h3>
			<div class="container_input">
				<label for="text_field_name_7"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[7][text_field_name]" id="text_field_name_7" type="text" value="<?php echo !empty( $wpeb_cf_fields[7]->text_field_name ) ? $wpeb_cf_fields[7]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[7][hide_field_form]" id="hide_field_form_7" type="checkbox" <?php echo isset( $wpeb_cf_fields[7]->hide_field_form ) && $wpeb_cf_fields[7]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_7"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[7][required_field_form]" id="required_field_form_7" type="checkbox" <?php echo isset( $wpeb_cf_fields[7]->required_field_form ) && $wpeb_cf_fields[7]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_7"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[7][full_width_field_form]" id="full_width_field_form_7" type="checkbox" <?php echo isset( $wpeb_cf_fields[7]->full_width_field_form ) && $wpeb_cf_fields[7]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_7"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[7][field_type]" id="field_type_7" type="hidden" value="date">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campo tipo selector', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<div class="container_input">
				<label for="text_field_name_8"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[8][text_field_name]" id="text_field_name_8" type="text" value="<?php echo !empty( $wpeb_cf_fields[8]->text_field_name ) ? $wpeb_cf_fields[8]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[8][hide_field_form]" id="hide_field_form_8" type="checkbox" <?php echo isset( $wpeb_cf_fields[8]->hide_field_form ) && $wpeb_cf_fields[8]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_8"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[8][required_field_form]" id="required_field_form_8" type="checkbox" <?php echo isset( $wpeb_cf_fields[8]->required_field_form ) && $wpeb_cf_fields[8]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_8"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[8][full_width_field_form]" id="full_width_field_form_8" type="checkbox" <?php echo isset( $wpeb_cf_fields[8]->full_width_field_form ) && $wpeb_cf_fields[8]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_8"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input">
				<label for="select_options_field_form_8"><?php echo __( 'Opciones del selector ( Una opción por línea ):', 'ecoded_builder' ); ?></label>
				<textarea name="wpeb_cf_fields[8][select_options_field_form]" id="select_options_field_form_8" cols="40" rows="10"><?php echo !empty( $wpeb_cf_fields[8]->select_options_field_form ) ? $wpeb_cf_fields[8]->select_options_field_form : ''; ?></textarea>
				<input name="wpeb_cf_fields[8][field_type]" id="field_type_8" type="hidden" value="select">
			</div>
		</section>
		<h2 class="title_section"><?php echo __( 'Campo tipo textarea', 'ecoded_builder' ); ?></h2>
		<section class="container_section">
			<div class="container_input">
				<label for="text_field_name_9"><?php echo __( 'Nombre del campo:', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[9][text_field_name]" id="text_field_name_9" type="text" value="<?php echo !empty( $wpeb_cf_fields[9]->text_field_name ) ? $wpeb_cf_fields[9]->text_field_name : ''; ?>">
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[9][hide_field_form]" id="hide_field_form_9" type="checkbox" <?php echo isset( $wpeb_cf_fields[9]->hide_field_form ) && $wpeb_cf_fields[9]->hide_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="hide_field_form_9"><?php echo __( 'Marcar para ocultar este campo en los formularios.', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[9][required_field_form]" id="required_field_form_9" type="checkbox" <?php echo isset( $wpeb_cf_fields[9]->required_field_form ) && $wpeb_cf_fields[9]->required_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="required_field_form_9"><?php echo __( 'Marcar para que este campo sea obligatorio', 'ecoded_builder' ); ?></label>
			</div>
			<div class="container_input  container_input_checkbox">
				<input name="wpeb_cf_fields[9][full_width_field_form]" id="full_width_field_form_9" type="checkbox" <?php echo isset( $wpeb_cf_fields[9]->full_width_field_form ) && $wpeb_cf_fields[9]->full_width_field_form == 'on' ? 'checked' : ''; ?>>
				<label for="full_width_field_form_9"><?php echo __( 'Marcar para que este campo ocupe el ancho del formulario.', 'ecoded_builder' ); ?></label>
				<input name="wpeb_cf_fields[9][field_type]" id="field_type_9" type="hidden" value="textarea">
			</div>
		</section>
		<div class="save_page">
			<i><?php echo get_icon_dashboard( 'icon_save' ); ?></i>
			<?php

			submit_button( '', 'submit-global-styles' );

			?>
		</div>
	</form>
</section>
