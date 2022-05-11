{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_138_template_207"{{builder}} data-edit="ecode_section_138_template_207"{{/builder}}>
		<div class="ecode_width_138_207">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<h3 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h3>
			{{php}}<?php

			}

			if( !empty( $data->elements_group ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{elements_group_loop_start}}<?php

				foreach( $data->elements_group as $element ) {

					$element_title       = $element['element_title'];
					$element_description = $element['element_description'];
					$element_svg_icon    = $element['element_svg_icon'];

				?>{{/elements_group_loop_start}}
				<article class="ecode_article">
					<i class="ecode_article_image"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						{{element_svg_icon}}
					</i>
					<h4 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{element_title}}</h4>
					<p class="ecode_article_subtitle"{{builder}} data-edit="ecode_article_subtitle"{{/builder}}>{{element_description}}</p>
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
