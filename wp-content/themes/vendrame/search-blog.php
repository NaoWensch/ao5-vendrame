<!-- content wrapper -->
<section class="content_wrapper content_wrapper_cinza">

	<!-- content -->
	<section class="content content_blog">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- blog left -->
		<section class="blog_left">

			<h1 class="title">Resultado da pesquisa no Blog</h1>
			
			<?php global $query_string; query_posts( $query_string . '&post_type=post' ); ?>
			<?php global $wp_query; ?>
			<p class="chamada_blog_search">Foram encontrados <?php echo $wp_query->found_posts; ?> resultados para o termo "<strong><?php printf( __( '%s', 'shape' ),  get_search_query()  ); ?></strong>" pesquisado no blog, nas seguites categorias de artigos:</p>

			<!-- categorias -->
			<nav class="blog_categories">
				<?php wp_nav_menu( array( 'theme_location' => 'blog-menu' ) ); ?>
			</nav>

			<!-- blog repeater -->
			<section class="blog_repeater">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php include (TEMPLATEPATH . '/assets/includes/blog_box.php'); ?>

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