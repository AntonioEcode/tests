{{php}}<?php

$current_id = wpeb_get_id();

$title    = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$subtitle = apply_filters( 'the_content', $card_description );

$button_1_text = get_post_meta( $current_id, '_{{template_name}}_button_1_text_{{page_section_id}}', TRUE );
$button_1_url  = get_post_meta( $current_id, '_{{template_name}}_button_1_url_{{page_section_id}}', TRUE );

$button_2_text = get_post_meta( $current_id, '_{{template_name}}_button_2_text_{{page_section_id}}', TRUE );
$button_2_url  = get_post_meta( $current_id, '_{{template_name}}_button_2_url_{{page_section_id}}', TRUE );
$button_2_url  = !empty( $button_2_url ) ? $button_2_url : get_permalink( get_option( 'page_for_posts' ) );

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
	<section class="ecode_section_66_template_77"{{builder}} data-edit="ecode_section_66_template_77"{{/builder}}>
		<div class="ecode_width_66_77">
			<section class="ecode_titles">
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

				if( !empty( $button_1_text ) && !empty( $button_1_url ) ) {

				?>{{/php}}
				<a href="{{button_1_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_1_text}}<svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-109.000000, -11.000000)" fill="#ffffff"><g transform="translate(109.000000, 11.000000)"><ellipse cx="19.826087" cy="8.86956522" rx="9.04347826" ry="8.86956522"></ellipse><path d="M0.743843478,15.8842211 C0.277904348,16.1276158 0,16.5275714 0,16.9547928 L0,19.8546013 L0,31.1429713 L0,33.8873477 C0,34.4303183 0.446928261,34.916326 1.12141087,35.1069258 L18.4347826,40 L18.4347826,20.2852961 L2.33511087,15.7352147 C1.80430435,15.5850793 1.20966739,15.6407397 0.743843478,15.8842211 Z"></path><path d="M40,25.2646112 C40,24.7979615 40,21.5729113 40,20.8211497 L40,19.8546013 L40,16.9547928 C40,16.5275714 39.7220957,16.1276158 39.2561565,15.8842211 C38.7902174,15.6407397 38.1954652,15.5850793 37.6648891,15.7352147 L21.5652174,20.2852961 L21.5652174,40 L38.8785891,35.1069258 C39.5530717,34.916326 40,34.4303183 40,33.8873477 L40,31.1429713 C40,27.8123394 40,25.852886 40,25.2646112 Z"></path></g></g></g></svg></a>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			{{php}}<?php

			if( !empty( $featured_post_id ) || !empty( $posts_blog ) ) {

			?>{{/php}}
			<section class="ecode_list_sidebar">
				<section class="ecode_list">
					{{php}}<?php

					if( !empty( $featured_post_id ) ) {

						$featured_post = get_post( $post_id );

						$featured_post_url          = get_permalink( $featured_post_id );
						$featured_post_title        = get_the_title( $featured_post_id );
						$featured_post_thumbnail_id = get_post_thumbnail_id( $featured_post_id );
						$featured_post_excerpt      = get_the_excerpt( $featured_post_id );
						$featured_copy_read_more    = __( 'Leer más >', 'frontecode' );
						$featured_post_author       = get_the_author_meta( 'display_name', $featured_post->post_author );
						$featured_copy_author       = __( 'Por', 'frontecode' ) . ' ' . $featured_post_author;
						$featured_post_date         = new DateTime( $featured_post->post_date );
						$featured_format_post_date  = strftime( "%d %B, %Y", $featured_post_date->getTimestamp() );

						$featured_post_comments_number = get_comments_number( $featured_post_id );

						if( !empty( $featured_post_thumbnail_id ) ) {

							$featured_post_thumbnail_src = wp_get_attachment_image_src( $featured_post_thumbnail_id, 'full' )[0];
							$featured_post_thumbnail_alt = get_post_meta( $featured_post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
							$featured_post_thumbnail_alt = !empty( $featured_post_thumbnail_alt ) ? $featured_post_thumbnail_alt : $featured_post_title;

						} else {

							$featured_post_thumbnail_src = default_image_post( 'url' );
							$featured_post_thumbnail_alt = $featured_post_title;

						}

					?>{{/php}}
					<article class="ecode_article_featured">
						{{php}}<?php

						if( !empty( $featured_post_thumbnail_src ) ) {

						?>{{/php}}
						<div class="ecode_featured_figure"{{builder}} data-edit="ecode_featured_figure"{{/builder}}>
							<figure class="ecode_false_link" data-link="h3" data-title="{{featured_post_title}}">
								<img loading="lazy" src="{{featured_post_thumbnail_src}}" alt="{{featured_post_thumbnail_alt}}">
							</figure>
						</div>
						{{php}}<?php

						}

						?>{{/php}}
						<div class="ecode_featured_info"{{builder}} data-edit="ecode_featured_info"{{/builder}}>
							<h3 class="ecode_featured_title"{{builder}} data-edit="ecode_featured_title"{{/builder}}><a href="{{featured_post_url}}">{{featured_post_title}}</a></h3>
							<p class="ecode_featured_author_date"{{builder}} data-edit="ecode_featured_author_date"{{/builder}}>
								<span class="ecode_featured_author">{{featured_copy_author}}</span>
								<time class="ecode_featured_date"{{builder}} data-edit="ecode_featured_date"{{/builder}}> | {{featured_format_post_date}}</time>
							</p>
							{{php}}<?php

							if( !empty( $featured_post_excerpt ) ) {

							?>{{/php}}
							<p class="ecode_featured_excerpt"{{builder}} data-edit="ecode_featured_excerpt"{{/builder}}>{{featured_post_excerpt}}</p>
							{{php}}<?php

							}

							?>{{/php}}
							<div class="ecode_featured_button_comments">
								<span class="ecode_button_read_more ecode_false_link" data-link="h3_parent"{{builder}} data-edit="ecode_button_read_more"{{/builder}}>{{featured_copy_read_more}}</span>
								{{php}}<a href="{{featured_post_url}}" class="ecode_button_comments"><svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-171.000000, -11.000000)" fill="#333333"><g transform="translate(171.000000, 11.000000)"><path d="M8.851875,30.9483112 C5.61710937,27.7390309 3.63921875,23.5802557 3.18,19.0941446 C1.46078125,21.2893782 0.52859375,23.9818497 0.532890625,26.8076073 C0.53578125,28.6455177 0.9453125,30.472459 1.72132812,32.1245265 L0.121171875,36.8283617 C-0.15390625,37.6369949 0.04703125,38.5149937 0.645625,39.1197128 C1.066875,39.5452178 1.62226562,39.7718592 2.1934375,39.7718592 C2.43375,39.7718592 2.676875,39.7317708 2.91398437,39.6494634 L7.5709375,38.033065 C9.20648438,38.8169192 11.0151563,39.2305871 12.8346875,39.2335069 C15.6869531,39.2373737 18.4015625,38.2598643 20.5972656,36.4582544 C16.1822656,36.0547664 12.06375,34.1347854 8.851875,30.9483112 Z"></path><path d="M39.8559375,31.3953598 L37.5327344,24.5659722 C38.6525781,22.2536301 39.244375,19.681976 39.2483594,17.0944602 C39.2552344,12.5953283 37.5319531,8.34130366 34.3958594,5.1160827 C31.2591406,1.89015152 27.0792969,0.0743371212 22.6261719,0.00307765152 C18.0085937,-0.0707070707 13.6682812,1.70344066 10.4052344,4.99936869 C7.1421875,8.29537563 5.38546875,12.6794508 5.45859375,17.3439078 C5.52914062,21.841935 7.32679687,26.0640783 10.5203125,29.2324811 C13.7070312,32.3940972 17.9078125,34.1343119 22.3524219,34.134154 C22.3611719,34.134154 22.3703906,34.134154 22.3789844,34.134154 C24.9407031,34.1301294 27.4866406,33.5323548 29.7758594,32.4011995 L36.5371094,34.7479482 C36.8188281,34.8457229 37.1077344,34.893387 37.3932812,34.893387 C38.0720312,34.893387 38.7320312,34.6241319 39.2327344,34.1182923 C39.9440625,33.3997001 40.1828125,32.3564552 39.8559375,31.3953598 Z"></path></g></g></g></svg>{{featured_post_comments_number}}</a>{{/php}}
								{{builder}}<a href="#" class="ecode_button_comments" data-edit="ecode_button_comments"><svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-171.000000, -11.000000)" fill="#333333"><g transform="translate(171.000000, 11.000000)"><path d="M8.851875,30.9483112 C5.61710937,27.7390309 3.63921875,23.5802557 3.18,19.0941446 C1.46078125,21.2893782 0.52859375,23.9818497 0.532890625,26.8076073 C0.53578125,28.6455177 0.9453125,30.472459 1.72132812,32.1245265 L0.121171875,36.8283617 C-0.15390625,37.6369949 0.04703125,38.5149937 0.645625,39.1197128 C1.066875,39.5452178 1.62226562,39.7718592 2.1934375,39.7718592 C2.43375,39.7718592 2.676875,39.7317708 2.91398437,39.6494634 L7.5709375,38.033065 C9.20648438,38.8169192 11.0151563,39.2305871 12.8346875,39.2335069 C15.6869531,39.2373737 18.4015625,38.2598643 20.5972656,36.4582544 C16.1822656,36.0547664 12.06375,34.1347854 8.851875,30.9483112 Z"></path><path d="M39.8559375,31.3953598 L37.5327344,24.5659722 C38.6525781,22.2536301 39.244375,19.681976 39.2483594,17.0944602 C39.2552344,12.5953283 37.5319531,8.34130366 34.3958594,5.1160827 C31.2591406,1.89015152 27.0792969,0.0743371212 22.6261719,0.00307765152 C18.0085937,-0.0707070707 13.6682812,1.70344066 10.4052344,4.99936869 C7.1421875,8.29537563 5.38546875,12.6794508 5.45859375,17.3439078 C5.52914062,21.841935 7.32679687,26.0640783 10.5203125,29.2324811 C13.7070312,32.3940972 17.9078125,34.1343119 22.3524219,34.134154 C22.3611719,34.134154 22.3703906,34.134154 22.3789844,34.134154 C24.9407031,34.1301294 27.4866406,33.5323548 29.7758594,32.4011995 L36.5371094,34.7479482 C36.8188281,34.8457229 37.1077344,34.893387 37.3932812,34.893387 C38.0720312,34.893387 38.7320312,34.6241319 39.2327344,34.1182923 C39.9440625,33.3997001 40.1828125,32.3564552 39.8559375,31.3953598 Z"></path></g></g></g></svg>3</a>{{/builder}}
							</div>
						</div>
					</article>
					{{php}}<?php

					}

					if( !empty( $posts_blog ) ) {

					?>{{/php}}
					{{posts_loop_start}}<?php

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
							$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

						} else {

							$post_thumbnail_src = default_image_post( 'url' );
							$post_thumbnail_alt = $post_title;

						}

					?>{{/posts_loop_start}}
					<article class="ecode_article">
						<div class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
							<figure class="ecode_false_link" data-link="h3" data-title="{{post_title}}">
								<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
							</figure>
						</div>
						<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
							<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
							<p class="ecode_article_author_date"{{builder}} data-edit="ecode_article_author_date"{{/builder}}>
								<span class="ecode_article_author">{{copy_author}}</span>
								<time class="ecode_article_date"{{builder}} data-edit="ecode_article_date"{{/builder}}> | {{format_post_date}}</time>
							</p>
						</div>
					</article>
					{{posts_loop_end}}<?php

						$cont++;

						if( $cont == 6 ) { break; }

					}

					wp_reset_postdata();

					?>{{/posts_loop_end}}
					{{php}}<?php

					}

					if( !empty( $button_2_text ) && !empty( $button_2_url ) ) {

					?>{{/php}}
					<a href="{{button_2_url}}" class="button_view_posts"{{builder}} data-edit="button_view_posts"{{/builder}}>{{button_2_text}}</a>
					{{php}}<?php

					}

					?>{{/php}}
				</section>
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s66_t77 = document.getElementsByClassName( 'ecode_section_66_template_77' );
		for (var i = 0; i < array_s66_t77.length; i++) {
			array_articles = array_s66_t77[i].querySelectorAll( '.ecode_article, .ecode_article_featured' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
