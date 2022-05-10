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

$logo_id_2  = !empty( get_option( 'wpeb_white_logo' ) ) ? get_option( 'wpeb_white_logo' ) : '';

// Check if contains URL or int
if( !empty( $logo_id_2 ) ) {

	if( is_numeric( $logo_id_2 ) ) {

		$logo_src_2 = wp_get_attachment_image_src( $logo_id_2, 'full' )[0];

	} elseif( is_string( $logo_id_2 ) ) {

		$logo_src_2 = $logo_id_2;

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
	<header id="ecode_section_154_template_249" class="ecode_section_154_template_249">
		<div class="header_width">
			<a href="{{blog_url}}" class="logo">
				<picture>
					<source media="(min-width:1024px)" srcset="{{logo_src_2}}">
					<img src="{{logo_src}}" alt="{{logo_alt}}">
				</picture>
			</a>
			<div id="toggle_menu" class="toggle_menu">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>
			<section id="container_main_menu" class="container_main_menu">
				{{php}}{{menu_nav}}{{/php}}{{builder}}
				<nav class="nav_main_menu">
					<ul class="menu-item ul_main_menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item current_page_item">
							<a href="#">Home</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">About us</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children current-menu-ancestor">
							<span class="element_without_link">Service</span>
							<ul class="sub-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item">
									<a href="#">Service 1</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 2</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 3</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 4</a>
								</li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Our Team</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Blog</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Contact Us</a>
						</li>
					</ul>
				</nav>{{/builder}}
			</section>
		</div>
	</header>
</section>
