{{php}}<?php

$current_id = wpeb_get_id();

$title    = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$subtitle = apply_filters( 'the_content', $card_description );

$button_1_text = get_post_meta( $current_id, '_{{template_name}}_button_1_text_{{page_section_id}}', TRUE );
$button_1_url  = get_post_meta( $current_id, '_{{template_name}}_button_1_url_{{page_section_id}}', TRUE );

$button_2_text = get_post_meta( $current_id, '_{{template_name}}_button_2_text_{{page_section_id}}', TRUE );
$button_2_url  = get_post_meta( $current_id, '_{{template_name}}_button_2_url_{{page_section_id}}', TRUE );
$button_2_url  = !empty( $button_2_url ) ? $button_2_url : get_permalink( get_option( 'page_for_posts' ) );

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '8',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) {

		while( $query->have_posts() ) {

			$query->the_post();
			$post_id = get_the_ID();

			$posts_blog[] = array(
				'post_id' => $post_id,
			);

		}

	}

	wp_reset_postdata();

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_66_template_155"{{builder}} data-edit="ecode_section_66_template_155"{{/builder}}>
		<div class="ecode_width_66_155">
			<section class="ecode_titles">
				{{php}}<?php

				if( !empty( $title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				}

				if( !empty( $subtitle ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{subtitle}}
				</div>
				{{php}}<?php

				}

				if( !empty( $button_1_text ) && !empty( $button_1_url ) ) {

				?>{{/php}}
				<a href="{{button_1_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_1_text}}<svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-109.000000, -11.000000)" fill="#ffffff"><g transform="translate(109.000000, 11.000000)"><ellipse cx="19.826087" cy="8.86956522" rx="9.04347826" ry="8.86956522"></ellipse><path d="M0.743843478,15.8842211 C0.277904348,16.1276158 0,16.5275714 0,16.9547928 L0,19.8546013 L0,31.1429713 L0,33.8873477 C0,34.4303183 0.446928261,34.916326 1.12141087,35.1069258 L18.4347826,40 L18.4347826,20.2852961 L2.33511087,15.7352147 C1.80430435,15.5850793 1.20966739,15.6407397 0.743843478,15.8842211 Z"></path><path d="M40,25.2646112 C40,24.7979615 40,21.5729113 40,20.8211497 L40,19.8546013 L40,16.9547928 C40,16.5275714 39.7220957,16.1276158 39.2561565,15.8842211 C38.7902174,15.6407397 38.1954652,15.5850793 37.6648891,15.7352147 L21.5652174,20.2852961 L21.5652174,40 L38.8785891,35.1069258 C39.5530717,34.916326 40,34.4303183 40,33.8873477 L40,31.1429713 C40,27.8123394 40,25.852886 40,25.2646112 Z"></path></g></g></g></svg></a>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			{{php}}<?php

			if( !empty( $posts_blog ) ) {

			?>{{/php}}
			<section class="ecode_list_sidebar">
				<section class="ecode_list">
					{{posts_loop_start}}<?php

					$cont = 0;

					foreach( $posts_blog as $post ) {

						$post_id = $post['post_id'];
						$post = get_post( $post_id );

						$post_title = get_the_title( $post_id );
						$post_url   = get_permalink( $post_id );

						$post_author = get_the_author_meta( 'display_name', $post->post_author );
						$copy_author = __( 'Por', 'frontecode' ) . ' ' . $post_author;

						$post_date        = new DateTime( $post->post_date );
						$format_post_date = strftime( "%d %B, %Y", $post_date->getTimestamp() );

						$post_thumbnail_id = get_post_thumbnail_id( $post_id );

						if( !empty( $post_thumbnail_id ) ) {

							$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
							$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
							$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

						} else {

							$post_thumbnail_src = default_image_post( 'url' );
							$post_thumbnail_alt = $post_title;

						}

					?>{{/posts_loop_start}}
					<article class="ecode_article">
						<div class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
							<figure class="ecode_false_link" data-link="h3" data-title="{{post_title}}">
								<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
							</figure>
						</div>
						<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
							<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
							<p class="ecode_article_author_date"{{builder}} data-edit="ecode_article_author_date"{{/builder}}>
								<span class="ecode_article_author">{{copy_author}}</span>
								<time class="ecode_article_date"{{builder}} data-edit="ecode_article_date"{{/builder}}> | {{format_post_date}}</time>
							</p>
						</div>
					</article>
					{{posts_loop_end}}<?php

						$cont++;

						if( $cont == 6 ) { break; }

					}

					wp_reset_postdata();

					?>{{/posts_loop_end}}
					{{php}}<?php

					if( !empty( $button_2_text ) && !empty( $button_2_url ) ) {

					?>{{/php}}
					<a href="{{button_2_url}}" class="button_view_posts"{{builder}} data-edit="button_view_posts"{{/builder}}>{{button_2_text}}</a>
					{{php}}<?php

					}

					?>{{/php}}
				</section>
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s66_t155 = document.getElementsByClassName( 'ecode_section_66_template_155' );
		for (var i = 0; i < array_s66_t155.length; i++) {
			array_articles = array_s66_t155[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
