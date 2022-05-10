{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_94_template_165"{{builder}} data-edit="ecode_section_94_template_165"{{/builder}}>
		<div class="ecode_width_94_165">
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<picture class="ecode_image"{{builder}} data-edit="ecode_image"{{/builder}}>
				<source media="(min-width:768px)" srcset="{{image_hd_src}}">
				<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			</picture>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_info">
				{{php}}<?php

				if( !empty( $data->title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				{{php}}<?php

				}

				if( !empty( $data->cards_group ) ) {

				?>{{/php}}
				<ul class="ecode_list">
					{{cards_group_loop_start}}<?php

					foreach( $data->cards_group as $card ) {

						$card_featured_text = $card['card_featured_text'];

						if( !empty( $card_featured_text ) ) {

					?>{{/cards_group_loop_start}}
					<li class="ecode_li"{{builder}} data-edit="ecode_li"{{/builder}}><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-22.000000, -109.000000)"><g transform="translate(22.000000, 109.000000)"><circle fill="{{arrow_color}}" cx="25" cy="25" r="25"></circle><path d="M40.5045015,23.7857282 L29.3093104,12.4990228 C28.9897358,12.1768431 28.5638044,12 28.1096456,12 C27.6549827,12 27.2293033,12.1770972 26.9097288,12.4990228 L25.8932901,13.5240013 C25.5739676,13.8456727 25.3980503,14.2753303 25.3980503,14.7334454 C25.3980503,15.1913064 25.5739676,15.6354468 25.8932901,15.9571183 L32.4244063,22.5559573 L11.6747421,22.5559573 C10.7392052,22.5559573 10,23.294328 10,24.2377453 L10,25.6867915 C10,26.6302087 10.7392052,27.4430263 11.6747421,27.4430263 L32.4985033,27.4430263 L25.8935421,34.0787077 C25.5742196,34.4008873 25.3983024,34.818857 25.3983024,35.2769721 C25.3983024,35.734579 25.5742196,36.1586467 25.8935421,36.4805723 L26.9099808,37.5022477 C27.2295554,37.8244273 27.6552348,38 28.1098976,38 C28.5640564,38 28.9899878,37.8221406 29.3095624,37.4999609 L40.5047535,26.2135095 C40.8250842,25.8903135 41.0012534,25.4588773 40.9999933,25.0002541 C41.0010014,24.5401063 40.8250842,24.1084161 40.5045015,23.7857282 Z" fill="#FFFFFF"></path></g></g></g></svg></i>{{card_featured_text}}</li>
					{{cards_group_loop_end}}<?php

						}

					}

					?>{{/cards_group_loop_end}}
				</ul>
				{{php}}<?php

				}

				if( !empty( $data->button_text ) && !empty( $data->button_url ) ) {

				?>{{/php}}
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit-center="ecode_button"{{/builder}}>{{button_text}}<i{{builder}} data-edit="ecode_button i"{{/builder}}><svg width="29px" height="50px" viewBox="0 0 29 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-230.000000, -20.000000)" fill="#333333"><g transform="translate(230.000000, 20.000000)"><path d="M27.4824115,27.4659292 L5.99048673,48.9571903 C4.62334071,50.325 2.40674779,50.325 1.04026549,48.9571903 C-0.326327434,47.5905973 -0.326327434,45.374115 1.04026549,44.0076327 L20.0573009,24.9911504 L1.04081858,5.97533186 C-0.325774336,4.60818584 -0.325774336,2.39192478 1.04081858,1.02533186 C2.4074115,-0.341814159 4.62389381,-0.341814159 5.99103982,1.02533186 L27.4829646,22.5169248 C28.1662611,23.2005531 28.5075221,24.0955752 28.5075221,24.9910398 C28.5075221,25.8869469 28.1655973,26.7826327 27.4824115,27.4659292 Z"></path></g></g></g></svg></i></a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
	</section>
	<script type="text/javascript">
		array_s94_t165 = document.getElementsByClassName( 'ecode_section_94_template_165' );
		for (var i = 0; i < array_s94_t165.length; i++) {
			array_articles = array_s94_t165[i].querySelectorAll( '.ecode_info, .ecode_image' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_element_hide' );
			}
		}
	</script>
</section>
