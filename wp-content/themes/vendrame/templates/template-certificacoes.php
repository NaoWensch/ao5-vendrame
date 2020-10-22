<?php
	/* Template Name: Certificações */  
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content content_institucionais">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<nav class="menu_institucional">
			<?php wp_nav_menu( array( 'theme_location' => 'sobre-menu' ) ); ?>
		</nav>

	</section>
	<!-- fim content -->

	<!-- certificaçoes topo -->
	<section class="certificacoes_topo_wrapper">
		<section class="content">
			
			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

		</section>
	</section>
	<!-- certificaçoes topo -->

	<!-- repetidor -->
	<?php if (get_field('empresa_repeater')): ?>
		<?php while ( have_rows('empresa_repeater') ) : the_row(); ?>
			<section class="empresa_repeater_wrapper">
				<section class="content">
					
					<div class="empresa_repeater_box">
						<div class="empresa_repeater_txt">
							<h3><?php the_sub_field('repeater_tit'); ?></h3>

							<?php the_sub_field('repeater_txt'); ?>
						</div>

						<div class="empresa_repeater_img">
							<img src="<?php the_sub_field('repeater_img'); ?>" alt="<?php the_sub_field('repeater_tit'); ?>">
						</div>
					</div>
				</section>
			</section>
		<?php endwhile; ?>
	<?php endif ?>
	<!-- repetidor -->

	<!-- home_principais -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_principais.php'); ?>
	<!-- fim home_principais -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>