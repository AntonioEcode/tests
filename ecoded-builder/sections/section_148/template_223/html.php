{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

$slider_conf = $data->slider_conf;

$slider_class = '';

if( !empty( $slider_conf ) ) {

	$slider_class = 'ecode_articles_148_223 ';

	if( count( $slider_conf ) == 2 ) {

		$slider_class .= 'ecode_articles_148_223_full';

	} else {

		$slider_class .= $slider_conf[0];

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_148_template_223">
		<div class="ecode_width_148_223">
			<section class="ecode_articles{{php}}<?php echo ' ' . $slider_class; ?>{{/php}}">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_name        = $card['card_name'];
					$card_position    = $card['card_position'];
					$card_description = $card['card_description'];
					$card_url         = $card['card_url'];
					$card_facebook    = $card['card_facebook'];
					$card_twitter     = $card['card_twitter'];
					$card_instagram   = $card['card_instagram'];
					$card_linkedin    = $card['card_linkedin'];
					$card_youtube     = $card['card_youtube'];
					$card_additional  = $card['card_additional'];

					// If have specific work ( in this case speakers ) selected
					if( !empty( $card['work_id'] ) ) {

						$speaker_id           = $card['work_id'];
						$speaker_name         = get_the_title( $speaker_id );
						$speaker_link         = get_permalink( $speaker_id );
						$speaker_thumbnail_id = get_post_thumbnail_id( $speaker_id );

						$card_name = !empty( $card_name ) ? $card_name : $speaker_name;
						$card_url  = !empty( $card_url ) ? $card_url : $speaker_link;

						if( empty( $card_image_src ) && !empty( $speaker_thumbnail_id ) ) {

							$card_image_src = wp_get_attachment_image_src( $speaker_thumbnail_id, 'large' )[0];
							$card_image_alt = get_post_meta( $speaker_thumbnail_id, '_wp_attachment_image_alt', TRUE );

						}

					}

					$card_image_alt  = !empty( $card_image_alt ) ? $card_image_alt : $card_name;

				?>{{/cards_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $card_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_article_image ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
						{{php}}<?php

						if( !empty( $card_name ) ) {

						?>{{/php}}
						<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
							{{php}}<?php

							if( !empty( $card_url ) ) {

							?>
							<a href="{{card_url}}">
							<?php

							}

							?>{{/php}}
								{{card_name}}
							{{php}}<?php

							if( !empty( $card_url ) ) {

							?>
							</a>
							<?php

							}

							?>{{/php}}
						</h3>
						{{php}}<?php

						}

						if( !empty( $card_position ) ) {

						?>{{/php}}
						<p class="ecode_article_job"{{builder}} data-edit="ecode_article_job"{{/builder}}>{{card_position}}</p>
						{{php}}<?php

						}

						if( !empty( $card_position ) ) {

						?>{{/php}}
						<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{card_description}}</p>
						{{php}}<?php

						}

						if(
							!empty( $card_facebook ) ||
							!empty( $card_twitter ) ||
							!empty( $card_instagram ) ||
							!empty( $card_linkedin ) ||
							!empty( $card_youtube ) ||
							!empty( $card_additional )
						) {

						?>{{/php}}
						<div class="ecode_article_social">
							{{php}}<?php

							if( !empty( $card_facebook ) ) {

							?>{{/php}}
							<a href="{{card_facebook}}" target="_blank" rel="nofollow noreferrer noopener"><!-- Facebook -->
								<i>
									<svg width="27px" height="50px" viewBox="0 0 27 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g transform="translate(-25.000000, -83.000000)" fill="#888888">
												<g transform="translate(25.000000, 83.000000)">
													<path d="M21.628125,8.30208334 L26.3682692,8.30208334 L26.3682692,0.352083334 C25.5504808,0.24375 22.7379808,0 19.4625,0 C12.628125,0 7.94639422,4.13958334 7.94639422,11.7479167 L7.94639422,18.75 L0.404567306,18.75 L0.404567306,27.6375 L7.94639422,27.6375 L7.94639422,50 L17.1930288,50 L17.1930288,27.6395833 L24.4298077,27.6395833 L25.5786058,18.7520833 L17.1908654,18.7520833 L17.1908654,12.6291667 C17.1930288,10.0604167 17.9112981,8.30208334 21.628125,8.30208334 Z"></path>
												</g>
											</g>
										</g>
									</svg>
								</i>
							</a>
							{{php}}<?php

							}

							if( !empty( $card_twitter ) ) {

							?>{{/php}}
							<a href="{{card_twitter}}" target="_blank" rel="nofollow noreferrer noopener"><!-- Twitter -->
								<i>
									<svg width="50px" height="41px" viewBox="0 0 50 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g transform="translate(-195.000000, -92.000000)" fill="#888888">
												<g transform="translate(195.000000, 92.000000)">
													<path d="M50,4.809375 C48.140625,5.625 46.159375,6.165625 44.09375,6.428125 C46.21875,5.159375 47.840625,3.165625 48.603125,0.7625 C46.621875,1.94375 44.434375,2.778125 42.103125,3.24375 C40.221875,1.240625 37.540625,0 34.615625,0 C28.940625,0 24.371875,4.60625 24.371875,10.253125 C24.371875,11.065625 24.440625,11.846875 24.609375,12.590625 C16.0875,12.175 8.546875,8.090625 3.48125,1.86875 C2.596875,3.403125 2.078125,5.159375 2.078125,7.05 C2.078125,10.6 3.90625,13.746875 6.63125,15.56875 C4.984375,15.5375 3.36875,15.059375 2,14.30625 C2,14.3375 2,14.378125 2,14.41875 C2,19.4 5.553125,23.5375 10.2125,24.490625 C9.378125,24.71875 8.46875,24.828125 7.525,24.828125 C6.86875,24.828125 6.20625,24.790625 5.584375,24.653125 C6.9125,28.7125 10.68125,31.696875 15.1625,31.79375 C11.675,34.521875 7.246875,36.165625 2.453125,36.165625 C1.6125,36.165625 0.80625,36.128125 -5.32907052e-14,36.025 C4.540625,38.953125 9.921875,40.625 15.725,40.625 C34.5875,40.625 44.9,25 44.9,11.45625 C44.9,11.003125 44.884375,10.565625 44.8625,10.13125 C46.896875,8.6875 48.60625,6.884375 50,4.809375 Z"></path>
												</g>
											</g>
										</g>
									</svg>
								</i>
							</a>
							{{php}}<?php

							}

							if( !empty( $card_instagram ) ) {

							?>{{/php}}
							<a href="{{card_instagram}}" target="_blank" rel="nofollow noreferrer noopener"><!-- Instagram -->
								<i>
									<svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g transform="translate(-83.000000, -83.000000)" fill="#888888">
												<g transform="translate(83.000000, 83.000000)">
													<path d="M35.4758791,0 L14.5242188,0 C6.51552734,0 0,6.51552734 0,14.5242188 L0,35.4757812 C0,43.4844728 6.51552734,50 14.5242188,50 L35.4757812,50 C43.4844728,50 50,43.4844728 50,35.4758791 L50,14.5242188 C50,6.51552734 43.4844728,0 35.4758791,0 Z M46.09375,35.4757812 C46.09375,41.3305666 41.3305666,46.09375 35.4758791,46.09375 L14.5242187,46.09375 C8.66943359,46.09375 3.90625,41.3305666 3.90625,35.4758791 L3.90625,14.5242187 C3.90625,8.66943359 8.66943359,3.90625 14.5242187,3.90625 L35.4757812,3.90625 C41.3305666,3.90625 46.09375,8.66943359 46.09375,14.5242187 L46.09375,35.4757812 Z" fill-rule="nonzero"></path>
													<path d="M25,11.5234375 C17.5689453,11.5234375 11.5234375,17.5689453 11.5234375,25 C11.5234375,32.4310547 17.5689453,38.4765625 25,38.4765625 C32.4310547,38.4765625 38.4765625,32.4310547 38.4765625,25 C38.4765625,17.5689453 32.4310547,11.5234375 25,11.5234375 Z M25,34.5703125 C19.7229492,34.5703125 15.4296875,30.2770508 15.4296875,25 C15.4296875,19.7229492 19.7229492,15.4296875 25,15.4296875 C30.2770508,15.4296875 34.5703125,19.7229492 34.5703125,25 C34.5703125,30.2770508 30.2770508,34.5703125 25,34.5703125 Z" fill-rule="nonzero"></path>
													<circle cx="38.671875" cy="11.328125" r="3.125"></circle>
												</g>
											</g>
										</g>
									</svg>
								</i>
							</a>
							{{php}}<?php

							}

							if( !empty( $card_linkedin ) ) {

							?>{{/php}}
							<a href="{{card_linkedin}}" target="_blank" rel="nofollow noreferrer noopener"><!-- Linkedin -->
								<i>
									<svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-429.000000, -83.000000)" fill="#888888"><g transform="translate(429.000000, 83.000000)"><path d="M0,4.84189723 C0.245579568,4.84189723 0.166994106,4.64426877 0.186640472,4.51581028 C0.481335953,2.47035573 1.5324165,0.97826087 3.49705305,0.335968379 C5.07858546,-0.177865613 6.72888016,-0.118577075 8.20235756,0.731225296 C9.12573674,1.27470356 9.83300589,2.11462451 10.2062868,3.15217391 C10.481336,3.9229249 10.6876228,4.72332016 10.5992141,5.54347826 C10.3929273,7.60869565 9.46954813,9.32806324 7.21021611,10.1284585 C5.50098232,10.7213439 3.84086444,10.5039526 2.27897839,9.56521739 C2.18074656,9.20948617 1.93516699,9.03162055 1.58153242,8.97233202 C1.58153242,8.97233202 1.58153242,8.97233202 1.58153242,8.97233202 C1.57170923,8.83399209 1.55206287,8.69565217 1.3654224,8.69565217 C0.658153242,7.90513834 0.324165029,6.94664032 0.186640472,5.90909091 C0.166994106,5.79051383 0.21611002,5.62252964 0,5.63241107 C0,5.36561265 0,5.10869565 0,4.84189723 Z"></path><path d="M27.0333988,20.958498 C27.4557957,20.701581 27.6227898,20.326087 27.8388998,20.0197628 C28.9096267,18.5375494 30.2357564,17.3913043 31.8860511,16.5711462 C34.1453831,15.4545455 36.5422397,15.3359684 38.9587426,15.5632411 C40.8153242,15.7312253 42.5736739,16.3636364 44.1748527,17.3913043 C46.0805501,18.6166008 47.4459725,20.3162055 48.3791749,22.3517787 C48.9489194,23.5869565 49.3222004,24.9011858 49.5481336,26.2648221 C49.7544204,27.5395257 49.9115914,28.7944664 49.9115914,30.0889328 C49.9017682,36.5118577 49.9017682,42.9347826 49.9214145,49.3577075 C49.9214145,49.812253 49.7937132,49.93083 49.3516699,49.9209486 C46.3359528,49.9011858 43.3300589,49.9011858 40.3143418,49.9209486 C39.8722986,49.9209486 39.7740668,49.7924901 39.7740668,49.3675889 C39.78389,43.3102767 39.8133595,37.243083 39.7642436,31.1857708 C39.7544204,29.812253 39.56778,28.4486166 38.8605108,27.1936759 C38.2318271,26.0869565 37.3575639,25.2964427 36.2082515,24.8418972 C34.6660118,24.229249 33.0746562,24.1106719 31.4636542,24.5652174 C29.8330059,25.0197628 28.7033399,26.0968379 27.8978389,27.5592885 C27.4459725,28.3794466 27.2888016,29.2391304 27.1611002,30.1581028 C27.0333988,31.1462451 27.0530452,32.1146245 27.0530452,33.0928854 C27.0333988,38.4980237 27.0333988,43.8932806 27.0530452,49.298419 C27.0530452,49.7924901 26.935167,49.93083 26.4341847,49.9209486 C23.4577603,49.8913043 20.4715128,49.9011858 17.4950884,49.9209486 C17.0825147,49.9209486 16.935167,49.7924901 16.9449902,49.4071146 C16.9548134,49.1304348 16.9744597,48.8537549 16.9744597,48.5770751 C16.9744597,38.1521739 16.9842829,27.7272727 16.9646365,17.3023715 C16.9646365,16.8675889 17.0530452,16.7094862 17.524558,16.7094862 C20.5206287,16.729249 23.5166994,16.729249 26.5127701,16.7094862 C26.9155206,16.7094862 27.0530452,16.8083004 27.043222,17.2332016 C27.0137525,18.4387352 27.0333988,19.6541502 27.0333988,20.958498 Z"></path><path d="M10.6090373,17.0059289 C10.6090373,17.3517787 10.6188605,17.6976285 10.6188605,18.0434783 C10.6188605,28.4486166 10.6188605,38.8537549 10.6188605,49.2687747 C10.6188605,49.9011858 10.6188605,49.9011858 9.98035363,49.9011858 C6.85658153,49.9011858 3.72298625,49.9011858 0.599214145,49.9011858 C0.589390963,49.6541502 0.57956778,49.4071146 0.57956778,49.1600791 C0.57956778,41.3735178 0.57956778,33.5968379 0.57956778,25.8102767 C0.57956778,23.0335968 0.589390963,20.2470356 0.569744597,17.4703557 C0.569744597,17.1146245 0.658153242,16.986166 1.03143418,16.986166 C4.22396857,17.0059289 7.41650295,16.9960474 10.6090373,17.0059289 Z"></path><path d="M10.6090373,17.0059289 C7.41650295,17.0059289 4.23379175,17.0059289 1.04125737,16.986166 C0.667976424,16.986166 0.57956778,17.1047431 0.57956778,17.4703557 C0.589390963,20.2470356 0.57956778,23.0237154 0.57956778,25.8102767 C0.57956778,33.5968379 0.57956778,41.3735178 0.57956778,49.1600791 C0.57956778,49.4071146 0.589390963,49.6541502 0.599214145,49.9011858 C0.432220039,49.9110672 0.304518664,49.8715415 0.304518664,49.673913 C0.304518664,49.5454545 0.304518664,49.4071146 0.304518664,49.2786561 C0.304518664,38.7252964 0.304518664,28.1818182 0.304518664,17.6284585 C0.304518664,16.8774704 0.373280943,16.8083004 1.11001965,16.8083004 C4.10609037,16.8083004 7.1021611,16.8083004 10.0884086,16.8181818 C10.2652259,16.8083004 10.5304519,16.6699605 10.6090373,17.0059289 Z"></path><path d="M1.58153242,8.98221344 C1.93516699,9.04150198 2.18074656,9.21936759 2.27897839,9.57509881 C1.97445972,9.45652174 1.74852652,9.25889328 1.58153242,8.98221344 Z"></path><path d="M1.3654224,8.7055336 C1.55206287,8.7055336 1.56188605,8.84387352 1.58153242,8.98221344 C1.37524558,8.99209486 1.37524558,8.85375494 1.3654224,8.7055336 Z"></path></g></g></g></svg>
								</i>
							</a>
							{{php}}<?php

							}

							if( !empty( $card_youtube ) ) {

							?>{{/php}}
							<a href="{{card_youtube}}" target="_blank" rel="nofollow noreferrer noopener"><!-- Youtube -->
								<i>
									<svg width="50px" height="36px" viewBox="0 0 50 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g transform="translate(-284.000000, -86.000000)" fill="#888888" fill-rule="nonzero">
												<g id="icon_youtube" transform="translate(284.000000, 86.000000)">
													<path d="M39.5299784,0.0425324675 L10.3619048,0.0425324675 C4.63917749,0.0425324675 0,4.68170996 0,10.4044372 L0,24.9853896 C0,30.7081169 4.63917749,35.3472944 10.3619048,35.3472944 L39.5299784,35.3472944 C45.2527056,35.3472944 49.8918831,30.7081169 49.8918831,24.9853896 L49.8918831,10.4044372 C49.8918831,4.68170996 45.2527056,0.0425324675 39.5299784,0.0425324675 Z M32.5222944,18.404329 L18.8794372,24.9111472 C18.5159091,25.0845238 18.0959957,24.8194805 18.0959957,24.4167749 L18.0959957,10.9964286 C18.0959957,10.587987 18.5269481,10.3232684 18.8912338,10.5079004 L32.5340909,17.4214286 C32.9397186,17.6269481 32.932684,18.208658 32.5222944,18.404329 Z"></path>
												</g>
											</g>
										</g>
									</svg>
								</i>
							</a>
							{{php}}<?php

							}

							if( !empty( $card_additional ) ) {

							?>{{/php}}
							<a href="{{card_additional}}" target="_blank" rel="nofollow noreferrer noopener"><!-- URL -->
								<i>
									<svg width="48px" height="50px" viewBox="0 0 48 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g transform="translate(-354.000000, -86.000000)" fill="#888888">
												<g transform="translate(354.000000, 86.000000)">
													<path d="M43.8235294,3.4375 C39.7058824,-0.9375 32.9411765,-0.9375 28.8235294,3.4375 L15.8823529,16.875 C11.7647059,21.5625 11.7647059,28.4375 15.8823529,33.125 C16.1764706,33.4375 16.7647059,33.75 17.0588235,34.0625 L21.4705882,29.375 C21.1764706,29.0625 20.5882353,28.75 20.2941176,28.4375 C18.5294118,26.5625 18.5294118,23.4375 20.2941176,21.5625 L33.2352941,7.8125 C35,5.9375 37.9411765,5.9375 39.7058824,7.8125 C41.4705882,9.6875 41.4705882,12.8125 39.7058824,14.6875 L35.8823529,18.75 C37.0588235,21.25 37.3529412,24.0625 37.0588235,26.5625 L43.8235294,19.375 C48.2352941,15 48.2352941,7.8125 43.8235294,3.4375 Z"></path>
													<path d="M30,15.9375 L25.5882353,20.625 C25.5882353,20.625 26.4705882,21.25 26.7647059,21.5625 C28.5294118,23.4375 28.5294118,26.5625 26.7647059,28.4375 L13.8235294,42.1875 C12.0588235,44.0625 9.11764706,44.0625 7.35294118,42.1875 C5.58823529,40.3125 5.58823529,37.1875 7.35294118,35.3125 L11.1764706,31.25 C10,28.75 10.8823529,27.1875 10,23.4375 L3.23529412,30.625 C-0.882352941,35 -0.882352941,42.1875 3.23529412,46.5625 C7.35294118,50.9375 14.1176471,50.9375 18.2352941,46.5625 L31.1764706,32.8125 C35.2941176,28.4375 35.2941176,21.25 31.1764706,16.875 C30.5882353,16.5625 30,15.9375 30,15.9375 Z"></path>
												</g>
											</g>
										</g>
									</svg>
								</i>
							</a>
							{{php}}<?php

							}

							?>{{/php}}
						</div>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
				</article>
				{{cards_group_loop_end}}<?php

				}

				?>{{/cards_group_loop_end}}
			</section>
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
