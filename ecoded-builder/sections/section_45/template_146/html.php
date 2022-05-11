{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_45_template_146"{{builder}} data-edit="ecode_section_45_template_146"{{/builder}}>
		<div class="ecode_triangle"{{builder}} data-edit-bottom-center="ecode_triangle::after"{{/builder}}></div>
		<figure>
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $data->image_src ) ) {

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</figure>
		<section class="ecode_info">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{pretitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->description ) ) {

			?>{{/php}}
			<p class="ecode_desc"{{builder}} data-edit="ecode_desc"{{/builder}}>{{description}}</p>
			{{php}}<?php

			}

			if( !empty( $data->button_txt ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_txt}}</a>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
	</section>
	<script type="text/javascript">
		array_s45_t146 = document.getElementsByClassName( 'ecode_section_45_template_146' );
		for (var i = 0; i < array_s45_t146.length; i++) {
			array_articles = array_s45_t146[i].querySelectorAll( '.ecode_info' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_info_hide' );
			}
		}
	</script>
</section>
