{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

$categories_filters = array();

if( !empty( $data->cards_group ) ) {

	foreach( $data->cards_group as $card ) {

		if( !empty( $card['card_category'] ) ) {

			$card_categories = explode( ',', $card['card_category'] );

			foreach( $card_categories as $card_category ) {

				// remove white spaces
				$card_category = trim( $card_category );

				// create unique data-cat
				$card_data_cat = strtolower( str_replace( ' ', '', preg_replace( '/[^A-Za-z0-9]/', '', $card_category ) ) );

				// Add it to the array of different categories ( for filters ) if it does not already exist.
				if( !array_key_exists( $card_data_cat, $categories_filters ) ) {

					$categories_filters[$card_data_cat] = $card_category;

				}

			}

		}

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_33_template_140">
		{{php}}<?php

		if( !empty( $data->cards_group ) ) {

			if( !empty( $categories_filters ) ) {

		?>{{/php}}
		<section class="ecode_categories">
			<span class="ecode_category ecode_category_current" data-cat=""{{builder}} data-edit="ecode_category"{{/builder}}>Todas</span>
			<span> / </span>
			{{php}}<?php

			$cont = 0;

			foreach( $categories_filters as $key => $value ) {

			?>
			<span class="ecode_category" data-cat="<?php echo $key; ?>"{{builder}} data-edit="ecode_category"{{/builder}}><?php echo $value; ?></span>
			<?php

				// If not is the last iteration add slug
				if( $cont != count( $categories_filters ) - 1 ) {

			?>
			<span> / </span>
			<?php
				}

				$cont++;

			}

			?>{{/php}}
			{{builder}}{{filters}}{{/builder}}
		</section>
		{{php}}<?php

			}

		?>{{/php}}
		<section class="ecode_projects">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				// Get data-cat
				if( !empty( $card['card_category'] ) ) {

					$card_list_data_cat = '';

					$list_card_categories = explode( ',', $card['card_category'] );

					$cont = 0;

					foreach( $list_card_categories as $list_card_category ) {

						// remove white spaces
						$list_card_category = trim( $list_card_category );

						// create unique data-cat
						$work_card_data_cat = strtolower( str_replace( ' ', '', preg_replace( '/[^A-Za-z0-9]/', '', $list_card_category ) ) );

						$card_list_data_cat .= $work_card_data_cat;

						// If not is the last iteration add slug
						if( $cont != count( $categories_filters ) - 1 ) {

							$card_list_data_cat .= ',';

						}

						$cont++;

					}

				}

				$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_title     = $card['card_title'];
				$card_subtitle  = $card['card_subtitle'];
				$card_url       = $card['card_url'];

				$card_subtitle = apply_filters( 'the_content', $card_subtitle );

				// If have specific work selected
				if( !empty( $card['work_id'] ) ) {

					$work_id           = $card['work_id'];
					$work_title        = get_the_title( $work_id );
					$work_link         = get_permalink( $work_id );
					$work_thumbnail_id = get_post_thumbnail_id( $work_id );

					$card_title = !empty( $card_title ) ? $card_title : $work_title;
					$card_url   = !empty( $card_url ) ? $card_url : $work_link;

					if( empty( $card_image_src ) && !empty( $work_thumbnail_id ) ) {

						$card_image_src = wp_get_attachment_image_src( $work_thumbnail_id, 'large' )[0];
						$card_image_alt = get_post_meta( $work_thumbnail_id, '_wp_attachment_image_alt', TRUE );

					}

				}

				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

			?>{{/cards_group_loop_start}}
			<article class="ecode_article" data-cat="{{card_list_data_cat}}">
				<div class="ecode_article_info">
					{{php}}<?php

					if( !empty( $card_title ) ) {

						if( empty( $card_url ) ) {

					?>
					<h3>{{card_title}}</h3>
					<?php

						} else {

					?>{{/php}}
					<h3><a href="{{card_url}}" class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_title}}</a></h3>
					{{php}}<?php

						}

					}

					if( !empty( $card_subtitle ) ) {

					?>{{/php}}
					<div class="ecode_container_content">
						{{card_subtitle}}
					</div>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure">
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
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
