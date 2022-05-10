{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_108_template_170"{{builder}} data-edit="ecode_section_108_template_170"{{/builder}}>
		<div class="ecode_width_108_170">
			{{php}}<?php

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

					$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_title       = $card['card_title'];
					$card_price       = $card['card_price'];
					$card_url         = $card['card_url'];
					$card_description = $card['card_description'];

					// If have specific service selected
					if( !empty( $card['service_id'] ) ) {

						$service_id    = $card['service_id'];
						$service_title = get_the_title( $service_id );
						$service_link  = get_permalink( $service_id );

						$card_title = !empty( $card_title ) ? $card_title : $service_title;
						$card_url   = !empty( $card_url ) ? $card_url : $service_link;

					}

					$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

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

					if( !empty( $card_price ) ) {

					?>{{/php}}
					<span class="ecode_article_price"{{builder}} data-edit="ecode_article_price"{{/builder}}>{{card_price}}</span>
					{{php}}<?php

					}

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{card_description}}</p>
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
		array_s108_t170 = document.getElementsByClassName( 'ecode_section_108_template_170' );
		for (var i = 0; i < array_s108_t170.length; i++) {
			array_articles = array_s108_t170[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
