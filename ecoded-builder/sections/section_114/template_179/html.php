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
	<section class="ecode_section_114_template_179"{{builder}} data-edit="ecode_section_114_template_179"{{/builder}}>
		<div class="ecode_width_114_179">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_title       = $card['card_title'];
				$card_svg_icon    = $card['card_svg_icon'];
				$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_img_alt     = !empty( get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) : $card_title;
				$card_img_alt     = !empty( $card_img_alt ) ? $card_img_alt : $page_title;
				$card_button_txt  = $card['card_button_txt'];
				$card_button_url  = $card['card_button_url'];
				$card_description = $card['card_description'];

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_svg_icon ) || !empty( $card_image_src ) ) {

					if( !empty( $card_svg_icon ) ) {

				?>
				<i class="ecode_false_link ecode_article_image" data-link="h3">
					{{card_svg_icon}}
				</i>
				<?php

					} else {

				?>
				<figure class="ecode_false_link ecode_article_image" data-link="h3">
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_img_alt}}">
				</figure>
				<?php

					}

				}

				?>{{/php}}
				{{builder}}{{card_svg_icon}}{{/builder}}
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
					{{php}}<?php

					if( !empty( $card_button_url ) ) {

					?>{{/php}}
					<a href="{{card_button_url}}">
					{{php}}<?php

					}

					if( !empty( $card_title ) ) {

					?>{{/php}}
						{{card_title}}
					{{php}}<?php

					}

					if( !empty( $card_button_url ) ) {

					?>{{/php}}
					</a>
					{{php}}<?php

					}

					?>{{/php}}
				</h3>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{card_description}}</p>
				{{php}}<?php

				}

				if( !empty( $card_button_txt ) && !empty( $card_button_url ) ) {

				?>{{/php}}
				<a href="{{card_button_url}}" class="ecode_article_button"{{builder}} data-edit="ecode_article_button"{{/builder}}>{{card_button_txt}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

			}

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	<script type="text/javascript">
		array_s114_t179 = document.getElementsByClassName( 'ecode_section_114_template_179' );
		for (var i = 0; i < array_s114_t179.length; i++) {
			array_articles = array_s114_t179[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

		}

	?>{{/php}}
</section>
