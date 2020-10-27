<section class="home_marcas_wrapper home_padrao">
	<section class="content">
		
		<h2 class="title"><a href="<?php the_permalink(15); ?>"><?php the_field('tit_marcas'); ?></a></h2>

		<?php the_field( 'txt_marcas' ); ?>
		
		<div class="home_marcas_holder_list">
			<?php 
			$images = get_field('galeria_marcas');
			if( $images ): ?>
				<ul class="home_marcas">
					<?php foreach( $images as $image ): ?>
						<li>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="home_marcas_prev"><span><i class="fas fa-chevron-left"></i></span></div>
				<div class="home_marcas_next"><span><i class="fas fa-chevron-right"></i></span></div>
			<?php endif; ?>
		</div>

		<!-- <div class="mais_marcas">
			<a href="<?php the_permalink(15); ?>">VEJA MAIS MARCAS <i class="fas fa-angle-double-right"></i></a>
		</div> -->
		
	</section>
</section>