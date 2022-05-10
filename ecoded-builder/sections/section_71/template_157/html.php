{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$back_image_hd     = get_post_meta( $current_id, '_{{template_name}}_back_image_hd_{{page_section_id}}', TRUE );
$back_image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_back_image_hd_{{page_section_id}}_id', TRUE );
$back_image_hd_id  = empty( $back_image_hd_id ) ? attachment_url_to_postid( $back_image_hd ) : $back_image_hd_id;
$back_image_hd_src = wp_get_attachment_image_src( $back_image_hd_id, 'full' )[0];
$back_image_alt    = get_post_meta( $back_image_hd_id, '_wp_attachment_image_alt', TRUE );
$back_image_alt    = !empty( $back_image_alt ) ? $back_image_alt : $page_title;

$back_image     = get_post_meta( $current_id, '_{{template_name}}_back_image_{{page_section_id}}', TRUE );
$back_image_id  = get_post_meta( $current_id, '_{{template_name}}_back_image_{{page_section_id}}_id', TRUE );
$back_image_id  = empty( $back_image_id ) ? attachment_url_to_postid( $back_image ) : $back_image_id;
$back_image_src = wp_get_attachment_image_src( $back_image_id, 'full' )[0];
$back_image_src = !empty( $back_image_src ) ? $back_image_src : $back_image_hd_src;

$title    = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$subtitle = apply_filters( 'the_content', $subtitle );

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
	<section class="ecode_section_71_template_157{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_71_template_157"{{/builder}}>
		{{php}}<?php

		if( !empty( $back_image_hd_src ) ) {

		?>{{/php}}
		<picture>
			<source media="(min-width:1024px)" srcset="{{back_image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{back_image_hd_src}}">
			<img loading="lazy" src="{{back_image_src}}" alt="{{back_image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_71_157">
			{{php}}<?php

			if( !empty( $title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
			{{php}}<?php

			}

			if( !empty( $subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $posts_blog ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{posts_loop_start}}<?php

				$cont = 0;

				foreach( $posts_blog as $post ) {

					$post_id = $post['post_id'];
					$post = get_post( $post_id );

					$post_title = get_the_title( $post_id );
					$post_url   = get_permalink( $post_id );

					$post_excerpt = get_the_excerpt( $post_id );

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
						<figure class="ecode_false_link" data-link="h3">
							<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
							<div class="back_info"{{builder}} data-edit="back_info"{{/builder}}>
								<span class="back_info_title"{{builder}} data-edit="back_info_title"{{/builder}}>{{post_title}}</span>
							</div>
						</figure>
					</div>
					<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
						<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
						{{php}}<?php

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

				?>{{/posts_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s71_t157 = document.getElementsByClassName( 'ecode_section_71_template_157' );
		for (var i = 0; i < array_s71_t157.length; i++) {
			array_articles = array_s71_t157[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
