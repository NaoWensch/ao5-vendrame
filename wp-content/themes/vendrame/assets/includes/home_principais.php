<section class="home_principais_wrapper home_padrao">
	<section class="content">

		<h2 class="title"><?php the_field('tit_princ_produtos', 2); ?></h2>

		<?php the_field('txt_princ_produtos', 2); ?>

		<?php if (get_field('produtos_blocos', 2)): ?>
			<section class="produtos_blocos_wrapper">
				
				<?php while ( have_rows('produtos_blocos', 2) ) : the_row(); ?>

					<div class="produto_bloco" style="background: url('<?php the_sub_field('bg_bloco'); ?>') no-repeat center center / cover #444444; min-height: <?php the_field('altura_bloco'); ?>px;">
						
						<div class="produto_bloco_main">
							<div class="div_table">
								<div class="div_cell">
									<img src="<?php the_sub_field('icon_bloco'); ?>" alt="<?php the_sub_field('tit_bloco'); ?>">
									<h3><?php the_sub_field('tit_bloco'); ?></h3>
								</div>
							</div>
						</div>

						<div class="produto_bloco_hover">
							<div class="div_table">
								<div class="div_cell">
									<?php 
									$terms = get_sub_field('lista_categorias');
									if( $terms ): ?>
										<ul>
											<?php foreach( $terms as $term ): ?>
												<li><a href="<?php echo get_term_link( $term ); ?>"><i class="far fa-check-circle"></i> <?php echo $term->name; ?></a></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>

									<?php if (get_sub_field('url_completa')): ?>
										<div class="produto_bloco_url">
											<a href="<?php the_sub_field('url_completa'); ?>">LINHA COMPLETA <i class="fas fa-angle-double-right"></i></a>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>

					</div>
				
				<?php endwhile; ?>

				<div class="produto_bloco">
					<div class="div_table">
						<div class="div_cell">
							<h3><?php the_field('tit_ult_bloco', 2); ?></h3>
							
							<?php if (get_field('url_ult_bloco', 2)): ?>
								<div class="produto_bloco_url">
									<a href="<?php the_field('url_ult_bloco', 2); ?>">ACESSE AGORA <i class="fas fa-angle-double-right"></i></a>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>

			</section>
		<?php endif; ?>

	</section>
</section>