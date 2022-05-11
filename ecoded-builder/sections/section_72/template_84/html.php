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

	if( !empty( $data->title ) || !empty( $data->subtitle ) || !empty( $data->slides_group ) || !empty( $data->cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_72_template_84"{{builder}} data-edit="ecode_section_72_template_84"{{/builder}}>
		<div class="ecode_width_72_84">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->slides_group ) || !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section class="ecode_reviews">
				{{php}}<?php

				if( !empty( $data->slides_group ) ) {

				?>{{/php}}
				<section class="ecode_reviews_slider ecode_reviews_slider_72_84"{{builder}} data-edit="ecode_reviews_slider"{{/builder}}>
					{{slides_group_loop_start}}<?php

					foreach( $data->slides_group as $slide ) {

						$slide_comment   = $slide['slide_comment'];
						$slide_name      = $slide['slide_name'];
						$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
						$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];
						$slide_image_alt = get_post_meta( $slide_image_id, '_wp_attachment_image_alt', TRUE );
						$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $slide_name;
						$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $page_title;

						$slide_comment = apply_filters( 'the_content', $slide_comment );

						if( !empty( $slide_comment ) ) {

					?>{{/slides_group_loop_start}}
					<article class="ecode_review">
						{{php}}<?php

						if( !empty( $slide_image_src ) ) {

						?>{{/php}}
						<figure class="ecode_review_figure"{{builder}} data-edit="ecode_review_figure"{{/builder}}>
							<img loading="lazy" src="{{slide_image_src}}" alt="{{slide_image_alt}}">
						</figure>
						{{php}}<?php

						}

						?>{{/php}}
						<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
							<span>“</span>
							{{slide_comment}}
						</div>
						{{php}}<?php

						if( !empty( $slide_name ) ) {

						?>{{/php}}
						<p class="ecode_review_author"{{builder}} data-edit="ecode_review_author"{{/builder}}>{{slide_name}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</article>
					{{slides_group_loop_end}}<?php

						}

					}

					?>{{/slides_group_loop_end}}
				</section>
				{{php}}<?php

				}

				if( !empty( $data->cards_group ) ) {

				?>{{/php}}
				<section class="ecode_reviews_features">
					{{cards_group_loop_start}}<?php

					foreach( $data->cards_group as $card ) {

						$card_comment   = $card['card_comment'];
						$card_name      = $card['card_name'];
						$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
						$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
						$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
						$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_name;
						$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

						if( !empty( $card_comment ) ) {

					?>{{/cards_group_loop_start}}
					<article class="ecode_review_feature"{{builder}} data-edit="ecode_review_feature"{{/builder}}>
						{{php}}<?php

						if( !empty( $card_image_src ) ) {

						?>{{/php}}
						<figure class="ecode_review_feature_figure"{{builder}} data-edit="ecode_review_feature_figure"{{/builder}}>
							<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
						</figure>
						{{php}}<?php

						}

						?>{{/php}}
						<h3 class="ecode_review_feature_title"{{builder}} data-edit="ecode_review_feature_title"{{/builder}}>{{card_name}}</h3>
						{{php}}<?php

						if( !empty( $card_name ) ) {

						?>{{/php}}
						<p class="ecode_review_feature_text"{{builder}} data-edit="ecode_review_feature_text"{{/builder}}><span>“</span>{{card_comment}}</p>
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
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s72_t84 = document.getElementsByClassName( 'ecode_section_72_template_84' );
		for (var i = 0; i < array_s72_t84.length; i++) {
			array_articles = array_s72_t84[i].querySelectorAll( '.ecode_reviews_slider, .ecode_review_feature' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_review_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
