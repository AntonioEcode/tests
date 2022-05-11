{{php}}<?php

$current_id = wpeb_get_id();

// Content section
$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

if( empty( $title ) ) {

	$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

}

$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$button_text = get_post_meta( $current_id, '_{{template_name}}_button_text_{{page_section_id}}', TRUE );
$button_url  = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

$image_desktop_hd     = get_post_meta( $current_id, '_{{template_name}}_image_desktop_hd_{{page_section_id}}', TRUE );
$image_desktop_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_desktop_hd_{{page_section_id}}_id', TRUE );
$image_desktop_hd_id  = empty( $image_desktop_hd_id ) ? attachment_url_to_postid( $image_desktop_hd ) : $image_desktop_hd_id;
$image_desktop_hd_src = !empty( wp_get_attachment_image_src( $image_desktop_hd_id, 'full' )[0] ) ? wp_get_attachment_image_src( $image_desktop_hd_id, 'full' )[0] : NULL;

$image_desktop     = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}', TRUE );
$image_desktop_id  = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}_id', TRUE );
$image_desktop_id  = empty( $image_desktop_id ) ? attachment_url_to_postid( $image_desktop ) : $image_desktop_id;
$image_desktop_src = !empty( wp_get_attachment_image_src( $image_desktop_id, 'full' )[0] ) ? wp_get_attachment_image_src( $image_desktop_id, 'full' )[0] : $image_desktop_hd_src;

$image_tablet     = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id  = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id  = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = !empty( wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] ) ? wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] : $image_desktop_hd_src;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = !empty( wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? wp_get_attachment_image_src( $image_id, 'full' )[0] : $image_desktop_hd_src;

$image_alt = !empty( get_post_meta( $image_desktop_hd_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $image_desktop_hd_id, '_wp_attachment_image_alt', TRUE ) : $title;

// Content form
$form_title = get_post_meta( $current_id, '_{{template_name}}_form_title_{{page_section_id}}', TRUE );

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
	<section class="ecode_section_151_template_241"{{builder}} data-edit="ecode_section_151_template_241::after"{{/builder}}>
		{{php}}<?php

		if( !empty( $image_desktop_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image">
			<source media="(min-width:1440px)" srcset="{{image_desktop_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{image_desktop_src}}">
			<source media="(min-width:768px)" srcset="{{image_tablet_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_curves">
			<svg width="500" height="89" viewBox="0 0 500 89" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M0 90.9571H500V20.7398C486.3 9.99224 470.65 1.95708 452.6 1.95708C397.5 1.95708 355.85 48.8366 311.1 48.8366C266.35 48.8366 213.7 3.339 171.8 3.339C129.9 3.339 102.35 44.3844 55.35 44.3844C24.5503 44.3844 18.3501 28.519 0 17.5666V90.9571Z" fill="white"/><path fill-rule="evenodd" clip-rule="evenodd" d="M499.49 88.3234V51.3093C480.129 59.0517 460.119 64.6463 442.155 63.8971C388.362 61.699 348.692 10.3493 283.522 7.20245C230.328 4.70489 115.807 65.7951 74.2394 88.3234H499.49Z" fill="white" fill-opacity="0.3"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 89H500V44.0039C471.9 28.8884 442.9 7.96711 402.4 7.3664C337.05 6.36538 324.8 50.3101 235.4 50.3101C146 50.3101 98.7002 -0.791819 36.25 0.00929108C22.7002 0.159346 10.6499 2.06119 0 4.814V89Z" fill="white" fill-opacity="0.24"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 88.8224H500V39.2707C481.85 48.8112 460.6 56.5039 431.85 56.9537C358.05 58.1024 362.7 43.0171 286.1 42.7176C209.5 42.418 218.3 65.6454 136.95 64.0468C64.8501 62.6478 44.5498 21.738 0 13.7458V88.8224Z" fill="white" fill-opacity="0.18"/><path fill-rule="evenodd" clip-rule="evenodd" d="M0 89.3737H500V51.2641C476.05 61.1573 441.15 72.1615 405.65 72.0096C342.7 71.7573 327.6 36.3737 280.75 36.3737C237.25 36.3737 215 75.8964 161.1 76.8049C107.2 77.7134 82.5503 48.5885 24.3999 47.6298C16 47.4784 7.8501 48.5382 0 50.4562V89.3737Z" fill="white" fill-opacity="0.12"/></g></svg>
		</section>
		<div class="ecode_width_151_241">
			<section class="ecode_info">
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				if( !empty( $subtitle ) ) {

				?>{{/php}}
				<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h2>
				{{php}}<?php

				}

				if( !empty( $button_url ) && !empty( $button_text ) ) {

				?>{{/php}}
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			<section class="ecode_contact_form">
				<div class="ecode_contact_form_info">
					{{php}}<?php

					if( !empty( $form_title ) ) {

					?>{{/php}}
					<h3 class="ecode_contact_form_title"{{builder}} data-edit="ecode_contact_form_title"{{/builder}}>{{form_title}}</h3>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
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
							<div class="container_legal">
								<p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href="mailto:#">XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de información, posibilitar la publicación de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, así como los derechos de acceso, rectificación, supresión, limitación u oposición al tratamiento, a no ser objeto de decisiones automatizadas, así como a obtener información clara y transparente sobre el tratamiento de los datos, y formular una reclamación ante la AEPD. Más información en nuestra <a rel="nofollow" target="_black" href="#">Política de Privacidad</a>.</p>
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
								<p class="wpcf7-form-control wpcf7-submit button button_primary" data-edit="container_form .container_button .button">Contactar</p>
							</div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
						</form>
					</div>{{/builder}}
				</div>
			</section>
		</div>
	</section>
</section>
