{{php}}<?php

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_title         = get_the_title();
$post_subtitle      = get_post_meta( $post_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );
$post_content       = apply_filters( 'the_content', get_the_content() );
$post_excerpt       = get_the_excerpt();
$post_thumbnail_id  = get_post_thumbnail_id();
$post_thumbnail_src = !empty( $post_thumbnail_id ) ? wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0] : NULL;
$post_thumbnail_alt = !empty( $post_thumbnail_id ) ? get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE ) : $post_title;

$author_id = get_post_field( 'post_author', $post_id );

$author_name             = get_the_author_meta( 'display_name', $author_id );
$author_image_src        = get_user_meta( $post->post_author, '_user_profile_image', TRUE );
$author_description      = get_user_meta( $author_id, 'description', TRUE );
$author_social_twitter   = get_user_meta( $author_id, 'twitter', TRUE );
$author_social_facebook  = get_user_meta( $author_id, 'facebook', TRUE );
$author_social_instagram = get_user_meta( $author_id, 'instagram', TRUE );
$author_social_linkedin  = get_user_meta( $author_id, 'linkedin', TRUE );
$author_social_youtube   = get_user_meta( $author_id, 'youtube', TRUE );

$copy_author = __( 'Sobre el autor', 'frontecode' ) . ': ' . $author_name;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_122_template_187"{{builder}} data-edit="ecode_section_122_template_187"{{/builder}}>
		<div class="ecode_width_122_187">
			<div class="ecode_image_author">
				{{php}}<?php

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<figure class="ecode_image"{{builder}} data-edit="ecode_image"{{/builder}}>
					<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_author"{{builder}} data-edit="ecode_author"{{/builder}}>
					<p class="ecode_author_name"{{builder}} data-edit="ecode_author_name"{{/builder}}>{{copy_author}}</p>
					<div class="ecode_author_info">
						{{php}}<?php

						if( !empty( $author_image_src ) ) {

						?>{{/php}}
						<figure class="ecode_author_figure"{{builder}} data-edit="ecode_author_figure"{{/builder}}>
							<img src="{{author_image_src}}" alt="{{copy_author}}">
						</figure>
						{{php}}<?php

						}

						if( !empty( $author_description ) ) {

						?>{{/php}}
						<p class="ecode_author_desc"{{builder}} data-edit="ecode_author_desc"{{/builder}}>{{author_description}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{php}}<?php

					if(
						!empty( $author_social_twitter )
						|| !empty( $author_social_facebook )
						|| !empty( $author_social_instagram )
						|| !empty( $author_social_linkedin )
						|| !empty( $author_social_youtube )
					) {

					?>{{/php}}
					<div class="ecode_author_social">
						{{php}}<?php

						if( !empty( $author_social_twitter ) ) {

						?>{{/php}}
						<a class="ecode_author_social_link" href="{{author_social_twitter}}" target="_blank" rel="nofollow noreferrer noopener"{{builder}} data-edit="ecode_author_social_link"{{/builder}}><!-- Twitter -->
							<i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#030303"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $author_social_facebook ) ) {

						?>{{/php}}
						<a class="ecode_author_social_link" href="{{author_social_facebook}}" target="_blank" rel="nofollow noreferrer noopener"{{builder}} data-edit="ecode_author_social_link"{{/builder}}><!-- Facebook -->
							<i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#030303"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $author_social_instagram ) ) {

						?>{{/php}}
						<a class="ecode_author_social_link" href="{{author_social_instagram}}" target="_blank" rel="nofollow noreferrer noopener"{{builder}} data-edit="ecode_author_social_link"{{/builder}}><!-- Instagram -->
							<i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#030303"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $author_social_linkedin ) ) {

						?>{{/php}}
						<a class="ecode_author_social_link" href="{{author_social_linkedin}}" target="_blank" rel="nofollow noreferrer noopener"{{builder}} data-edit="ecode_author_social_link"{{/builder}}><!-- Linkedin -->
							<i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#030303"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $author_social_youtube ) ) {

						?>{{/php}}
						<a class="ecode_author_social_link" href="{{author_social_youtube}}" target="_blank" rel="nofollow noreferrer noopener"{{builder}} data-edit="ecode_author_social_link"{{/builder}}><!-- Youtube -->
							<i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#030303"></g></svg></i>
						</a>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</div>
			<div class="ecode_post">
				{{php}}<?php

				if( !empty( $post_excerpt ) ) {

				?>{{/php}}
				<p class="ecode_excerpt"{{builder}} data-edit="ecode_excerpt"{{/builder}}>{{post_excerpt}}</p>
				{{php}}<?php

				}

				if( !empty( $post_subtitle ) ) {

				?>{{/php}}
				<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{post_subtitle}}</h2>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{post_content}}
				</div>
			</div>
		</div>
	</section>
</section>
