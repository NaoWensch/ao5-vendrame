<?php
	/* Template Name: Home */  
	get_header();
?>

<div class="popup">
	<button class="close-popup">Fechar</button>
	<img src="<?php bloginfo("template_directory")?>/assets/img/pop-up.jpg" alt="Calçados flex clean">
</div>

<section class="content_wrapper">
	<!-- home_slides -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_slides.php'); ?>
	<!-- fim home_slides -->

	<!-- home_sobre -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_sobre.php'); ?>
	<!-- fim home_sobre -->

	<!-- home_principais -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_principais.php'); ?>
	<!-- fim home_principais -->

	<!-- home_mais_vendidos -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_mais_vendidos.php'); ?>
	<!-- fim home_mais_vendidos -->

	<!-- home_marcas -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_marcas.php'); ?>
	<!-- fim home_marcas -->

	<!-- home_blog -->
	<?php include (TEMPLATEPATH . '/assets/includes/home_blog.php'); ?>
	<!-- fim home_blog -->

</section>

<?php get_footer(); ?>