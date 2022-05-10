{{php}}<?php

$current_id = wpeb_get_id();

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
	<section class="ecode_section_36_template_44">
		{{cards_group_loop_start}}<?php

		foreach( $data->cards_group as $card ) {

			$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
			$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
			$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
			$card_title       = $card['card_title'];
			$card_description = $card['card_description'];
			$card_url         = $card['card_url'];

			$card_description = apply_filters( 'the_content', $card_description );

			// If have specific work / service selected
			$element_id = !empty( $card['work_id'] ) ? $card['work_id'] : '';
			$element_id = ( empty( $element_id ) && !empty( $card['service_id'] ) ) ? $card['service_id'] : $element_id;

			if( !empty( $element_id ) ) {

				$element_title        = get_the_title( $element_id );
				$element_link         = get_permalink( $element_id );
				$element_thumbnail_id = get_post_thumbnail_id( $element_id );

				$card_title = !empty( $card_title ) ? $card_title : $element_title;
				$card_url   = !empty( $card_url ) ? $card_url : $element_link;

				if( empty( $card_image_src ) && !empty( $element_thumbnail_id ) ) {

					$card_image_src = wp_get_attachment_image_src( $element_thumbnail_id, 'large' )[0];
					$card_image_alt = get_post_meta( $element_thumbnail_id, '_wp_attachment_image_alt', TRUE );

				}

			}

			$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

		?>{{/cards_group_loop_start}}
		<article class="ecode_article">
			{{php}}<?php

			if( !empty( $card_image_src ) ) {

			?>{{/php}}
			<figure class="ecode_article_image">
				<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
			</figure>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_article_info">
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h2 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
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
				</h2>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<div class="ecode_container_content">
					{{card_description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</article>
		{{cards_group_loop_end}}<?php

		}

		?>{{/cards_group_loop_end}}
	</section>
	<script type="text/javascript">
		array_s36_t44 = document.getElementsByClassName( 'ecode_section_36_template_44' );
		for (var i = 0; i < array_s36_t44.length; i++) {
			array_articles = array_s36_t44[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
