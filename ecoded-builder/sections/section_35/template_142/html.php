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

	$copy_address = $company_city . ', ' . $company_postal_code . ' (' . $company_province . ')';

}

$company_phone      = get_option( 'ecode_company_phone' );
$company_phone_trim = str_replace( ' ', '', $company_phone );
$company_email      = get_option( 'ecode_company_email' );
$schedule_time      = get_option( 'ecode_schedule_time' );

$copy_address_title = __( 'Dirección', 'frontecode' );
$copy_contact       = __( 'Info de contacto', 'frontecode' );
$copy_opening_hours = __( 'Horario:', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_35_template_142">
		<section class="ecode_width">
			<section class="ecode_container_form">
				{{php}}<?php

				if( !empty( $title ) ) {

				?>{{/php}}
				<h3 class="ecode_title">{{title}}</h3>
				{{php}}<?php

				}

				?>{{/php}}
				{{contact_form}}
			</section>
			<section class="ecode_contact_info">
				{{php}}<?php

				if( !empty( $location_title ) ) {

				?>{{/php}}
				<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{location_title}}</h3>
				{{php}}<?php

				}

				if( !empty( $description ) ) {

				?>{{/php}}
				<div class="ecode_container_content">
					{{description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_info">
					{{php}}<?php

					if( !empty( $company_address ) || !empty( $copy_address ) ) {

					?>{{/php}}
					<h4 class="ecode_title_aux"{{builder}} data-edit="ecode_title_aux"{{/builder}}>{{copy_address_title}}</h4>
					{{php}}<?php

						if( !empty( $company_address ) ) {

					?>{{/php}}
					<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{company_address}}</p>
					{{php}}<?php

						}

						if( !empty( $copy_address ) ) {

					?>{{/php}}
					<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{copy_address}}</p>
					{{php}}<?php

						}

					}

					if( !empty( $company_email ) || !empty( $company_phone ) ) {

					?>{{/php}}
					<h4 class="ecode_title_aux"{{builder}} data-edit="ecode_title_aux"{{/builder}}>{{copy_contact}}</h4>
					{{php}}<?php

						if( !empty( $company_address ) ) {

					?>{{/php}}
					<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{company_email}}</p>
					{{php}}<?php

						}

						if( !empty( $company_address ) ) {

					?>{{/php}}
					<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{company_phone}}</p>
					{{php}}<?php

						}

					}

					if( !empty( $schedule_time ) ) {

					?>{{/php}}
					<h4 class="ecode_title_aux"{{builder}} data-edit="ecode_title_aux"{{/builder}}>{{copy_opening_hours}}</h4>
					<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{schedule_time}}</p>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</section>
		</section>
	</section>
</section>
