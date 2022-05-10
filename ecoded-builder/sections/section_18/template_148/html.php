{{php}}<?php

$current_id = wpeb_get_id();

$title          = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$location_title = get_post_meta( $current_id, '_{{template_name}}_location_title_{{page_section_id}}', TRUE );
$description    = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$description = apply_filters( 'the_content', $description );

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ningún formulario creado', 'frontecode' );

}

$company_address     = get_option( 'ecode_company_address' );
$company_postal_code = get_option( 'ecode_company_postal_code' );
$company_city        = get_option( 'ecode_company_city' );
$company_province    = get_option( 'ecode_company_province' );
$copy_address        = '';

if( !empty( $company_address ) && !empty( $company_postal_code ) && !empty( $company_city ) && !empty( $company_province ) ) {

	$copy_address = $company_address . ', ' . $company_city . ', ' . $company_postal_code . ' (' . $company_province . ')';

}

$company_phone      = get_option( 'ecode_company_phone' );
$company_phone_trim = str_replace( ' ', '', $company_phone );
$company_email      = get_option( 'ecode_company_email' );
$schedule_time      = get_option( 'ecode_schedule_time' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_18_template_148">
		<section class="ecode_location_form">
			<section class="ecode_location"{{builder}} data-edit="ecode_location"{{/builder}}>
				{{php}}<?php

				if( !empty( $location_title ) ) {

				?>{{/php}}
				<p class="ecode_location_title"{{builder}} data-edit="ecode_location_title"{{/builder}}>{{location_title}}</p>
				{{php}}<?php

				}

				if( !empty( $copy_address ) ) {

				?>{{/php}}
				<p class="ecode_contact_info"{{builder}} data-edit="ecode_contact_info"{{/builder}}>
					<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#747474" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg></i>
					{{copy_address}}
				</p>
				{{php}}<?php

				}

				if( !empty( $company_phone ) ) {

				?>{{/php}}
				<p class="ecode_contact_info"{{builder}} data-edit="ecode_contact_info"{{/builder}}>
					<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#747474" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg></i>
					<a href="tel:{{company_phone_trim}}">{{company_phone}}</a>
				</p>
				{{php}}<?php

				}

				if( !empty( $company_email ) ) {

				?>{{/php}}
				<p class="ecode_contact_info"{{builder}} data-edit="ecode_contact_info"{{/builder}}>
					<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#747474" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg></i>
					<a href="mailto:{{company_email}}">{{company_email}}</a>
				</p>
				{{php}}<?php

				}

				if( !empty( $schedule_time ) ) {

				?>{{/php}}
				<p class="ecode_contact_info"{{builder}} data-edit="ecode_contact_info"{{/builder}}>
					<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#747474" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg></i>
					{{schedule_time}}
				</p>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			<section class="ecode_container_form"{{builder}} data-edit="ecode_container_form"{{/builder}}>
				{{php}}<?php

				if( !empty( $title ) ) {

				?>{{/php}}
				<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
				{{php}}<?php

				}

				if( !empty( $description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
				{{contact_form}}
			</section>
		</section>
	</section>
</section>
