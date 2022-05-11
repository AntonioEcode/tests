{{php}}<?php

$current_id = wpeb_get_id();

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

if( !empty( $posts_blog ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_87_template_103"{{builder}} data-edit="ecode_section_87_template_103"{{/builder}}>
		<div class="ecode_width_87_103">
			{{posts_loop_start}}<?php

			$cont = 0;

			foreach( $posts_blog as $post ) {

				$post_id = $post['post_id'];
				$post = get_post( $post_id );

				$post_title       = get_the_title( $post_id );
				$post_url         = get_permalink( $post_id );
				$post_date        = new DateTime( $post->post_date );
				$format_post_date = strftime( "%d %B, %Y", $post_date->getTimestamp() );
				$post_excerpt     = get_the_excerpt( $post_id );
				$post_categories  = wp_get_post_categories( $post_id );

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

				$copy_read_more = __( 'Leer más', 'frontecode' );

			?>{{/posts_loop_start}}
			<article class="ecode_article">
				<p class="ecode_category_date"{{builder}} data-edit="ecode_category_date *"{{/builder}}>
					{{php}}{{copy_categories}}{{/php}}{{builder}}
					<a href="#">Laboratory</a>{{/builder}}
					<span>{{format_post_date}}</span>
				</p>
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
				<p class="ecode_article_text"{{builder}} data-edit="ecode_article_text"{{/builder}}>{{post_excerpt}}</p>
				<span class="ecode_article_button"{{builder}} data-edit="ecode_article_button"{{/builder}}>{{copy_read_more}}</span>
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
		array_s87_t103 = document.getElementsByClassName( 'ecode_section_87_template_103' );
		for (var i = 0; i < array_s87_t103.length; i++) {
			array_articles = array_s87_t103[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
{{php}}<?php

}

?>{{/php}}
