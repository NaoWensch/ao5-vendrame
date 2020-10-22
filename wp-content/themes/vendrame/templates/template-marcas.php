<?php
	/* Template Name: Marcas */  
	get_header();
?>

<script>
	$( function() {
    	$( "#tabs-marcas" ).tabs();
  	} );
</script>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- content wrapper -->
<section class="content_wrapper">

	<!-- content -->
	<section class="content">

		<!-- breadcrumbs -->
		<?php include (TEMPLATEPATH . '/assets/includes/breadcrumbs.php'); ?>
		<!-- breadcrumbs -->

		<h1 class="title full"><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<!-- tabs marcas -->
		<section id="tabs-marcas" class="tab_marcas_wrapper">
		  	<nav class="marcas_categorias">
		  		<ul>
		  			<li><a href="#tabs-1">TOCAS AS MARCAS</a></li>
		  			<?php if (get_field('marcas_repeater')): $marcaCount = 1; ?>
		  				<?php while ( have_rows('marcas_repeater') ) : the_row(); $marcaCount++; ?>

		  					<li><a href="#tabs-<?php echo $marcaCount; ?>"><?php the_sub_field('marca_cat'); ?></a></li>
		  					
		  				<?php endwhile; ?>
		  			<?php endif; ?>
		  		</ul>
		  	</nav>

		  	<!-- todas marcas -->
		  	<div id="tabs-1" class="tab_marcas">
				<?php if (get_field('marcas_repeater')): ?>
					<ul>
						<?php while ( have_rows('marcas_repeater') ) : the_row(); ?>

							<?php 
							$images = get_sub_field('marca_galeria');
							if( $images ): ?>
							    <?php foreach( $images as $image ): ?>
							        <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></li>
							    <?php endforeach; ?>
							<?php endif; ?>
							
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
		  	</div>
		  	<!-- todas marcas -->

		  	<!-- logos categorias -->
		  	<?php if (get_field('marcas_repeater')): $marcaCount = 1; ?>
		  		<?php while ( have_rows('marcas_repeater') ) : the_row(); $marcaCount++; ?>

		  			<div id="tabs-<?php echo $marcaCount; ?>" class="tab_marcas">
		  				<ul>
			  				<?php 
			  				$images = get_sub_field('marca_galeria');
			  				if( $images ): ?>
			  				    <?php foreach( $images as $image ): ?>
			  				        <li><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></li>
			  				    <?php endforeach; ?>
			  				<?php endif; ?>
		  				</ul>
		  			</div>

		  		<?php endwhile; ?>
		  	<?php endif; ?>
		  	<!-- logos categorias -->

		</section>
		
	</section>
	<!-- fim content -->

	<!-- home_principais -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_principais.php'); ?>
	<!-- fim home_principais -->
	
</section>
<!-- fim content wrapper -->

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>