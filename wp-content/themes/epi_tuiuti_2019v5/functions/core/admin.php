<?php
// Custom WordPress Login Logo
function my_login_logo() {
	$logo = get_field('logo_do_site', 'option');
	echo "
	<style>
		body.login{
			background-image: linear-gradient(to left top, #053152, #07487a, #0a75bd, #0483de);
		}

		body.login div#login h1 a {
			background-image: url({$logo});
			padding-bottom: 30px;
			padding-bottom: 30px;
			height: 50px;
			width: 100%;
			background-size: contain;
			box-sizing: border-box;
		}

		body.login div#login form#loginform {
			margin-top: 20px;
			margin-left: 0;
			padding: 26px 24px 46px;
			background: #0093d0;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
			box-shadow: 0px 9px 30px 3px rgba(0, 0, 0, 0.15);
			border-radius: 5px;
		}
		body.login div#login form#loginform label{
			color: #fff;
		}
		body.login form .input, .login form input[type=checkbox], .login input[type=text]{
			border-radius: 40px;
			padding: 5px 15px;
		}
		body.login div#login form#loginform #wp-submit {
			background: #312616;
			color: #ffffff;
			text-shadow: none;
			font-weight: 200;
			box-shadow: none;
			border: none;
			width: 120px;
			border-radius: 20px;
		}
		body.login #backtoblog a, body.login #nav a{
			color: #fff;
		}
		body.login #backtoblog a:hover, body.login #nav a:hover{
			color: #a1ecf9;
		}
   </style>";
 
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return  get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return "iGeek's Store";
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// RENOMEIA ARQUIVO AO FAZER UPLOAD
function my_custom_file_name($filename){
    $info = pathinfo($filename);
    $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = basename($filename, $ext);        

    $finalFileName = sanitize_title($name);

    return $finalFileName . $ext;
}
add_filter('sanitize_file_name', 'my_custom_file_name', 10);