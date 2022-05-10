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
	<section class="ecode_section_161_template_262">
		<section class="ecode_width_161_262">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_title       = $card['card_title'];
				$card_svg_icon    = $card['card_svg_icon'];
				$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_img_alt     = !empty( get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) : $card_title;
				$card_img_alt     = !empty( $card_img_alt ) ? $card_img_alt : $page_title;

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_svg_icon ) || !empty( $card_image_src ) ) {

					if( !empty( $card_svg_icon ) ) {

				?>
				<div class="ecode_article_image">
					<i>
						{{card_svg_icon}}
					</i>
				</div>
				<?php

					} else {

				?>
				<figure class="ecode_article_image">
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
				<p class="ecode_article_title">{{card_title}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

			}

			?>{{/cards_group_loop_end}}
		</section>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
<script type="text/javascript">
	array_s161_262 = document.getElementsByClassName( 'ecode_section_161_template_262' );
	for (var i = 0; i < array_s161_262.length; i++) {
		array_articles = array_s161_262[i].querySelectorAll( '.ecode_article' );
		for (var j = 0; j < array_articles.length; j++) {
			array_articles[j].classList.add( 'ecode_article_hide' );
		}
	}
</script>
