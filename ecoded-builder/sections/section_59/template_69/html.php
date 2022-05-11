{{php}}<?php

$current_id = wpeb_get_id();
$title      = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

$schedules_title = get_post_meta( $current_id, '_{{template_name}}_schedules_title_{{page_section_id}}', TRUE );
$cards_group     = get_post_meta( $current_id, '_{{template_name}}_cards_group_{{page_section_id}}', TRUE );

$form_title  = get_post_meta( $current_id, '_{{template_name}}_form_title_{{page_section_id}}', TRUE );
$description = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$description = apply_filters( 'the_content', $card_description );

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

$copy_contact_info = __( 'Información de contacto', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_59_template_69"{{builder}} data-edit="ecode_section_59_template_69"{{/builder}}>
		{{php}}<?php

		if( !empty( $image_src ) ) {

		?>{{/php}}
		<figure class="ecode_figure">
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</figure>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_contact_info">
			{{php}}<?php

			if( !empty( $schedules_title ) && !empty( $cards_group ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{schedules_title}}</h3>
			<section class="ecode_schedule">
				{{cards_group_loop_start}}<?php

				foreach( $cards_group as $card ) {

					$card_days  = $card['card_days'];
					$card_hours = $card['card_hours'];

				?>{{/cards_group_loop_start}}
				<article>
					{{php}}<?php

					if( !empty( $card_days ) ) {

					?>{{/php}}
					<p class="ecode_day"{{builder}} data-edit="ecode_day"{{/builder}}>{{card_days}}</p>
					{{php}}<?php

					}

					if( !empty( $card_hours ) ) {

					?>{{/php}}
					<p class="ecode_hours"{{builder}} data-edit="ecode_hours"{{/builder}}>{{card_hours}}</p>
					{{php}}<?php

					}

					?>{{/php}}
				</article>
				{{cards_group_loop_end}}<?php

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			if( !empty( $copy_address ) || !empty( $company_phone ) || !empty( $company_email ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{copy_contact_info}}</h3>
			{{php}}<?php

				if( !empty( $copy_address ) ) {

			?>{{/php}}
			<p class="ecode_address"{{builder}} data-edit="ecode_address"{{/builder}}>{{copy_address}}</p>
			{{php}}<?php

				}

				if( !empty( $company_phone ) ) {

			?>{{/php}}
			<p class="ecode_tel"{{builder}} data-edit="ecode_tel"{{/builder}}><a href="tel:{{company_phone_trim}}">{{company_phone}}</a></p>
			{{php}}<?php

				}

				if( !empty( $company_email ) ) {

			?>{{/php}}
			<p class="ecode_email"{{builder}} data-edit="ecode_email"{{/builder}}><a href="mailto:{{company_email}}">{{company_email}}</a></p>
			{{php}}<?php

				}

			}

			?>{{/php}}
		</section>
		<section class="ecode_container_form">
			{{php}}<?php

			if( !empty( $form_title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{form_title}}</h3>
			{{php}}<?php

			}

			if( !empty( $description ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{description}}
			</div>
			{{php}}<?php

			}

			?>
			{{contact_form}}{{/php}}
			{{builder}}<div role="form" class="wpcf7" id="wpcf7-f75-o1" lang="es-ES" dir="ltr">
				<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p><ul></ul></div>
				<form action="/grupoclickseguridad/contacto/#wpcf7-f75-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
					<div class="container_input">
						<label data-edit="wpcf7 label">Nombre</label>
						<span class="wpcf7-form-control-wrap your-name">
							<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="container_input">
						<label data-edit="wpcf7 label">Apellidos</label>
						<span class="wpcf7-form-control-wrap surname">
							<input type="text" name="surname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="container_input">
						<label data-edit="wpcf7 label">Mail</label>
						<span class="wpcf7-form-control-wrap email">
							<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="container_input">
						<label data-edit="wpcf7 label">Teléfono</label>
						<span class="wpcf7-form-control-wrap tel">
							<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="container_input container_input_full">
						<label data-edit="wpcf7 label">Subject</label>
						<span class="wpcf7-form-control-wrap your-subject">
							<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="container_input container_input_full">
						<label data-edit="wpcf7 label">Comentario</label>
						<span class="wpcf7-form-control-wrap message">
							<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea>
						</span>
					</div>
					<div class='container_legal'>
						<p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href='mailto:#'>XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de información, posibilitar la publicación de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, así como los derechos de acceso, rectificación, supresión, limitación u oposición al tratamiento, a no ser objeto de decisiones automatizadas, así como a obtener información clara y transparente sobre el tratamiento de los datos, y formular una reclamación ante la AEPD. Más información en nuestra <a rel='nofollow' target='_black' href='#'>Política de Privacidad</a>.</p>
					</div>
					<div class="container_button">
						<p class="wpcf7-form-control wpcf7-submit button" data-edit="wpcf7 .button">Enviar</p>
					</div>
					<div class="wpcf7-response-output" aria-hidden="true"></div>
				</form>
			</div>{{/builder}}
		</section>
	</section>
</section>
