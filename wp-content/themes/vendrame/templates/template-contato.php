<?php
	/* Template Name: Contato */  
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<h1 class="title full"><?php the_title(); ?></h1>

		<?php the_content(); ?>
		
	</section>
	<!-- fim content -->

	<div class="form_grid content">
		<!-- contato info -->
		<div class="contato_info_wrapper">
			<!-- <div class="contato_info">
				<span><i class="fas fa-clock"></i></span>
				<p>Horário de funcionamento:<br>Seg à Sex 8h às 12h - 13h às 17h45</p>
			</div> -->

			<div class="contato_info">
				<span><i class="fas fa-phone"></i></span>
				<p>Telefone:<br>+55 11 2942-9988</p>
			</div>

			<div class="contato_info">
				<a href="https://web.whatsapp.com/send?phone=551194712-3303&text=Envie uma mensagem" title="Whatsapp" class="ao5-whatsapp-event">
					<span><i class="fab fa-whatsapp"></i></span>
					<p>whatsapp:<br>+55 11 94712-3303</p>
				</a>
			</div>

			<div class="contato_info">
				<span><i class="fas fa-envelope"></i></span>
				<p>E-mail de Atendimento:<br><a href="mailto:atendimento@epi-tuiuti.com.br" target="_blank">atendimento@epi-tuiuti.com.br</a></p>
			</div>

			<!-- <div class="contato_info">
				<span><i class="fas fa-map-marker-alt"></i></span>
				<p>Rua Maria Prestes Maia, 477 Vila Guilherme, São Paulo - SP Cep 02047-000</p>
			</div> -->
		</div>
		<!-- contato info -->
		<!-- form contato wrapper -->
		<section class="form_contato_wrapper">
			<section class="content">
				<p>Preencha o formulário abaixo, para enviar seus comentários ou sugestões e aguarde nosso breve retorno!</p>
	
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
							<option value="">Selecione uma área*</option>
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
				</form>
	
				<p class="aviso_form">*Todos os campos de preenchimento são obrigatórios</p>
			</section>
		</section>
		<!-- form contato wrapper -->
	</div>
	<div class="contato_address">
		<div class="content">
			<div class="contato_address_info">
				<span><i class="fas fa-map-marker-alt"></i> Matriz</span>
				<p>Av. Tucuruvi, 563 – 1º andar – Tucuruvi<br>
					São Paulo/SP<br>
					CEP: 02305-001<br>
					Telefone: (11) 2262-4733<br>
					contato@vendrame.com.br
				</p>
			</div>
			<div class="contato_address_info">
				<span><i class="fas fa-map-marker-alt"></i> Ambulatório – Tucuruvi</span>
				<p>Av. Tucuruvi, 563 – 1º andar – Tucuruvi<br>
					São Paulo/SP<br>
					CEP: 02305-001<br>
					Telefone: (11) 2262-4733<br>
					contato@vendrame.com.br
				</p>
			</div>
			<div class="contato_address_info">
				<span><i class="fas fa-map-marker-alt"></i> Filial Caxias do Sul</span>
				<p>Av. Tucuruvi, 563 – 1º andar – Tucuruvi<br>
					São Paulo/SP<br>
					CEP: 02305-001<br>
					Telefone: (11) 2262-4733<br>
					contato@vendrame.com.br
				</p>
			</div>
		</div>
	</div>

	<!-- contato baixo -->
	<?php // include (TEMPLATEPATH . '/assets/includes/contato_baixo.php'); ?>
	<!-- contato baixo -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>