{{php}}<?php

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ningún formulario creado', 'frontecode' );

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_105_template_200"{{builder}} data-edit="ecode_section_105_template_200"{{/builder}}>
		<div class="ecode_width_105_200">
			{{php}}<?php

			if( !empty( $title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
			{{php}}<?php

			}

			?>{{/php}}
			<section class="ecode_contact_form">
				<div class="container_form">
					{{php}}{{contact_form}}{{/php}}{{builder}}
					<div role="form" class="wpcf7" id="wpcf7-f75-o1" lang="es-ES" dir="ltr">
						<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p><ul></ul></div>
						<form action="/grupoclickseguridad/contacto/#wpcf7-f75-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
							<div style="display: none;">
								<input type="hidden" name="_wpcf7" value="75">
								<input type="hidden" name="_wpcf7_version" value="5.3.2">
								<input type="hidden" name="_wpcf7_locale" value="es_ES">
								<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f75-o1">
								<input type="hidden" name="_wpcf7_container_post" value="0">
								<input type="hidden" name="_wpcf7_posted_data_hash" value="">
							</div>
							<div class="container_input">
								<label>Nombre</label>
								<span class="wpcf7-form-control-wrap your-name">
									<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="container_form .container_input label">Mail</label>
								<span class="wpcf7-form-control-wrap email">
									<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Mail">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="container_form .container_input label">Teléfono</label>
								<span class="wpcf7-form-control-wrap tel">
									<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Teléfono">
								</span>
							</div>
							<div class="container_input container_input_full">
								<label data-edit="container_form .container_input label">Comentario</label>
								<span class="wpcf7-form-control-wrap message">
									<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Comentario"></textarea>
								</span>
							</div>
							<div class='acceptance'>
								<span class='wpcf7-form-control-wrap acceptance'>
									<span class='wpcf7-form-control wpcf7-acceptance'>
										<span class='wpcf7-list-item'>
											<label>
												<input type='checkbox' name='acceptance' value='1' aria-invalid='false'>
												<span class='wpcf7-list-item-label'>
													<p>He leído y acepto las <a href='#'>Condiciones de los servicios y la Política de privacidad</a></p>
												</span>
											</label>
										</span>
									</span>
								</span>
							</div>
							<div class="container_button">
								<p class="wpcf7-form-control wpcf7-submit button button_primary" data-edit="container_form .container_button .button">Enviar</p>
							</div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
						</form>
					</div>{{/builder}}
				</div>
			</section>
		</div>
	</section>
</section>
