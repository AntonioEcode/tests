{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$slides_group = get_post_meta( $current_id, '_{{template_name}}_slides_group_{{page_section_id}}', TRUE );

$address = get_post_meta( $current_id, '_{{template_name}}_address_{{page_section_id}}', TRUE );
$custom_title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$title = !empty( $custom_title ) ? $custom_title : $title;
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );
$txt_button_1 = get_post_meta( $current_id, '_{{template_name}}_txt_button_1_{{page_section_id}}', TRUE );
$link_button_1 = get_post_meta( $current_id, '_{{template_name}}_link_button_1_{{page_section_id}}', TRUE );
$txt_button_2 = get_post_meta( $current_id, '_{{template_name}}_txt_button_2_{{page_section_id}}', TRUE );
$link_button_2 = get_post_meta( $current_id, '_{{template_name}}_link_button_2_{{page_section_id}}', TRUE );
$countdown = get_post_meta( $current_id, '_{{template_name}}_countdown_{{page_section_id}}', TRUE );

$date_time = new DateTime();

$date_time->setTimestamp( $countdown );
$countdown_formated = $date_time->format( 'Y-m-d H:i:s' );

$copy_days    = __( 'Días', 'frontecode' );
$copy_hours   = __( 'Horas', 'frontecode' );
$copy_minutes = __( 'Minutos', 'frontecode' );
$copy_seconds = __( 'Segundos', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_146_template_216">
		{{php}}<?php

		if( !empty( $slides_group ) ) {

		?>{{/php}}
		<section class="ecode_slide_146_216"{{builder}} data-edit="ecode_slide_146_216::after"{{/builder}}>
			{{slides_group_loop_start}}<?php

			foreach( $slides_group as $slide ) {

				$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

				$slide_image_hd_id  = empty( $slide['slide_image_hd_id'] ) ? attachment_url_to_postid( $slide['slide_image_hd'] ) : $slide['slide_image_hd_id'];
				$slide_image_hd_src = wp_get_attachment_image_src( $slide_image_hd_id, 'full' )[0];
				$slide_image_hd_alt = get_post_meta( $slide_image_hd_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_hd_alt = !empty( $slide_image_hd_alt ) ? $slide_image_hd_alt : $title;

				$slide_image_desktop_id  = empty( $slide['slide_image_desktop_id'] ) ? attachment_url_to_postid( $slide['slide_image_desktop'] ) : $slide['slide_image_desktop_id'];
				$slide_image_desktop_src = wp_get_attachment_image_src( $slide_image_desktop_id, 'full' )[0];

				$slide_image_tablet_id  = empty( $slide['slide_image_tablet_id'] ) ? attachment_url_to_postid( $slide['slide_image_tablet'] ) : $slide['slide_image_tablet_id'];
				$slide_image_tablet_src = wp_get_attachment_image_src( $slide_image_tablet_id, 'full' )[0];

				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];

				if( !empty( $slide_image_hd_src ) ) {

			?>{{/slides_group_loop_start}}
			<article class="ecode_slide_article">
				<picture class="ecode_article_image">
					<source media="(min-width:1440px)" srcset="{{slide_image_hd_src}}">
					<source media="(min-width:1024px)" srcset="{{slide_image_desktop_src}}">
					<source media="(min-width:768px)" srcset="{{slide_image_tablet_src}}">
					<img src="{{slide_image_src}}" alt="{{slide_image_hd_alt}}">
				</picture>
			</article>
			{{slides_group_loop_end}}<?php

				}

			}

			?>{{/slides_group_loop_end}}
		</section>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_146_216">
			{{php}}<?php

			if( !empty( $address ) ) {

			?>{{/php}}
			<p class="ecode_address"{{builder}} data-edit="ecode_address"{{/builder}}>{{address}}</p>
			{{php}}<?php

			}

			?>{{/php}}
			<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			if( !empty( $subtitle ) ) {

			?>{{/php}}
			<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h2>
			{{php}}<?php

			}

			if( ( !empty( $txt_button_1 ) && !empty( $link_button_1 ) ) || ( !empty( $txt_button_2 ) && !empty( $link_button_2 ) ) ) {

			?>{{/php}}
			<div class="ecode_buttons">
				{{php}}<?php

				if( !empty( $txt_button_1 ) && !empty( $link_button_1 ) ) {

				?>{{/php}}
				<a href="{{link_button_1}}" class="ecode_article_button ecode_article_button_1"{{builder}} data-edit="ecode_article_button_1"{{/builder}}>{{txt_button_1}}</a>
				{{php}}<?php

				}

				if( !empty( $txt_button_2 ) && !empty( $link_button_2 ) ) {

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
		{{php}}<?php

		if( !empty( $countdown ) ) {

		?>{{/php}}
		<div id="ecode_countdown_146_216" class="ecode_countdown ecode_countdown_146_216" data-countdown="{{countdown_formated}}"{{builder}} data-edit="ecode_countdown"{{/builder}}>
			<div class="ecode_time">
				<p id="ecode_countdown_146_216_days" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
				<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_days}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_146_216_hours" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
				<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_hours}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_146_216_minutes" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
				<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_minutes}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_146_216_seconds" class="ecode_countdown_time"{{builder}} data-edit="ecode_countdown_time"{{/builder}}>0</p>
				<p class="ecode_countdown_text"{{builder}} data-edit="ecode_countdown_text"{{/builder}}>{{copy_seconds}}</p>
			</div>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
