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

	if( !empty( $data->image_hd_src ) && !empty( $data->title ) ) {

	?>{{/php}}
	<section class="ecode_section_119_template_184"{{builder}} data-edit="ecode_section_119_template_184"{{/builder}}>
		<picture>
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		<div class="ecode_width_119_184">
			<div class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				if( !empty( $data->price ) ) {

				?>{{/php}}
				<span class="ecode_price"{{builder}} data-edit="ecode_price"{{/builder}}>{{price}}</span>
				{{php}}<?php

				}

				if( !empty( $data->subtitle ) ) {

				?>{{/php}}
				<p class="ecode_desc"{{builder}} data-edit="ecode_desc"{{/builder}}>{{subtitle}}</p>
				{{php}}<?php

				}

				if( !empty( $data->button_url ) && !empty( $data->button_text ) ) {

				?>{{/php}}
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
	</section>
	<script type="text/javascript">
		array_s119_t184 = document.getElementsByClassName( 'ecode_section_119_template_184' );
		for (var i = 0; i < array_s119_t184.length; i++) {
			array_articles = array_s119_t184[i].querySelectorAll( '.ecode_info' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_info_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
