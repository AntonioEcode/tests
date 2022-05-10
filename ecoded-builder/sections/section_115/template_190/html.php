{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_115_template_190">
		<div class="ecode_width_115_190"{{builder}} data-edit="ecode_width_115_190"{{/builder}}>
			<div class="ecode_titles">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<p class="ecode_desc"{{builder}} data-edit="ecode_desc"{{/builder}}>{{subtitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->button_text ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}</a>
			{{php}}<?php

			}

			?>{{/php}}
			</div>
		</div>
		{{php}}<?php

		if( !empty( $data->image_hd_src ) ) {

		?>{{/php}}
		<picture>
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s115_t190 = document.getElementsByClassName( 'ecode_section_115_template_190' );
		for (var i = 0; i < array_s115_t190.length; i++) {
			array_articles = array_s115_t190[i].querySelectorAll( '.ecode_titles' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_titles_hide' );
			}
		}
	</script>
</section>
