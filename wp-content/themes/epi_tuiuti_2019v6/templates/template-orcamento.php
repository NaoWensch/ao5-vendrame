<?php
	if (!isset($_SESSION)) {
	  session_start();
	}

	if (!isset($_SESSION['carrinho'])) {
	    $_SESSION['carrinho'] = array();
	}

	$codProduto = $_POST["cod-produto"];
	$nomeProduto = $_POST["nome-produto"];
	$qtde = $_POST["qtde-produto"];
	$linkProduto = $_POST["link-produto"];
	$idProduto = $_POST["id-produto"];
	$catProduto = $_POST["categoria-produto"];
	$corProduto = $_POST["cor-produto"];
	$medidaProduto = $_POST["medida-produto"];
	$modeloProduto = $_POST["modelo-produto"];
	$tamanhoProduto = $_POST["tamanho-produto"];
	$capacidadeProduto = $_POST["capacidade-produto"];
	$dimenssoesProduto = $_POST["dimenssoes-produto"];
	$ref_medida_min_Produto = $_POST["ref-min-produto"];
	$ref_medida_max_Produto = $_POST["ref-max-produto"];
	$mod_min_max = $_POST["mod-altura-peso"];
	$mod_fechada_aberta_peso = $_POST["mod-fechada-aberta-peso"];
	$mod_altura_peso = $_POST["mod-min-max"];

	if (isset($_GET['acao'])) {

	    //Adiciona produto no carrinho e incrementa se for igual
	    if ($_GET['acao'] == 'add') {
	        $especificacoes = array();
	        if (!empty($corProduto)) {
	            $especificacoes[] = "Cor: ". $corProduto;
	        }
	        if (!empty($medidaProduto)) {
	            $especificacoes[] = "Medida: ". $medidaProduto;
	        }
	        if (!empty($modeloProduto)) {
	            $especificacoes[] = "Modelo: ". $modeloProduto;
	        }
	        if (!empty($tamanhoProduto)) {
	            $especificacoes[] = "Tamanho: ". $tamanhoProduto;
	        }
	        if (!empty($capacidadeProduto)) {
	            $especificacoes[] = "Capacidade: ". $capacidadeProduto;
	        }
	        if (!empty($dimenssoesProduto)) {
	            $especificacoes[] = "Dimensões: ". $dimenssoesProduto;
	        }
	        if (!empty($mod_min_max)) {
	            $especificacoes[] = "Modelo / Medida Mínima / Medida Máxima: ". $mod_min_max;
	        }
	        if (!empty($mod_fechada_aberta_peso)) {
	            $especificacoes[] = "Modelo / Fechada / Aberta / Peso Kg: ". $mod_fechada_aberta_peso;
	        }
	        if (!empty($mod_altura_peso)) {
	            $especificacoes[] = "Modelo / Altura / Peso Kg: ". $mod_altura_peso;
	        }

	        $hash = sha1($codProduto . implode('', $especificacoes));

	        if(isset($_SESSION['carrinho'][$hash])) {
	            $_SESSION['carrinho'][$hash]['qnt'] += 1;
	        } else {
	            $_SESSION['hashorcamento'] = $hash;

	            $_SESSION['carrinho'][$hash] = array(
	                'nome'      => $nomeProduto,
	                'cod'       => $codProduto,
	                'qnt'       => $qtde,
	                'espec'     => $especificacoes,
	                'link'      => $linkProduto,
	                'idprod'    => $idProduto,
	                'catprod'   => $catProduto,
	            );
	        }
	    }

	    // Incrementa o carrinho
	    if ($_GET['acao'] == 'mais') {
	        $hash = $_GET['hash'];
	        if (isset($_SESSION['carrinho'][$hash])) {
	            $_SESSION['carrinho'][$hash]['qnt'] = 1 + $_SESSION['carrinho'][$hash]['qnt'];
	        }
	    }

	    // Decrementa o carrinho
	    if ($_GET['acao'] == 'menos') {
	        $hash = $_GET['hash'];
	        if (isset($_SESSION['carrinho'][$hash]) and $_SESSION['carrinho'][$hash]['qnt'] > 1) {
	            $_SESSION['carrinho'][$hash]['qnt'] = $_SESSION['carrinho'][$hash]['qnt'] - 1;
	        }
	    }

	    // Remove produto do carrinho
	    if ($_GET['acao'] == 'del') {
	        $hash = $_GET['hash'];
	        if (isset($_SESSION['carrinho'][$hash])) {
	            unset($_SESSION['carrinho'][$hash]);
	        }
	    }
	}

	/* Template Name: Orçamento */  
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content content_orcamento">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- barra lateral -->
		<?php get_sidebar('orcamento'); ?>
		<!-- barra lateral -->

		<!-- produtos right -->
		<section class="produtos_right">

			<h1 class="title"><?php the_title(); ?></h1>
			
			<?php the_content(); ?>

			<?php if (count($_SESSION['carrinho']) == 0): ?>
				<p><strong>Selecione o produto desejado no menu de categorias ao lado.</strong></p>
			<?php else: ?>
				<p><strong>Para finalizar o orçamento clique no botão abaixo "Finalizar Orçamento".</strong></p>
			<?php endif ?>

			<?php if (count($_SESSION['carrinho']) > 0): ?>
				<div class="table_orcamento_wrapper">
					<table class="table_orcamento">
						<thead>
							<tr>
								<th scope="col" class="col-produtos" width="300">Produto</th>
								<th scope="col" class="col-cod">Cód.</th>
								<th scope="col" class="col-especificacoes" width="200">Especificações</th>
								<th scope="col" class="col-quantidade">Qdtd.</th>
								<th scope="col" class="col-excluir" width="100">Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($_SESSION['carrinho'] as $hash => $produto): ?>
								<tr>
									<td class="orcamento_produto">
										<span>
											<?php 
											$images = get_field('galeria_produto', $produto['idprod']);
											if( $images ): ?>
											    <img src="<?php echo $images[0]['sizes']['produto_380']; ?>" alt="<?php echo $image['title']; ?>" />
											<?php else: ?>
												<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img2.jpg" alt="<?php the_title(); ?>" />
											<?php endif; ?>
										</span>
										<div class="orcamento_nome">
											<div class="div_table">
												<div class="div_cell">
													<a href="<?php echo $produto['link']; ?>" title="<?php echo $produto['nome']; ?>" class="link-produto-orca"><?php echo $produto['nome']; ?></a>
												</div>
											</div>
										</div>
									</td>

									<td class="orcamento_cod">
										<?php echo $produto['cod']; ?>
									</td>

									<td class="orcamento_espec">
										<?php echo implode(', ',$produto['espec']); ?>
									</td>

									<td class="orcamento_qtde">
										<a href="?acao=menos&hash=<?php echo $hash; ?>" title="Decrementar Produto">
											<img src="<?php bloginfo('template_directory'); ?>/assets/img/prod_menos.png">
										</a>
										<?php echo $produto['qnt']; ?>
										<a href="?acao=mais&hash=<?php echo $hash; ?>" title="Incrementar Produto">
											<img src="<?php bloginfo('template_directory'); ?>/assets/img/prod_mais.png">
										</a>
									</td>

									<td class="orcamento_excluir">
										<a href="?acao=del&hash=<?php echo $hash; ?>" title="Excluir Produto" class="l-excluir"><i class="far fa-times-circle"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="orcamento_botoes">
					<a href="<?php bloginfo('home'); ?>/produtos/" title="Adicionar mais produtos">Adicionar mais produtos <i class="fas fa-angle-double-right"></i></a>
					<a href="#form-rapido" class="finalizar_orcamento" title="Finalizar orçamento">Finalizar orçamento <i class="fas fa-angle-double-right"></i></a>
				</div>

				<div class="form_orcamento_wrapper" id="form-rapido">
					<h3>ORÇAMENTO</h3>

					<form action="<?php bloginfo('home'); ?>/resposta-orcamento-rapido/" class="content_form form-contato form-rapido-orca" method="post">
						<div class="form_control">
							<i class="fas fa-user"></i>
							<input type="text" name="nome" id="nome-orca-rapido" placeholder="Nome*" required>
						</div>

						<div class="form_control">
							<i class="fas fa-building"></i>
							<input type="text" name="empresa" id="empresa-orca-rapido" placeholder="Empresa*" required>
						</div>

						<div class="form_control">
							<i class="fas fa-envelope"></i>
							<input type="email" name="email" id="email-orca-rapido" placeholder="E-mail*" required>
						</div>

						<div class="form_control">
							<i class="fas fa-phone fa-flip-horizontal"></i>
							<input type="tel" name="tel" id="tel-orca-rapido" class="tel_form" placeholder="Telefone*" required>
						</div>

						<div class="form_control">
							<i class="fas fa-edit"></i>
							<textarea name="msg" class="ipt-orca" id="msg-orca-rapido" placeholder="Mensagem"></textarea>
						</div>

						<div class="form_control form_button">
							<button type="submit">ENVIAR ORÇAMENTO</button>
						</div>
					</form>

					<p class="aviso_form">*Todos os campos de preenchimento são obrigatórios</p>
				</div>
			<?php endif ?>

		</section>
		<!-- produtos right -->

	</section>
	<!-- fim content -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>