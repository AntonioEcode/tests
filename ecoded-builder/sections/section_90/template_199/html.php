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
	<section class="ecode_section_90_template_199"{{builder}} data-edit="ecode_section_90_template_199"{{/builder}}>
		<div class="ecode_width_90_199">
			{{php}}<?php

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<h3 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h3>
			{{php}}<?php

			}

			if( !empty( $data->gallery ) ) {

			?>{{/php}}
			<section class="ecode_gallery_90_199">
				{{gallery_start}}<?php

				foreach( $data->gallery as $image_id => $image_src ) {

					$slide_medium_image_src = wp_get_attachment_image_src( $image_id, 'medium' )[0];
					$slide_full_image_src   = wp_get_attachment_image_src( $image_id, 'full' )[0];
					$slide_image_alt        = get_post_meta( $image_id, '_wp_attachment_image_alt', TRUE );
					$slide_image_alt        = !empty( $slide_image_alt ) ? $slide_image_alt : $page_title;
					$slide_image_caption    = !empty( wp_get_attachment_caption( $image_id ) ) ? wp_get_attachment_caption( $image_id ) : '';

				?>{{/gallery_start}}
				<article class="ecode_article" data-src="{{slide_full_image_src}}" data-sub-html="{{slide_image_caption}}">
					<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" loading=lazy src="{{php}}{{slide_medium_image_src}}{{/php}}{{builder}}{{slide_full_image_src}}{{/builder}}" alt="{{slide_image_alt}}">
					</figure>
				</article>
				{{gallery_end}}<?php

				}

				?>{{/gallery_end}}
			</section>
			{{php}}<?php

			}

			if( !empty( $data->content ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{content}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
