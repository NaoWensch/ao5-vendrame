<?php
    /* Template Name: Serviços Detalhe */  
    get_header(); ?>
<!-- index todas noticias -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper -page-servicos">

	<!-- content -->
	<section class="content content_institucionais">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

	</section>
	<!-- fim content -->

	<div class="content">
		<section class="banner_servicos">
			<h1 class="title"><?php echo the_field('titulo_banner'); ?></h1>
			<img src="<?php the_field('banner_imagem') ?>" alt="">
		</section>
		<p class="servicos_categoria_desc"><?php the_field('descricao')?></p>
	</div>
	<section class="servicos_categoria_wrapper">
		<div class="content">
		<section class="servicos_categoria">
			<h2 class="title"><?php the_field('normas_titulo_centro') ?></h2>
			<p class="descricao"><?php the_field('normas_descricao_centro') ?></p>

			<ul class="servicos_categoria_normas_list">
				<?php while ( have_rows('normas_centro') ) : the_row(); ?>
					<li>
						<strong><?php the_sub_field('titulo') ?> <i class="fas fa-angle-down"></i></strong>
						<p><?php the_sub_field('descricao') ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
		</section>
		<a class="video" href="https://youtu.be/2nx5JdunCDY" data-lity>
          <div class="midia-video">
            <img src="assets/images/loading-midia.gif" alt="" class="midia-gif">
            <img class="image" src="assets/images/video-1.jpg" alt="">
            <button class="midia-play">
              <i class="fa fa-play" aria-hidden="true"></i>
             <span>dê play</span>
            </button>
          </div>
          <div class="midia-content">
            <strong class="midia-nome"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> RUI OLIVEIRA</strong>
            <p class="midia-desc">“A maior sensação é que agora eu<br> tenho o Controlo da Minha Vida”</p>
          </div>
        </a>
		<section class="servicos_categoria_form">
			<form action="<?php bloginfo('home'); ?>/resposta-contato" class="content_form form-contato" method="post">
				<div class="form_control">
					<i class="fas fa-user"></i>
					<input type="text" name="nome" id="nome-contato" placeholder="Nome*" required>
				</div>

				<div class="form_control">
					<i class="fas fa-envelope"></i>
					<input type="email" name="email" id="email-contato" placeholder="E-mail*" required>
				</div>

				<div class="form_control">
					<i class="fas fa-phone fa-flip-horizontal"></i>
					<input type="tel" name="tel" id="tel-contato" class="tel_form" placeholder="Telefone*" required>
				</div>

				<div class="form_control">
					<select name="assunto" id="assunto" required>
						<option value="">Empresa*</option>
						<option value="Comercial">Comercial</option>
						<option value="Dúvida">Dúvida</option>
						<option value="Reclamação">Reclamação</option>
						<option value="Elogio">Elogio</option>
						<option value="Sugestão">Sugestão</option>
					</select>
				</div>

				<div class="form_control">
					<i class="fas fa-edit"></i>
					<textarea name="msg" id="msg-contato" placeholder="mensagem*" required></textarea>
				</div>

				<div class="form_control form_button">
					<button type="submit">ENVIAR MENSAGEM</button>
				</div>
				<p class="aviso_form">*Todos os campos de preenchimento são obrigatórios</p>
			</form>
		</section>
		</div>
	</section>
	<div class="content">
		<section class="servicos_categoria -just-col">
			<h2 class="title"><?php the_field('normas_titulo_footer') ?></h2>
			<p class="descricao"><?php the_field('normas_descricao_footer') ?></p>

			<ul class="servicos_categoria_normas_list">
				<?php while ( have_rows('normas_footer') ) : the_row(); ?>
					<li>
						<strong><?php the_sub_field('titulo') ?> <i class="fas fa-angle-down"></i></strong>
						<p><?php the_sub_field('descricao') ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
		</section>
	</div>
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>