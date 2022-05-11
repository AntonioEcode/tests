{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->description ) || !empty( $data->title ) || !empty( $data->subtitle ) ) {

	?>{{/php}}
	<section class="ecode_section_113_template_178"{{builder}} data-edit="ecode_section_113_template_178"{{/builder}}>
		<div class="ecode_width_113_178">
			{{php}}<?php

			if( !empty( $data->image_src ) ) {

			?>{{/php}}
			<div class="ecode_image_link">
				<figure class="ecode_figure" data-link="h3"{{builder}} data-edit="ecode_figure::after"{{/builder}}>
					<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
				</figure>
				{{php}}<?php

				if( !empty( $data->img_text ) && !empty( $data->img_url ) ) {

				?>{{/php}}
				<h3 class="ecode_link"{{builder}} data-edit="ecode_link"{{/builder}}><a href="{{img_url}}">{{img_text}}</a></h3>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_info">
				{{php}}<?php

				if( !empty( $data->description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{description}}
				</div>
				{{php}}<?php

				}

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

				if( !empty( $data->signature_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_figure_signature"{{builder}} data-edit="ecode_figure_signature"{{/builder}}>
					<img loading="lazy" src="{{signature_image_src}}" alt="{{signature_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
	</section>
	<script type="text/javascript">
		array_s113_t178 = document.getElementsByClassName( 'ecode_section_113_template_178' );
		for (var i = 0; i < array_s113_t178.length; i++) {
			array_articles = array_s113_t178[i].querySelectorAll( '.ecode_info, .ecode_figure' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_element_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
