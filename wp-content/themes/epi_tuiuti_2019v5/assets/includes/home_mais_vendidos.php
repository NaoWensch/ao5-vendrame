<section class="home_mais_vendidos_wrapper home_padrao">
	<section class="content">

		<h2 class="title"><?php the_field( 'tit_prod_mais' ); ?></h2>

		<?php the_field( 'txt_prod_mais' ); ?>

		<!-- mais vendidos -->
		<div class="mais_vendidos_repeater">
			
			<!-- mais vendidos left -->
			<span class="toggleProdHome">
				<div class="line_one"></div>
				<div class="line_two"></div>
				<div class="line_three"></div>
				<span>Selecione a categoria</span>
			</span>

			<div class="mais_vendidos_left">
				<div class="selecionar_cat">
					<span>SELECIONE A CATEGORIA</span>
					<div class="selecionar_cat_setas">
						<div class="home_vendidos_prev"><i class="fas fa-chevron-up"></i></div>
						<div class="home_vendidos_next"><i class="fas fa-chevron-down"></i></div>
					</div>
				</div>

				<div class="home_vendidos_pager"></div>

				<div class="mais_vendidos_todos">
					<a href="<?php the_permalink(13); ?>">LINHA COMPLETA <i class="fas fa-angle-double-right"></i></a>
				</div>
			</div>
			<!-- mais vendidos left -->

			<!-- mais vendidos right -->
			<div class="mais_vendidos_right">

				<?php
					$args = array(
						'taxonomy'		=> 'tipo_produto',
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

					<div class="mais_vendidos_bloco" data-category="<?php echo $taxonomy->cat_name; ?>" data-image="<?php the_field('icon_cat_p', $taxonomy->taxonomy . '_' . $taxonomy->term_id); ?>">
						<div class="produtos_wrapper">

							<?php $terms = get_terms( $taxonomy ); ?>
							<?php foreach( $terms as $term ) : ?>
							<?php $posts = new WP_query(array( 'taxonomy' => 'tipo_produto', 'term' => $term->slug, 'posts_per_page' => 6, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) ); ?>
								<?php while($posts->have_posts()) : $posts->the_post(); ?>

									<?php include (TEMPLATEPATH . '/assets/includes/produto_box.php'); ?>

								<?php endwhile; wp_reset_query(); ?>
							<?php endforeach; ?>

						</div>
					</div>

				<?php endforeach; ?>

			</div>
			<!-- mais vendidos right -->

		</div>
		<!-- mais vendidos -->

	</section>
</section>