<?php
	/* Template Name: Produtos */  
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

		<!-- produtos main tax -->
		<?php include (TEMPLATEPATH . '/assets/includes/produtos_main_tax.php'); ?>
		<!-- produtos main tax -->

	</section>
	<!-- fim content -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>