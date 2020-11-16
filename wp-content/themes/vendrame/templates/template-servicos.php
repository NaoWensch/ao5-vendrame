<?php
    /* Template Name: Serviços */  
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

	<section class="content content_top">
		<h1 class="title"><?php echo the_field('titulo_pagina'); ?></h1>
		
		<p><?php the_field('descricao')?></p>
	</section>

	<!-- home_principais -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_principais.php'); ?>
	<!-- fim home_principais -->

	<!-- Servicos -->
	<section class="content-list">
		<div class="content">
			<h2 class="content-list_title"><?php the_field('titulo_centro') ?></h2>
			<p class="content-list_desc"><?php the_field('descricao_centro') ?></p>
			<ul class="content-list_itens">
				<?php while ( have_rows('lista_de_itens') ) : the_row(); ?>
					<li><i class="fas fa-check"></i> <?php the_sub_field('texto') ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<!-- quem somos -->
		<section class="empresa-numbers">
			<div class="content">
				<div class="empresa-numbers-list">
					<?php while ( have_rows('listagem_numeros') ) : the_row(); ?>
						<div class="empresa-numbers-item">
							<div class="empresa-numbers-img">
								<img src="<?php the_sub_field('imagem'); ?>" alt="<?php the_sub_field('titulo'); ?>">
							</div>
							<div class="empresa-numbers-content">
								<strong class="title"><?php the_sub_field('titulo') ?></strong>
								<p class="desc"><?php the_sub_field('descricao') ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<!-- quem somos -->
	</section>
	<!-- Servicos -->


	<section class="clientes-depoimentos">
		<div class="content">
			<h3 class="clientes-depoimentos-title">Depoimentos</h3>
			<span class="clientes-depoimentos-quote">“</span>
			<div class="clientes-depoimentos-list">
				<?php while ( have_rows('depoimentos_conteudos') ) : the_row(); ?>
					<div class="clientes-depoimentos-item">
						<p class="desc"><?php the_sub_field('descricao') ?></p>
						<strong class="name"><?php the_sub_field('nome') ?></strong>
						<strong class="cargo"><?php the_sub_field('cargo') ?></strong>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="home_marcas_prev"><span><i class="fas fa-chevron-left"></i></span></div>
			<div class="home_marcas_next"><span><i class="fas fa-chevron-right"></i></span></div>
		</div>
	</section>

	<section class="form_contato_wrapper">
		<section class="content">	
		<div class="form_contato_left">
			<h2>Entre em contato com nossos especialistas em SST</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et .</p>
		</div>

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
	</section>
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>