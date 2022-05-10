{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->title ) || !empty( $data->description ) || !empty( $data->cards_group ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_65_template_76"{{builder}} data-edit="ecode_section_65_template_76"{{/builder}}>
		<div class="ecode_width_65_76">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->description ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{description}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_title     = $card['card_title'];
					$card_url       = $card['card_url'];
					$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

					if( !empty( $card_image_src ) || ( !empty( $card_title ) && !empty( $card_url ) ) ) {

				?>{{/cards_group_loop_start}}
				<article class="ecode_article"{{builder}} data-edit="ecode_article"{{/builder}}>
					{{php}}<?php

					if( !empty( $card_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_false_link" data-link="h3">
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
					{{php}}<?php

					}

					if( !empty( $card_title ) && !empty( $card_url ) ) {

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
						<a href="{{card_url}}">
							{{card_title}}
						</a>
					</h3>
					{{php}}<?php

					}

					?>{{/php}}
				</article>
				{{cards_group_loop_end}}<?php

					}

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s65_t76 = document.getElementsByClassName( 'ecode_section_65_template_76' );
		for (var i = 0; i < array_s65_t76.length; i++) {
			array_articles = array_s65_t76[i].querySelectorAll( '.ecode_articles' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_articles_hide' );
			}
		}
	</script>
</section>
{{php}}<?php

}

?>{{/php}}
