<section class="mais_lidos_wrapper">
	<section class="content">
		<h2 class="title full center">Mais Artigos Relacionados</h2>

		<p class="mais_lido_txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis nibh eros, non porta turpis posuere sed. Pellentesque porttitor elit erat, et consequat purus scelerisque eget. Cras nec libero at magna fringilla dictum.</p>

		<section class="mais_lidos_repeater">
			<?php
				$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'category__in' => wp_get_post_categories( $post->ID ), 'post__not_in' => array( $post->ID ) );
				query_posts($args);
				if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>

				<?php include (TEMPLATEPATH . '/assets/includes/blog_box.php'); ?>

			<?php endwhile; endif; wp_reset_query(); ?>
		</section>
	</section>
</section>