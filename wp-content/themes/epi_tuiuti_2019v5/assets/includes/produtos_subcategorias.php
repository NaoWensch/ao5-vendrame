<section class="produtos_wrapper">
	<!-- loop categorias -->
	<?php
		$args = array(
			'taxonomy'		=> 'tipo_produto',
			'parent'		=> $term->term_id,
			'hide_empty'	=> 0,
			'orderby'		=> 'title',
			'order'			=> 'ASC'
		);
		$taxonomies = get_categories( $args );
		$count = count($taxonomies);
		foreach( $taxonomies as $taxonomy ) : 
	?>

		<div class="produto_box">
			
			<?php if (get_field('img_produto', $taxonomy->taxonomy . '_' . $taxonomy->term_id)) : ?>
				<?php $img_produto = get_field('img_produto', $taxonomy->taxonomy . '_' . $taxonomy->term_id) ?>
				<img src="<?php echo $img_produto['sizes']['produto_200']; ?>" alt="<?php the_title(); ?>">
			<?php else: ?>
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="<?php the_title(); ?>">
			<?php endif; ?>
			
			<!--
			< ?php if ( get_the_post_thumbnail() ) : ?>
				< ?php the_post_thumbnail(); ?>
			< ?php else: ?>
				<img src="< ?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="<?php the_title(); ?>">
			< ?php endif; ?>
			-->

			<h2><span><a href="<?php echo get_category_link($taxonomy); ?>"><?php echo $taxonomy->cat_name; ?></a></span></h2>

			<a class="produto_mais" href="<?php echo get_category_link($taxonomy); ?>">VER PRODUTOS <i class="fas fa-angle-double-right"></i></a>
			
			<a class="produto_mais_full" href="<?php echo get_category_link($taxonomy); ?>"></a>
		</div>

	<?php endforeach; ?>
	<!-- fim loop categorias -->
</section>