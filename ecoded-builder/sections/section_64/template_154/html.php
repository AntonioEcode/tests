{{php}}<?php

$current_id = wpeb_get_id();

$title    = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$subtitle = apply_filters( 'the_content', $subtitle );

$featured_post_id = get_post_meta( $current_id, '_{{template_name}}_featured_post_id_{{page_section_id}}', TRUE );

if( empty( $featured_post_id ) ) {

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '1',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) {

		while( $query->have_posts() ) {

			$query->the_post();
			$post_id = get_the_ID();

			$featured_post_id = $post_id;

		}

	}

	wp_reset_postdata();

}

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'post__not_in'   => array( $featured_post_id ),
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
	<section class="ecode_section_64_template_154{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_64_template_154"{{/builder}}>
		<div class="ecode_width_64_154">
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

			if( !empty( $featured_post_id ) || !empty( $posts_blog ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{php}}<?php

				if( !empty( $featured_post_id ) ) {

					$featured_post_url          = get_permalink( $featured_post_id );
					$featured_post_title        = get_the_title( $featured_post_id );
					$featured_post_thumbnail_id = get_post_thumbnail_id( $featured_post_id );
					$featured_post_excerpt      = get_the_excerpt( $featured_post_id );
					$featured_post_categories   = wp_get_post_categories( $featured_post_id );
					$featured_copy_read_more    = __( 'Leer más >', 'frontecode' );

					if( !empty( $featured_post_thumbnail_id ) ) {

						$featured_post_thumbnail_src = wp_get_attachment_image_src( $featured_post_thumbnail_id, 'full' )[0];
						$featured_post_thumbnail_alt = get_post_meta( $featured_post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
						$featured_post_thumbnail_alt = !empty( $featured_post_thumbnail_alt ) ? $featured_post_thumbnail_alt : $featured_post_title;

					} else {

						$featured_post_thumbnail_src = default_image_post( 'url' );
						$featured_post_thumbnail_alt = $featured_post_title;

					}

					$copy_categories = '';

					if( !empty( $featured_post_categories ) ) {

						$copy_categories = '<ul class="ecode_featured_categories">';

						for( $i = 0; $i < count( $featured_post_categories ); $i++ ) {

							$cat = get_category( $featured_post_categories[$i] );

							$copy_categories .= '<li class="ecode_featured_category"><a href="'. get_category_link( $featured_post_categories[$i] ) .'">'. $cat->name . '</a></li>';

							if( $i < ( count( $featured_post_categories ) - 1 ) ) {

								$copy_categories .= ', ';

							}

						}

						$copy_categories .= '</ul>';

					}

				?>{{/php}}
				<article class="ecode_featured_article">
					{{php}}<?php

					if( !empty( $featured_post_thumbnail_src ) ) {

					?>{{/php}}
					<div class="ecode_featured_figure"{{builder}} data-edit="ecode_featured_figure"{{/builder}}>
						<figure class="ecode_false_link" data-link="h3">
							<img loading="lazy" src="{{featured_post_thumbnail_src}}" alt="{{featured_post_thumbnail_alt}}">
							<div class="back_info_featured"{{builder}} data-edit="back_info_featured"{{/builder}}>
								<span class="back_info_featured_title"{{builder}} data-edit="back_info_featured_title"{{/builder}}>{{featured_post_title}}</span>
							</div>
						</figure>
					</div>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_featured_info"{{builder}} data-edit="ecode_featured_info"{{/builder}}>
						<h3 class="ecode_featured_title"{{builder}} data-edit="ecode_featured_title"{{/builder}}><a href="{{featured_post_url}}">{{featured_post_title}}</a></h3>
						{{php}}<?php

						if( !empty( $copy_categories ) ) {

							echo $copy_categories;

						}

						?>{{/php}}
						{{builder}}<ul class="ecode_featured_categories">
							<li class="ecode_featured_category" data-edit="ecode_featured_category"><a href="#">Bakery</a></li>,
							<li class="ecode_featured_category" data-edit="ecode_featured_category"><a href="#">Featured</a></li>,
							<li class="ecode_featured_category" data-edit="ecode_featured_category"><a href="#">Healthy</a></li>,
							<li class="ecode_featured_category" data-edit="ecode_featured_category"><a href="#">Latest Recipes</a></li>,
							<li class="ecode_featured_category" data-edit="ecode_featured_category"><a href="#">Staff Picks</a></li>
						</ul>{{/builder}}
						{{php}}<?php

						if( !empty( $featured_post_excerpt ) ) {

						?>{{/php}}
						<p class="ecode_featured_excerpt"{{builder}} data-edit="ecode_featured_excerpt"{{/builder}}>{{featured_post_excerpt}}</p>
						{{php}}<?php

						}

						?>{{/php}}
						<span class="ecode_button ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_button"{{/builder}}>{{featured_copy_read_more}}</span>
					</div>
				</article>
				{{php}}<?php

				}

				if( !empty( $posts_blog ) ) {

				?>{{/php}}
				<section class="ecode_list_articles">
					{{posts_loop_start}}<?php

					$cont = 0;

					foreach( $posts_blog as $post ) {

						$post_id = $post['post_id'];
						$post = get_post( $post_id );

						$post_title = get_the_title( $post_id );
						$post_url   = get_permalink( $post_id );

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
					<article class="ecode_article"{{builder}} data-edit="ecode_article"{{/builder}}>
						<figure>
							<a href="{{post_url}}">
								<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
								<div class="back_info"{{builder}} data-edit="back_info"{{/builder}}>
									<span class="back_info_title"{{builder}} data-edit="back_info_title"{{/builder}}>{{post_title}}</span>
								</div>
							</a>
						</figure>
					</article>
					{{posts_loop_end}}<?php

						$cont++;

						if( $cont == 8 ) { break; }

					}

					wp_reset_postdata();

					?>{{/posts_loop_end}}
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
		array_s64_t154 = document.getElementsByClassName( 'ecode_section_64_template_154' );
		for (var i = 0; i < array_s64_t154.length; i++) {
			array_articles = array_s64_t154[i].querySelectorAll( '.ecode_list_articles, .ecode_featured_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_articles_hide' );
			}
		}
	</script>
</section>
