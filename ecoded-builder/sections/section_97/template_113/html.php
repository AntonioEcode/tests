{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_97_template_113"{{builder}} data-edit="ecode_section_97_template_113"{{/builder}}>
		<div class="ecode_width_97_113">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_title       = $card['card_title'];
					$card_description = $card['card_description'];
					$card_url         = $card['card_url'];

					$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt    = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $card_title;
					$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

					$card_description = apply_filters( 'the_content', $card_description );

					// If have specific service selected
					if( !empty( $card['service_id'] ) ) {

						$service_id    = $card['service_id'];
						$service_title = get_the_title( $service_id );
						$service_link  = get_permalink( $service_id );

						$card_title = !empty( $card_title ) ? $card_title : $service_title;
						$card_url   = !empty( $card_url ) ? $card_url : $service_link;

					}

				?>{{/cards_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $card_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_false_link ecode_article_figure" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
					{{php}}<?php

					}

					if( !empty( $card_title ) ) {

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{card_url}}">{{card_title}}</a></h3>
					{{php}}<?php

					}

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content ecode_article_content"{{builder}} data-edit="ecode_article_content"{{/builder}}>
						{{card_description}}
					</div>
					{{php}}<?php

					}

					?>{{/php}}
				</article>
				{{cards_group_loop_end}}<?php

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s97_t113 = document.getElementsByClassName( 'ecode_section_97_template_113' );
		for (var i = 0; i < array_s97_t113.length; i++) {
			array_articles = array_s97_t113[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
