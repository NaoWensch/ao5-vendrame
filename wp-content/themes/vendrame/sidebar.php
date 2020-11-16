<aside id="sidebar_blog">

	<!-- busca -->
	<div class="busca_blog">
		<form method="get" id="blogsearch" action="<?php echo home_url( '/' ); ?>" autocomplete="off">
	        <input type="text" value="" name="s" id="s" class="busca busca-blog" placeholder="Procurar Artigos"/>
	        <input type="hidden" name="busca" value="blog">
	        <button type="submit"><i class="fas fa-search"></i></button>
		</form>
	</div>
	<!-- busca -->

	<?php if (is_single()): ?>
		<!-- categorias -->
		<nav class="sidebar_categories">
			<h3>CATEGORIAS DO BLOG</h3>
			<?php wp_nav_menu( array( 'theme_location' => 'blog-menu' ) ); ?>
		</nav>
		<!-- categorias -->

		<!-- mais lidos -->
		<div class="sidebar_mais_lidos sidebar_posts">
			<h3>MAIS LIDOS</h3>

			<ul>
				<?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => 3, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC' );
					query_posts($args);
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>

					<li><a href="<?php the_permalink(); ?>"><i class="fas fa-angle-right"></i> <?php the_title(); ?></a></li>

				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
		<!-- mais lidos -->

		<!-- mais lidos -->
		<div class="sidebar_ultimas sidebar_posts">
			<h3>ÚLTIMAS PUBLICAÇÕES</h3>

			<ul>
				<?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => 3 );
					query_posts($args);
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>

					<li><a href="<?php the_permalink(); ?>"><i class="fas fa-angle-right"></i> <?php the_title(); ?></a></li>

				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
		<!-- mais lidos -->
	<?php else: ?>
		<!-- newsletter -->
		<div class="newsletter_sidebar">
			<h3>Cadastre-se e Receba nossas Novidades</h3>

			<form action="<?php bloginfo('home'); ?>/resposta-newsletter/" method="post" class="form-newsletter" id="form-newsletter">
				<div><i class="fas fa-user"></i><input type="text" name="nome-news" id="nome-news" placeholder="Nome" required></div>
				<div><i class="fas fa-phone fa-flip-horizontal"></i><input type="tel" name="tel-news" id="tel-news" placeholder="Telefone"></div>
				<div><i class="fas fa-envelope"></i><input type="email" name="email-news" id="email-news" placeholder="E-mail" required></div>
				<button type="submit" name="submit-news">CADASTRAR</button>
			</form>
		</div>
		<!-- newsletter -->
	<?php endif ?>
	
	<!-- banner -->
	<?php if (get_field('banner', 'option')): ?>
		<div class="banner_sidebar">
			<a href="<?php the_field('url_banner', 'option') ?>"><img src="<?php the_field('banner', 'option') ?>" alt="Banner"></a>
		</div>
	<?php endif ?>
	<!-- banner -->

	<!-- produtos mais vendidos -->
	<div class="blog_mais_vendidos">
		<!-- <div class="blog_mais_vendidos_tit">
			<h3>CONFIRA OS PRODUTOS <span><i>+</i> VENDIDOS</span></h3>
		</div> -->

		<div class="blog_mais_vendidos_slider">
			<?php
				$args = array( 'post_type' => 'produtos', 'posts_per_page' => 10, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC' );
				query_posts($args);
				if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>	
				
				<div class="blog_mais_vendidos_box">
					<h3><?php the_title(); ?></h3>
					<div class="blog_mais_img">
						<?php 
						$images = get_field('galeria_produto');
						if( $images ): ?>
							<img src="<?php echo $images[0]['sizes']['produto_200'] ?>" alt="<?php the_title(); ?>">
						<?php else: ?>
							<?php if ( has_post_thumbnail() ) : ?>
								<?php $thumb_produto = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'produto_200' ); $img_produto = $thumb_produto['0']; ?>
								<img src="<?php echo $img_produto ?>" alt="<?php the_title(); ?>">
							<?php else: ?>
								<img src="<?php bloginfo('template_directory'); ?>/assets/img/produto_sem_img.jpg" alt="<?php the_title(); ?>">
							<?php endif; ?>
						<?php endif; ?>
					</div>
					
					<div class="blog_mais_cat">
						<?php 
							$postID = get_the_ID();
							$terms = get_the_terms( $postID, 'tipo_produto' );
							$termCount = 0;
							foreach($terms as $term) {
								$parent_term = get_term_children( $term->parent, 'tipo_produto' );
								if(count($parent_term) < 1) {
									$termCount++;
									if ($termCount == 2) {
										break;
									}
									echo '<span style="background: url(' . get_field('icon_cat_p', $term->taxonomy . '_' . $term->term_id) . ') no-repeat center center / contain #e45304;"></span>';
									echo '<p>Categoria: ' . $term->name . '</p>';
								}
							}
						?>
					</div>

					<a class="blog_mais_vendidos_link" href="<?php the_permalink(); ?>"></a>
				</div>
				
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
	<!-- produtos mais vendidos -->

	<!-- produtos categorias -->
	<div class="blog_produtos">
		<h3>CONHECE NOSSAS ÁREAS DE ATUAÇÃO?</h3>

		<p>Confira agora!</p>

		<ul>
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

				<li><a href="<?php echo get_category_link($taxonomy); ?>"><span><i class="far fa-arrow-alt-circle-right"></i></span><?php echo $taxonomy->cat_name; ?></a></li>

			<?php endforeach; ?>
		</ul>
	</div>
	<!-- produtos categorias -->

</aside>