{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

// if( !empty( $data->image_hd_src ) && !empty( $data->title ) && !empty( $data->url ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_140_template_209"{{builder}} data-edit="ecode_section_140_template_209::after"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->image_src ) ) {

		?>{{/php}}
		<picture class="ecode_image">
			<source media="(min-width:1440px)" srcset="{{image_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{image_tablet_src}}">
			<source media="(min-width:768px)" srcset="{{image_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_140_209">
			<div class="ecode_info">
				{{php}}<?php

				if( !empty( $data->title ) ) {

				?>{{/php}}
				<h2 class="ecode_info_title"{{builder}} data-edit="ecode_info_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				}

				if( !empty( $data->subtitle ) ) {

				?>{{/php}}
				<p class="ecode_info_subtitle"{{builder}} data-edit="ecode_info_subtitle"{{/builder}}>{{subtitle}}</p>
				{{php}}<?php

				}

				if( !empty( $data->logo_src ) ) {

				?>{{/php}}
				<figure class="ecode_info_logo">
					<img src="{{logo_src}}" alt="{{logo_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			if( !empty( $data->svg_icon ) || !empty( $data->address ) || !empty( $data->phone ) || !empty( $data->additional_info ) || ( !empty( $data->button_text ) && !empty( $data->button_url ) ) ) {

			?>{{/php}}
			<div class="ecode_location">
				<i class="ecode_location_icon"{{builder}} data-edit="ecode_location_icon"{{/builder}}>
					{{svg_icon}}
				</i>
				<p class="ecode_location_text ecode_location_address"{{builder}} data-edit="ecode_location_address"{{/builder}}>{{address}}</p>
				<p class="ecode_location_text ecode_location_tel"{{builder}} data-edit="ecode_location_tel"{{/builder}}><a href="tel:{{phone}}">{{phone}}</a></p>
				<p class="ecode_location_text ecode_location_distance"{{builder}} data-edit="ecode_location_distance"{{/builder}}>{{additional_info}}</p>
				<a href="{{button_url}}" class="ecode_location_button"{{builder}} data-edit="ecode_location_button"{{/builder}}>{{button_text}}</a>
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
