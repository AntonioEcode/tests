{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_10_template_15"{{builder}} data-edit="ecode_section_10_template_15"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->description ) ) {

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{description}}
		</div>
		{{php}}<?php

		}

		if( !empty( $data->slides_group ) ) {

		?>{{/php}}
		<section class="ecode_slider ecode_slider_10_15">
			{{slides_group_loop_start}}<?php

			foreach( $data->slides_group as $slide ) {

				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];
				$slide_image_alt = get_post_meta( $slide_image_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $title;

				if( !empty( $slide_image_src ) ) {

			?>{{/slides_group_loop_start}}
			<article class="ecode_article">
				<figure class="ecode_article_image">
					<img loading="lazy" src="{{slide_image_src}}" alt="{{slide_image_alt}}">
				</figure>
			</article>
			{{slides_group_loop_end}}<?php

				}

			}

			?>{{/slides_group_loop_end}}
		</section>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
