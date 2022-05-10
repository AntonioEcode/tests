{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_48_template_56"{{builder}} data-edit="ecode_section_48_template_56"{{/builder}}>
		<section class="ecode_section_48_template_56_width">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{pretitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section>
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_comment   = $card['card_comment'];
					$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_name      = $card['card_name'];
					$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_name;

					$card_comment = apply_filters( 'the_content', $card_comment );

				?>{{/cards_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $card_comment ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{card_comment}}
					</div>
					{{php}}<?php

					}

					if( !empty( $card_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}><img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}"></figure>
					{{php}}<?php

					}

					if( !empty( $card_name ) ) {

					?>{{/php}}
					<h3 class="ecode_article_name"{{builder}} data-edit="ecode_article_name"{{/builder}}>{{card_name}}</h3>
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
		</section>
	</section>
	<script type="text/javascript">
		array_s48_t56 = document.getElementsByClassName( 'ecode_section_48_template_56' );
		for (var i = 0; i < array_s48_t56.length; i++) {
			array_articles = array_s48_t56[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
