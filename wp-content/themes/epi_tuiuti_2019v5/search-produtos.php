<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content content_orcamento">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- barra lateral -->
		<?php get_sidebar('orcamento'); ?>
		<!-- barra lateral -->

		<!-- produtos right -->
		<section class="produtos_right">

			<h1 class="title">Resultado da pesquisa</h1>
			
			<?php global $query_string; query_posts( $query_string . '&post_type=produtos&posts_per_page=-1' ); ?>
			<?php global $wp_query; ?>
			<p>Busca por: "<strong><?php printf( __( '%s', 'shape' ),  get_search_query()  ); ?></strong>".</p>

			<!-- produtos repeater -->
			<section class="produtos_wrapper">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php include (TEMPLATEPATH . '/assets/includes/produto_box.php'); ?>

				<?php endwhile; ?>

				<!-- pagination -->
				<?php wp_pagenavi(); ?>

				<?php else: ?> 

					<p>Nenhum produto encontrado.</p>

				<?php endif; wp_reset_query(); ?>
			</section>
			<!-- produtos repeater -->

		</section>
		<!-- produtos right -->

	</section>
	<!-- fim content -->

</section>
<!-- fim content wrapper -->