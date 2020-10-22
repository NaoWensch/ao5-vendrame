<div class="produto_box">
	<!--
	< ?php 
	$images = get_field('galeria_produto');
	if( $images ): ?>
		<img src="< ?php echo $images[0]['sizes']['produto_200'] ?>" alt="< ?php the_title(); ?>">
	< ?php else: ?>
		<img src="< ?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="< ?php the_title(); ?>">
	< ?php endif; ?>
	-->
	
	<?php if ( get_the_post_thumbnail() ) : ?>
		<?php the_post_thumbnail('medium', ['alt' => esc_html (get_the_title())]); ?>
	<?php else: ?>
		<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="<?php the_title(); ?>">
	<?php endif; ?>

	<h3><span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h3>

	<a class="produto_mais" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">MAIS DETALHES <i class="fas fa-angle-double-right"></i></a>
	
	<a class="produto_mais_full" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
</div>