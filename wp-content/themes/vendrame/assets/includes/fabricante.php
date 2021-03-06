<div class="produtos_filtro">
	<div class="qdte_produtos">
		<?php 
			$query = new WP_Query( array(
				'post_type' => 'produtos',
				'tax_query' => array(
				    array(
				        'taxonomy' => 'fabricante',
				        'terms' => $term->term_id,
				        'field' => 'term_id',
				    )
				),
			));
			$count = $query->found_posts;
		?>
		<?php echo $count; ?> Produtos
	</div>

	<div class="produto_ordenar">
		<span>Ordenar por:</span>
		<select name="filtro" id="filtro">

			<?php if( !isset($_GET['filtro'])) : ?>
				<option value="a_z">A-Z</option>
				<option value="z_a">Z-A</option>
				<option value="mais_vendidos">Mais vendidos</option>
				<?php global $query_string; query_posts( $query_string . '&posts_per_page=18&orderby=name&order=ASC' ); ?>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] == 'mais_vendidos') : ?>
				<option value="mais_vendidos">Mais vendidos</option>
				<?php global $query_string; query_posts( $query_string . '&posts_per_page=18&meta_key=popular_posts&orderby=meta_value_num&order=DESC' ); ?>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] == 'a_z') : ?>
				<option value="a_z">A-Z</option>
				<?php global $query_string; query_posts( $query_string . '&posts_per_page=18&orderby=name&order=ASC' ); ?>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] == 'z_a') : ?>
				<option value="z_a">Z-A</option>
				<?php global $query_string; query_posts( $query_string . '&posts_per_page=18&orderby=name&order=DESC' ); ?>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] != 'mais_vendidos') : ?>
				<option value="mais_vendidos">Mais vendidos</option>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] != 'a_z') : ?>
				<option value="a_z">A-Z</option>
			<?php endif; ?>

			<?php if( isset($_GET['filtro']) && $_GET['filtro'] != 'z_a') : ?>
				<option value="z_a">Z-A</option>
			<?php endif; ?>

		</select>

		<script type="text/javascript">
		    var dropFiltro = document.getElementById("filtro");
		    function onCatChange1() {
		        if ( dropFiltro.options[dropFiltro.selectedIndex].value != -1 ) {
		            location.href = "<?php echo get_category_link($term->term_id); ?>/?filtro="+dropFiltro.options[dropFiltro.selectedIndex].value;
		        }
		    }
		    dropFiltro.onchange = onCatChange1;
		</script>
	</div>
</div>

<section class="produtos_wrapper">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php include (TEMPLATEPATH . '/assets/includes/produto_box_h2.php'); ?>

	<!-- se não tiver produtos -->
	<?php endwhile; ?>

	<!-- pagination -->
	<?php wp_pagenavi(); ?>

	<?php else: ?>

		<p style="padding: 0 20px;">Nenhum produto encontrado.</p>

	<?php endif; wp_reset_query(); ?>
</section>