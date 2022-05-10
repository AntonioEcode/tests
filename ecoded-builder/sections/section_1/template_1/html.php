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
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<header class="ecode_section_1_template_1">
		<div class="header_width">
			<a href="{{blog_url}}" class="logo">
				<picture>
					<source media="(min-width:1024px)" srcset="{{logo_src}}">
					<img src="{{logo_src}}" alt="{{logo_alt}}">
				</picture>
			</a>
			<div id="toggle_menu" class="toggle_menu">
				<span class="top"></span>
				<span class="mid"></span>
				<span class="bottom"></span>
			</div>
			<section id="container_main_menu" class="container_main_menu">
				{{menu_nav}}
			</section>
		</div>
	</header>
</section>
