{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_8_template_137"{{builder}} data-edit="ecode_section_8_template_137 .circles"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->background_image_hd_src ) || !empty( $data->background_image_src ) ) {

		?>{{/php}}
		<picture class="img_back"{{builder}} data-edit-center-left="img_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $data->background_image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{background_image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{background_image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $data->background_image_src ) ) {

			?>{{/php}}
			<img loading="lazy" src="{{background_image_src}}" alt="{{background_image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		{{php}}<?php

		}

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->slides_group ) ) {

		?>{{/php}}
		<section id="ecode_slider_8_137">
			{{slides_group_loop_start}}<?php

			foreach( $data->slides_group as $slide ) {

				$slide_autor     = $slide['slide_autor'];
				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];
				$slide_image_alt = get_post_meta( $slide_image_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $slide_autor;
				$slide_comment   = $slide['slide_comment'];

			?>{{/slides_group_loop_start}}
			<article class="article">
				{{php}}<?php

				if( !empty( $slide_image_src ) ) {

				?>{{/php}}
				<figure class="article_image"{{builder}} data-edit="article_image"{{/builder}}>
					<img loading="lazy" src="{{slide_image_src}}" alt="{{slide_image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $slide_comment ) ) {

				?>{{/php}}
				<p class="article_text"{{builder}} data-edit="article_text"{{/builder}}>{{slide_comment}}</p>
				{{php}}<?php

				}

				if( !empty( $slide_autor ) ) {

				?>{{/php}}
				<p class="article_author"{{builder}} data-edit="article_author"{{/builder}}>{{slide_autor}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{slides_group_loop_end}}<?php

			}

			?>{{/slides_group_loop_end}}
		</section>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
