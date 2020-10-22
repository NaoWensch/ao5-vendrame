<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content content_produto_single">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- produto topo -->
		<div class="single_produto_topo">
			<h1 class="title mb-2"><?php the_title(); ?></h1>

			<?php if (get_field('cod_produto')): ?>
				<p>Código do produto: <?php the_field( 'cod_produto' ); ?></p>
			<?php endif ?>
		</div>
		<!-- produto topo -->
		
		<!-- produto baixo -->
		<div class="single_produto_baixo">

			<!-- produto left -->
			<div class="single_produto_left">
				<div class="produto_galeria_wrapper">
					<?php 
					$images = get_field('galeria_produto');
					if( $images ): ?>
					    <?php foreach( $images as $image ): ?>
					        <div class="produto_galeria_img" data-img="<?php echo $image['sizes']['produto_380']; ?>" data-title="<?php echo $image['title']; ?>">
					        	<img src="<?php echo $image['sizes']['produto_380']; ?>" alt="<?php echo $image['title']; ?>" />
					        </div>
					    <?php endforeach; ?>
					<?php else: ?>
						<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail('medium', ['alt' => esc_html (get_the_title())]); ?>
						<?php else: ?>
							<div class="produto_galeria_img" data-img="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img2.jpg" data-title="<?php the_title(); ?>">
								<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img2.jpg" alt="<?php the_title(); ?>" />
							</div>
						<?php endif ?>
					<?php endif; ?>
				</div>

				<?php if( $images ): ?>
					<div class="produto_galeria_pager"></div>
				<?php endif; ?>
			</div>
			<!-- produto left -->

			<!-- produto right -->
			<div class="single_produto_right">
				
				<!-- content -->
				<?php the_content(); ?>
				<!-- content -->

				<!-- fabricante -->
				<?php $terms = wp_get_post_terms($post->ID, 'fabricante'); ?>
				<?php if ($terms): ?>
					<p>
						<strong>Fabricante: </strong>
						<?php foreach ($terms as $term) {
								echo $term->name;
						} ?>
					</p>
				<?php endif ?>
				<!-- fabricante -->

				<!-- produto form -->
				<form action="<?php bloginfo('url'); ?>/orcamento/?acao=add" class="content_form dados-produtos" method="post">
					<?php include (TEMPLATEPATH . '/assets/includes/produtos_fields.php'); ?>
						
					<div class="form_control form_control_qtde">
						<input type="number" name="qtde-produto" id="qtde-produto" placeholder="Qntd:" min="1" required>
					</div>

					<div class="form_control form_button">
						<button type="submit">SOLICITAR ORÇAMENTO</button>
					</div>

					<input type="hidden" name="id-produto" value="<?php echo $post->ID; ?>">
					<input type="hidden" name="cod-produto" value="<?php the_field('cod_produto'); ?>">
					<input type="hidden" name="nome-produto" value="<?php the_title(); ?>">
					<input type="hidden" name="link-produto" value="<?php the_permalink($post->ID); ?>">
					<?php
						$postID = get_the_ID();
						$terms = get_the_terms( $postID, 'tipo_produto' );
						foreach($terms as $term) {
							$parent_term = get_term_children( $term->parent, 'tipo_produto' );
							if(count($parent_term) < 1) {
								$termCount++;
								if ($termCount == 2) {
									break;
								}
								$nameCat = $term->name;
							}
						}
					?>
					<input type="hidden" name="categoria-produto" value="<?php echo $nameCat; ?>">

					<div class="indique_produto">
						<span>Indique esse produto <i class="fas fa-share-alt"></i></span>

						<div class="produto_share">
						    <a title="Facebook" class="face" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
						    <a title="Twitter" class="tweet" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
						    <a title="Whatsapp" class="whats ao5-whatsapp-event" href="https://web.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
						    <a title="Linkedin" class="linke" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
						</div>
					</div>
				</form>
				<!-- produto form -->

				<!-- produto extra -->
				<?php if (get_field('info_extra')): ?>
					<div class="produto_info_extra">
						<?php the_field('info_extra'); ?>
					</div>
				<?php endif ?>
				<!-- produto extra -->

			</div>
			<!-- produto right -->

		</div>
		<!-- produto baixo -->

	</section>
	<!-- fim content -->

	<!-- veja tbm -->
	<section class="outros_produtos">
		<section class="content">
			<h2 class="title full center">Aproveite e veja também</h2>

			<p>A Tuiuti apresenta uma linha completa de soluções que podem ajudar você a se proteger contra possíveis riscos e acidentes. Confira abaixo, alguns dos principais produtos relacionados a sua pesquisa:</p>

			<section class="produtos_wrapper">
				<?php
					$args = array( 'post_type' => 'produtos', 'posts_per_page' => 5, 'category__in' => wp_get_post_categories( $post->ID ), 'post__not_in' => array( $post->ID ) );
					query_posts($args);
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>

					<?php include (TEMPLATEPATH . '/assets/includes/produto_box.php'); ?>

				<?php endwhile; endif; wp_reset_query(); ?>
			</section>
		</section>
	</section>
	<!-- veja tbm -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>