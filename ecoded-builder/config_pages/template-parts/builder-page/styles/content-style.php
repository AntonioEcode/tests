<section class="ecoded_builder_styles_category">
	<h3 class="ecode_button_open_styles" data-id="styles">Estilo</h3>
	<section class="content_styles" data-id="styles">
		<article class="container_text property_text property_text_hide">
			<h4>Tamaño del texto</h4>
			<div class="style style_range">
				<input type="range" class="edit_font_size" min="0" max="99" autocomplete="off">
				<input type="number" id="edit_font_size" class="edit_font_size" min="0" max="99">
				<span>px</span>
			</div>
		</article>
		<article class="property_text">
			<h4>Espacio entre letras</h4>
			<div class="style style_range">
				<input type="range" class="edit_letter_spacing" value="0" min="0" max="99" autocomplete="off">
				<input type="number" id="edit_letter_spacing" class="edit_letter_spacing" min="0" max="99">
				<span>px</span>
			</div>
		</article>
		<article class="property_text">
			<h4>Altura de la linea (texto)</h4>
			<div class="style style_range">
				<input type="range" class="edit_line_height" value="0" min="0" max="99" autocomplete="off">
				<input type="number" id="edit_line_height" class="edit_line_height" min="0" max="99">
				<span>px</span>
			</div>
		</article>
		<article class="property_text">
			<h4>Color del texto</h4>
			<div class="style style_color">
				<div class="color">
					<input type="radio" id="color_text_primary" name="color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
					<label for="color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
				</div>
				<div class="color">
					<input type="radio" id="color_text_secondary" name="color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
					<label for="color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
				</div>
				<div class="color">
					<input type="radio" id="color_text_black" name="color_text" value="#000000">
					<label for="color_text_black" style="background-color:#000000;"></label>
				</div>
				<div class="color color_white">
					<input type="radio" id="color_text_white" name="color_text" value="#FFFFFF">
					<label for="color_text_white" style="background-color:#FFFFFF;"></label>
				</div>
				<div class="colorpicker">
					<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
					<div id="colorpicker_color_text" class="container_colorpicker"></div>
					<input type="hidden" id="colorpicker_color_text_hidden" class="property" name="color" value="">
				</div>
			</div>
		</article>
		<article class="property_background_color">
			<h4>Color del fondo</h4>
			<div class="style style_color">
				<div class="color">
					<input type="radio" id="background_color_text_primary" name="background_color_text" value="<?php echo get_option( 'wpeb_primary_color' ); ?>">
					<label for="background_color_text_primary" style="background-color:<?php echo get_option( 'wpeb_primary_color' ); ?>;"></label>
				</div>
				<div class="color">
					<input type="radio" id="background_color_text_secondary" name="background_color_text" value="<?php echo get_option( 'wpeb_secondary_color' ); ?>">
					<label for="background_color_text_secondary" style="background-color:<?php echo get_option( 'wpeb_secondary_color' ); ?>;"></label>
				</div>
				<div class="color">
					<input type="radio" id="background_color_text_black" name="background_color_text" value="#000000">
					<label for="background_color_text_black" style="background-color:#000000;"></label>
				</div>
				<div class="color color_white">
					<input type="radio" id="background_color_text_white" name="background_color_text" value="#FFFFFF">
					<label for="background_color_text_white" style="background-color:#FFFFFF;"></label>
				</div>
				<div class="colorpicker">
					<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
					<div id="colorpicker_background_color_text" class="container_colorpicker"></div>
					<input type="hidden" id="colorpicker_background_color_text_hidden" class="property" name="background_color" value="">
				</div>
			</div>
		</article>
		<article class="property_text">
			<h4>Estilo del texto</h4>
			<div class="style style_icons style_style">
				<div class="icon">
					<input type="checkbox" id="font_weight_bold" name="font_weight" value="bold">
					<label for="font_weight_bold"><i><?php echo get_icon_dashboard( 'icon_text_bold' ); ?></i></label>
				</div>
				<div class="icon">
					<input type="checkbox" id="font_style_italic" name="font_style" value="italic">
					<label for="font_style_italic"><i><?php echo get_icon_dashboard( 'icon_text_italic' ); ?></i></label>
				</div>
				<div class="icon">
					<input type="checkbox" id="text_decoration_underline" name="text_decoration" value="underline">
					<label for="text_decoration_underline"><i><?php echo get_icon_dashboard( 'icon_text_underline' ); ?></i></label>
				</div>
			</div>
		</article>
		<article class="property_text">
			<h4>Mayúsc / Minus</h4>
			<div class="style style_icons style_upppercase">
				<div class="icon icon_text_default">
					<input type="radio" id="text_transform_initial" name="text_transform" value="initial">
					<label for="text_transform_initial"><i><?php echo get_icon_dashboard( 'icon_text_default' ); ?></i></label>
				</div>
				<div class="icon icon_text_uppercase">
					<input type="radio" id="text_transform_uppercase" name="text_transform" value="uppercase">
					<label for="text_transform_uppercase"><i><?php echo get_icon_dashboard( 'icon_text_uppercase' ); ?></i></label>
				</div>
				<div class="icon icon_text_lowercase">
					<input type="radio" id="text_transform_lowercase" name="text_transform" value="lowercase">
					<label for="text_transform_lowercase"><i><?php echo get_icon_dashboard( 'icon_text_lowercase' ); ?></i></label>
				</div>
			</div>
		</article>
		<article>
			<h4>Alineación del texto</h4>
			<div class="style style_icons style_align">
				<div class="icon">
					<input type="radio" id="text_align_left" name="text_align" value="left">
					<label for="text_align_left"><i><?php echo get_icon_dashboard( 'icon_text_left' ); ?></i></label>
				</div>
				<div class="icon">
					<input type="radio" id="text_align_center" name="text_align" value="center">
					<label for="text_align_center"><i><?php echo get_icon_dashboard( 'icon_text_center' ); ?></i></label>
				</div>
				<div class="icon">
					<input type="radio" id="text_align_right" name="text_align" value="right">
					<label for="text_align_right"><i><?php echo get_icon_dashboard( 'icon_text_right' ); ?></i></label>
				</div>
				<div class="icon">
					<input type="radio" id="text_align_justify" name="text_align" value="justify">
					<label for="text_align_justify"><i><?php echo get_icon_dashboard( 'icon_text_justify' ); ?></i></label>
				</div>
			</div>
		</article>
		<article class="property_text">
			<h4>Sombra del texto</h4>
			<div class="style style_range style_shadow">
				<label for="text_shadow_x">Posición horizontal</label>
				<input type="range" id="" class="edit_text_shadow_x" value="0" min="-80" max="80" autocomplete="off">
				<input type="number" id="edit_text_shadow_x" class="edit_text_shadow_x" name="text_shadow_x">
				<span>px</span>
			</div>
			<div class="style style_range style_shadow">
				<label for="text_shadow_y">Posición vertical</label>
				<input type="range" id="" class="edit_text_shadow_y" value="0" min="-80" max="80" autocomplete="off">
				<input type="number" id="edit_text_shadow_y" class="edit_text_shadow_y" name="text_shadow_y">
				<span>px</span>
			</div>
			<div class="style style_range style_shadow">
				<label for="text_shadow_blur">Desenfoque de la sombra</label>
				<input type="range" id="" class="edit_text_shadow_blur" value="0" min="0" max="80" autocomplete="off">
				<input type="number" id="edit_text_shadow_blur" class="edit_text_shadow_blur" name="text_shadow_blur">
				<span>px</span>
			</div>
			<div class="style style_shadow style_color">
				<label for="text_shadow_color">Color de la sombra</label>
				<div class="color">
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_text_shadow_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_text_shadow_color_text_hidden" class="property" name="text_shadow_color" value="">
					</div>
				</div>
			</div>
		</article>
		<article>
			<h4>Sombra del elemento</h4>
			<div class="style style_range style_shadow">
				<label for="box_shadow_x">Posición horizontal</label>
				<input type="range" id="" class="edit_box_shadow_x" value="0" min="-80" max="80" autocomplete="off">
				<input type="number" id="edit_box_shadow_x" class="edit_box_shadow_x" name="box_shadow_x">
				<span>px</span>
			</div>
			<div class="style style_range style_shadow">
				<label for="box_shadow_y">Posición vertical</label>
				<input type="range" id="" class="edit_box_shadow_y" value="0" min="-80" max="80" autocomplete="off">
				<input type="number" id="edit_box_shadow_y" class="edit_box_shadow_y" name="box_shadow_y">
				<span>px</span>
			</div>
			<div class="style style_range style_shadow">
				<label for="box_shadow_blur">Desenfoque de la sombra</label>
				<input type="range" id="" class="edit_box_shadow_blur" value="0" min="0" max="80" autocomplete="off">
				<input type="number" id="edit_box_shadow_blur" class="edit_box_shadow_blur" name="box_shadow_blur">
				<span>px</span>
			</div>
			<div class="style style_range style_shadow">
				<label for="box_shadow_spread">Tamaño de la sombra</label>
				<input type="range" id="" class="edit_box_shadow_spread" value="0" min="-80" max="80" autocomplete="off">
				<input type="number" id="edit_box_shadow_spread" class="edit_box_shadow_spread" name="box_shadow_spread">
				<span>px</span>
			</div>
			<div class="style style_shadow style_color">
				<label for="box_shadow_color">Color de la sombra</label>
				<div class="color">
					<div class="colorpicker">
						<i><?php echo get_icon_dashboard( 'icon_colorpicker' ); ?></i>
						<div id="colorpicker_box_shadow_color_text" class="container_colorpicker"></div>
						<input type="hidden" id="colorpicker_box_shadow_color_text_hidden" class="property" name="box_shadow_color" value="">
					</div>
				</div>
			</div>
		</article>
	</section>
</section>
