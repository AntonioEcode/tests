{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_47_template_70">
		<section class="ecode_articles">
			{{php}}<?php

			if( !empty( $data->image_hd_src ) && !empty( $data->image_src ) ) {

			?>{{/php}}
			<picture>
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
			</picture>
			{{php}}<?php

			}

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
			<section id="ecode_slider_47_70" class="ecode_slider_47_70">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_svg_icon    = $card['card_svg_icon'];
					$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt   = !empty( $card_image_alt ) ? $card_image_alt : $card_title;
					$card_title       = $card['card_title'];
					$card_url         = $card['card_url'];
					$card_description = $card['card_description'];

					$card_description = apply_filters( 'the_content', $card_description );

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
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
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

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
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

			if( !empty( $data->section_button_txt ) && !empty( $data->section_button_url ) ) {

			?>{{/php}}
			<div class="ecode_buttons">
				<a href="{{section_button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{section_button_txt}}</a>
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
	</section>
	<script type="text/javascript">
		array_s47_t70 = document.getElementsByClassName( 'ecode_section_47_template_70' );
		for (var i = 0; i < array_s47_t70.length; i++) {
			array_articles = array_s47_t70[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
