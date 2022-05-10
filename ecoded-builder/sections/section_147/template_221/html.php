{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$slides_group = get_post_meta( $current_id, '_{{template_name}}_slides_group_{{page_section_id}}', TRUE );

$address = get_post_meta( $current_id, '_{{template_name}}_address_{{page_section_id}}', TRUE );
$custom_title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$title = !empty( $custom_title ) ? $custom_title : $title;
$countdown = get_post_meta( $current_id, '_{{template_name}}_countdown_{{page_section_id}}', TRUE );
$txt_button_1 = get_post_meta( $current_id, '_{{template_name}}_txt_button_1_{{page_section_id}}', TRUE );
$link_button_1 = get_post_meta( $current_id, '_{{template_name}}_link_button_1_{{page_section_id}}', TRUE );
$txt_button_2 = get_post_meta( $current_id, '_{{template_name}}_txt_button_2_{{page_section_id}}', TRUE );
$link_button_2 = get_post_meta( $current_id, '_{{template_name}}_link_button_2_{{page_section_id}}', TRUE );

$image_hd = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt = !empty( $image_alt ) ? $image_alt : $title;

$image_desktop = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}', TRUE );
$image_desktop_id = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}_id', TRUE );
$image_desktop_id = empty( $image_desktop_id ) ? attachment_url_to_postid( $image_desktop ) : $image_desktop_id;
$image_desktop_src = wp_get_attachment_image_src( $image_desktop_id, 'full' )[0];

$image_tablet = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = !empty( $image_tablet_src = wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] ) ? $image_tablet_src : $image_hd_src;

$image = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = !empty( $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? $image_src : $image_hd_src;

$date_time = new DateTime();

$date_time->setTimestamp( $countdown );
$countdown_formated = $date_time->format( 'Y-m-d H:i:s' );

$copy_days = __( 'Días', 'frontecode' );
$copy_hours = __( 'Horas', 'frontecode' );
$copy_minutes = __( 'Minutos', 'frontecode' );
$copy_seconds = __( 'Segundos', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_147_template_221">
		{{php}}<?php

		if( !empty( $image_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image">
			<source media="(min-width:1440px)" srcset="{{image_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{image_desktop_src}}">
			<source media="(min-width:768px)" srcset="{{image_tablet_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_curves">
			<svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1480 60"><path d="M43.5 22L0 60h87.1zM130.6 22L87.1 60h87zM217.6 22l-43.5 38h87.1zM304.7 22l-43.5 38h87zM391.8 22l-43.6 38h87.1zM478.8 22l-43.5 38h87.1zM565.9 22l-43.5 38h87zM652.9 22l-43.5 38h87.1zM740 22l-43.5 38h87zM827.1 22l-43.6 38h87.1zM914.1 22l-43.5 38h87zM1001.2 22l-43.6 38h87.1zM1088.2 22l-43.5 38h87.1zM1175.3 22l-43.5 38h87zM1262.4 22l-43.6 38h87.1zM1349.4 22l-43.5 38h87zM1436.5 22l-43.6 38h87.1z"></path></svg>
		</section>
		<div class="ecode_width_147_221">
			<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			if( !empty( $address ) ) {

			?>{{/php}}
			<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{address}}</h2>
			{{php}}<?php

			}

			if( !empty( $countdown ) ) {

			?>{{/php}}
			<div id="ecode_countdown_147_221" class="ecode_countdown ecode_countdown_147_221" data-countdown="{{countdown_formated}}">
				<div class="ecode_time">
					<p id="ecode_countdown_147_221_days" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
					<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_days}}</p>
				</div>
				<span></span>
				<div class="ecode_time">
					<p id="ecode_countdown_147_221_hours" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
					<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_hours}}</p>
				</div>
				<span></span>
				<div class="ecode_time">
					<p id="ecode_countdown_147_221_minutes" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
					<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_minutes}}</p>
				</div>
				<span></span>
				<div class="ecode_time">
					<p id="ecode_countdown_147_221_seconds" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
					<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_seconds}}</p>
				</div>
			</div>
			{{php}}<?php

			}

			if( ( !empty( $txt_button_1 ) && !empty( $link_button_1 ) ) || ( !empty( $txt_button_2 ) && !empty( $link_button_2 ) ) ) {

			?>{{/php}}
			<div class="ecode_buttons">
				{{php}}<?php

				if( !empty( $link_button_1 ) && !empty( $txt_button_1 ) ) {

				?>{{/php}}
				<a href="{{link_button_1}}" class="ecode_article_button ecode_article_button_1"{{builder}} data-edit="ecode_article_button_1"{{/builder}}>{{txt_button_1}}</a>
				{{php}}<?php

				}

				if( !empty( $link_button_2 ) && !empty( $txt_button_2 ) ) {

				?>{{/php}}
				<a href="{{link_button_2}}" class="ecode_article_button ecode_article_button_2"{{builder}} data-edit="ecode_article_button_2"{{/builder}}>{{txt_button_2}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
