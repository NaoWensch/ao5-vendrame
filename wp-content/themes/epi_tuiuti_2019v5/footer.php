<!-- INICIO FOOTER -->
<footer id="footer">

	<!-- footer top -->
	<section class="footer_top">
		<section class="content">
			
			<div class="footer_main">
				<div class="footer_logo">
					<a href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					<span>Equipamentos de Segurança</span>
				</div>

				<div class="footer_menu_wrapper">
					<nav class="footer_menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
					</nav>

					<nav class="footer_produtos">
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

								<li><a href="<?php echo get_category_link($taxonomy); ?>"><img src="<?php the_field('icon_cat_p', $taxonomy->taxonomy . '_' . $taxonomy->term_id); ?>" alt="<?php echo $taxonomy->cat_name; ?>"> <?php echo $taxonomy->cat_name; ?></a></li>

							<?php endforeach; ?>
						</ul>
					</nav>
				</div>
			</div>

			<div class="footer_contato">
				<div class="footer_contato_left">
					<p class="footer_telefone">
						<span>
							<i class="fas fa-phone"></i>
							<span>(11) 2942-9988 / 2090-2988</span>
						</span>
					</p>
					<p class="footer_telefone -whats">
						<a href="https://web.whatsapp.com/send?phone=551194712-3303&text=Envie uma mensagem" title="Whatsapp" class="ao5-whatsapp-event">
							<i class="fab fa-whatsapp"></i><span>(11) 94712-3303</span>
						</a>
					</p>

					<p class="footer_endereco">
						<i class="fas fa-map-marker-alt"></i>
						<span>Rua Maria Prestes Maia, 477 Vila Guilherme,<br> São Paulo - SP CEP: 02047-000</span>
					</p>

					<p class="footer_horario">
						<i class="fas fa-clock"></i>
						<span>Horário de funcionamento: Seg a Sex das 8h às 12h | 13h às 17h45</span>
					</p>
				</div>

				<div class="footer_contato_right">
					<p>EMPRESA CERTIFICADA</p>
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/footer-selos.png" alt="Selos">
				</div>
			</div>

		</section>
	</section>
	<!-- footer top -->

	<!-- footer copyright -->
	<section class="footer_copyright">
		<section class="content">
			desenvolvido por: <a href="http://www.ao5.com.br" title="Desenvolvido por AO5 - Marketing Digital" target="_blank"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/ao5-logo.png" alt="AO5 Marketing Digital"></a>
		</section>
	</section>
	<!-- footer copyright -->

</footer>
<!-- FIM FOOTER -->	

<!-- mascara telefone -->
<script type="text/javascript">
	var SPMaskBehavior1 = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(SPMaskBehavior1.apply({}, arguments), options);
		}
	};

	$('.tel_form').mask(SPMaskBehavior1, spOptions);
</script>
<!-- mascara telefone -->

<!-- Tracker Whats-->
<script>
	(function() {

	var whats_btn = document.querySelectorAll('.ao5-whatsapp-event');

	for (i = 0; i < whats_btn.length; ++i) {

	whats_btn[i].addEventListener('click', function(event) {

	event.preventDefault();

		whats_url = this.getAttribute("href");
	
	console.log('registrando clique para o whatsapp');
	
	ga(ga.getAll()[0].get('name') + '.send', 'event', 'link', 'whatsapp', {hitCallback: function() {
		
		console.log('redirecionando usuário');
		
		window.location = whats_url;
	}});
	});
	}
		
	})();
</script>
<!-- Tracker Whats-->

<?php if(is_front_page()){ ?>
	<script>
		$(".close-popup").click(function(){
			$(".popup").hide();
		});
	</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>