<?php get_header(); ?>
<!-- index todas noticias -->

<!-- content wrapper -->
<section class="content_wrapper">
	
	<!-- content -->
	<section class="content content_produtos">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<!-- barra lateral -->
		<?php get_sidebar('segmentos'); ?>
		<!-- barra lateral -->

		<!-- produtos right -->
		<section class="produtos_right">

			<?php $current_category = single_cat_title("", false); $cat_desc = category_description($category->cat_ID); ?>
			<h1 class="title"><?php echo $current_category; ?></h1>

			<?php if ($cat_desc): ?>
				<?php echo $cat_desc; ?>
			<?php endif ?>

			<nav class="tax_produtos">
				<ul>
					<?php
						$args = array(
							'taxonomy'		=> 'segmento_produto',
							'parent'		=> 0,
							'hide_empty'	=> 0,
							'meta_key'		=> 'cat_ordem',
							'orderby'		=> 'meta_value',
							'order'			=> 'ASC'
						);
						$taxonomies = get_categories( $args );
						$count = count($taxonomies);
						foreach( $taxonomies as $taxonomy ) : 
					?>

						<li><a href="<?php echo get_category_link($taxonomy); ?>"><img src="<?php the_field('icon_cat_l', $taxonomy->taxonomy . '_' . $taxonomy->term_id); ?>"> <?php echo $taxonomy->cat_name; ?></a></li>

					<?php endforeach; ?>
				</ul>
			</nav>

			<!-- verifica categoria -->
			<?php 
				$term = get_queried_object();
				$children = get_terms( $term->taxonomy, array(
					'parent'		=> $term->term_id,
					'hide_empty'	=> false,
				) );
			?>

			<?php if ($children): ?>
				<?php include (TEMPLATEPATH . '/assets/includes/produtos_subcategorias_segmentos.php'); ?>
			<?php else: ?>
				<?php include (TEMPLATEPATH . '/assets/includes/produtos.php'); ?>	
			<?php endif ?>
			<!-- verifica categoria -->

		</section>
		<!-- fim produtos right -->

	</section>
	<!-- fim content -->

</section>
<!-- fim content wrapper -->

<?php get_footer(); ?>