{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_7_template_9">
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->description ) ) {

		?>{{/php}}
		<div class="ecode_container_content ecode_description"{{builder}} data-edit="ecode_description"{{/builder}}>
			{{description}}
		</div>
		{{php}}<?php

		}

		if( !empty( $data->elements_group ) ) {

		?>{{/php}}
		<section>
			{{elements_group_loop_start}}<?php

			foreach( $data->elements_group as $element ) {

				$element_title       = $element['element_title'];
				$element_description = $element['element_description'];

				$element_color       = $element['element_color'];
				$element_svg_icon    = $element['element_svg_icon'];
				$element_image_id    = empty( $element['element_image_id'] ) ? attachment_url_to_postid( $element['element_image'] ) : $element['element_image_id'];
				$element_image_src   = wp_get_attachment_image_src( $element_image_id, 'full' )[0];
				$element_image_alt   = get_post_meta( $element_image_id, '_wp_attachment_image_alt', TRUE );
				$element_image_alt   = !empty( $element_image_alt ) ? $element_image_alt : $element_title;

				$element_description = apply_filters( 'the_content', $element_description );

			?>{{/elements_group_loop_start}}
			<article class="article">
				<div class="ecode_article_image_div{{builder}} ecode_article_image_edit property_background_color_hide{{/builder}}"{{builder}} data-edit="ecode_article_image_div"{{/builder}} style="background-color: {{element_color}}; border: 10px solid {{element_color}};">
					{{php}}<?php

					if( !empty( $element_svg_icon ) || !empty( $element_image_src ) ) {

						if( !empty( $element_svg_icon ) ) {

					?>
					<i class="ecode_article_image">
						{{element_svg_icon}}
					</i>
					<?php

						} else {

					?>
					<figure class="ecode_article_image">
						<img loading="lazy" src="{{element_image_src}}" alt="{{element_image_alt}}">
					</figure>
					<?php

						}

					}

					?>{{/php}}
					{{builder}}{{element_svg_icon}}{{/builder}}
				</div>
				{{php}}<?php

				if( !empty( $element_title ) ) {

				?>{{/php}}
				<h4 class="article_title"{{builder}} data-edit="article_title"{{/builder}}>{{element_title}}</h4>
				{{php}}<?php

				}

				if( !empty( $element_description ) ) {

				?>{{/php}}
				<div class="ecode_container_content ecode_article_content"{{builder}} data-edit="ecode_article_content"{{/builder}}>
					{{element_description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{elements_group_loop_end}}<?php

			}

			?>{{/elements_group_loop_end}}
		</section>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s7_t9 = document.getElementsByClassName( 'ecode_section_7_template_9' );
		for (var i = 0; i < array_s7_t9.length; i++) {
			array_articles = array_s7_t9[i].querySelectorAll( '.article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'article_hide' );
			}
		}
	</script>
</section>
