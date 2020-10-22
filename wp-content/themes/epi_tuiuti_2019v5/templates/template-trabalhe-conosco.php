<?php
	/* Template Name: Trabalhe Conosco */  
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
				<p>Preencha o formulário abaixo e nos envie seu currículo.</p>

				<form action="<?php bloginfo('home'); ?>/resposta-trabalhe-conosco" class="content_form form-trabalhe" enctype="multipart/form-data" method="post">
					<div class="form_control">
						<i class="fas fa-user"></i>
						<input type="text" name="nome-trabalhe" id="nome-trabalhe" placeholder="Nome*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-envelope"></i>
						<input type="email" name="email-trabalhe" id="email-trabalhe" placeholder="E-mail*" required>
					</div>

					<div class="form_control">
						<i class="fas fa-phone fa-flip-horizontal"></i>
						<input type="tel" name="tel-trabalhe" id="tel-trabalhe" class="tel_form" placeholder="Telefone*" required>
					</div>

					<div class="form_control form_control_anexo">
						<label for="">Anexe seu currículo*:</label><input type="file" name="file_trabalhe" id="file_trabalhe">
					</div>

					<div class="form_control">
						<select name="area-interese-trabalhe" id="area-interese-trabalhe" required>
							<option value="">Selecione a Área de interesse</option>
							<option value="Administrativo">Administrativo</option>
							<option value="Área Técnica">Área Técnica</option>
							<option value="Compras">Compras</option>
							<option value="Estoque">Estoque</option>
							<option value="Financeiro">Financeiro</option>
							<option value="Logística">Logística</option>
							<option value="Marketing">Marketing</option>
							<option value="Outros">Outros</option>
							<option value="RH">RH</option>
							<option value="Tecnologia">Tecnologia</option>
							<option value="Transporte">Transporte</option>
							<option value="Vendas">Vendas</option>
						</select>
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