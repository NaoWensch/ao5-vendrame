<section class="home_sobre_wrapper">
	<section class="content">

		<div class="home_sobre_left">
			<span class="title-desc"><?php the_field('descricao_topo') ?></span>
			<h2 class="title"><?php the_field( 'tit_sobre' ); ?></h2>

			<?php the_field( 'txt_sobre' ); ?>
		</div>

		<div class="home_sobre_right">
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/sobre_home.png" alt="Solução em Equipamentos de Proteção desde 1987">
			<a href="<?php the_field('link_linkedin') ?>" class="content-linkedin">
				<span class="title">
					<strong>PROFESSOR ENGENHEIRO</strong>
					<?php the_field( 'titulo_foto' ); ?>
				</span>
				<i class="fab fa-linkedin-in"></i>
			</a>
		</div>
	</section>
</section>