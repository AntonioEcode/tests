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
	{{php}}<?php

	if( !empty( $data->cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_85_template_101"{{builder}} data-edit="ecode_section_85_template_101"{{/builder}}>
		<div class="ecode_width_85_101">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_title     = $card['card_title'];
				$card_url       = $card['card_url'];
				$card_subtitle  = $card['card_subtitle'];
				$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_name;
				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

				$card_subtitle = apply_filters( 'the_content', $card_subtitle );

				if( !empty( $card_image_src ) || ( !empty( $card_title ) && !empty( $card_subtitle ) ) ) {

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure" {{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
					{{php}}<?php

					if( !empty( $card_url ) ) {

					?>{{/php}}
					<a href="{{card_url}}">
					{{php}}<?php

					}

					?>{{/php}}
						{{card_title}}
					{{php}}<?php

					if( !empty( $card_url ) ) {

					?>{{/php}}
					</a>
					{{php}}<?php

					}

					?>{{/php}}
				</h3>
				{{php}}<?php

				}

				if( !empty( $card_subtitle ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{card_subtitle}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	<script type="text/javascript">
		array_s85_t101 = document.getElementsByClassName( 'ecode_section_85_template_101' );
		for (var i = 0; i < array_s85_t101.length; i++) {
			array_articles = array_s85_t101[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
