{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_25_template_30">
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
		{{php}}<?php

		}

		if( !empty( $data->elements_group ) ) {

		?>{{/php}}
		<section class="ecode_section">
			{{elements_group_loop_start}}<?php

			foreach( $data->elements_group as $element ) {

				$element_title       = $element['element_title'];
				$element_description = $element['element_description'];
				$element_url         = $element['element_url'];

				$element_description = apply_filters( 'the_content', $element_description );

				// If have specific service selected
				if( !empty( $element['service_id'] ) ) {

					$service_id    = $element['service_id'];
					$service_title = get_the_title( $service_id );
					$service_link  = get_permalink( $service_id );

					$element_title = !empty( $element_title ) ? $element_title : $service_title;
					$element_url   = !empty( $element_url ) ? $element_url : $service_link;

				}

				$element_image_id    = empty( $element['element_image_id'] ) ? attachment_url_to_postid( $element['element_image'] ) : $element['element_image_id'];
				$element_image_src   = wp_get_attachment_image_src( $element_image_id, 'full' )[0];
				$element_image_alt   = get_post_meta( $element_image_id, '_wp_attachment_image_alt', TRUE );
				$element_image_alt   = !empty( $element_image_alt ) ? $element_image_alt : $element_title;

			?>{{/elements_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $element_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure ecode_false_link" data-link="h3">
					<img loading="lazy" src="{{element_image_src}}" alt="{{element_image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $element_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{element_url}}">{{element_title}}</a></h3>
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
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s25_t30 = document.getElementsByClassName( 'ecode_section_25_template_30' );
		for (var i = 0; i < array_s25_t30.length; i++) {
			array_articles = array_s25_t30[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
