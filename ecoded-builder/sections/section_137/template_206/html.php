{{php}}<?php

$current_id = wpeb_get_id();

$title    = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image_tablet     = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id  = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id  = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = !empty( $image_tablet_src = wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] ) ? $image_tablet_src : $image_hd_src;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = !empty( $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? $image_src : $image_hd_src;

$button_1_title = get_post_meta( $current_id, '_{{template_name}}_button_1_title_{{page_section_id}}', TRUE );
$button_1_url   = get_post_meta( $current_id, '_{{template_name}}_button_1_url_{{page_section_id}}', TRUE );

$button_2_title = get_post_meta( $current_id, '_{{template_name}}_button_2_title_{{page_section_id}}', TRUE );
$button_2_url   = get_post_meta( $current_id, '_{{template_name}}_button_2_url_{{page_section_id}}', TRUE );

$countdown = get_post_meta( $current_id, '_{{template_name}}_countdown_{{page_section_id}}', TRUE );

$date_time = new DateTime();

$date_time->setTimestamp( $countdown );
$countdown_formated = $date_time->format( 'Y-m-d H:i:s' );

$copy_days    = __( 'Días', 'frontecode' );
$copy_hours   = __( 'Horas', 'frontecode' );
$copy_minutes = __( 'Minutos', 'frontecode' );
$copy_seconds = __( 'Segundos', 'frontecode' );

$scroll_color = get_post_meta( $current_id, '_{{template_name}}_scroll_color_{{page_section_id}}', TRUE );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_137_template_206"{{builder}} data-edit="ecode_section_137_template_206::after"{{/builder}}>
		{{php}}<?php

		if( !empty( $image_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image"{{builder}} data-edit="ecode_image::after"{{/builder}}>
			<source media="(min-width:1440px)" srcset="{{image_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{image_tablet_src}}">
			<source media="(min-width:768px)" srcset="{{image_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_137_206">
			<div class="ecode_info">
				{{php}}<?php

				if( !empty( $title ) ) {

				?>{{/php}}
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				}

				if( !empty( $subtitle ) ) {

				?>{{/php}}
				<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h2>
				{{php}}<?php

				}

				if( ( !empty( $button_1_title ) && !empty( $button_1_url ) ) || ( !empty( $button_2_title ) && !empty( $button_2_url ) ) ) {

				?>{{/php}}
				<div class="ecode_buttons">
					{{php}}<?php

					if( !empty( $button_1_title ) && !empty( $button_1_url ) ) {

					?>{{/php}}
					<a href="{{button_1_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_1_title}}</a>
					{{php}}<?php

					}

					if( !empty( $button_2_title ) && !empty( $button_2_url ) ) {

					?>{{/php}}
					<a href="{{button_2_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_2_title}}</a>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
		{{php}}<?php

		if( !empty( $countdown ) ) {

		?>{{/php}}
		<div id="ecode_countdown_137_206" class="ecode_countdown ecode_countdown_137_206" data-countdown="{{countdown_formated}}">
			<div class="ecode_time">
				<p id="ecode_countdown_137_206_days">0</p>
				<p>{{copy_days}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_137_206_hours">0</p>
				<p>{{copy_hours}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_137_206_minutes">0</p>
				<p>{{copy_minutes}}</p>
			</div>
			<span></span>
			<div class="ecode_time">
				<p id="ecode_countdown_137_206_seconds">0</p>
				<p>{{copy_seconds}}</p>
			</div>
		</div>
		{{php}}<?php

		} else {

		?>{{/php}}
		<div class="ecode_scroll{{php}}<?php echo ' ecode_scroll_show'; ?>{{/php}}">
			<i><svg fill="none" height="29" viewBox="0 0 17 29" width="17" xmlns="http://www.w3.org/2000/svg"><rect height="27" rx="7.5" stroke="{{scroll_color}}" stroke-width="2" width="15" x="1" y="1"/><rect id="ecode_scroll_wheel" fill="{{scroll_color}}" height="7" rx="1.5" width="3" x="7" y="5"/></svg></i>
			<p style="color:{{scroll_color}};"><?php echo __( 'Haz scroll para ver más', 'frontecode' ); ?></p>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
