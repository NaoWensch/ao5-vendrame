<section class="home_blog_wrapper home_padrao">
	<section class="content">

		<h2 class="title"><?php the_field('tit_artigos'); ?></h2>

		<?php the_field( 'txt_artigos' ); ?>

		<section class="posts_home_wrapper">
			<div class="posts_home_left">
				<div class="posts_home_pager"></div>
			</div>

			<div class="posts_home_right">
				<?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
					query_posts($args);
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>

					<div class="posts_home_box" data-link="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>">
						<div class="post_home_img">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php $blog_home = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog_home' ); $img_blog_home = $blog_home['0']; ?>
									<img src="<?php echo $img_blog_home ?>" alt="<?php the_title(); ?>">
								<?php else: ?>
									<img src="<?php bloginfo('template_directory'); ?>/assets/img/blog_home_sem_img.jpg" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</a>
						</div>
					</div>

				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</section>

	</section>
</section>