<?php
session_start();

if(!isset($_SESSION["referrer"])){
	//get the referrer
	if ($_SERVER["HTTP_REFERER"]){
		$referrer = $_SERVER["HTTP_REFERER"];
		} else {
			$referrer = "unknown";
	}
	//save it in a session
	$_SESSION["referrer"] = $referrer; // store session data
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url'); ?>/assets/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	// bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/animate.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/slick.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/geral.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/slick.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/slick_options.js"></script>
<?php if (is_single()): ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/assets/css/xzoom.css" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/xzoom.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.xzoom').xzoom({zoomWidth: 130, zoomHeight: 130, title: false, Xoffset: -30, Yoffset: 150});
			//$('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
		});
	</script>
<?php endif ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/wow.min.js"></script>
<script>
	wow = new WOW({
	    mobile: false,
	})
	wow.init();
</script>

<?php wp_head(); ?>

<!-- analytics -->
<?php include (TEMPLATEPATH . '/assets/includes/analytics.php'); ?>
<!-- analytics -->

<!-- pixel -->
<?php if ( is_page('resposta-fornecedores') || is_page('resposta-contato') || is_page('resposta-newsletter') || is_page('resposta-orcamento-rapido') || is_page('resposta-trabalhe-conosco') || is_page('resposta-orcamento') ) : ?>
	<?php include (TEMPLATEPATH . '/assets/includes/pixel-face-resposta.php'); ?>
<?php else: ?>
	<?php include (TEMPLATEPATH . '/assets/includes/pixel-face-pages.php'); ?>
<?php endif; ?>
<!-- pixel -->

<!-- hotjar -->
<script>
	(function(h,o,t,j,a,r){
		h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		h._hjSettings={hjid:1066809,hjsv:6};
		a=o.getElementsByTagName('head')[0];
		r=o.createElement('script');r.async=1;
		r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		a.appendChild(r);
	})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- hotjar -->

</head>

<!-- lead pixel -->
<?php if ( is_page('resposta-fornecedores') || is_page('resposta-contato') || is_page('resposta-newsletter') || is_page('resposta-orcamento-rapido') || is_page('resposta-trabalhe-conosco') || is_page('resposta-orcamento') ) : ?>
	<script>
		fbq('track', 'Lead');
	</script>
<?php endif; ?>
<!-- lead pixel -->

<body <?php body_class(); ?>>

<!-- tag body -->
<?php the_field('tags_apos_body_all', 'option'); ?>
<!-- tag body -->

<!-- inicio header -->
<header id="header" class="">
	<section class="header_content">

		<!-- logo -->
		<!--  
		<div class="logo">
			<a href="<?php echo home_url( '/' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>
		-->
		<?php if (is_front_page()): ?>
		  	<h1 class="logo" style="background: url('<?php bloginfo('template_directory'); ?>/assets/img/logo.png') no-repeat top left / contain;">
		    	<a href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
		  	</h1>
		<?php else : ?>
			<span class="logo" style="background: url('<?php bloginfo('template_directory'); ?>/assets/img/logo.png') no-repeat top left / contain;">
		   		<a href="<?php bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
			</span>
		<?php endif; ?>
		<!-- logo -->

		<!-- header_topo -->
		<div class="header_topo">

			<div class="header_contato">
				<a class="facebook" href="https://www.facebook.com/Tuiuti/" target="_blank"><i class="fab fa-facebook-f"></i></a>
				<a class="facebook" href="https://www.instagram.com/p/B40c4TnHoVt/" target="_blank"><i class="fab fa-instagram"></i></a>
				<a class="facebook" href="https://www.instagram.com/p/B40c4TnHoVt/" target="_blank"><i class="fab fa-linkedin"></i></a>
				<a class="facebook -youtube" href="https://www.instagram.com/p/B40c4TnHoVt/" target="_blank"><i class="fab fa-youtube"></i></a>

				<span class="header_phone">
					<i class="fas fa-phone"></i> 11 2090-2988
				</span>
				<span class="header_phone header_whats">
					<a href="https://web.whatsapp.com/send?phone=5511947123303&text=Envie uma mensagem"  class="ao5-whatsapp-event">
						<i class="fab fa-whatsapp"></i> Whatsapp
					</a>
				</span>
			</div>
		</div>
		<!-- header_topo -->

		<!-- menu -->
		<span class="toggleMenu external">
			<div class="line_one"></div>
		    <div class="line_two"></div>
		    <div class="line_three"></div>
		</span>

		<nav id="menu_header">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</nav>
		<!-- menu -->

	</section>
</header>
<!-- fim header -->