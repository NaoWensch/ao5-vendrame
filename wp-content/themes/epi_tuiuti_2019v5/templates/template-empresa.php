<?php
	/* Template Name: Empresa */  
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

	<!-- quem somos -->
	<section class="empresa_topo_wrapper">
		<section class="content">
			
			<div class="quem_somos_in">
				<?php the_content(); ?>
			</div>

		</section>

		<div class="empresa_topo_bg" style="background: url('<?php the_field( 'bg_sobre_topo' ); ?>') no-repeat left center / cover;">
			<span>
				<img src="<?php the_field( 'icon_sobre_img' ); ?>" alt="Ícone">
				<h3><?php the_field('tit_sobre_icon'); ?></h3>
			</span>
		</div>
	</section>
	<!-- quem somos -->

	<!-- quem somos -->
	<section class="empresa_comerciais_wrapper">
		<section class="content">
			
			<h1 class="title full center"><?php the_field( 'tit_comerciais' ); ?></h1>

			<?php the_field( 'txt_comerciais' ); ?>

			<div class="comerciais_bndes">
				<strong>Aceitamos o cartão</strong> <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-bndes.png" alt="BNDES">
			</div>

		</section>
	</section>
	<!-- quem somos -->

	<!-- quem somos -->
	<section class="empresa_responsabilidade_wrapper">
		<section class="content">
			
			<div class="responsabilidade_social_in">
				<h2 class="title"><?php the_field( 'tit_responsabilidade' ); ?></h2>

				<?php the_field( 'txt_responsabilidade' ); ?>
			</div>

		</section>

		<div class="empresa_responsabilidade_bg" style="background: url('<?php the_field( 'bg_responsabilidade' ); ?>') no-repeat left center / cover;"></div>
	</section>
	<!-- quem somos -->

	<!-- home_principais -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_principais.php'); ?>
	<!-- fim home_principais -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>