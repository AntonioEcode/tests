{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

$grouped_elements = array();

if( !empty( $data->elements_group ) ) {

	foreach( $data->elements_group as $key => $element ) {

		if( !array_key_exists( $element['element_event_day'], $grouped_elements ) ) {

			$grouped_elements[$element['element_event_day']] = array();

		}

		$count_elements = count( $grouped_elements[$element['element_event_day']] );

		foreach( $element as $key => $value ) {

			if( $key != 'element_event_day' ) {

				if( !empty( $value ) ) {

					$grouped_elements[$element['element_event_day']][$count_elements][$key] = $value;

				}

			}

		}

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_156_template_253">
		<div class="ecode_width_156_253">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<h3 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</h3>
			{{php}}<?php

			}

			if( !empty( $grouped_elements ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{php}}<?php

				$cont_days = 1;

				foreach( $grouped_elements as $element_event_day => $array_events ) {

				?>
				<article class="ecode_article">
					<div class="ecode_article_header">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#ffffff" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						<h4 class="ecode_header_title"><?php echo __( 'Día', 'frontecode' ) . ' ' . $cont_days; ?></h4>
						<time class="ecode_header_date"><?php echo $element_event_day; ?></time>
					</div>
					<?php

					foreach( $array_events as $event ) {

						$element_card_image_id = $event["element_card_image_id"];
						$element_card_image = $event["element_card_image"];
						$element_card_name = $event["element_card_name"];
						$element_svg_icon = $event["element_svg_icon"];
						$element_card_url = $event["element_card_url"];
						$element_schedule = $event["element_schedule"];
						$element_speaker_name = $event["element_speaker_name"]; // Work --> Speaker
						$element_speaker_url = $event["element_speaker_url"];
						$element_speaker_job = $event["element_speaker_job"];
						$element_description = $event["element_description"];
						$element_tags = $event["element_tags"];
						$element_location = $event["element_location"];
						$element_service_id = $event["element_service_id"];
						$element_speaker_id = $event["element_work_id"];

						if( !empty( $element_service_id ) ) {

							$element_card_name = get_the_title( $element_service_id );
							$element_card_url = get_the_permalink( $element_service_id );
							$element_card_image_id = !empty( get_post_thumbnail_id( $element_service_id ) ) ? get_post_thumbnail_id( $element_service_id ) : $element_card_image_id;

						}

						if( !empty( $element_speaker_id ) ) {

							$element_speaker_name = get_the_title( $element_speaker_id );
							$element_speaker_url = get_the_permalink( $element_speaker_id );

						}

						$element_card_image_src = wp_get_attachment_image_src( $element_card_image_id, 'thumbnail' )[0];
						$element_card_image_alt = get_post_meta( $element_card_image_id, '_wp_attachment_image_alt', TRUE );
						$element_card_image_alt = !empty( $element_card_image_alt ) ? $element_card_image_alt : $element_card_name;

						$tags = explode( ';', $element_tags );

					?>
					<div class="ecode_article_event">
						<?php

						if( !empty( $element_svg_icon ) ) {

						?>
						<i class="ecode_event_figure">
							<?php echo $element_svg_icon; ?>
						</i>
						<?php

						} elseif( !empty( $element_card_image_src ) ) {

						?>
						<figure class="ecode_event_figure">
							<img src="<?php echo $element_card_image_src; ?>" alt="<?php echo $element_card_image_alt; ?>">
						</figure>
						<?php

						}

						?>
						<div class="ecode_event_info">
							<?php

							if( !empty( $element_schedule ) ) {

							?>
							<p class="event_info_hours"><?php echo $element_schedule; ?></p>
							<?php

							}

							if( !empty( $element_card_name ) ) {

							?>
							<h4 class="event_info_title">
								<?php

								if( !empty( $element_card_url ) ) {

								?>
								<a href="<?php echo $element_card_url; ?>">
								<?php

								}

								?>
									<?php echo $element_card_name; ?>
								<?php

								if( !empty( $element_card_url ) ) {

								?>
								</a>
								<?php

								}

								?>
							</h4>
							<?php

							}

							if( !empty( $element_speaker_name ) ) {

							?>
							<p class="event_info_author">
								<?php
								
								echo __( 'Por', 'frontecode' );

								if( !empty( $element_speaker_url ) ) {

								?>
								<a href="<?php echo $element_speaker_url; ?>" class="event_info_author_link">
								<?php

								}

								echo ' ' . $element_speaker_name;

								if( !empty( $element_speaker_url ) ) {

								?>
								</a>
								<?php
								
								}

								if( !empty( $element_speaker_job ) ) {

									echo ' ' . $element_speaker_job;

								}

								?>
							</p>
							<?php

							}

							?>
							<div class="ecode_article_hide_show">
								<?php

								if( !empty( $element_description ) ) {

								?>
								<div class="ecode_container_content">
									<p><?php echo $element_description; ?></p>
								</div>
								<?php

								}

								if( !empty( $tags[0] ) ) {

								?>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
									</i>
									<?php

									foreach( $tags as $tag ) {

									?>
									<li><?php echo $tag; ?></li>
									<?php

									}

									?>
								</ul>
								<?php

								}

								if( !empty( $element_location ) ) {

								?>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title"><?php echo __( 'Lugar del evento', 'frontecode' ); ?></span>
									<p class="ecode_event_location_text"><?php echo $element_location; ?></p>
								</div>
								<?php

								}

								?>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<?php

					}

					?>
				</article>
				<?php

					$cont_days++;

				}

				?>{{/php}}{{builder}}
				<article class="ecode_article">
					<div class="ecode_article_header">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#ffffff" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						<h4 class="ecode_header_title">Día 1</h4>
						<time class="ecode_header_date">23 de Julio 2021</time>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_1.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event ecode_article_event_show">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Coffee Break</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_2.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_3.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_4.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Lunch time!</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_5.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_6.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_7.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_8.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Finish!</h4>
						</div>
					</div>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_header">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#ffffff" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						<h4 class="ecode_header_title">Día 2</h4>
						<time class="ecode_header_date">24 de Julio 2021</time>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_1.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Coffee Break</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_2.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_3.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_4.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Lunch time!</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_5.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_6.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_7.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_8.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Finish!</h4>
						</div>
					</div>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_header">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#ffffff" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						<h4 class="ecode_header_title">Día 3</h4>
						<time class="ecode_header_date">25 de Julio 2021</time>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_1.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Coffee Break</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_2.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_3.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_4.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Lunch time!</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_5.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_6.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_7.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_8.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Finish!</h4>
						</div>
					</div>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_header">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#ffffff" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						<h4 class="ecode_header_title">Día 4</h4>
						<time class="ecode_header_date">26 de Julio 2021</time>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_1.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Coffee Break</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_2.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_3.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_4.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Lunch time!</h4>
						</div>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_5.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_6.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_7.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<figure class="ecode_event_figure">
							<img src="http://localhost/ecodeprotemplate/wp-content/themes/theme7/assets/img/s156_t253_8.jpeg" alt="Alt image">
						</figure>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title"><a href="#">Grand opening</a></h4>
							<p class="event_info_author">By <a href="#" class="event_info_author_link">Kevin Chase</a> Chairman Tesla</p>
							<div class="ecode_article_hide_show">
								<div class="ecode_container_content">
									<p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.</p>
								</div>
								<ul class="ecode_event_tags">
									<i>
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="44" height="44" viewBox="0 0 24 24" stroke-width="1" stroke="#222222" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
									</i>
									<li>Business</li>
									<li>Engineering</li>
									<li>Growth</li>
									<li>Platform</li>
								</ul>
								<div class="ecode_event_location">
									<span class="ecode_event_location_title">Where</span>
									<p class="ecode_event_location_text">Hall 1, Building A</p>
								</div>
							</div>
						</div>
						<span class="ecode_article_icon"></span>
					</div>
					<div class="ecode_article_event">
						<i class="ecode_event_figure">
							<svg width="52px" height="52px" viewBox="0 0 52 52" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g transform="translate(-747.000000, -90.000000)" stroke="#222222" stroke-width="1.83333333"><g transform="translate(748.000000, 91.000000)"><circle id="Oval" cx="25" cy="25" r="24.2647059"></circle><polyline id="Path" points="25 11.5196078 25 25 33.0882353 33.0882353"></polyline></g></g></g></svg>
						</i>
						<div class="ecode_event_info">
							<p class="event_info_hours">08:00 - 09:00</p>
							<h4 class="event_info_title">Finish!</h4>
						</div>
					</div>
				</article>
				{{/builder}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
