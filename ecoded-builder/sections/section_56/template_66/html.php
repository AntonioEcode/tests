{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $page_title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

$pretitle = get_post_meta( $current_id, '_{{template_name}}_pretitle_{{page_section_id}}', TRUE );
$title    = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$copy_without_posts = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_56_template_66"{{builder}} data-edit="ecode_section_56_template_66"{{/builder}}>
		<div class="ecode_triangle"{{builder}} data-edit-bottom-center="ecode_triangle::after"{{/builder}}></div>
		{{php}}<?php

		if( !empty( $image_src ) ) {

		?>{{/php}}
		<figure class="ecode_figure">
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</figure>
		{{php}}<?php

		}

		if( !empty( $pretitle ) ) {

		?>{{/php}}
		<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
		{{php}}<?php

		}

		if( !empty( $title ) ) {

		?>{{/php}}
		<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
		{{php}}<?php

		}

		?>{{/php}}
		<section>
			{{posts_loop_start}}<?php

			if( have_posts() ) {

				while( have_posts() ) {

					the_post();

					$post_id = get_the_ID();
					$post    = get_post( $post_id );

					$post_title   = get_the_title();
					$post_url     = get_permalink();
					$post_excerpt = get_the_excerpt();

					$post_thumbnail_id = get_post_thumbnail_id( $post_id );

					if( !empty( $post_thumbnail_id ) ) {

						$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'medium_large' )[0];
						$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
						$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

					} else {

						$post_thumbnail_src = default_image_post( 'url' );
						$post_thumbnail_alt = $post_title;

					}

			?>{{/posts_loop_start}}
			<article>
				{{php}}<?php

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}><img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}"></figure>
				{{php}}<?php

				}

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
				{{php}}<?php

				if( !empty( $post_excerpt ) ) {

				?>{{/php}}
				<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{post_excerpt}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{posts_loop_end}}<?php

				}

			} else {

			?>
			<h2>{{copy_without_posts}}</h2>
			<?php

			}

			?>{{/posts_loop_end}}
		</section>
		<div class="ecode_container_pagination">
			{{php}}<?php

			$args_pagination = array(
				'prev_text' => __( 'Anteriores', 'frontecode' ),
				'next_text' => __( 'Siguientes', 'frontecode' ),
			);

			$array_pages = paginate_links( $args_pagination );

			echo $array_pages;

			?>{{/php}}
			{{builder}}<a class="prev page-numbers" href="#">Anteriores</a>
			<span class="page-numbers">1</span>
			<a class="page-numbers current" href="#">2</a>
			<a class="page-numbers" href="#">3</a>
			<a class="next page-numbers" href="#">Siguientes</a>{{/builder}}
		</div>
	</section>
</section>
