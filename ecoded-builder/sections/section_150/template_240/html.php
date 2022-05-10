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
	<section class="ecode_section_150_template_240"{{builder}} data-edit="ecode_section_150_template_240::after"{{/builder}}>
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
		<div class="ecode_width_150_240">
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
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}<i><svg width="45px" height="50px" viewBox="0 0 45 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-508.000000, -83.000000)" fill="#000000"><g transform="translate(508.875000, 83.000000)"><path d="M43.1476854,23.1212662 L20.4347865,0.746266234 C19.424764,-0.248701299 17.7865468,-0.248701299 16.7765243,0.746266234 L14.9471461,2.54837662 C13.9364644,3.54399351 13.9364644,5.15811688 14.9471461,6.15243506 L30.1198951,21.1 L2.689603,21.1 C1.26116854,21.1 0.102172285,22.2420455 0.102172285,23.6488636 L0.102172285,26.1974026 C0.102172285,27.6038961 1.26116854,28.7462662 2.689603,28.7462662 L30.1187416,28.7462662 L14.9473109,43.6909091 C13.9366292,44.687013 13.9366292,46.3022727 14.9473109,47.2962662 L16.7766891,49.0983766 C17.7867116,50.0944805 19.4249288,50.0944805 20.4349513,49.0983766 L43.1478502,26.7232143 C44.1580375,25.7284091 44.1580375,24.1162338 43.1476854,23.1212662 Z"></path></g></g></g></svg></i></a>
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
