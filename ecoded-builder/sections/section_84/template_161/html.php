{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_84_template_161"{{builder}} data-edit="ecode_section_84_template_161"{{/builder}}>
		<div class="ecode_width_84_161">
			{{php}}<?php

			if( !empty( $data->image_src ) ) {

			?>{{/php}}
			<figure class="ecode_figure"{{builder}} data-edit="ecode_figure"{{/builder}}>
				<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			</figure>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_info">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->button_text ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}<i{{builder}} data-edit="ecode_button i"{{/builder}}><svg width="29px" height="50px" viewBox="0 0 29 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-230.000000, -20.000000)" fill="#333333"><g transform="translate(230.000000, 20.000000)"><path d="M27.4824115,27.4659292 L5.99048673,48.9571903 C4.62334071,50.325 2.40674779,50.325 1.04026549,48.9571903 C-0.326327434,47.5905973 -0.326327434,45.374115 1.04026549,44.0076327 L20.0573009,24.9911504 L1.04081858,5.97533186 C-0.325774336,4.60818584 -0.325774336,2.39192478 1.04081858,1.02533186 C2.4074115,-0.341814159 4.62389381,-0.341814159 5.99103982,1.02533186 L27.4829646,22.5169248 C28.1662611,23.2005531 28.5075221,24.0955752 28.5075221,24.9910398 C28.5075221,25.8869469 28.1655973,26.7826327 27.4824115,27.4659292 Z"></path></g></g></g></svg></i></a>
			{{php}}<?php

			}

			?>{{/php}}
			</div>
		</div>
	</section>
	<script type="text/javascript">
		array_s84_t161 = document.getElementsByClassName( 'ecode_section_84_template_161' );
		for (var i = 0; i < array_s84_t161.length; i++) {
			array_articles = array_s84_t161[i].querySelectorAll( '.ecode_info, .ecode_figure' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_element_hide' );
			}
		}
	</script>
</section>
