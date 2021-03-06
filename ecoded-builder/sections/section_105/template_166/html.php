{{php}}<?php

$company_address     = get_option( 'ecode_company_address' );
$company_postal_code = get_option( 'ecode_company_postal_code' );
$company_city        = get_option( 'ecode_company_city' );

$copy_address = !empty( $company_address ) ? $company_address : '';

if( !empty( $company_city ) ) {

	$copy_address = !empty( $copy_address ) ? $copy_address . ', ' . $company_city : $copy_address;

}

if( !empty( $company_postal_code ) ) {

	$copy_address = !empty( $copy_address ) ? $copy_address . ' - ' . $company_postal_code : $copy_address;

}

$company_phone      = get_option( 'ecode_company_phone' );
$company_phone_trim = str_replace( ' ', '', $company_phone );
$company_email      = get_option( 'ecode_company_email' );

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
	<section class="ecode_section_105_template_166"{{builder}} data-edit="ecode_section_105_template_166"{{/builder}}>
		<div class="ecode_width_105_166">
			<section class="ecode_contact_info">
				{{php}}<?php

				if( !empty( $company_city ) ) {

				?>{{/php}}
				<h2 class="ecode_contact_title"{{builder}} data-edit="ecode_contact_title"{{/builder}}>{{company_city}}</h2>
				{{php}}<?php

				}

				if( !empty( $copy_address ) ) {

				?>{{/php}}
				<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>{{copy_address}}</p>
				{{php}}<?php

				}

				if( !empty( $company_email ) ) {

				?>{{/php}}
				<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>Email: <a href="mailto:{{company_email}}">{{company_email}}</a></p>
				{{php}}<?php

				}

				if( !empty( $company_phone ) ) {

				?>{{/php}}
				<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>Tel: <a href="tel:{{company_phone_trim}}">{{company_phone}}</a></p>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			<section class="ecode_contact_form">
				<div class="container_form">
					{{php}}{{contact_form}}{{/php}}{{builder}}
					<div role="form" class="wpcf7" lang="es-ES" dir="ltr">
						<form action="/grupoclickseguridad/contacto/#wpcf7-f75-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
							<div class="container_input">
								<label data-edit="container_form .container_input label">Nombre</label>
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
							<div class='container_legal'><p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href='mailto:#'>XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de información, posibilitar la publicación de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, así como los derechos de acceso, rectificación, supresión, limitación u oposición al tratamiento, a no ser objeto de decisiones automatizadas, así como a obtener información clara y transparente sobre el tratamiento de los datos, y formular una reclamación ante la AEPD. Más información en nuestra <a rel='nofollow' target='_black' href='#'>Política de Privacidad</a>.</p></div>
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
								<p class="wpcf7-form-control wpcf7-submit button button_primary" data-edit="container_form .container_button .button">Get free quote</p>
							</div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
						</form>
					</div>{{/builder}}
				</div>
			</section>
		</div>
	</section>
</section>
