<?php
	/* Template Name: Fornecedores */  
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

		<!-- fornecedores wrapper -->
		<div class="contato_wrapper">

			<!-- contato left -->
			<div class="contato_left">
				<p>Preencha o formulário abaixo com os dados da empresa.</p>

				<form action="<?php bloginfo('home'); ?>/resposta-fornecedores" class="content_form form-fornecedores" enctype="multipart/form-data" method="post">
					<div class="form_control">
						<i class="fas fa-building"></i>
						<input type="text" name="empresa-fornecedor" id="empresa-fornecedor" placeholder="Empresa*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-user"></i>
						<input type="text" name="contato-fornecedor" id="contato-fornecedor" placeholder="Contato*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-envelope"></i>
						<input type="email" name="email-fornecedor" id="email-fornecedor" placeholder="E-mail*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-phone fa-flip-horizontal"></i>
						<input type="tel" name="tel-fornecedor" id="tel-fornecedor" class="tel_form" placeholder="Telefone*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-map-marked"></i>
						<input type="text" name="endereco-fornecedor" id="endereco-fornecedor" placeholder="Endereço*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-clipboard-list"></i>
						</label><input type="text" name="produto-fornecedor" id="produto-fornecedor" placeholder="Qual o seu produto?*" required>
					</div>

					<div class="form_control form_control_anexo">
						<label for="">Anexe seu catálogo*:</label><input type="file" name="file_fornecedor" id="file_fornecedor">
					</div>

					<div class="form_control">
						<i class="fas fa-edit"></i>
						<textarea name="msg-fornecedor" id="msg-fornecedor" placeholder="Mensagem*" required></textarea>
					</div>

					<div class="form_control form_button">
						<button type="submit">ENVIAR DADOS</button>
					</div>
				</form>

				<p class="aviso_form">*Todos os campos de preenchimento são obrigatórios</p>
			</div>
			<!-- contato left -->

			<!-- contato right -->
			<div class="contato_right">
				<div class="contato_right_p">
					<span><i class="fas fa-phone"></i></span>
					<p>+55 11 2942-9988</p>
				</div>

				<div class="contato_right_p">
					<span><i class="fas fa-envelope"></i></span>
					<p><a href="mailto:atendimento@epi-tuiuti.com.br" target="_blank">atendimento@epi-tuiuti.com.br</a></p>
				</div>

				<div class="contato_right_p">
					<span><i class="fas fa-clock"></i></span>
					<p>Horário de funcionamento:<br>Seg à Sex das 8h às 12h - 13h às 17h45</p>
				</div>

				<div class="contato_right_p">
					<span><i class="fas fa-map-marker-alt"></i></span>
					<p>Rua Maria Prestes Maia, 477 - Vila Guilherme<br>São Paulo/SP - Cep 02047-000</p>
				</div>
			</div>
			<!-- contato_right -->

		</div>
		<!-- fornecedores wrapper -->
		
	</section>
	<!-- fim content -->

	<!-- contato baixo -->
	<?php include (TEMPLATEPATH . '/assets/includes/contato_baixo.php'); ?>
	<!-- contato baixo -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>