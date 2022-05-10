{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_143_template_212"{{builder}} data-edit="ecode_section_143_template_212"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->title ) || !empty( $data->subtitle ) || !empty( $data->gallery ) ) {

		?>{{/php}}
		<div class="ecode_width_143_212">
			<section class="ecode_titles">
				{{php}}<?php

				if( !empty( $data->title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				}

				if( !empty( $data->subtitle ) ) {

				?>{{/php}}
				<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			{{php}}<?php

			if( !empty( $data->gallery ) ) {

			?>{{/php}}
			<section class="ecode_articles ecode_articles_143_212">
				{{gallery_start}}<?php

				foreach( $data->gallery as $image_id => $image_src ) {

					$slide_medium_image_data = wp_get_attachment_image_src( $image_id, 'medium' );
					$slide_medium_image_src = $slide_medium_image_data[0];
					$slide_image_width = $slide_medium_image_data[1];
					$slide_image_height = $slide_medium_image_data[2];
					$slide_full_image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
					$slide_image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', TRUE );
					$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $page_title;
					$slide_image_caption = !empty( wp_get_attachment_caption( $image_id ) ) ? wp_get_attachment_caption( $image_id ) : '';

				?>{{/gallery_start}}
				<figure class="ecode_article" data-src="{{slide_full_image_src}}" data-sub-html="{{slide_image_alt}}">
					<img src="{{php}}{{slide_medium_image_src}}{{/php}}{{builder}}{{slide_full_image_src}}{{/builder}}" width="{{slide_image_width}}" height="{{slide_image_height}}" alt="{{slide_image_alt}}">
				</figure>
				{{gallery_end}}<?php

				}

				?>{{/gallery_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
