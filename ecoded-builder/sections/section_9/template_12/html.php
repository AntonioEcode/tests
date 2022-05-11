{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$description = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$description = apply_filters( 'the_content', $description );

$button_txt = get_post_meta( $current_id, '_{{template_name}}_button_txt_{{page_section_id}}', TRUE );
$button_url = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

if( empty( $button_url ) ) {

	$button_url = !empty( get_permalink( get_option( 'page_for_posts' ) ) ) ? get_permalink( get_option( 'page_for_posts' ) ) : '';

}

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '3',
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
	<section class="ecode_section_9_template_12"{{builder}} data-edit="ecode_section_9_template_12"{{/builder}}>
		{{php}}<?php

		if( !empty( $title ) ) {

		?>{{/php}}
		<h3 class="ecode_title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $description ) ) {

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{description}}
		</div>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_section">
			{{posts_loop_start}}<?php

			if( !empty( $posts_blog ) ) {

				$cont = 0;

				foreach( $posts_blog as $post ) {

					$post_id = $post['post_id'];
					$post = get_post( $post_id );

					$post_title   = get_the_title( $post_id );
					$post_url     = get_permalink( $post_id );
					$post_excerpt = get_the_excerpt( $post_id );
					$author_name  = get_the_author_meta( 'display_name', $post->post_author );
					$categories   = wp_get_post_categories( $post_id );
					$cat_content  = '';

					$post_date = new DateTime( $post->post_date );
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

					if( !empty( $categories ) ) {

						$cat_content = '<p class="ecode_more_info_links">';

						for( $i = 0; $i < count( $categories ); $i++ ) {

							$cat = get_category( $categories[$i] );

							$cat_content .= '<a href="'. get_category_link( $categories[$i] ) .'">'. $cat->name . '</a>';

							if( $i < ( count( $categories ) - 1 ) ) {

								$cat_content .= ', ';

							}

						}

						$cat_content .= '</p>';

					}

			?>{{/posts_loop_start}}
			<article class="ecode_article">
				<div class="ecode_image_info">
				    {{php}}<?php

					if( !empty( $post_thumbnail_src ) ) {

					?>{{/php}}
					<figure class="ecode_article_image"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
					</figure>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_more_info">
						{{php}}<?php

						if( !empty( $post_url ) ) {

						?>{{/php}}
						<div class="icons">
							<i class="icon_link">
								<a href="{{post_url}}">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#fed03d" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
								</a>
							</i>
						</div>
						{{php}}<?php

						}

						if( !empty( $post_title ) ) {

						?>{{/php}}
						<p class="ecode_more_info_title">{{post_title}}</p>
						{{php}}<?php

						}

						if( !empty( $cat_content ) ) {

						?>{{/php}}
						{{cat_content}}
						{{php}}<?php

						}

						?>{{/php}}
					</div>
				</div>
				<div class="ecode_info">
					{{php}}<?php

					if( !empty( $post_title ) && !empty( $post_url ) ) {

					?>{{/php}}
					<h4 class="ecode_article_title"{{builder}} data-edit="ecode_article_title a"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h4>
					{{php}}<?php

					}

					if( !empty( $format_post_date ) ) {

					?>{{/php}}
					<time class="ecode_article_time"{{builder}} data-edit="ecode_article_time"{{/builder}}>{{format_post_date}}</time>
					{{php}}<?php

					}

					if( !empty( $post_excerpt ) ) {

					?>{{/php}}
					<p class="ecode_article_text"{{builder}} data-edit="ecode_article_text"{{/builder}}>{{post_excerpt}}</p>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</article>
			{{posts_loop_end}}<?php

					$cont++;

					if( $cont == 3 ) { break; }

				}

				wp_reset_postdata();

			}

			?>{{/posts_loop_end}}
		</section>
		{{php}}<?php

		if( !empty( $button_txt ) && !empty( $button_url ) ) {

		?>{{/php}}
		<div class="ecode_container_button">
			<a href="{{button_url}}" class="ecode_button ecode_button_white">{{button_txt}}</a>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s9_t12 = document.getElementsByClassName( 'ecode_section_9_template_12' );
		for (var i = 0; i < array_s9_t12.length; i++) {
			array_articles = array_s9_t12[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
