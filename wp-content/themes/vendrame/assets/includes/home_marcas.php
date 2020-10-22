<section class="home_marcas_wrapper home_padrao">
	<section class="content">
		
		<h2 class="title"><a href="<?php the_permalink(15); ?>"><?php the_field('tit_marcas'); ?></a></h2>

		<?php the_field( 'txt_marcas' ); ?>

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
		<?php endif; ?>

		<div class="mais_marcas">
			<a href="<?php the_permalink(15); ?>">VEJA MAIS MARCAS <i class="fas fa-angle-double-right"></i></a>
		</div>
		
	</section>
</section>