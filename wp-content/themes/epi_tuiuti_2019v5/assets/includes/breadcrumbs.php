<section class="breadcrumb_wrapper">
	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb( '<span id="breadcrumbs">','</span>' ); }?>

	<span class="breadcrumbs_voltar">
		<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" title="Voltar"><span><i class="fas fa-angle-left"></i></span>VOLTAR</a>
	</span>
</section>