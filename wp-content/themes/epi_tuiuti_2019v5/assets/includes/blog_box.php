<article class="blog_box">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php $blog_home = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog_home' ); $img_blog_home = $blog_home['0']; ?>
	<?php else: ?>
		<?php $img_blog_home = get_template_directory_uri() . '/assets/img/blog_sem_img.jpg'; ?>
	<?php endif; ?>
	<div class="blog_box_img" style="background: url('<?php echo $img_blog_home; ?>') no-repeat center center / cover;">
		<img src="<?php echo $img_blog_home; ?>" alt="<?php the_title(); ?>">
	</div>

	<div class="blog_box_txt">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<p><?php echo excerpt(23); ?></p>
	</div>

	<a class="blog_box_mais" href="<?php the_permalink(); ?>"></a>
</article>