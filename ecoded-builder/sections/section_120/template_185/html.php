{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$copy_without_notice = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_120_template_185"{{builder}} data-edit="ecode_section_120_template_185"{{/builder}}>
		<div class="ecode_width_120_185">
			<section>
				{{posts_loop_start}}<?php

				if( have_posts() ) {

					while( have_posts() ) {

						the_post();

						$post_id = get_the_ID();
						$post = get_post( $post_id );

						$post_url          = get_permalink();
						$post_title        = get_the_title();
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_author       = get_the_author_meta( 'display_name', $post->post_author );
						$copy_author       = __( 'Por', 'frontecode' ) . ' ' . $post_author . ' ';
						$post_date         = new DateTime( $post->post_date );
						$format_post_date  = ' ' . strftime( "%d %B, %Y", $post_date->getTimestamp() ) . ' ';
						$post_categories   = wp_get_post_categories( $post_id );

						if( !empty( $post_thumbnail_id ) ) {

							$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
							$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
							$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

						} else {

							$post_thumbnail_src = default_image_post( 'url' );
							$post_thumbnail_alt = $post_title;

						}

						$copy_categories = '';

						if( !empty( $post_categories ) ) {

							$copy_categories = ' ' . __( 'Categorías', 'frontecode' ) . ': ';

							for( $i = 0; $i < count( $post_categories ); $i++ ) {

								$cat = get_category( $post_categories[$i] );

								$copy_categories .= '<a href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

								if( $i < ( count( $post_categories ) - 1 ) ) {

									$copy_categories .= ', ';

								}

							}

						}

				?>{{/posts_loop_start}}
				<article>
					<figure class="ecode_false_link ecode_article_figure" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
					</figure>
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
					{{php}}<p class="ecode_article_info">{{copy_author}}|{{format_post_date}}|{{copy_categories}}</p>{{/php}}{{builder}}
					<p class="ecode_article_info" data-edit="ecode_article_info">Por Chicote | 7 de Julio 2021 | Categorías: <a href="#">Noticias</a></p>{{/builder}}
				</article>
				{{posts_loop_end}}<?php

					}

				} else {

				?>
				<h2>{{copy_without_notice}}</h2>
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

				?>{{/php}}{{builder}}
				<a class="prev page-numbers" href="#">Anteriores</a>
				<span class="page-numbers current">1</span>
				<a class="page-numbers" href="#">2</a>
				<a class="page-numbers" href="#">3</a>
				<a class="next page-numbers" href="#">Siguientes</a>{{/builder}}
			</div>
		</div>
	</section>
</section>
