<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_58_template_68"{{builder}} data-edit="ecode_section_58_template_68"{{/builder}}>
		<section class="ecode_section_58_template_68_width">
			<section class="ecode_blog_comments">
				<section class="comments">
					{{php}}<?php

					comments_template();

					?>{{/php}}
					{{builder}}<ul class="list_comments">
						<li class="comment even thread-even depth-1">
							<figure data-edit="list_comments figure"><img loading="lazy" alt="" src="https://source.unsplash.com/150x150/?person" srcset="https://source.unsplash.com/150x150/?person" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"></figure>
							<div class="name_date">
								<h4 data-edit="list_comments h4">José Martínez</h4>
								<time data-edit="list_comments time">2 de febrero de 2021</time>
							</div>
							<div class="comment_text">
								<p data-edit="list_comments .comment_text p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</li>
						<li class="comment even thread-even depth-1">
							<figure data-edit="list_comments figure"><img loading="lazy" alt="" src="https://source.unsplash.com/150x150/?person" srcset="https://source.unsplash.com/150x150/?person" class="avatar avatar-96 photo" height="96" width="96" loading="lazy"></figure>
							<div class="name_date">
								<h4 data-edit="list_comments h4">José Martínez</h4>
								<time data-edit="list_comments time">2 de febrero de 2021</time>
							</div>
							<div class="comment_text">
								<p data-edit="list_comments .comment_text p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</li>
					</ul>
					<section class="form_comment">
						<h3 class="title" data-edit="form_comment .title">Deja un comentario</h3>
						<p class="desc" data-edit="form_comment .desc">Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *</p>
						<form action="#" method="post" id="commentform" class="comment-form">
							<div class="container_input_group">
								<div class="container_input">
									<!-- <label for="author">Nombre*</label> -->
									<input id="author" class="field_required" name="author" type="text" value="" placeholder="Nombre*" size="30">
								</div>
								<div class="container_input">
									<!-- <label for="">Email*</label> -->
									<input id="email" class="field_required" name="email" type="email" value="" placeholder="Email*" size="30">
								</div>
							</div>
							<div class="container_input">
								<!-- <label for="comment">Comentario*</label> -->
								<textarea placeholder="Comentario*" class="field_required" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
							</div>
							<div class="terms_submit">
								<div class="terms">
									<input type="checkbox" id="comment_terms">
									<label for="comment_terms"><p data-edit="form_comment .terms p">He leído y acepto las Condiciones del servicio y la Política de privacidad</p></label>
								</div>
								<p class="ecode_button ecode_button_primary" data-edit="form_comment .ecode_button">Enviar comentario</p>
							</div>
						</form>
					</section>{{/builder}}
				</section>
			</section>
		</section>
	</section>
</section>
