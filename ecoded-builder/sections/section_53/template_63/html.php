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
	<section class="ecode_section_53_template_63"{{builder}} data-edit="ecode_section_53_template_63"{{/builder}}>
		<section class="ecode_section_53_template_63_width">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
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

					$card_svg_icon    = $card['card_svg_icon'];
					$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt   = !empty( $card_image_alt ) ? $card_image_alt : $page_title;
					$card_description = $card['card_description'];

					$card_description = apply_filters( 'the_content', $card_description );

					if( !empty( $card_svg_icon ) || !empty( $card_image_src ) || !empty( $card_description ) ) {

				?>{{/cards_group_loop_start}}
				<article class="ecode_article"{{builder}} data-edit="ecode_article"{{/builder}}>
					{{php}}<?php

					if( !empty( $card_svg_icon ) ) {

					?>
					<i class="ecode_article_image">
						{{card_svg_icon}}
					</i>
					<?php

					} else {

					?>{{/php}}
					<figure class="ecode_article_image">
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
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

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
	</section>
	<script type="text/javascript">
		array_s53_t63 = document.getElementsByClassName( 'ecode_section_53_template_63' );
		for (var i = 0; i < array_s53_t63.length; i++) {
			array_articles = array_s53_t63[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
