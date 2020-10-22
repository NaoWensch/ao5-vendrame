<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<h1 class="title"><?php echo get_the_title(13); ?></h1>

		<?php $the_query = new WP_Query( 'page_id=13' ); ?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>

		    <?php the_content(); ?>

		<?php endwhile; wp_reset_query(); ?>

		<!-- produtos main tax -->
		<?php include (TEMPLATEPATH . '/assets/includes/produtos_main_tax.php'); ?>
		<!-- produtos main tax -->

	</section>
	<!-- fim content -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>