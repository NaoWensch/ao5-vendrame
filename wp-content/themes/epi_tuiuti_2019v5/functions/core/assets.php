<?php
/*
 * Importar Scripts e Styles
 */

// CSS ADMIN
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function wpdocs_theme_name_scripts() {
    // [>] START CSS SECTION [>] //
    // wp_enqueue_style( 'CSS-Principal', get_template_directory_uri() . '/assets/css/main.css');
    //wp_enqueue_style( 'CSS-OWL-1', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.min.css');
    //wp_enqueue_style( 'ANIMATE-CSS', get_template_directory_uri() . '/assets/vendor/rxscroll/animate.css');
    //wp_enqueue_style( 'FONTAWESOME-CSS', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    // [>] START JS SECTION [>] //
    wp_enqueue_script( 'Jquery', 'https://code.jquery.com/jquery-2.2.3.min.js', array(), '1.0.0', true ); // Verificar versão do Jquery
    
    wp_enqueue_script( 'JS OWL', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'JS RXSCROLL', get_template_directory_uri() . '/assets/vendor/rxscroll/rxscroll.js', array(), '1.0.0', true );
    wp_enqueue_script( 'JS MASK', get_template_directory_uri() . '/assets/vendor/mask/mask.js', array(), '1.0.0', true );
    wp_enqueue_script( 'JS YTS VALIDATION', get_template_directory_uri() . '/assets/vendor/yts-validation/yts-validation.js', array(), '1.0.0', true );
    wp_enqueue_script( 'JS TRACKING', get_template_directory_uri() . '/assets/vendor/tracking/tracking.js', array(), '1.0.0', true );
    wp_enqueue_script( 'JS SLICK', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array(), '1.0.0', true );

    //wp_enqueue_script( 'Font Awesome', 'https://use.fontawesome.com/b8bb86ba3c.js', array(), '1.0.0', true );

    wp_enqueue_script( 'JS Principal', get_template_directory_uri() . '/assets/js/main.js?v='. time(), array(), '1.0.0', true );
    wp_enqueue_script( 'JS Slick', get_template_directory_uri() . '/assets/js/src/slick_options.js?v='. time(), array(), '1.0.0', true );

    $translation_array = array( 'templateUrl' => site_url() );
    wp_localize_script( 'JS Principal', 'object_name', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );