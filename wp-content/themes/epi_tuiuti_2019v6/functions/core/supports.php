<?php 

// Menu Support
add_theme_support( 'menus' );

// Thumbnail Support
add_theme_support( 'post-thumbnails' );

// Sidebar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<p class="widgettitle">',
				'after_title'   => '</p>',
    ) );
};