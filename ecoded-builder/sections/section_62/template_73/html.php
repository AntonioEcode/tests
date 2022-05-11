{{php}}<?php

$blog_url = get_bloginfo( 'url' ) . '/';

$logo_id  = !empty( get_option( 'wpeb_logo' ) ) ? get_option( 'wpeb_logo' ) : '';

// Check if contains URL or int
if( !empty( $logo_id ) ) {

	if( is_numeric( $logo_id ) ) {

		$logo_src = wp_get_attachment_image_src( $logo_id, 'full' )[0];
		$logo_alt = get_post_meta( $logo_id, '_wp_attachment_image_alt', TRUE );
		$logo_alt = !empty( $logo_alt ) ? $logo_alt : get_bloginfo( 'name' );

	} elseif( is_string( $logo_id ) ) {

		$logo_src = $logo_id;
		$logo_alt = get_bloginfo( 'name' );

	}

}

$menu_nav = wp_nav_menu(
	array(
		'theme_location' => 'menu_header_main',
		'container' => 'nav',
		'items_wrap' => '<ul id="%1$s" class="menu-item %2$s">%3$s</ul>',
		'container_class' => 'nav_main_menu',
		'menu_class' => 'ul_main_menu',
		'menu_id' => 'ul_main_menu',
		'echo' => FALSE,
		'walker' => new Walker_Nav_Main_Menu,
	)
);

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<header id="ecode_section_62_template_73" class="ecode_section_62_template_73"{{builder}} data-edit="ecode_section_62_template_73"{{/builder}}>
		<div class="header_width">
			<figure class="logo"{{builder}} data-edit="logo"{{/builder}}>
				<a href="{{blog_url}}">
					<img src="{{logo_src}}" alt="{{logo_alt}}">
				</a>
			</figure>
			<div id="toggle_menu" class="toggle_menu">
				<svg width="40px" height="35px" viewBox="0 0 40 35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-10.000000, -10.000000)" fill="#333333"><g transform="translate(10.000000, 10.000000)"><path d="M3.58315789,25.8327528 C0.746447368,25.8327528 0.746447368,27.5432959 0.746447368,28.4312734 C0.746447368,34.4257116 7.02973684,34.9760112 14.7806579,34.9760112 L25.1301316,34.9760112 C32.8810526,34.9760112 39.1643421,33.9299438 39.1643421,28.4312734 C39.1643421,27.5432959 38.8926316,25.8327528 36.3544737,25.8327528 L3.58315789,25.8327528 Z"></path><path d="M39.9110526,21.2396255 C39.9110526,22.2213296 39.1048684,23.0244944 38.1194737,23.0244944 L1.79157895,23.0244944 C0.806184211,23.0244944 0,22.2213296 0,21.2396255 L0,19.901236 C0,18.9195318 0.806184211,18.116367 1.79157895,18.116367 L38.1194737,18.116367 C39.1048684,18.116367 39.9110526,18.9195318 39.9110526,19.901236 L39.9110526,21.2396255 Z"></path><path d="M20.6513158,0.0664606742 L19.2597368,0.0664606742 C11.5089474,0.0664606742 0.746578947,4.83891386 0.746578947,12.5608052 C0.746578947,13.4487828 1.01828947,15.1591948 3.55631579,15.1591948 L36.3278947,15.1591948 C39.1646053,15.1591948 39.1646053,13.4487828 39.1646053,12.5608052 C39.1644737,4.83891386 28.4021053,0.0664606742 20.6513158,0.0664606742 Z M11.5464474,9.97303371 C10.8057895,11.2036704 9.53013158,11.7977528 8.69710526,11.3001498 C7.86407895,10.8024157 7.78921053,9.40162921 8.52986842,8.17099251 C9.27052632,6.94048689 10.5461842,6.34627341 11.3792105,6.84400749 C12.2121053,7.34161049 12.2871053,8.74252809 11.5464474,9.97303371 Z M19.9555263,11.7850375 C19.0278947,11.7850375 18.2757895,10.5703933 18.2757895,9.07207865 C18.2757895,7.57376404 19.0278947,6.35911985 19.9555263,6.35911985 C20.8831579,6.35911985 21.6352632,7.57376404 21.6352632,9.07207865 C21.6352632,10.5703933 20.8831579,11.7850375 19.9555263,11.7850375 Z M31.2139474,11.3001498 C30.3809211,11.7977528 29.1052632,11.2036704 28.3646053,9.97303371 C27.6239474,8.74252809 27.6988158,7.34161049 28.5318421,6.84400749 C29.3648684,6.34627341 30.6405263,6.94048689 31.3811842,8.17099251 C32.1219737,9.40162921 32.0471053,10.8024157 31.2139474,11.3001498 Z" fill-rule="nonzero"></path></g></g></g></svg>
			</div>
			<section id="container_main_menu" class="container_main_menu">
				{{php}}{{menu_nav}}{{/php}}
				{{builder}}<nav class="nav_main_menu">
					<ul class="menu-item ul_main_menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item current_page_item">
							<a href="#" data-edit="nav_main_menu .menu-item a">Home</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#" data-edit="nav_main_menu .menu-item a">About us</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#" data-edit="nav_main_menu .menu-item a">Services</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#" data-edit="nav_main_menu .menu-item a">Our Team</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#" data-edit="nav_main_menu .menu-item a">Blog</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page button_primary">
							<a href="#" data-edit="nav_main_menu .menu-item a">Contact Us</a>
						</li>
					</ul>
				</nav>{{/builder}}
			</section>
			{{php}}<?php

			// Display RRSS
			wpeb_get_rrss();

			?>{{/php}}{{builder}}<div class="ecode_social">
				<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#000000"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i></a>
				<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#000000"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i></a>
				<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#000000"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i></a>
				<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#000000"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i></a>
				<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#000000"></g></svg></i></a>
			</div>{{/builder}}
		</div>
	</header>
</section>
