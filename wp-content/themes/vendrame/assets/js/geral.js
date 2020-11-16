// height slider home
var w = window,
d = document,
e = d.documentElement,
g = d.getElementsByTagName('body')[0],
x = w.innerWidth || e.clientWidth || g.clientWidth,
y = w.innerHeight|| e.clientHeight|| g.clientHeight;

$(document).ready(function(){
	
	// ###### ADICIONA CLASS NO HEADER #######
	if ( x  > 1024) {
		$(function() {
			var header = $("#header");
			$(window).scroll(function() {
				var scroll = $(window).scrollTop();

				if (scroll >= 80) {
					header.addClass("header_fixed");
				} else {
					header.removeClass("header_fixed");
				}
			});
		});
	}

	// MENU
	if ( x  < 1025) {
		$('.toggleMenu').click(function() {
			$(this).toggleClass('toggle_ativo');
			$('#menu_header').toggleClass('menu_ativo');
		});

		$('#menu_header').click(function() {
			$('.toggleMenu').toggleClass('toggle_ativo');
			$('#menu_header').toggleClass('menu_ativo');
		});
	}

	// MENU PRODUTOS HOME
	if ( x  < 1201) {
		$('.toggleProdHome').click(function() {
			$(this).toggleClass('toggleProdHomeAtivo');
			$('.mais_vendidos_left').toggleClass('mais_vendidos_left_ativo');
		});

		$('.mais_vendidos_left').click(function() {
			$(this).toggleClass('mais_vendidos_left_ativo');
			$('.toggleProdHome').toggleClass('toggleProdHomeAtivo');
		});
	}

	// MENU PRODUTOS
	if ( x  < 1201) {
		$('.toggleProdutos').click(function() {
			$(this).toggleClass('toggleProdutosAtivo');
			$('.side_produtos_wrapper').toggleClass('side_produtos_wrapper_ativo');
		});
	}

	// ALTURA SIDEBAR
	if ( x  > 1200) {
		var produtos_right = $(".produtos_right").outerHeight();
		var sidebar_produtos = $("#sidebar_produtos").outerHeight();
		if (produtos_right > (sidebar_produtos - 40)) {
			$("#sidebar_produtos").css({ 'height' : produtos_right - 40, });
		}
	}

	// ORÇAMENTO
	$('.finalizar_orcamento').click(function(){
		$('.form_orcamento_wrapper').show();
	});

	topMenu = $('.orcamento_botoes'),
	menuItems = topMenu.find("a"),
	menuItems.click(function(e) {
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top-0
		}, 500);
		e.preventDefault();
	});
	
	// CONTATO
	$('.mapa_ocultar_topo, .mapa_ocultar').click(function(){
		var txt = $(".mapa_contato iframe").is(':visible') ? 'MOSTRAR MAPA' : 'OCULTAR MAPA';
		$('.mapa_ocultar p').text(txt);
		$('.mapa_contato iframe').slideToggle();
		$('.mapa_ocultar_topo').toggleClass('mapa_ocultar_topo_ativo');
		return false;
	});

	// FOOTER
	var footerHeight = $('#footer').height();
	if (x > 1200) {
		$('.content_wrapper, .content_wrapper_home').css({
			'margin-bottom' : footerHeight
		});
	}

	// ACCORDION
	let holderList = $('.servicos_categoria_normas_list');
	let toggle = holderList.find('strong');
	
	toggle.click(function(e) {
		e.preventDefault();
  
		let $this = $(this);

		$this.toggleClass('-active');
	
		if ($this.next().hasClass('show')) {
			$this.next().removeClass('show');
			$this.next().slideUp(350);
		} else {
			$this.next().toggleClass('show');
			$this.next().slideToggle(350);
		}
	})
})