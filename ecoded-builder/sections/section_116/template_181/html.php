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
	<section class="ecode_section_116_template_181"{{builder}} data-edit="ecode_section_116_template_181"{{/builder}}>
		<div class="ecode_width_116_181">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->featured_image_hd_src ) && !empty( $data->featured_title ) && !empty( $data->featured_description ) ) {

			?>{{/php}}
			<article class="ecode_article ecode_article_featured">
				<picture class="ecode_article_featured_figure"{{builder}} data-edit="ecode_article_featured_figure"{{/builder}}>
					<source media="(min-width:1024px)" srcset="{{featured_image_hd_src}}">
					<img loading="lazy" src="{{featured_image_src}}" alt="{{featured_image_hd_alt}}">
				</picture>
				<div class="ecode_info ecode_info_featured"{{builder}} data-edit="ecode_info_featured"{{/builder}}>
					{{php}}<?php

					if( !empty( $data->featured_pretitle ) ) {

					?>{{/php}}
					<p class="ecode_article_name"{{builder}} data-edit="ecode_article_name"{{/builder}}>{{featured_pretitle}}</p>
					{{php}}<?php

					}

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
						{{php}}<?php

						if( !empty( $data->featured_btn_url ) ) {

						?>{{/php}}
						<a href="{{featured_btn_url}}">
						{{php}}<?php

						}

						?>{{/php}}
							{{featured_title}}
						{{php}}<?php

						if( !empty( $data->featured_btn_url ) ) {

						?>{{/php}}
						</a>
						{{php}}<?php

						}

						?>{{/php}}
					</h3>
					{{php}}<?php

					if( !empty( $data->featured_stars ) ) {

					?>{{/php}}
					<div class="ecode_stars">
						{{php}}<?php

						for( $i = 0; $i < (int)$data->featured_stars; $i++ ) {

						?>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<?php

						}

						?>{{/php}}{{builder}}
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>{{/builder}}
					</div>
					{{php}}<?php

					}

					if( !empty( $data->featured_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{featured_description}}
					</div>
					{{php}}<?php

					}

					if( !empty( $data->featured_btn_txt ) ) {

					?>{{/php}}
					<span class="ecode_article_button ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_button"{{/builder}}>{{featured_btn_txt}}</span>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</article>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_pretitle    = $card['card_pretitle'];
				$card_title       = $card['card_title'];
				$card_stars       = $card['card_stars'];
				$card_description = $card['card_description'];
				$card_description = apply_filters( 'the_content', $card_description );
				$card_btn_txt     = $card['card_btn_txt'];
				$card_btn_url     = $card['card_btn_url'];

				$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt   = !empty( get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE ) : $card_title;
				$card_image_alt   = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

				if( !empty( $card_title ) && !empty( $card_description ) ) {

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_info">
					{{php}}<?php

					if( !empty( $card_pretitle ) ) {

					?>{{/php}}
					<p class="ecode_article_name"{{builder}} data-edit="ecode_article_name"{{/builder}}>{{card_pretitle}}</p>
					{{php}}<?php

					}

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
						{{php}}<?php

						if( !empty( $card_btn_url ) ) {

						?>{{/php}}
						<a href="{{card_btn_url}}">
						{{php}}<?php

						}

						?>{{/php}}
							{{card_title}}
						{{php}}<?php

						if( !empty( $card_btn_url ) ) {

						?>{{/php}}
						</a>
						{{php}}<?php

						}

						?>{{/php}}
					</h3>
					{{php}}<?php

					if( !empty( $card_stars ) ) {

					?>
					<div class="ecode_stars">
					<?php

					for( $i = 0; $i < (int)$card_stars; $i++ ) {

					?>
					<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
					<?php

					}

					?>
					</div>
					<?php

					}

					?>{{/php}}{{builder}}
					<div class="ecode_stars">
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
						<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-632.000000, -10.000000)" fill="#d6d6d6"><g transform="translate(632.000000, 10.000000)"><polygon points="50 19.1109312 31.8321289 17.8729757 24.9900391 0.0575910931 18.1479492 17.8729757 0 19.1109312 13.9193359 31.3605263 9.35175781 49.9424089 24.9900391 39.6973684 40.628418 49.9424089 36.0608398 31.3605263"></polygon></g></g></g></svg></i>
					</div>{{/builder}}
					{{php}}<?php

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{card_description}}
					</div>
					{{php}}<?php

					}

					if( !empty( $card_btn_txt ) ) {

					?>{{/php}}
					<span class="ecode_article_button ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_button"{{/builder}}>{{card_btn_txt}}</span>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s116_t181 = document.getElementsByClassName( 'ecode_section_116_template_181' );
		for (var i = 0; i < array_s116_t181.length; i++) {
			array_articles = array_s116_t181[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
