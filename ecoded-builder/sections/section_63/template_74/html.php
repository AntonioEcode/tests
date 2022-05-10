{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$pretitle      = get_post_meta( $current_id, '_{{template_name}}_pretitle_{{page_section_id}}', TRUE );
$default_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );
$title         = !empty( $custom_title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE ) ) ? $custom_title : $default_title;

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

$hide_date_section = get_post_meta( $current_id, '_{{template_name}}_hide_date_section_{{page_section_id}}', TRUE );
$date_section      = '';

if( !$hide_date_section ) {

	$date_section = get_post_meta( $current_id, '_{{template_name}}_date_section_{{page_section_id}}', TRUE );
	$date_section = !empty( $date_section ) ? date( 'j F, Y', strtotime( $date_section ) ) : date( 'j F, Y' );

}

$hide_posts  = get_post_meta( $current_id, '_{{template_name}}_hide_posts_{{page_section_id}}', TRUE );
$posts_title = '';
$posts_blog  = array();

if( !$hide_posts ) {

	$posts_title = get_post_meta( $current_id, '_{{template_name}}_posts_title_{{page_section_id}}', TRUE );
	$posts_blog  = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

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

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_63_template_74{{builder}} hover_effect{{/builder}}">
		<section class="ecode_image_title">
			{{php}}<?php

			if( !empty( $image_src ) ) {

			?>{{/php}}
			<picture class="ecode_image"{{builder}} data-edit="ecode_image::after"{{/builder}}>
				{{php}}<?php

				if( !empty( $image_hd_src ) ) {

				?>{{/php}}
				<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
				<source media="(min-width:768px)" srcset="{{image_hd_src}}">
				{{php}}<?php

				}

				?>{{/php}}
				<img src="{{image_src}}" alt="{{image_alt}}">
			</picture>
			{{php}}<?php

			}

			?>{{/php}}
			<section class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
				{{php}}<?php

				if( !empty( $pretitle ) ) {

				?>{{/php}}
				<span class="ecode_tag"{{builder}} data-edit="ecode_tag"{{/builder}}>{{pretitle}}</span>
				{{php}}<?php

				}

				if( !empty( $title ) ) {

				?>{{/php}}
				<h1 id="ecode_section_63_template_74_title" class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				}

				if( !$hide_date_section && !empty( $date_section ) ) {

				?>{{/php}}
				<time class="ecode_date"{{builder}} data-edit="ecode_date"{{/builder}}>{{date_section}}</time>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
		</section>
		{{php}}<?php

		if( !$hide_posts && !empty( $posts_blog ) ) {

		?>{{/php}}
		<section class="ecode_articles"{{builder}} data-edit="ecode_articles"{{/builder}}>
			{{php}}<?php

			if( !empty( $posts_title ) ) {

			?>{{/php}}
			<div class="ecode_container_title">
				<h2 class="ecode_articles_title"{{builder}} data-edit="ecode_articles_title"{{/builder}}>{{posts_title}}</h2>
			</div>
			{{php}}<?php

			}

			?>{{/php}}
			{{posts_loop_start}}<?php

			if( !empty( $posts_blog ) ) {

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

					} else {

						$post_thumbnail_src = default_image_post( 'url' );
						$post_thumbnail_alt = $post_title;

					}

			?>{{/posts_loop_start}}
			<article>
				{{php}}<?php

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<div class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<figure class="ecode_false_link" data-link="h3">
						<img src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
						<div class="back_info"{{builder}} data-edit="back_info"{{/builder}}>
							<span class="back_info_title"{{builder}} data-edit="back_info_title"{{/builder}}>{{post_title}}</span>
						</div>
					</figure>
				</div>
				{{php}}<?php

				}

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
				<p class="ecode_article_author_date">
					<span class="ecode_article_author"{{builder}} data-edit="ecode_article_author"{{/builder}}>{{copy_author}}</span>
					<time class="ecode_article_date"{{builder}} data-edit="ecode_article_date"{{/builder}}> | {{format_post_date}}</time>
				</p>
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

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
	array_s63_t74 = document.getElementsByClassName( 'ecode_section_63_template_74' );
	for (var i = 0; i < array_s63_t74.length; i++) {
		array_articles = array_s63_t74[i].querySelectorAll( '.ecode_info, .ecode_articles' );
		for (var j = 0; j < array_articles.length; j++) {
			array_articles[j].classList.add( 'section_hide' );
		}
	}
	</script>
</section>
