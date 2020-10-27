$(document).ready(function(){

	// BANNERS HOME INICIO
	$('.home_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: "ease",
		infinite: true,
		autoplay: false,
		adaptiveHeight: true,
		speed: 500,
		dots: true,
		appendDots: '.home_slides_pager',
		arrows: true,
		prevArrow: '.home_slider_prev',
		nextArrow: '.home_slider_next',
	});

	// SLIDER PRODUTOS MAIS VENDIDOS
	$('.mais_vendidos_right').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: "ease",
		infinite: false,
		autoplay: false,
		adaptiveHeight: true,
		speed: 0,
		dots: true,
		appendDots: '.home_vendidos_pager',
		customPaging : function(slider, i) {
			var slide = slider.$slides[i],
				category = $(slide).data('category');
				image = $(slide).data('image');
			return '<span class="mais_vendidos_link"><span><i class="fas fa-arrow-circle-right"></i></span>' + category + '</span>';
		},
		arrows: true,
		prevArrow: '.home_vendidos_prev',
		nextArrow: '.home_vendidos_next',
	});
	// SLIDER BLOG HOME
	$('.posts_home_right').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: "ease",
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		adaptiveHeight: true,
		speed: 300,
		dots: true,
		appendDots: '.posts_home_pager',
		customPaging : function(slider, i) {
			var slide = slider.$slides[i],
				link = $(slide).data('link');
				title = $(slide).data('title');
			return '<h3 class="title_blog_home">' + title + '</h3><a href="' + link + '" title="' + title + '">LER ARTIGO <i class="fas fa-angle-double-right"></i></a>';
		},
		arrows: false,
	});
	// SLIDER CLIENTES HOME
	if (window.innerWidth >= 1025) {
		$('.home_marcas').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			cssEase: "ease",
			infinite: true,
			autoplay: false,
			adaptiveHeight: true,
			speed: 500,
			dots: false,
			arrows: true,
			prevArrow: '.home_marcas_prev',
			nextArrow: '.home_marcas_next',
		});
	} else if (window.innerWidth >= 768) {
		$('.home_marcas').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			cssEase: "ease",
			infinite: true,
			autoplay: false,
			adaptiveHeight: true,
			speed: 500,
			dots: false,
			arrows: true,
			prevArrow: '.home_marcas_prev',
			nextArrow: '.home_marcas_next',
		})
	} else {
		
		$('.home_marcas').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			cssEase: "ease",
			infinite: true,
			autoplay: false,
			adaptiveHeight: true,
			speed: 500,
			dots: false,
			arrows: true,
			prevArrow: '.home_marcas_prev',
			nextArrow: '.home_marcas_next',
	});
	}

	// BLOG PRODUTO SLIDER
	$('.blog_mais_vendidos_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: "ease",
		infinite: true,
		autoplay: true,
		adaptiveHeight: true,
		autoplaySpeed: 3000,
		speed: 500,
		dots: false,
		arrows: false,
	});

	// GALERIA PRODUTOS
	$('.produto_galeria_wrapper').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: "ease",
		infinite: false,
		autoplay: false,
		adaptiveHeight: true,
		speed: 300,
		dots: true,
		appendDots: '.produto_galeria_pager',
		customPaging : function(slider, i) {
			var slide = slider.$slides[i],
				img = $(slide).data('img');
				title = $(slide).data('title');
			return '<img src="' + img + '" alt="' + title + '">';
		},
		arrows: false,
	});

});