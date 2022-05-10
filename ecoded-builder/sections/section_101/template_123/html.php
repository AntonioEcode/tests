{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_url             = get_permalink();
$post_title           = get_the_title();
$post_content         = apply_filters( 'the_content', get_the_content() );
$post_thumbnail_id    = get_post_thumbnail_id();
$post_excerpt         = get_the_excerpt();
$post_author          = get_the_author_meta( 'display_name', $post->post_author );
$copy_author          = __( 'Por', 'frontecode' ) . ' ' . $post_author;
$post_date            = new DateTime( $post->post_date );
$format_post_date     = strftime( "%d %B %Y", $post_date->getTimestamp() );
$post_number_comments = get_comments_number();
$post_categories      = wp_get_post_categories( $post_id );
$copy_read_more       = __( 'Leer más >', 'frontecode' );

if( !empty( $post_thumbnail_id ) ) {

	$post_thumbnail_mobile_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
	$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0];
	$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
	$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

} else {

	$post_thumbnail_mobile_src = default_image_post( 'url' );
	$post_thumbnail_src = default_image_post( 'url' );
	$post_thumbnail_alt = $post_title;

}

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

$twitter_url   = 'https://twitter.com/intent/tweet/?text=' . $post_title . '&url=' . $post_url;
$facebook_url  = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
$linkedin_url  = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $post_url . '&title=' . $post_title . '&summary=' . $post_title . '&source=' . $post_url;
$pinterest_url = 'https://www.pinterest.es/pin/create/bookmarklet/?url=' . $post_url . '&media=' . $thumbnail_url . '&description=' . $post_title;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_101_template_123">
		<div class="ecode_width_101_123">
			<section class="section_post">
				{{php}}<?php

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<picture>
					<source media="(min-width:1024px)" srcset="{{post_thumbnail_src}}">
					<img loading="lazy" src="{{post_thumbnail_mobile_src}}" alt="{{post_thumbnail_alt}}">
				</picture>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_date_cat_tag">
					<time>{{format_post_date}}</time> /
					<p>{{copy_categories}}</p>{{builder}}
					<p><a href="#">Care</a>, <a href="#">Medicine</a></p>{{/builder}}
				</div>
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{post_title}}</h1>
				<div class="ecode_container_content">
					{{php}}{{post_content}}{{/php}}{{builder}}
					<p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet  ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore</p>
					<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt.</p>{{/builder}}
				</div>
				<div class="ecode_shared_author_comments">
					<div class="ecode_shared">
						<a href="{{twitter_url}}"><!-- Twitter -->
							<i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#333333"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i>
						</a>
						<a href="{{facebook_url}}"><!-- Facebook -->
							<i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#333333"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i>
						</a>
						<a href="{{linkedin_url}}"><!-- Linkedin -->
							<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#333333"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i>
						</a>
						<a href="{{pinterest_url}}"><!-- Pinterest -->
							<i><svg width="14px" height="16px" viewBox="0 0 14 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-72.000000, -23.000000)" fill="#333333"><g transform="translate(72.000000, 23.000000)"><path d="M6.884,-5.92118946e-16 C2.498,0.000666666667 0.166666667,2.81066667 0.166666667,5.87466667 C0.166666667,7.29533333 0.960666667,9.068 2.232,9.63 C2.59466667,9.79333333 2.54666667,9.594 2.85866667,8.40066667 C2.88333333,8.30133333 2.87066667,8.21533333 2.79066667,8.12266667 C0.973333333,6.02066667 2.436,1.69933333 6.62466667,1.69933333 C12.6866667,1.69933333 11.554,10.0873333 7.67933333,10.0873333 C6.68066667,10.0873333 5.93666667,9.30333333 6.172,8.33333333 C6.45733333,7.178 7.016,5.936 7.016,5.10333333 C7.016,3.00466667 3.88933333,3.316 3.88933333,6.09666667 C3.88933333,6.956 4.19333333,7.536 4.19333333,7.536 C4.19333333,7.536 3.18733333,11.6 3.00066667,12.3593333 C2.68466667,13.6446667 3.04333333,15.7253333 3.07466667,15.9046667 C3.094,16.0033333 3.20466667,16.0346667 3.26666667,15.9533333 C3.366,15.8233333 4.582,14.0886667 4.92266667,12.8346667 C5.04666667,12.378 5.55533333,10.5246667 5.55533333,10.5246667 C5.89066667,11.13 6.85733333,11.6366667 7.88733333,11.6366667 C10.9513333,11.6366667 13.166,8.94333333 13.166,5.60133333 C13.1553333,2.39733333 10.4133333,-1.77635684e-15 6.884,-5.92118946e-16 Z"></path></g></g></g></svg></i>
						</a>
					</div>
					<div class="ecode_author_comments">
						<p class="ecode_author"{{builder}} data-edit="ecode_author"{{/builder}}>{{copy_author}}</p>
						<a href="{{post_url}}" class="ecode_comments"{{builder}} data-edit="ecode_comments"{{/builder}}><i><svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-171.000000, -11.000000)" fill="#333333"><g transform="translate(171.000000, 11.000000)"><path d="M8.851875,30.9483112 C5.61710937,27.7390309 3.63921875,23.5802557 3.18,19.0941446 C1.46078125,21.2893782 0.52859375,23.9818497 0.532890625,26.8076073 C0.53578125,28.6455177 0.9453125,30.472459 1.72132812,32.1245265 L0.121171875,36.8283617 C-0.15390625,37.6369949 0.04703125,38.5149937 0.645625,39.1197128 C1.066875,39.5452178 1.62226562,39.7718592 2.1934375,39.7718592 C2.43375,39.7718592 2.676875,39.7317708 2.91398437,39.6494634 L7.5709375,38.033065 C9.20648438,38.8169192 11.0151563,39.2305871 12.8346875,39.2335069 C15.6869531,39.2373737 18.4015625,38.2598643 20.5972656,36.4582544 C16.1822656,36.0547664 12.06375,34.1347854 8.851875,30.9483112 Z"></path><path d="M39.8559375,31.3953598 L37.5327344,24.5659722 C38.6525781,22.2536301 39.244375,19.681976 39.2483594,17.0944602 C39.2552344,12.5953283 37.5319531,8.34130366 34.3958594,5.1160827 C31.2591406,1.89015152 27.0792969,0.0743371212 22.6261719,0.00307765152 C18.0085937,-0.0707070707 13.6682812,1.70344066 10.4052344,4.99936869 C7.1421875,8.29537563 5.38546875,12.6794508 5.45859375,17.3439078 C5.52914062,21.841935 7.32679687,26.0640783 10.5203125,29.2324811 C13.7070312,32.3940972 17.9078125,34.1343119 22.3524219,34.134154 C22.3611719,34.134154 22.3703906,34.134154 22.3789844,34.134154 C24.9407031,34.1301294 27.4866406,33.5323548 29.7758594,32.4011995 L36.5371094,34.7479482 C36.8188281,34.8457229 37.1077344,34.893387 37.3932812,34.893387 C38.0720312,34.893387 38.7320312,34.6241319 39.2327344,34.1182923 C39.9440625,33.3997001 40.1828125,32.3564552 39.8559375,31.3953598 Z"></path></g></g></g></svg></i>{{post_number_comments}}</a>
					</div>
				</div>
			</section>
			<section class="ecode_sidebars">
				{{php}}<?php

					dynamic_sidebar( 'ecoded_sidebar_posts' );

				?>{{/php}}{{builder}}
				<section class="ecode_sidebar ecode_sidebar_posts">
					<h3 class="ecode_sidebar_title">Related Posts</h3>
					<article>
						<figure class="ecode_false_link" data-link="h3">
							<img src="{{sidebar_image_src}}" alt="Alt image">
						</figure>
						<h3><a href="#">Medical Research</a></h3>
						<time>12 Abril, 2017</time>
					</article>
					<article>
						<figure class="ecode_false_link" data-link="h3">
							<img src="{{sidebar_image_src}}" alt="Alt image">
						</figure>
						<h3><a href="#">Achieving Better Health</a></h3>
						<time>12 Abril, 2017</time>
					</article>
					<article>
						<figure class="ecode_false_link" data-link="h3">
							<img src="{{sidebar_image_src}}" alt="Alt image">
						</figure>
						<h3><a href="#">Amazing Technology</a></h3>
						<time>12 Abril, 2017</time>
					</article>
				</section>
				<section class="ecode_sidebar ecode_sidebar_follow_us">
					<h3 class="ecode_sidebar_title">Follow Us</h3>
					<div class="ecode_social">
						<a href="#">
							<i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#6B6B6B"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#">
							<i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#6B6B6B"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#">
							<i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#6B6B6B"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i>
						</a>
						<a href="#">
							<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#333333"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i>
						</a>
					</div>
				</section>
				<section class="ecode_sidebar ecode_sidebar_tags">
					<h3 class="ecode_sidebar_title">Tags</h3>
					<ul>
						<li>
							<a href="#">Care</a>
						</li>
						<li>
							<a href="#">Healing</a>
						</li>
						<li>
							<a href="#">Health</a>
						</li>
						<li>
							<a href="#">Hospital</a>
						</li>
						<li>
							<a href="#">Innovation</a>
						</li>
						<li>
							<a href="#">Medicine</a>
						</li>
						<li>
							<a href="#">Treatment</a>
						</li>
					</ul>
				</section>{{/builder}}
			</section>
		</div>
	</section>
</section>
