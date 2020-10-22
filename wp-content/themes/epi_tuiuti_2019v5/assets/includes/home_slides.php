<?php if (get_field('banners_repeater')): ?>
	<section class="home_slides_wrapper">

		<section class="home_slider">
			<?php while ( have_rows('banners_repeater') ) : the_row(); ?>

				<section class="home_slide_box" style="background: url('<?php the_sub_field('banner_img'); ?>') no-repeat center center / cover;">
					<section class="content">
						<div class="home_slide_wrapper">
							<div class="home_slide_table">
								<div class="home_slide_cell">
									<?php if (get_sub_field('banner_url')): ?>
										<h2><a href="<?php the_sub_field('banner_url') ?>"><?php the_sub_field('banner_tit'); ?></a></h2>
									<?php else: ?>
										<h2><?php the_sub_field('banner_tit'); ?></h2>
									<?php endif ?>

									<?php the_sub_field('banner_txt'); ?>

									<?php if (get_sub_field('banner_url')): ?>
										<div class="home_slide_url">
											<a href="<?php the_sub_field('banner_url'); ?>">SAIBA MAIS <i class="fas fa-angle-double-right"></i></a>
										</div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</section>
				</section>
			
			<?php endwhile; ?>
		</section>

		<div class="home_slider_prev"><span><i class="fas fa-arrow-left"></i></span></div>
		<div class="home_slider_next"><span><i class="fas fa-arrow-right"></i></span></div>

		<section class="home_slides_pager_wrapper">
			<section class="content">
				<div class="home_slides_pager"></div>
			</section>
		</section>

	</section>
<?php endif ?>
