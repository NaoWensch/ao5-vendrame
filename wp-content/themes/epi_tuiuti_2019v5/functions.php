<?php

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Menu Cabeçalho' ));
    register_nav_menu('sobre-menu',__( 'Menu Sobre' ));
    register_nav_menu('blog-menu',__( 'Menu Blog' ));
    register_nav_menu('footer-menu',__( 'Menu Rodapé' ));
}
add_action( 'init', 'register_my_menu' );

// ICONE MENU
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
    
    foreach( $items as &$item ) {
        $icon = get_field('icon_menu', $item);

        if( $icon ) {
            $item->title = '<span><img src="' .$icon. '"/></span>' .$item->title;
        }
    }
    
    return $items;
}

add_action( 'after_setup_theme', 'tuiuti_setup' );

if ( ! function_exists( 'tuiuti_setup' ) ):
function tuiuti_setup() {

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails' );
    
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'produto_200', 200, 200, true ); //(cropped)
        add_image_size( 'produto_380', 380, 340, true ); //(cropped)
        add_image_size( 'blog_home', 460, 410, true ); //(cropped)
        //add_image_size( 'thumb_relacionado', 240, 360, true ); //(cropped)
    }

    add_theme_support( 'automatic-feed-links' );

}
endif;

/* excerpt */
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

// ############### COMEÇO AFC OPÇÕES #################
add_action( 'init', 'acf_options');
function acf_options(){
    if( function_exists('acf_add_options_page') ) {
            
        // SIDEBAR BLOG
        acf_add_options_page(array(
            'page_title'    => 'Barra Lateral',
            'menu_title'    => 'Barra Lateral',
            'menu_slug'     => 'lateral_template',
            'capability'    => 'edit_posts',
            'icon_url'      => 'dashicons-admin-generic',
            'position'      => 20,
        ));

        // SCRIPTS
        acf_add_options_page(array(
            'page_title'    => 'Scripts',
            'menu_title'    => 'Scripts',
            'menu_slug'     => 'scripts_template',
            'capability'    => 'edit_posts',
            'icon_url'      => 'dashicons-admin-generic',
            'position'      => 23,
        ));
        
    }
}

// CSS ADMIN
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// ############### FIM AFC OPÇÕES #################


// ############### INICIO CUSTOM POST TYPES #################

// TAXONOMIA TIPOS DE PRODUTO
function tipo_produto() {

    $labels = array(
        'name'                       => 'Tipos de produto',
        'singular_name'              => 'Tipo de produto',
        'menu_name'                  => 'Tipos de produto',
        'all_items'                  => 'Todos',
        'parent_item'                => 'Pai',
        'parent_item_colon'          => 'Pai:',
        'new_item_name'              => 'Adicionar novo',
        'add_new_item'               => 'Adicionar novo',
        'edit_item'                  => 'Editar',
        'update_item'                => 'Atualizar',
        'view_item'                  => 'Ver',
        'separate_items_with_commas' => 'Separe com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou remover',
        'choose_from_most_used'      => 'Escolha entre os mais usados',
        'popular_items'              => 'Categorias Populares',
        'search_items'               => 'Buscar',
        'not_found'                  => 'Não encontrado',
        'items_list'                 => 'Lista de Tipos de produto',
        'items_list_navigation'      => 'Lista de navegação',
    );
    $args = array(
        'labels'                     => $labels,
        'rewrite'                    => true,
        'has_archive'                => true,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array('slug' => 'produtos', 'with_front' => false)
    );
    register_taxonomy( 'tipo_produto', array( 'produtos' ), $args );

}
add_action( 'init', 'tipo_produto', 1 );

// CATEGORIA WALKER
class Walker_Category_Parents extends Walker_Category {
    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
        global $wpdb;
        extract($args);

        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );
        $link = '<a href="' . esc_attr( get_term_link($category) ) . '" class="nav-'.$category->slug.'" ';
        $link .= 'title="' . esc_attr( $category->name  ) . '"';
        $link .= '>';
        $link .= '<span><img src="' . get_field('icon_cat_p', $category->taxonomy . '_' . $category->term_id) . '" alt="' . $category->cat_name . '"></span>';
        $link .= $cat_name . '</a>';
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";

            $children = $wpdb->get_results( "SELECT term_id FROM $wpdb->term_taxonomy WHERE parent=".$category->term_id );

            $children_count = count($children);

            $has_children = ($children_count != 0) ? ' parent-category' : '';

            $class = 'cat-item cat-' . $category->slug;
            if ( !empty($current_category) ) {
                $_current_category = get_term( $current_category, $category->taxonomy );
                if ( term_is_ancestor_of($category->term_id, $_current_category->parent, $category->taxonomy) )
                    $class .=  ' current-cat-parent';
                elseif ( $category->term_id == $current_category )
                    $class .=  ' current-cat-parent';
                elseif ( $category->term_id == $_current_category->parent )
                    $class .=  ' current-cat-parent';
                
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
     }
}

