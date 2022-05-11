{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$copy_read_more = __( 'Seguir leyendo', 'frontecode' );

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_{{page_section_id}}', TRUE );

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
	{{php}}<?php

	if( !empty( $posts_blog ) ) {

	?>{{/php}}
	<section class="ecode_section_96_template_112"{{builder}} data-edit="ecode_section_96_template_112"{{/builder}}>
		<div class="ecode_width_96_112">
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
				<figure class="ecode_false_link ecode_article_figure" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
				</figure>
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
				{{php}}<?php

				if( !empty( $post_excerpt ) ) {

				?>{{/php}}
				<p class="ecode_article_text"{{builder}} data-edit="ecode_article_text"{{/builder}}>{{post_excerpt}}</p>
				{{php}}<?php

				}

				?>{{/php}}
				<span class="ecode_article_button ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_button"{{/builder}}>{{copy_read_more}}</span>
			</article>
			{{posts_loop_end}}<?php

				$cont++;

				if( $cont == 3 ) { break; }

			}

			wp_reset_postdata();

			?>{{/posts_loop_end}}
		</div>
	</section>
	<script type="text/javascript">
		array_s96_t112 = document.getElementsByClassName( 'ecode_section_96_template_112' );
		for (var i = 0; i < array_s96_t112.length; i++) {
			array_articles = array_s96_t112[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
