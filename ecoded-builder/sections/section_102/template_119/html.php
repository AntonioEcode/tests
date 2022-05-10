{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$prev_post = get_previous_post( $in_same_term = TRUE );
$next_post = get_next_post( $in_same_term = TRUE );

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_related_posts_blog_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$posts_to_exclude = array( $current_id );

	if( !empty( $prev_post ) ) {

		$posts_to_exclude[] = $prev_post->ID;

	}

	if( !empty( $next_post ) ) {

		$posts_to_exclude[] = $next_post->ID;

	}

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '3',
		'category__in'   => wp_get_post_categories( $current_id ),
		'post__not_in'   => $posts_to_exclude
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

$copy_related_posts  = __( 'Artículos relacionados', 'frontecode' );
$copy_previous_posts = __( 'Artículo anterior', 'frontecode' );
$copy_next_posts     = __( 'Artículo siguiente', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_102_template_119"{{builder}} data-edit="ecode_section_102_template_119"{{/builder}}>
		<div class="ecode_width_102_119">
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{copy_related_posts}}</h3>
			<section class="ecode_articles">
				{{posts_loop_start}}<?php

				if( !empty( $posts_blog ) ) {

					$cont = 0;

					foreach( $posts_blog as $post ) {

						$post_id = $post['post_id'];
						$post = get_post( $post_id );

						$post_title      = get_the_title( $post_id );
						$post_url        = get_permalink( $post_id );
						$post_categories = wp_get_post_categories( $post_id );

						$copy_categories = '';

						if( !empty( $post_categories ) ) {

							for( $i = 0; $i < count( $post_categories ); $i++ ) {

								$cat = get_category( $post_categories[$i] );

								$copy_categories .= '<a href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

								if( $i < ( count( $post_categories ) - 1 ) ) {

									$copy_categories .= ', ';

								}

							}

						}

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

				?>{{/posts_loop_start}}
				<article class="ecode_article">
					<figure class="ecode_false_link ecode_article_figure" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
					</figure>
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
					<div class="ecode_date_cat">
						<time class="ecode_article_date"{{builder}} data-edit="ecode_article_date"{{/builder}}>{{format_post_date}}</time> /
						{{php}}<p class="ecode_article_cat">{{copy_categories}}</p>{{/php}}{{builder}}
						<p class="ecode_article_cat" data-edit="ecode_article_cat"><a href="#">Salud</a>, <a href="#">Research</a></p>{{/builder}}
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

			$class_without_prev = '';

			if( !is_a( $prev_post , 'WP_Post' ) ) {

				$class_without_prev = ' ecode_pagination_right';

			}

			if( is_a( $prev_post , 'WP_Post' ) || is_a( $next_post , 'WP_Post' ) ) {

			?>
			<section class="ecode_pagination{{class_without_prev}}">{{/php}}{{builder}}
			<section class="ecode_pagination">{{/builder}}
				{{php}}<?php

				if( is_a( $prev_post , 'WP_Post' ) ) {

					$prev_post_url = get_permalink( $prev_post->ID );

					$prev_post_thumbnail_id = get_post_thumbnail_id( $prev_post->ID );

					if( !empty( $prev_post_thumbnail_id ) ) {

						$prev_post_thumbnail_src = wp_get_attachment_image_src( $prev_post_thumbnail_id, 'thumbnail' )[0];
						$prev_post_thumbnail_alt = get_post_meta( $prev_post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
						$prev_post_thumbnail_alt = !empty( $prev_post_thumbnail_alt ) ? $prev_post_thumbnail_alt : $post_title;

					} else {

						$prev_post_thumbnail_src = default_image_post( 'url' );
						$prev_post_thumbnail_alt = $post_title;

					}


				?>{{/php}}
				<article class="ecode_pagination_prev">
					<figure class="ecode_pagination_figure"{{builder}} data-edit="ecode_pagination_figure"{{/builder}}>
						<a href="{{prev_post_url}}">
							<img loading="lazy" src="{{prev_post_thumbnail_src}}" alt="{{prev_post_thumbnail_alt}}">
						</a>
					</figure>
					<p class="ecode_pagination_text"{{builder}} data-edit="ecode_pagination_text"{{/builder}}><a href="{{prev_post_url}}">{{copy_previous_posts}}</a></p>
				</article>
				{{php}}<?php

				}

				if( is_a( $next_post , 'WP_Post' ) ) {

					$next_post_url = get_permalink( $next_post->ID );

					$next_post_thumbnail_id = get_post_thumbnail_id( $next_post->ID );

					if( !empty( $next_post_thumbnail_id ) ) {

						$next_post_thumbnail_src = wp_get_attachment_image_src( $next_post_thumbnail_id, 'thumbnail' )[0];
						$next_post_thumbnail_alt = get_post_meta( $next_post_thumbnail_id, '_wp_attachment_image_alt', TRUE );

					} else {

						$next_post_thumbnail_src = default_image_post( 'url' );
						$next_post_thumbnail_alt = $post_title;

					}

				?>{{/php}}
				<article class="ecode_pagination_next">
					<figure class="ecode_pagination_figure"{{builder}} data-edit="ecode_pagination_figure"{{/builder}}>
						<a href="{{next_post_url}}">
							<img loading="lazy" src="{{next_post_thumbnail_src}}" alt="{{next_post_thumbnail_alt}}">
						</a>
					</figure>
					<p class="ecode_pagination_text"{{builder}} data-edit="ecode_pagination_text"{{/builder}}><a href="{{next_post_url}}">{{copy_next_posts}}</a></p>
				</article>
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
		array_s102_t119 = document.getElementsByClassName( 'ecode_section_102_template_119' );
		for (var i = 0; i < array_s102_t119.length; i++) {
			array_articles = array_s102_t119[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