// TAXONOMIA SEGMENTOS DE PRODUTO
function segmento_produto() {

    $labels = array(
        'name'                       => 'Segmentos de produto',
        'singular_name'              => 'Segmento de produto',
        'menu_name'                  => 'Segmentos de produto',
        'all_items'                  => 'Todos',
        'parent_item'                => 'Pai',
        'parent_item_colon'          => 'Pai:',
        'new_item_name'              => 'Adicionar novo',
        'add_new_item'               => 'Adicionar novo',
        'edit_item'                  => 'Editar',
        'update_item'                => 'Atualizar',
        'view_item'                  => 'Ver',
        'separate_items_with_commas' => 'Separe com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou remover',
        'choose_from_most_used'      => 'Escolha entre os mais usados',
        'popular_items'              => 'Categorias Populares',
        'search_items'               => 'Buscar',
        'not_found'                  => 'Não encontrado',
        'items_list'                 => 'Lista de Segmentos de produto',
        'items_list_navigation'      => 'Lista de navegação',
    );
    $args = array(
        'labels'                     => $labels,
        'rewrite'                    => true,
        'has_archive'                => true,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'segmento_produto', array( 'produtos' ), $args );

}
add_action( 'init', 'segmento_produto', 1 );

// TAXONOMIA FABRICANTES
function taxonomy_fabricantes() {

    $labels = array(
        'name'                       => 'Fabricantes',
        'singular_name'              => 'Fabricante',
        'menu_name'                  => 'Fabricantes',
        'all_items'                  => 'Todos',
        'parent_item'                => 'Pai',
        'parent_item_colon'          => 'Pai:',
        'new_item_name'              => 'Adicionar novo',
        'add_new_item'               => 'Adicionar novo',
        'edit_item'                  => 'Editar',
        'update_item'                => 'Atualizar',
        'view_item'                  => 'Ver',
        'separate_items_with_commas' => 'Separe com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou remover',
        'choose_from_most_used'      => 'Escolha entre os mais usados',
        'popular_items'              => 'Categorias Populares',
        'search_items'               => 'Buscar',
        'not_found'                  => 'Não encontrado',
        'items_list'                 => 'Lista de Fabricantes',
        'items_list_navigation'      => 'Lista de navegação',
    );
    $args = array(
        'labels'                     => $labels,
        'rewrite'                    => array(
            'slug'                   => 'fabricante',
            'with_front'             => false,
            'hierarchical'           => true
        ),
        'has_archive'                => true,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'fabricante', array( 'produtos' ), $args );

}
add_action( 'init', 'taxonomy_fabricantes', 1 );

// POSTS MAIS ACESSADOS
function shapeSpace_popular_posts($post_id) {
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function shapeSpace_track_posts($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');

/* PRODUTOS - COM CATEGORIAS */
add_action( 'init', 'register_cpt_produtos' );

function register_cpt_produtos() {

    $labels = array( 
        'name' => _x( 'Produtos', 'produtos' ),
        'singular_name' => _x( 'Produto', 'produtos' ),
        'add_new' => _x( 'Adicionar Novo', 'produtos' ),
        'add_new_item' => _x( 'Adicionar Novo', 'produtos' ),
        'edit_item' => _x( 'Editar', 'produtos' ),
        'new_item' => _x( 'Novo', 'produtos' ),
        'view_item' => _x( 'Ver', 'produtos' ),
        'search_items' => _x( 'Procurar', 'produtos' ),
        'not_found' => _x( 'Nenhum item encontrado', 'produtos' ),
        'not_found_in_trash' => _x( 'Nenhum item encontrado no lixo', 'produtos' ),
        'parent_item_colon' => _x( 'Pai:', 'produtos' ),
        'menu_name' => _x( 'Produtos', 'produtos' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-cart',
        
        'supports' => array( 'title', 'editor', 'thumbnail'),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'rewrite' => array( 'slug' => 'produtos/%tipo_produto%', 'with_front' => false ),
        'has_archive' => 'produtos',
        'query_var' => true,
        'can_export' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'produtos', $args );
}

function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'produtos' ){
        $terms = wp_get_object_terms( $post->ID, 'tipo_produto' );
        if( $terms ){
            return str_replace( '%tipo_produto%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );

// PRODUTOS POR PAGINA
function tenpixelsleft_custom_posts_per_page($query) {
    if (!$query->is_main_query())
        return $query;
    elseif ($query->is_post_type_archive('produtos') || $query->is_tax('tipo_produto'))
        $query->set('posts_per_page', '18');
    return $query;
}

if (!is_admin()) {
    add_filter('pre_get_posts', 'tenpixelsleft_custom_posts_per_page');
}

// ############### FIM CUSTOM POST TYPES #################


// ADICIONA CLASSE PARA VIDEOS DO YOUTUBE
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container-wrapper"><div class="video-container">'.$html.'</div></div>';
    return $return;
}

// REMOVE A COLUNA COMENTÁRIOS DE TODOS OS POSTS
function my_manage_columns_comments( $columns ) {
    unset($columns['comments']);
    return $columns;
}

function my_column_init_comments() {
    add_filter( 'manage_posts_columns' , 'my_manage_columns_comments' );
}
add_action( 'admin_init' , 'my_column_init_comments' );

// RENOMEIA ARQUIVO AO FAZER UPLOAD
function my_custom_file_name($filename){
    $info = pathinfo($filename);
    $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = basename($filename, $ext);        

    $finalFileName = sanitize_title($name);

    return $finalFileName . $ext;
}
add_filter('sanitize_file_name', 'my_custom_file_name', 10);

show_admin_bar(false);

// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');