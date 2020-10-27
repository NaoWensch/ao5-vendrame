<section class="home_principais_wrapper home_padrao">
	<section class="content">
		<span class="title-info">serviços</span>
		<h2 class="title"><?php the_field('tit_princ_produtos', 2); ?></h2>

		<?php the_field('txt_princ_produtos', 2); ?>

		<div class="produtos_blocos_holder">
			<sidebar class="normas-list">
				<strong class="title">Normas e laudos</strong>
	
				<ul class="list">
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> Laudo de periculosidade</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> PPRA</a></li>
					<li class="item"><a href="#"><i class="far fa-check-circle"></i> Laudo de periculosidade</a></li>
				</ul>

				<a href="#" class="normas-link">Ver todos <i class="fas fa-angle-double-right"></i></a>
			</sidebar>
			<?php if (get_field('produtos_blocos', 2)): ?>
				<section class="produtos_blocos_wrapper">
					
					<?php while ( have_rows('produtos_blocos', 2) ) : the_row(); ?>
	
						<div class="produto_bloco" style="background: url('<?php the_sub_field('bg_bloco'); ?>') no-repeat center center / cover #444444; min-height: <?php the_field('altura_bloco'); ?>px;">
							
							<div class="produto_bloco_main">
								<div class="div_table">
									<div class="div_cell">
										<h3><?php the_sub_field('tit_bloco'); ?></h3>
									</div>
								</div>
							</div>
	
							<div class="produto_bloco_hover">
								<div class="div_table">
									<div class="div_cell">
										<?php 
										$terms = get_sub_field('conteudo');
										if( $terms ): ?>
											<h3><?php the_sub_field('tit_bloco'); ?></h3>
											<p><?php the_sub_field('conteudo'); ?></p>
										<?php endif; ?>
	
										<?php if (get_sub_field('url_completa')): ?>
											<div class="produto_bloco_url">
												<a href="<?php the_sub_field('url_completa'); ?>">Saiba mais <i class="fas fa-angle-double-right"></i></a>
											</div>
										<?php endif ?>
									</div>
								</div>
							</div>
	
						</div>
					
					<?php endwhile; ?>
	
				</section>
			<?php endif; ?>
		</div>
		

	</section>
</section>