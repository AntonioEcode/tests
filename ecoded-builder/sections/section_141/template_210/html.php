{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_141_template_210"{{builder}} data-edit="ecode_section_141_template_210"{{/builder}}>
		<div class="ecode_width_141_210">
			{{php}}<?php

			if( !empty( $data->title ) || !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_titles">
				{{php}}<?php

				if( !empty( $data->title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				}

				if( !empty( $data->title ) || !empty( $data->subtitle ) ) {

				?>{{/php}}
				<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->elements_group ) ) {

			?>{{/php}}
			<section class="ecode_articles ecode_articles_141_210">
				{{elements_group_loop_start}}<?php

				foreach( $data->elements_group as $element ) {

					$element_title        = $element['element_title'];
					$element_svg_icon     = $element['element_svg_icon'];
					$element_image_id     = empty( $element['element_image_id'] ) ? attachment_url_to_postid( $element['element_image'] ) : $element['element_image_id'];
					$element_image_src    = wp_get_attachment_image_src( $element_image_id, 'full' )[0];
					$element_image_alt    = get_post_meta( $element_image_id, '_wp_attachment_image_alt', TRUE );
					$element_image_alt    = !empty( $element_image_alt ) ? $element_image_alt : $element_title;
					$element_description  = $element['element_description'];
					$element_button_text  = $element['element_button_text'];
					$element_button_url   = $element['element_button_url'];
					$element_external_url = $element['element_external_url'];
					$external_url_tags    = '';

					if( $element_external_url ) {

						$external_url_tags = " target='_blank' rel='nofollow noreferrer noopener'";

					}

				?>{{/elements_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $element_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_article_image ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						<img src="{{element_image_src}}" alt="{{element_image_alt}}">
					</figure>
					{{php}}<?php

					}

					if( !empty( $element_title ) && !empty( $element_button_url ) ) {

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
						<a href="{{element_button_url}}"{{php}}<?php echo $external_url_tags; ?>{{/php}}>{{element_title}}</a>
					</h3>
					{{php}}<?php

					}

					if( !empty( $element_description ) ) {

					?>{{/php}}
					<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>
						{{element_description}}
					</p>
					{{php}}<?php

					}

					if( !empty( $element_button_text ) && !empty( $element_button_url ) ) {

					?>{{/php}}
					<span class="ecode_article_link ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_link"{{/builder}}>
						{{element_button_text}}
					</span>
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
		</div>
	</section>
</section>
