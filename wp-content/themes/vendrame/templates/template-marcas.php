<?php
	/* Template Name: Marcas */  
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">
	<div class="-page-clientes">
		<!-- content -->
		<section class="content ">
	
			<!-- breadcrumbs -->
			<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
			<!-- breadcrumbs -->
	
			<h1 class="title full"><?php the_title(); ?></h1>
	
			<?php the_content(); ?>
	
			<!-- tabs marcas -->
			<section id="tabs-marcas" class="tab_marcas_wrapper">
					<!-- logos categorias -->
					<?php if (get_field('marcas_repeater')): $marcaCount = 1; ?>
						<?php while ( have_rows('marcas_repeater') ) : the_row(); $marcaCount++; ?>
	
							<div id="tabs-<?php echo $marcaCount; ?>" class="tab_marcas">
								<ul>
									<?php 
									$images = get_sub_field('marca_galeria');
									if( $images ): ?>
											<?php foreach( $images as $image ): ?>
													<li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></li>
											<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
	
						<?php endwhile; ?>
					<?php endif; ?>
					<!-- logos categorias -->
	
			</section>
			
		</section>
		<!-- fim content -->
	</div>

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
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>