{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_26_template_31">
		{{php}}<?php

		if( !empty( $data->image_hd_src ) && !empty( $data->image_src ) ) {

		?>{{/php}}
		<figure class="ecode_image_back">
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</figure>
		{{php}}<?php

		}

		if( !empty( $data->elements_group ) ) {

		?>{{/php}}
		<section class="ecode_width">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			?>{{/php}}
			<section class="ecode_section">
				{{elements_group_loop_start}}<?php

				foreach( $data->elements_group as $element ) {

					$element_title       = $element['element_title'];
					$element_description = $element['element_description'];
					$element_svg_icon    = $element['element_svg_icon'];
					$element_image_id    = empty( $element['element_image_id'] ) ? attachment_url_to_postid( $element['element_image'] ) : $element['element_image_id'];
					$element_image_src   = wp_get_attachment_image_src( $element_image_id, 'full' )[0];
					$element_image_alt   = get_post_meta( $element_image_id, '_wp_attachment_image_alt', TRUE );
					$element_image_alt   = !empty( $element_image_alt ) ? $element_image_alt : $element_title;

					$element_description = apply_filters( 'the_content', $element_description );

				?>{{/elements_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $element_svg_icon ) || !empty( $element_image_src ) ) {

						if( !empty( $element_svg_icon ) ) {

					?>
					<i class="ecode_false_link ecode_article_image" data-link="h3">
						{{element_svg_icon}}
					</i>
					<?php

						} else {

					?>
					<figure class="ecode_false_link ecode_article_image" data-link="h3">
						<img loading="lazy" src="{{element_image_src}}" alt="{{element_image_alt}}">
					</figure>
					<?php

						}

					}

					?>{{/php}}
					{{builder}}{{element_svg_icon}}{{/builder}}
					{{php}}<?php

					if( !empty( $element_title ) ) {

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{element_title}}</h3>
					{{php}}<?php

					}

					if( !empty( $element_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content">
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
		</section>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s26_t31 = document.getElementsByClassName( 'ecode_section_26_template_31' );
		for (var i = 0; i < array_s26_t31.length; i++) {
			array_articles = array_s26_t31[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
