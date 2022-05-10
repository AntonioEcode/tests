{{php}}<?php

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

if( empty( $title ) ) {

	$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

}

$pretitle = get_post_meta( $current_id, '_{{template_name}}_pretitle_{{page_section_id}}', TRUE );

$button_text = get_post_meta( $current_id, '_{{template_name}}_button_text_{{page_section_id}}', TRUE );
$button_url  = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = !empty( get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE ) : $title;

$image_tablet     = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id  = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id  = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = wp_get_attachment_image_src( $image_tablet_id, 'full' )[0];

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_107_template_169">
		{{php}}<?php

		if( !empty( $image_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image"{{builder}} data-edit="ecode_image::after"{{/builder}}>
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_tablet_src}}">
			{{php}}<?php

			if( !empty( $image_src ) ) {

			?>{{/php}}
			<img src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_107_169">
			<div class="ecode_titles">
				{{php}}<?php

				if( !empty( $pretitle ) ) {

				?>{{/php}}
				<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
				{{php}}<?php

				}

				?>{{/php}}
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			</div>
			{{php}}<?php

			if( !empty( $button_url ) && !empty( $button_text ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}<i><svg width="61px" height="50px" viewBox="0 0 61 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-10.000000, -10.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(10.000000, 10.000000)"><path d="M60.1665323,27.7422043 C60.1665323,26.5587366 59.899328,25.4283602 59.4168011,24.3942204 C59.3670699,24.1313172 59.3102151,23.8688172 59.2391129,23.6025538 L54.0127688,10.6502688 L53.9774194,10.5337366 C52.1487903,5.08897849 49.5469086,0.0497311828 42.949328,0.0497311828 L17.7241935,0.0497311828 C10.9639785,0.0497311828 8.57513441,5.21384409 6.70645161,10.5034946 L1.23965054,23.4873656 C0.449327957,24.753629 0,26.2021505 0,27.7422043 L0,31.7725806 C0,32.3956989 0.073655914,33.0052419 0.213709677,33.5923387 C0.0775537634,33.947043 0,34.3293011 0,34.7322581 L0,46.7194892 C0,48.4772849 1.425,49.9025538 3.1827957,49.9025538 L9.78763441,49.9025538 C11.5444892,49.9025538 12.9694892,48.4772849 12.9694892,46.7194892 L12.9694892,40.725 L47.574328,40.725 L47.574328,46.7194892 C47.574328,48.4772849 48.9995968,49.9025538 50.7575269,49.9025538 L56.9841398,49.9025538 C58.7426075,49.9025538 60.1673387,48.4772849 60.1673387,46.7194892 L60.1673387,34.730914 C60.1673387,34.3294355 60.0889785,33.9454301 59.9538978,33.5919355 C60.093414,33.0038978 60.1673387,32.3950269 60.1673387,31.772043 L60.1673387,27.7423387 L60.1665323,27.7423387 L60.1665323,27.7422043 Z M10.5852151,11.8038978 C12.6662634,5.93252688 14.3397849,4.14018817 17.7241935,4.14018817 L42.9478495,4.14018817 C46.3073925,4.14018817 48.1780914,6.13924731 50.0790323,11.778629 L53.8928763,19.5073925 C52.6475806,19.0462366 51.2771505,18.7903226 49.8373656,18.7903226 L10.3291667,18.7903226 C9.0327957,18.7903226 7.79395161,18.9987903 6.65094086,19.3760753 L10.5852151,11.8038978 Z M13.8614247,33.3032258 L6.89260753,33.3032258 C5.63790323,33.3032258 4.6202957,32.2846774 4.6202957,31.0301075 C4.6202957,29.7751344 5.63790323,28.7572581 6.89260753,28.7572581 L13.8614247,28.7572581 C15.1166667,28.7572581 16.1342742,29.7751344 16.1342742,31.0301075 C16.1342742,32.2846774 15.1159946,33.3032258 13.8614247,33.3032258 Z M38.4790323,32.8479839 L22.2693548,32.8479839 C21.4745968,32.8479839 20.8306452,32.203629 20.8306452,31.4092742 C20.8306452,30.6134409 21.4745968,29.9693548 22.2693548,29.9693548 L38.4790323,29.9693548 C39.2747312,29.9693548 39.9185484,30.6134409 39.9185484,31.4092742 C39.9185484,32.203629 39.2747312,32.8479839 38.4790323,32.8479839 Z M53.0982527,33.3032258 L46.1297043,33.3032258 C44.8739247,33.3032258 43.8568548,32.2846774 43.8568548,31.0301075 C43.8568548,29.7751344 44.8747312,28.7572581 46.1297043,28.7572581 L53.0982527,28.7572581 C54.3540323,28.7572581 55.3719086,29.7751344 55.3719086,31.0301075 C55.3719086,32.2846774 54.3540323,33.3032258 53.0982527,33.3032258 Z"></path></g></g></g></svg></i></a>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s107_t169 = document.getElementsByClassName( 'ecode_section_107_template_169' );
		for (var i = 0; i < array_s107_t169.length; i++) {
			array_articles = array_s107_t169[i].querySelectorAll( '.ecode_width_107_169' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_width_107_169_hide' );
			}
		}
	</script>
</section>
