<section class="ecoded_builder_styles_category">
	<h3 class="ecode_button_open_styles" data-id="border">Borde</h3>
	<section class="content_styles" data-id="border">
		<article>
			<h4>Radio de las esquinas</h4>
			<div id="container_border_radius" class="container_border_radius">
				<div id="container_border_radius_example" class="container_border_radius_example">
					<span class="line_1"></span>
					<span class="line_2"></span>
					<i id="button_border_radius_link" class="button_border_radius_link"><?php echo get_icon_dashboard( 'icon_text_link' ); ?></i>
				</div>
				<article class="article_border_radius article_border_radius_top_left">
					<div class="style">
						<input type="number" id="edit_border_top_left_radius" class="edit_border_top_left_radius" name="border-top-left-radius" value="">
					</div>
				</article>
				<article class="article_border_radius article_border_radius_top_right">
					<div class="style">
						<input type="number" id="edit_border_top_right_radius" class="edit_border_top_right_radius" name="border-top-right-radius" value="">
					</div>
				</article>
				<article class="article_border_radius article_border_radius_bottom_right">
					<div class="style">
						<input type="number" id="edit_border_bottom_left_radius" class="edit_border_bottom_left_radius" name="border-bottom-left-radius" value="">
					</div>
				</article>
				<article class="article_border_radius article_border_radius_bottom_left">
					<div class="style">
						<input type="number" id="edit_border_bottom_right_radius" class="edit_border_bottom_right_radius" name="border-bottom-right-radius" value="">
					</div>
				</article>
			</div>
		</article>
		<article>
			<h4>Estilo de los bordes<span id="button_reset_border" class="button_reset_border">Reset</span></h4>
			<div class="container_buttons_border">
				<div class="button_border button_border_selected" data-border="all">
					<i><?php echo get_icon_dashboard( 'icon_text_border_all' ); ?></i>
				</div>
				<div class="button_border" data-border="top">
					<i><?php echo get_icon_dashboard( 'icon_text_border_top' ); ?></i>
				</div>
				<div class="button_border" data-border="left">
					<i><?php echo get_icon_dashboard( 'icon_text_border_left' ); ?></i>
				</div>
				<div class="button_border" data-border="bottom">
					<i><?php echo get_icon_dashboard( 'icon_text_border_bottom' ); ?></i>
				</div>
				<div class="button_border" data-border="right">
					<i><?php echo get_icon_dashboard( 'icon_text_border_right' ); ?></i>
				</div>
			</div>
			<div class="container_border_example">
				<div id="border_example" class="border_example"></div>
			</div>
		</article>
		<section id="container_edit_border_all" class="container_border container_border_show">
			<article class="">
				<h4>Ancho del borde</h4>
				<div class="style style_range">
					<input type="range" id="" class="edit_border_width" value="0" min="0" max="99" autocomplete="off">
					<input type="number" id="edit_border_width" class="edit_border_width" min="0" max="99">
					<span>px</span>
				</div>
			</article>
			<article class="">
				<h4>Color del borde</h4>
				<div class="style style_color">
					<div class="color">
						<input type="radio" id="border_color_text_primary" name="border_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
						<label for="border_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_color_text_secondary" name="border_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
						<label for="border_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_color_text_black" name="border_color_text" value="#000000">
						<label for="border_color_text_black" style="background-color:#000000;"></label>
					</div>
					<div class="color color_white">
						<input type="radio" id="border_color_text_white" name="border_color_text" value="#FFFFFF">
						<label for="border_color_text_white" style="background-color:#FFFFFF;"></label>
					</div>
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_border_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_border_color_text_hidden" class="property" name="border_color" value="">
					</div>
				</div>
			</article>
			<article class="">
				<h4>Estilo del borde</h4>
				<div class="style_select">
					<select name="" id="editor_border_style" class="editor_border_style">
						<option value=""> --- </option>
						<option value="solid">Sólido</option>
						<option value="dashed">Discontinuo</option>
						<option value="dotted">Punteado</option>
						<option value="double">Doble</option>
						<option value="groove">Ranura</option>
						<option value="ridge">Cresta</option>
						<option value="inset">Inserción</option>
						<option value="outset">Inicio</option>
						<option value="none">Ninguno</option>
					</select>
				</div>
			</article>
		</section>
		<section id="container_edit_border_top" class="container_border">
			<article class="">
				<h4>Ancho del borde superior</h4>
				<div class="style style_range">
					<input type="range" id="" class="edit_border_top_width" value="0" min="0" max="99" autocomplete="off">
					<input type="number" id="edit_border_top_width" class="edit_border_top_width" min="0" max="99">
					<span>px</span>
				</div>
			</article>
			<article class="">
				<h4>Color del borde superior</h4>
				<div class="style style_color">
					<div class="color">
						<input type="radio" id="border_top_color_text_primary" name="border_top_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
						<label for="border_top_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_top_color_text_secondary" name="border_top_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
						<label for="border_top_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_top_color_text_black" name="border_top_color_text" value="#000000">
						<label for="border_top_color_text_black" style="background-color:#000000;"></label>
					</div>
					<div class="color color_white">
						<input type="radio" id="border_top_color_text_white" name="border_top_color_text" value="#FFFFFF">
						<label for="border_top_color_text_white" style="background-color:#FFFFFF;"></label>
					</div>
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_border_top_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_border_top_color_text_hidden" class="property" name="border_top_color" value="">
					</div>
				</div>
			</article>
			<article class="">
				<h4>Estilo del borde superior</h4>
				<div class="style_select">
					<select name="" id="editor_border_top_style" class="editor_border_top_style">
						<option value=""> --- </option>
						<option value="solid">Sólido</option>
						<option value="dashed">Discontinuo</option>
						<option value="dotted">Punteado</option>
						<option value="double">Doble</option>
						<option value="groove">Ranura</option>
						<option value="ridge">Cresta</option>
						<option value="inset">Inserción</option>
						<option value="outset">Inicio</option>
						<option value="none">Ninguno</option>
					</select>
				</div>
			</article>
		</section>
		<section id="container_edit_border_bottom" class="container_border">
			<article class="">
				<h4>Ancho del borde inferior</h4>
				<div class="style style_range">
					<input type="range" id="" class="edit_border_bottom_width" value="0" min="0" max="99" autocomplete="off">
					<input type="number" id="edit_border_bottom_width" class="edit_border_bottom_width" min="0" max="99">
					<span>px</span>
				</div>
			</article>
			<article class="">
				<h4>Color del borde inferior</h4>
				<div class="style style_color">
					<div class="color">
						<input type="radio" id="border_bottom_color_text_primary" name="border_bottom_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
						<label for="border_bottom_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_bottom_color_text_secondary" name="border_bottom_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
						<label for="border_bottom_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_bottom_color_text_black" name="border_bottom_color_text" value="#000000">
						<label for="border_bottom_color_text_black" style="background-color:#000000;"></label>
					</div>
					<div class="color color_white">
						<input type="radio" id="border_bottom_color_text_white" name="border_bottom_color_text" value="#FFFFFF">
						<label for="border_bottom_color_text_white" style="background-color:#FFFFFF;"></label>
					</div>
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_border_bottom_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_border_bottom_color_text_hidden" class="property" name="border_bottom_color" value="">
					</div>
				</div>
			</article>
			<article class="">
				<h4>Estilo del borde inferior</h4>
				<div class="style_select">
					<select name="" id="editor_border_bottom_style" class="editor_border_bottom_style">
						<option value=""> --- </option>
						<option value="solid">Sólido</option>
						<option value="dashed">Discontinuo</option>
						<option value="dotted">Punteado</option>
						<option value="double">Doble</option>
						<option value="groove">Ranura</option>
						<option value="ridge">Cresta</option>
						<option value="inset">Inserción</option>
						<option value="outset">Inicio</option>
						<option value="none">Ninguno</option>
					</select>
				</div>
			</article>
		</section>
		<section id="container_edit_border_left" class="container_border">
			<article class="">
				<h4>Ancho del borde izquierdo</h4>
				<div class="style style_range">
					<input type="range" id="" class="edit_border_left_width" value="0" min="0" max="99" autocomplete="off">
					<input type="number" id="edit_border_left_width" class="edit_border_left_width" min="0" max="99">
					<span>px</span>
				</div>
			</article>
			<article class="">
				<h4>Color del borde izquierdo</h4>
				<div class="style style_color">
					<div class="color">
						<input type="radio" id="border_left_color_text_primary" name="border_left_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
						<label for="border_left_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_left_color_text_secondary" name="border_left_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
						<label for="border_left_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_left_color_text_black" name="border_left_color_text" value="#000000">
						<label for="border_left_color_text_black" style="background-color:#000000;"></label>
					</div>
					<div class="color color_white">
						<input type="radio" id="border_left_color_text_white" name="border_left_color_text" value="#FFFFFF">
						<label for="border_left_color_text_white" style="background-color:#FFFFFF;"></label>
					</div>
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_border_left_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_border_left_color_text_hidden" class="property" name="border_left_color" value="">
					</div>
				</div>
			</article>
			<article class="">
				<h4>Estilo del borde izquierdo</h4>
				<div class="style_select">
					<select name="" id="editor_border_left_style" class="editor_border_left_style">
						<option value=""> --- </option>
						<option value="solid">Sólido</option>
						<option value="dashed">Discontinuo</option>
						<option value="dotted">Punteado</option>
						<option value="double">Doble</option>
						<option value="groove">Ranura</option>
						<option value="ridge">Cresta</option>
						<option value="inset">Inserción</option>
						<option value="outset">Inicio</option>
						<option value="none">Ninguno</option>
					</select>
				</div>
			</article>
		</section>
		<section id="container_edit_border_right" class="container_border">
			<article class="">
				<h4>Ancho del borde derecho</h4>
				<div class="style style_range">
					<input type="range" id="" class="edit_border_right_width" value="0" min="0" max="99" autocomplete="off">
					<input type="number" id="edit_border_right_width" class="edit_border_right_width" min="0" max="99">
					<span>px</span>
				</div>
			</article>
			<article class="">
				<h4>Color del borde derecho</h4>
				<div class="style style_color">
					<div class="color">
						<input type="radio" id="border_right_color_text_primary" name="border_right_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
						<label for="border_right_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_right_color_text_secondary" name="border_right_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
						<label for="border_right_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
					</div>
					<div class="color">
						<input type="radio" id="border_right_color_text_black" name="border_right_color_text" value="#000000">
						<label for="border_right_color_text_black" style="background-color:#000000;"></label>
					</div>
					<div class="color color_white">
						<input type="radio" id="border_right_color_text_white" name="border_right_color_text" value="#FFFFFF">
						<label for="border_right_color_text_white" style="background-color:#FFFFFF;"></label>
					</div>
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_border_right_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_border_right_color_text_hidden" class="property" name="border_right_color" value="">
					</div>
				</div>
			</article>
			<article class="">
				<h4>Estilo del borde derecho</h4>
				<div class="style_select">
					<select name="" id="editor_border_right_style" class="editor_border_right_style">
						<option value=""> --- </option>
						<option value="solid">Sólido</option>
						<option value="dashed">Discontinuo</option>
						<option value="dotted">Punteado</option>
						<option value="double">Doble</option>
						<option value="groove">Ranura</option>
						<option value="ridge">Cresta</option>
						<option value="inset">Inserción</option>
						<option value="outset">Inicio</option>
						<option value="none">Ninguno</option>
					</select>
				</div>
			</article>
		</section>
	</section>
</section>
