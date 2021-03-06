{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$copy_without_notice = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_149_template_232">
		<div id="ecode_width_149_232" class="ecode_width_149_232">
			<section class="ecode_articles">
				{{posts_loop_start}}<?php

				if( have_posts() ) {

					while( have_posts() ) {

						the_post();

						$post_id = get_the_ID();
						$post = get_post( $post_id );

						$post_url             = get_permalink();
						$post_title           = get_the_title();
						$post_thumbnail_id    = get_post_thumbnail_id();
						$post_excerpt         = get_the_excerpt();
						$post_date            = new DateTime( $post->post_date );
						$format_post_date     = strftime( "%d de %B, %Y", $post_date->getTimestamp() );
						$copy_read_more       = __( 'Leer más >', 'frontecode' );
						$post_number_comments = get_comments_number();

						$copy_number_comments = $post_number_comments . ' ';
						$copy_number_comments .= $post_number_comments == 1 ? __( 'comentario', 'frontecode' ) : __( 'comentarios', 'frontecode' );

						if( !empty( $post_thumbnail_id ) ) {

							$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
							$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
							$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

							$post_thumbnail_mobile_src = wp_get_attachment_image_src( $post_thumbnail_id, 'medium_large' )[0];
							$post_thumbnail_mobile_src = empty( $post_thumbnail_mobile_src ) ? $post_thumbnail_src : $post_thumbnail_mobile_src;

						} else {

							$post_thumbnail_src = default_image_post( 'url' );
							$post_thumbnail_mobile_src = default_image_post( 'url' );
							$post_thumbnail_alt = $post_title;

						}

				?>{{/posts_loop_start}}
				<article class="ecode_article">
					<picture class="ecode_article_image ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						<source media="(min-width:768px)" srcset="{{post_thumbnail_src}}">
						<img loading="lazy" src="{{post_thumbnail_mobile_src}}" alt="{{post_thumbnail_alt}}">
					</picture>
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
					<p class="ecode_article_time_comments">
						<time class="ecode_article_time"{{builder}} data-edit="ecode_article_time"{{/builder}}>{{format_post_date}}</time> ·
						<span class="ecode_article_comments"{{builder}} data-edit="ecode_article_comments"{{/builder}}>{{copy_number_comments}}</span>
					</p>
					<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{post_excerpt}}</p>
					<span class="ecode_article_read_more ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_read_more"{{/builder}}>{{copy_read_more}}</span>
				</article>
				{{posts_loop_end}}<?php

					}

				} else {

				?>
				<h2>{{copy_without_notice}}</h2>
				<?php

				}

				?>{{/posts_loop_end}}
				<div class="ecode_container_pagination">
					{{php}}<?php

					$args_pagination = array(
						'prev_text' => __( '< Anteriores', 'frontecode' ),
						'next_text' => __( 'Siguientes >', 'frontecode' ),
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
			<aside id="ecode_sidebars_149_232" class="ecode_sidebars">
				{{php}}<?php

				dynamic_sidebar( 'ecoded_sidebar_blog' );

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
					<h3 class="ecode_sidebar_title">Connect with Us</h3>
					<div class="ecode_social">
						<a href="#" class="ecode_sidebar_follow_us_twitter"><!-- Twitter -->
							<i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#6B6B6B"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#" class="ecode_sidebar_follow_us_facebook"><!-- Facebook -->
							<i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#6B6B6B"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#" class="ecode_sidebar_follow_us_instagram"><!-- Instagram -->
							<i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#6B6B6B"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i>
						</a>
						<a href="#" class="ecode_sidebar_follow_us_linkedin"><!-- Linkedin -->
							<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#6B6B6B"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#" class="ecode_sidebar_follow_us_pinterest"><!-- Pinterest -->
							<i><svg width="37px" height="50px" viewBox="0 0 37 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-591.000000, -83.000000)" fill="#6B6B6B"><g transform="translate(591.875000, 83.000000)"><path d="M15,32.7777778 C14.8511905,33.1845238 14.8115079,33.5813492 14.7222222,33.9583333 C14.3353175,35.515873 14.0376984,37.093254 13.6607143,38.6507937 C13.3730159,39.8313492 13.0654762,41.0218254 12.6488095,42.172619 C12.2916667,43.1845238 11.8055556,44.1666667 11.3194444,45.1289683 C10.5654762,46.6468254 9.64285714,48.0753968 8.64087302,49.4345238 C8.47222222,49.6626984 8.38293651,50.0595238 8.03571429,49.9702381 C7.61904762,49.8611111 7.68849206,49.4345238 7.64880952,49.0972222 C7.36111111,46.9444444 7.28174603,44.7916667 7.35119048,42.6289683 C7.39087302,41.4980159 7.43055556,40.3472222 7.70833333,39.2460317 C7.99603175,38.125 8.20436508,36.984127 8.47222222,35.8630952 C8.66071429,35.0694444 8.83928571,34.2559524 8.95833333,33.4424603 C9.06746032,32.6785714 9.36507937,31.9444444 9.48412698,31.1904762 C9.64285714,30.1686508 9.93055556,29.1765873 10.1388889,28.1646825 C10.327381,27.2519841 10.5654762,26.3392857 10.7539683,25.4265873 C10.8829365,24.8015873 11.0119048,24.1865079 11.1805556,23.5714286 C11.2599206,23.2738095 11.2003968,22.9563492 11.0515873,22.6289683 C10.6547619,21.7559524 10.5654762,20.7936508 10.4265873,19.8611111 C10.2480159,18.6607143 10.3472222,17.4503968 10.6349206,16.2797619 C11.0813492,14.484127 11.7956349,12.8373016 13.452381,11.765873 C15.2876984,10.5853175 17.8769841,11.1210317 18.6904762,13.2738095 C19.2063492,14.6626984 19.0972222,16.031746 18.8988095,17.4404762 C18.7301587,18.6607143 18.3630952,19.8313492 18.0257937,21.0019841 C17.7579365,21.9047619 17.4702381,22.8075397 17.2420635,23.7202381 C17.0634921,24.4642857 16.7261905,25.1984127 16.765873,25.9920635 C16.7857143,26.4285714 16.6865079,26.8551587 16.7162698,27.3115079 C16.8253968,29.0873016 17.8373016,30.2083333 19.3253968,30.8829365 C20.1587302,31.2599206 21.1210317,31.2797619 22.093254,31.031746 C23.1150794,30.7738095 23.9583333,30.297619 24.7519841,29.672619 C25.6547619,28.9583333 26.2698413,28.0059524 26.8650794,27.0535714 C27.4801587,26.0714286 27.8869048,24.9702381 28.234127,23.8690476 C28.6805556,22.4206349 28.9880952,20.922619 29.1964286,19.4047619 C29.3551587,18.2142857 29.3551587,17.0337302 29.3849206,15.8531746 C29.4345238,13.6805556 28.8789683,11.6468254 27.8373016,9.78174603 C27.1924603,8.62103175 26.2301587,7.70833333 25.1289683,6.9047619 C24.2063492,6.24007937 23.1746032,5.89285714 22.172619,5.46626984 C21.8353175,5.31746032 21.4484127,5.29761905 21.0912698,5.20833333 C19.9206349,4.92063492 18.7103175,4.94047619 17.5198413,4.99007937 C16.0515873,5.04960317 14.6329365,5.36706349 13.2738095,5.92261905 C11.8353175,6.51785714 10.5456349,7.36111111 9.43452381,8.44246032 C8.27380952,9.52380952 7.36111111,10.8134921 6.6468254,12.2519841 C6.09126984,13.3829365 5.68452381,14.593254 5.49603175,15.8134921 C5.26785714,17.3313492 5.08928571,18.859127 5.37698413,20.4265873 C5.55555556,21.4285714 5.87301587,22.3710317 6.2797619,23.2837302 C6.46825397,23.7103175 6.76587302,24.0972222 7.08333333,24.4444444 C7.45039683,24.8511905 7.50992063,25.297619 7.41071429,25.7738095 C7.24206349,26.6071429 7.03373016,27.4404762 6.82539683,28.2638889 C6.66666667,28.8988095 5.94246032,29.1865079 5.32738095,28.8789683 C3.46230159,27.9166667 2.13293651,26.4583333 1.29960317,24.5337302 C0.535714286,22.7579365 0.0992063492,20.9027778 0.0892857143,18.9484127 C0.0793650794,17.5793651 -1.41553436e-15,16.2003968 0.317460317,14.8611111 C0.56547619,13.7797619 0.853174603,12.718254 1.25,11.6765873 C1.75595238,10.3472222 2.43055556,9.13690476 3.20436508,7.95634921 C4.35515873,6.19047619 5.84325397,4.73214286 7.54960317,3.50198413 C8.84920635,2.55952381 10.2678571,1.78571429 11.765873,1.25 C12.7083333,0.912698413 13.6805556,0.66468254 14.672619,0.456349206 C16.4484127,0.0992063492 18.2242063,-0.0297619048 20.0099206,0.0297619048 C20.9722222,0.0595238095 21.9146825,0.297619048 22.8670635,0.436507937 C24.156746,0.634920635 25.327381,1.12103175 26.4980159,1.62698413 C27.281746,1.96428571 28.0257937,2.41071429 28.7400794,2.8968254 C29.8710317,3.66071429 30.8829365,4.56349206 31.7857143,5.57539683 C32.8571429,6.76587302 33.6904762,8.11507937 34.375,9.5734127 C34.7123016,10.2777778 34.9404762,11.0218254 35.2579365,11.7361111 C35.3968254,12.0436508 35.4365079,12.4206349 35.4861111,12.7678571 C35.5753968,13.343254 35.6448413,13.9384921 35.7638889,14.4940476 C36.0119048,15.6646825 35.922619,16.8253968 35.8829365,17.9761905 C35.8531746,18.9583333 35.7738095,19.9503968 35.5456349,20.922619 C35.4365079,21.3789683 35.4662698,21.8452381 35.3472222,22.3214286 C35.1488095,23.0853175 34.9702381,23.859127 34.7619048,24.6230159 C34.4444444,25.8134921 33.9781746,26.9444444 33.4325397,28.0357143 C32.2619048,30.3968254 30.7142857,32.4603175 28.5019841,33.9781746 C27.718254,34.5138889 26.9047619,34.9900794 26.0218254,35.3373016 C24.077381,36.0813492 22.0436508,36.4087302 19.9900794,36.0019841 C18.0952381,35.625 16.468254,34.702381 15.297619,33.0853175 C15.2281746,32.9563492 15.1190476,32.8869048 15,32.7777778 Z"></path></g></g></g></svg></i>
						</a>
						<a href="#" class="ecode_sidebar_follow_us_youtube"><!-- Youtube -->
							<i><svg width="50px" height="36px" viewBox="0 0 50 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-284.000000, -86.000000)" fill="#6B6B6B" fill-rule="nonzero"><g id="icon_youtube" transform="translate(284.000000, 86.000000)"><path d="M39.5299784,0.0425324675 L10.3619048,0.0425324675 C4.63917749,0.0425324675 0,4.68170996 0,10.4044372 L0,24.9853896 C0,30.7081169 4.63917749,35.3472944 10.3619048,35.3472944 L39.5299784,35.3472944 C45.2527056,35.3472944 49.8918831,30.7081169 49.8918831,24.9853896 L49.8918831,10.4044372 C49.8918831,4.68170996 45.2527056,0.0425324675 39.5299784,0.0425324675 Z M32.5222944,18.404329 L18.8794372,24.9111472 C18.5159091,25.0845238 18.0959957,24.8194805 18.0959957,24.4167749 L18.0959957,10.9964286 C18.0959957,10.587987 18.5269481,10.3232684 18.8912338,10.5079004 L32.5340909,17.4214286 C32.9397186,17.6269481 32.932684,18.208658 32.5222944,18.404329 Z"></path></g></g></g></svg></i>
						</a>
					</div>
				</section>
				<section class="ecode_sidebar ecode_sidebar_tags">
					<h3 class="ecode_sidebar_title">Tags</h3>
					<ul>
						<li>
							<a href="#">entrepreneur</a>
						</li>
						<li>
							<a href="#">freelance</a>
						</li>
						<li>
							<a href="#">technology</a>
						</li>
					</ul>
				</section>{{/builder}}
			</aside>
		</div>
	</section>
</section>
