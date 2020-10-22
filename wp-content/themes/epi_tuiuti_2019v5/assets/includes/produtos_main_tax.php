<?php if (get_field('produtos_blocos', 2)): ?>
	<section class="produto_page_cats">
		<?php while ( have_rows('produtos_blocos', 2) ) : the_row(); ?>

			<div class="produto_page_bloco">
						
				<div class="div_table">
					<div class="div_cell">
						<img src="<?php the_sub_field('icon_bloco'); ?>" alt="<?php the_sub_field('tit_bloco'); ?>">
						<h2><?php the_sub_field('tit_bloco'); ?></h2>
					</div>
				</div>

				<a href="<?php the_sub_field('url_completa'); ?>"></a>

			</div>
				
		<?php endwhile; ?>
	</section>
<?php endif; ?>