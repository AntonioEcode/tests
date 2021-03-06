{{php}}<?php

$current_id = wpeb_get_id();

// Content section
$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

if( empty( $title ) ) {

	$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

}

$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

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
$form_text_top = get_post_meta( $current_id, '_{{template_name}}_form_text_top_{{page_section_id}}', TRUE );
$form_text_featured = get_post_meta( $current_id, '_{{template_name}}_form_text_featured_{{page_section_id}}', TRUE );
$form_text_bottom = get_post_meta( $current_id, '_{{template_name}}_form_text_bottom_{{page_section_id}}', TRUE );

$form_image     = get_post_meta( $current_id, '_{{template_name}}_form_image_{{page_section_id}}', TRUE );
$form_image_id  = get_post_meta( $current_id, '_{{template_name}}_form_image_{{page_section_id}}_id', TRUE );
$form_image_id  = empty( $form_image_id ) ? attachment_url_to_postid( $form_image ) : $form_image_id;
$form_image_src = !empty( wp_get_attachment_image_src( $form_image_id, 'full' )[0] ) ? wp_get_attachment_image_src( $form_image_id, 'full' )[0] : NULL;

$form_image_alt = !empty( get_post_meta( $form_image_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $form_image_id, '_wp_attachment_image_alt', TRUE ) : NULL;

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ning??n formulario creado', 'frontecode' );

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_152_template_243"{{builder}} data-edit="ecode_section_152_template_243::after"{{/builder}}>
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
		<div class="ecode_width_152_243">
			<section class="ecode_info">
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				if( !empty( $subtitle ) ) {

				?>{{/php}}
				<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h2>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			<section class="ecode_contact_form">
				{{php}}<?php

				if( !empty( $form_image_src ) && !empty( $form_text_top ) && !empty( $form_text_featured ) && !empty( $form_text_bottom ) ) {

				?>{{/php}}
				<div class="ecode_contact_form_info">
					<figure>
						<img src="{{form_image_src}}" alt="{{form_image_alt}}">
					</figure>
					<p class="ecode_contact_form_info_text"{{builder}} data-edit="ecode_contact_form_info_text"{{/builder}}>{{form_text_top}} <span class="ecode_contact_form_info_text_span"{{builder}} data-edit="ecode_contact_form_info_text_span"{{/builder}}>{{form_text_featured}}</span> {{form_text_bottom}}</p>
				</div>
				{{php}}<?php

				}

				?>{{/php}}
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
								<label data-edit="container_form .container_input label">Apellidos</label>
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
								<label data-edit="container_form .container_input label">Tel??fono</label>
								<span class="wpcf7-form-control-wrap tel">
									<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Tel??fono">
								</span>
							</div>
							<div class="container_legal">
								<p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href="mailto:#">XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de informaci??n, posibilitar la publicaci??n de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, as?? como los derechos de acceso, rectificaci??n, supresi??n, limitaci??n u oposici??n al tratamiento, a no ser objeto de decisiones automatizadas, as?? como a obtener informaci??n clara y transparente sobre el tratamiento de los datos, y formular una reclamaci??n ante la AEPD. M??s informaci??n en nuestra <a rel="nofollow" target="_black" href="#">Pol??tica de Privacidad</a>.</p>
							</div>
							<div class='acceptance'>
								<span class='wpcf7-form-control-wrap acceptance'>
									<span class='wpcf7-form-control wpcf7-acceptance'>
										<span class='wpcf7-list-item'>
											<label>
												<input type='checkbox' name='acceptance' value='1' aria-invalid='false'>
												<span class='wpcf7-list-item-label'>
													<p>He le??do y acepto las <a href='#'>Condiciones de los servicios y la Pol??tica de privacidad</a></p>
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
