<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper content_wrapper_cinza">

	<!-- content -->
	<section class="content content_blog">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- blog left -->
		<section class="blog_left blog_left_single">

			<h1 class="full"><?php the_title(); ?></h1>

			<!-- post info -->
			<?php 
				if ( has_post_thumbnail() ) {
					$title = get_post(get_post_thumbnail_id())->post_title;
					$caption = get_post(get_post_thumbnail_id())->post_excerpt;
					$description = get_post(get_post_thumbnail_id())->post_content;
				}
			?>
			<div class="post_info">
				<div class="post_data">
					<i class="far fa-calendar-minus"></i> Publicado em: <?php the_time('j/m/Y'); ?>
				</div>

				<?php if ($description): ?>
					<div class="post_fonte_img">
						Imagem: <?php echo $description; ?>
					</div>
				<?php endif ?>
			</div>
			<!-- post info -->

			<!-- imagem destaque -->
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $thumb_produto = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $img_produto = $thumb_produto['0']; ?>
				<div class="blog_thumbnail">
					<img src="<?php echo $img_produto ?>" alt="<?php echo $title; ?>">
					<?php if ($caption): ?>
						<figcaption><?php echo $caption; ?></figcaption>
					<?php endif ?>

					<div class="blog_share">
					    <a title="Facebook" class="face" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank"><i class="fab fa-facebook-f"></i> <span>Compartilhar</span></a>
					    <a title="Twitter" class="tweet" href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank"><i class="fab fa-twitter"></i> <span>Compartilhar</span></a>
					    <a title="Whatsapp" class="whats ao5-whatsapp-event" href="https://web.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank"><i class="fab fa-whatsapp" aria-hidden="true"></i> <span>Compartilhar</span></a>
					    <a title="Linkedin" class="linke" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>" target="_blank"><i class="fab fa-linkedin-in"></i> <span>Compartilhar</span></a>
					</div>
				</div>
			<?php endif; ?>
			<!-- imagem destaque -->

			<?php the_content(); ?>

			<!-- leia também -->
			<?php if (get_field('post_artigo')): ?>
				<p class="leia_tambem"><strong>Leia também:</strong> <a href="<?php the_permalink(get_field('post_artigo')); ?>"><?php echo get_the_title(get_field('post_artigo')); ?></a></p>
			<?php endif ?>

			<!-- orcamento produto -->
			<?php if (get_field('post_produto')): ?>
				<?php $idProd = get_field('post_produto'); ?>
				<div class="post_prod_receba">
					<h3>RECEBA UM ORÇAMENTO DESSE PRODUTO!</h3>
					<div class="seta_post_prod">
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/seta_post_prod.png">
					</div>
				</div>
				<div class="post_produto">
					<div class="post_produto_img">
						<?php
						$images = get_the_post_thumbnail( $idProd, 'medium' );
						 if( $images ): ?>
							<?php echo $images;?>
						<?php else: ?>
							<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="<?php the_title(); ?>">
						<?php endif; ?>
					</div>
					
					<div class="post_produto_info">
						<div class="post_produto_topo">
							<div class="div_table">
								<div class="div_cell">
									<h3><a href="<?php the_permalink($idProd); ?>"><?php echo get_the_title($idProd); ?></a></h3>
								</div>
							</div>
						</div>

						<div class="post_produto_baixo">
							<a href="<?php the_permalink($idProd); ?>">SOLICITAR ORÇAMENTO <i class="fas fa-angle-double-right"></i></a>
						</div>
					</div>
				</div>
				
			<?php endif ?>

		</section>
		<!-- blog left -->

		<!-- sidebar -->
		<?php get_sidebar(); ?>
		<!-- fim sidebar -->

	</section>
	<!-- fim content -->
	
	<?php
	
	?>
	<!-- mais_artigos_relacionados -->
	<?php
		foreach((get_the_category()) as $category) {
			if ($category->cat_name = 'Mídia') {
				include (TEMPLATEPATH . '/assets/includes/veja_mais.php');
			}else {
				include (TEMPLATEPATH . '/assets/includes/mais_artigos_relacionados.php');
			}
		}
	?>
	<!-- mais_artigos_relacionados -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>