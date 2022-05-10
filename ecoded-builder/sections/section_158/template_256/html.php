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

		if( !empty( $element['element_event_day'] ) ) {

			$date = new DateTime( $element['element_event_day'] );
			$grouped_date = $date->format( 'Y-m-d' );

			if( !array_key_exists( $grouped_date, $grouped_elements ) ) {

				$grouped_elements[$grouped_date] = array();

			}

			$count_elements = count( $grouped_elements[$grouped_date] );

			foreach( $element as $key => $value ) {

				$grouped_elements[$grouped_date][$count_elements][$key] = $value;

			}

		}

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $grouped_elements ) ) {

	?>{{/php}}
	<section class="ecode_section_158_template_256">
		<div class="ecode_width_158_256">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			foreach( $grouped_elements as $element_event_date => $array_events ) {

				$date = new DateTime( $element_event_date );

				$day_month = $date->format( 'd M' );
				$year  = $date->format( 'Y' );

			?>
			<section class="ecode_articles">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_month"{{builder}} data-edit="ecode_articles_info_month"{{/builder}}><?php echo $day_month; ?></p>
					<p class="ecode_articles_info_year"{{builder}} data-edit="ecode_articles_info_year"{{/builder}}><?php echo $year; ?></p>
				</div>
				<?php

				foreach( $array_events as $element ) {

					$element_title       = $element['element_title'];
					$element_url         = $element['element_url'];
					$element_subtitle    = $element['element_subtitle'];
					$element_additional  = $element['element_additional'];
					$element_event_hour  = $element['element_event_hour'];
					$element_description = apply_filters( 'the_content', $element['element_description'] );

					// If have specific conference selected
					if( !empty( $element['service_id'] ) ) {

						$service_id       = $element['service_id'];
						$conference_title = get_the_title( $service_id );
						$conference_link  = get_permalink( $service_id );

						$element_title = !empty( $element_title ) ? $element_title : $conference_title;
						$element_url   = !empty( $element_url ) ? $element_url : $conference_link;

					}

				?>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<?php

						if( !empty( $element_event_hour ) ) {

						?>
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text"><?php echo $element_event_hour; ?></span>
						</div>
						<?php

						}

						?>
						<div class="ecode_article_info_title">
							<?php

							if( !empty( $element_title ) ) {

							?>
							<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
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

							if( !empty( $element_subtitle ) ) {

							?>
							<time class="ecode_article_date"{{builder}} data-edit="ecode_article_date"{{/builder}}><?php echo $element_subtitle; ?></time>
							<?php

							}

							if( !empty( $element_additional ) ) {

							?>
							<p class="ecode_article_additional"{{builder}} data-edit="ecode_article_additional"{{/builder}}><?php echo $element_additional; ?></p>
							<?php

							}

							?>
						</div>
					</div>
					<?php

					if( !empty( $element_description ) ) {

					?>
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						<?php echo $element_description; ?>
					</div>
					<?php

					}

					?>
				</article>
				<?php

				}

				?>
			</section>
			<?php

			}

			?>{{/php}}{{builder}}<section class="ecode_articles">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_month">22 Abril</p>
					<p class="ecode_articles_info_year">2021</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text">09:00</span>
						</div>
						<div class="ecode_article_info_title">
							<h3 class="ecode_article_title"><a href="#">#Posiciona21</a></h3>
							<time class="ecode_article_date">27 y 28 de abril de 2021</time>
							<p class="ecode_article_additional">Evento online</p>
						</div>
					</div>
					<div class="ecode_container_content">
						<p>#Posiciona21 es un evento online de dos días organizado por José Facchin que se celebra a principios de abril. Redes sociales y marketing digital con grandes profesionales del sector.</p>
					</div>
				</article>
			</section>
			<section class="ecode_articles">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_month">22 Mayo</p>
					<p class="ecode_articles_info_year">2021</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text">08:30</span>
						</div>
						<div class="ecode_article_info_title">
							<h3 class="ecode_article_title"><a href="#">ProMarketingDay 2021</a></h3>
							<time class="ecode_article_date">22 de mayo, 2021</time>
						</div>
					</div>
					<div class="ecode_container_content">
						<p>ProMarketingDay celebra una nueva edición en Madrid centrado en el marketing digital desde un punto de vista práctico, con consejos aplicables a todo tipo de empresa y donde el hilo conductor son las distintas áreas del marketing online.</p>
					</div>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text">10:00</span>
						</div>
						<div class="ecode_article_info_title">
							<h3 class="ecode_article_title"><a href="#">European Search Conference 2021</a></h3>
							<time class="ecode_article_date">27 de mayo de 2021</time>
						</div>
					</div>
					<div class="ecode_container_content">
						<p>En la European Search Conference se reúnen algunos de los profesionales más reconocidos del sector del posicionamiento en buscadores.</p>
					</div>
				</article>
			</section>
			<section class="ecode_articles">
				<div class="ecode_articles_info">
					<p class="ecode_articles_info_month">27 Mayo</p>
					<p class="ecode_articles_info_year">2021</p>
				</div>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text">10:00</span>
						</div>
						<div class="ecode_article_info_title">
							<h3 class="ecode_article_title"><a href="#">ProMarketingDay 2021</a></h3>
							<time class="ecode_article_date">22 de mayo, 2021</time>
						</div>
					</div>
					<div class="ecode_container_content">
						<p>ProMarketingDay celebra una nueva edición en Madrid centrado en el marketing digital desde un punto de vista práctico, con consejos aplicables a todo tipo de empresa y donde el hilo conductor son las distintas áreas del marketing online.</p>
					</div>
				</article>
				<article class="ecode_article">
					<div class="ecode_article_info">
						<div class="ecode_article_info_day">
							<i>
								<svg width="75px" height="70px" viewBox="0 0 75 70" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect stroke="#F4764E" stroke-width="2" x="1" y="1" width="73" height="68" rx="4"></rect><path d="M0.5,22.5 L74.5,22.5" stroke="#F4764E" stroke-width="2" stroke-linecap="square"></path><circle stroke="#F4764E" stroke-width="2" cx="13.5" cy="11.5" r="5.5"></circle><circle stroke="#F4764E" stroke-width="2" cx="61.5" cy="11.5" r="5.5"></circle></g></svg>
							</i>
							<span class="ecode_article_info_day_text">10:00</span>
						</div>
						<div class="ecode_article_info_title">
							<h3 class="ecode_article_title"><a href="#">European Search Conference 2021</a></h3>
							<time class="ecode_article_date">27 de mayo de 2021</time>
						</div>
					</div>
					<div class="ecode_container_content">
						<p>En la European Search Conference se reúnen algunos de los profesionales más reconocidos del sector del posicionamiento en buscadores.</p>
					</div>
				</article>
			</section>{{/builder}}
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
