<?php
    /* Template Name: Serviços CatPage */  
    get_header(); ?>
<!-- index todas noticias -->

<?php $current_category = single_cat_title("", false); $cat_desc = category_description($category->cat_ID); ?>

<!-- content wrapper -->
<section class="content_wrapper content_wrapper_cinza">

	<!-- content -->
	<section class="content content_blog">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- blog left -->
		<section class="blog_left">

			<h1 class="title"><?php echo $current_category; ?></h1>
			
			<?php if ($cat_desc): ?>
				<?php echo $cat_desc; ?>
			<?php endif ?>

			<!-- categorias -->
			<!-- <nav class="blog_categories">
				<?php wp_nav_menu( array( 'theme_location' => 'blog-menu' ) ); ?>
			</nav> -->

			<!-- blog repeater -->
			<section class="blog_repeater">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php include (TEMPLATEPATH . '/assets/includes/blog_box_h2.php'); ?>

				<?php endwhile; ?>

				<!-- pagination -->
				<?php wp_pagenavi(); ?>

				<?php else: ?> 

					<p>Nenhuma notícia cadastrada.</p>

				<?php endif; wp_reset_query(); ?>
			</section>
			<!-- blog repeater -->

		</section>
		<!-- blog left -->

		<!-- sidebar -->
		<?php get_sidebar(); ?>
		<!-- fim sidebar -->

	</section>
	<!-- fim content -->

	<!-- artigos mais lidos -->
	<?php include (TEMPLATEPATH . '/assets/includes/artigos_mais_lidos.php'); ?>
	<!-- artigos mais lidos -->

</section>
<!-- fim content wrapper -->

<?php get_footer(); ?>