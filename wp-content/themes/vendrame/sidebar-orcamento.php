<aside id="sidebar_produtos">
	<span class="toggleProdutos">
		<div class="line_one"></div>
		<div class="line_two"></div>
		<div class="line_three"></div>
		<span>Categoria de produtos</span>
	</span>

	<div class="side_produtos_wrapper">
		<div class="sidebar_produtos_tit">
			<p>SELECIONE A CATEGORIA</p>
		</div>

		<div class="side_prods_cat_wrapper">
			<nav class="side_prod_main">
				<ul>
					<?php
					$catArray = get_the_category();
					$id = $catArray[0]->cat_ID;
					$args = array (
						'taxonomy'		=> 'tipo_produto',
						'title_li' 		=> '',
						'hide_empty' 	=> 0,
						'parent'		=> 0,
						'meta_key'		=> 'cat_ordem',
						'orderby'		=> 'meta_value',
						'order'			=> 'ASC',
						'walker'   			=> new Walker_Category_Parents
					);
					wp_list_categories($args); ?>
				</ul>
			</nav>
		</div>
	</div>
</aside>