{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

date_default_timezone_set( 'Europe/Madrid' );

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

$grouped_elements = array();

if( !empty( $data->elements_group ) ) {

	foreach( $data->elements_group as $key => $element ) {

		if( !empty( $element['element_event_start_hour'] ) ) {

			$date = new DateTime( $element['element_event_start_hour'] );
			$grouped_hour = $date->format( 'H' );

			if( !array_key_exists( $grouped_hour, $grouped_elements ) ) {

				$grouped_elements[$grouped_hour] = array();

			}

			$count_elements = count( $grouped_elements[$grouped_hour] );

			foreach( $element as $key => $value ) {

				$grouped_elements[$grouped_hour][$count_elements][$key] = $value;

			}

		}

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $grouped_elements ) ) {

	?>{{/php}}
	<section class="ecode_section_159_template_257">
		<div class="ecode_width_159_257_title">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title">{{title}}</h2>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
		{{php}}<?php

		if( !empty( $grouped_elements ) ) {

			foreach( $grouped_elements as $element_event_start_hour => $array_events ) {

		?>
		<section class="ecode_articles">
			<div class="ecode_width_159_257">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_hour"><?php echo $element_event_start_hour . ':00'; ?></p>
				</div>
				<?php

				foreach( $array_events as $element ) {

					$element_event_start_hour = $element['element_event_start_hour'];
					$element_event_end_hour   = $element['element_event_end_hour'];
					$element_title            = $element['element_title'];
					$element_url              = $element['element_url'];
					$element_speaker_name     = $element['element_speaker_name'];
					$element_speaker_url      = $element['element_speaker_url'];
					$element_speaker_job      = $element['element_speaker_job'];
					$total_minutes            = '';
					$event_time               = '';

					if( !empty( $element_event_start_hour ) && !empty( $element_event_end_hour ) ) {

						$start_hour  = new DateTime( $element_event_start_hour );
						$end_hour    = new DateTime( $element_event_end_hour );
						$since_start = $start_hour->diff( $end_hour );

						$total_minutes = $since_start->days * 24 * 60;
						$total_minutes += $since_start->h * 60;
						$total_minutes += $since_start->i;
						$total_minutes .= ' ' . __( 'min', 'frontecode' );

					}

					if( !empty( $element_event_start_hour ) ) {

						$event_time = $element_event_start_hour;

						if( !empty( $element_event_end_hour ) ) {

							$event_time .= ' - ' . $element_event_end_hour;

						}

					}

					// If have specific conference selected
					if( !empty( $element['element_service_id'] ) ) {

						$element_service_id = $element['element_service_id'];

						$element_title = !empty( $element_title ) ? $element_title : get_the_title( $element_service_id );
						$element_url   = !empty( $element_url ) ? $element_url : get_permalink( $element_service_id );

					}

					if( !empty( $element['element_work_id'] ) ) {

						$element_speaker_id   = $element['element_work_id'];

						$element_speaker_name = !empty( $element_speaker_name ) ? $element_speaker_name : get_the_title( $element_speaker_id );
						$element_speaker_url  = !empty( $element_speaker_url ) ? $element_speaker_url : get_the_permalink( $element_speaker_id );

					}

				?>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<?php

						if( !empty( $event_time ) ) {

						?>
						<span class="ecode_article_info_hour"><?php echo $event_time; ?></span>
						<?php

						}

						if( !empty( $event_time ) ) {

						?>
						<span class="ecode_article_info_time"><?php echo $total_minutes; ?></span>
						<?php

						}

						?>
					</div>
					<?php

					if( !empty( $element_title ) ) {

					?>
					<h3 class="ecode_article_title">
						<?php

						if( !empty( $element_url ) ) {

						?>
						<a href="<?php echo $element_url; ?>">
						<?php

						}

						echo $element_title;

						if( !empty( $element_url ) ) {

						?>
						</a>
						<?php

						}

						?>
					</h3>
					<?php

					}

					if( !empty( $element_speaker_name ) ) {

					?>
					<p class="ecode_article_author_name">
						<?php

						if( !empty( $element_speaker_url ) ) {

						?>
						<a href="<?php echo $element_speaker_url; ?>">
						<?php

						}

						echo $element_speaker_name;

						if( !empty( $element_speaker_url ) ) {

						?>
						</a>
						<?php

						}

						?>
					</p>
					<?php

					}

					if( !empty( $element_speaker_job ) ) {

					?>
					<p class="ecode_article_author_job"><?php echo $element_speaker_job; ?></p>
					<?php

					}

					?>
				</article>
				<?php

				}

				?>
			</div>
		</section>
		<?php

			}

		}

		?>{{/php}}
		{{builder}}<section class="ecode_articles">
			<div class="ecode_width_159_257">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_hour">13:00</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">13:00 - 14:00</span>
						<span class="ecode_article_info_time">60 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">30 Virtual Selling Trends in 30 Minutes</a></h3>
					<p class="ecode_article_author_name"><a href="#">Kim Orlesky</a></p>
					<p class="ecode_article_author_job">CEO, KO Advantage Group Ltd.</p>
				</article>
			</div>
		</section>
		<section class="ecode_articles">
			<div class="ecode_width_159_257">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_hour">15:00</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">15:00 - 17:00</span>
						<span class="ecode_article_info_time">120 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">No More Cookie Cutter Marketing</a></h3>
					<p class="ecode_article_author_name"><a href="#">Alex Moore</a></p>
					<p class="ecode_article_author_job">Sr. Partner, Marketing & Technology, Stratagon, Inc.</p>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">15:00 - 16:30</span>
						<span class="ecode_article_info_time">90 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">Meetup: HubSpot Solutions Partners Only: Networking for Business Executives & Owners</a></h3>
				</article>
			</div>
		</section>
		<section class="ecode_articles">
			<div class="ecode_width_159_257">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_hour">17:00</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">17:00 - 18:00</span>
						<span class="ecode_article_info_time">60 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">AMA: Tips on Running Virtual & Hybrid Events With Jonathan Kazarian, CEO and Founder at Accelevents</a></h3>
					<p class="ecode_article_author_name"><a href="#">Jonathan Kazarian</a></p>
					<p class="ecode_article_author_job">CEO, Founder, Accelevents</p>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">17:00 - 18:00</span>
						<span class="ecode_article_info_time">60 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">Case Study: Making the Big Switch - The Blueprint To Adopting a New CRM Across Your Organization</a></h3>
					<p class="ecode_article_author_name"><a href="#">Frank Loughan</a></p>
					<p class="ecode_article_author_job">Vice President, ARC</p>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">17:00 - 18:00</span>
						<span class="ecode_article_info_time">60 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">Why Working Remote Is More Toxic Than in Person: Lessons for Leaders in the Hybrid Workforce</a></h3>
					<p class="ecode_article_author_name"><a href="#">Chris Savage</a></p>
					<p class="ecode_article_author_job">Founder, CEO, Wistia</p>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<span class="ecode_article_info_hour">17:00 - 18:00</span>
						<span class="ecode_article_info_time">60 min</span>
					</div>
					<h3 class="ecode_article_title"><a href="#">AMA: Close Rate Best Practices With Eric Keiles, Chief Marketing Officer at Square 2 Marketing</a></h3>
					<p class="ecode_article_author_name"><a href="#">Eric Keiles</a></p>
					<p class="ecode_article_author_job">Chief Marketing Officer, Square 2 Marketing</p>
				</article>
			</div>
		</section>{{/builder}}
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
