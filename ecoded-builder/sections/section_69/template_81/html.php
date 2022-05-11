{{php}}<?php

$current_id = wpeb_get_id();

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '10',
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

$right_content = get_post_meta( $current_id, '_{{template_name}}_right_content_{{page_section_id}}', TRUE );
$right_content = apply_filters( 'the_content', $right_content );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_69_template_81{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_69_template_81"{{/builder}}>
		<div class="ecode_width_69_81">
			{{php}}<?php

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

					if( $cont == 10 ) { break; }

				}

				wp_reset_postdata();

				?>{{/posts_loop_end}}
			</section>
			{{php}}<?php

			}

			if( !empty( $right_content ) ) {

			?>{{/php}}
			<section class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{right_content}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s69_t81 = document.getElementsByClassName( 'ecode_section_69_template_81' );
		for (var i = 0; i < array_s69_t81.length; i++) {
			array_articles = array_s69_t81[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
