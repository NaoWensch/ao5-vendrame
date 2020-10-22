<?php

/* Taxonomy Categorias */

function categoria_produto_taxonomy() {
    $labels = array(
    'name'                       => __( 'Categorias de Produto'),
    'singular_name'              => __( 'Categoria de Produto'),
    'menu_name'                  => __( 'Categorias de Produto'),
    'all_items'                  => __( 'Todos os Categorias de Produto'),
    'parent_item'                => __( 'Categoria de Produto pai'),
    'parent_item_colon'          => __( 'Categoria de Produto pai:'),
    'new_item_name'              => __( 'Novo Categoria de Produto'),
    'add_new_item'               => __( 'Adicionar Categoria de Produto'),
    'edit_item'                  => __( 'Editar Categoria de Produto'),
    'update_item'                => __( 'Atualizar Categoria de Produto'),
    'view_item'                  => __( 'Ver Categoria de Produto'),
    'add_or_remove_items'        => __( 'Add ou remover Categoria de Produto'),
    'popular_items'              => __( 'Categorias de Produto Populares'),
    'search_items'               => __( 'Buscar Categoria de Produto'),
    'not_found'                  => __( 'Nada encontrado'),
    'no_terms'                   => __( 'Nenhum Categoria de Produto'),
    'items_list'                 => __( 'Lista de Categorias de Produto'),
     );
    $args = array(
        'labels' => $labels,
        'hierarchical'  => true,
        'public'        => true,
        'query_var'     => 'categoria-produtos',
        'rewrite'       => array('slug' => 'produtos','with_front' => false, 'hierarchical' => true),
        '_builtin'      => false,
    );
    register_taxonomy( 'categoria-produtos', array('produtos'), $args );
}
add_action( 'init', 'categoria_produto_taxonomy', 0 );



/* Segmento de Produto */
function segmento_produto_taxonomy() {

    $labels = array(
        'name'                       => __( 'Segmentos de Produtos'),
        'singular_name'              => __( 'Segmento de Produto'),
        'menu_name'                  => __( 'Segmentos de Produtos'),
        'all_items'                  => __( 'Todos os Segmentos de Produtos'),
        'parent_item'                => __( 'Segmentos de Produtos pai'),
        'parent_item_colon'          => __( 'Segmentos de Produtos pai:'),
        'new_item_name'              => __( 'Novo Segmentos de Produtos'),
        'add_new_item'               => __( 'Adicionar Segmentos de Produtos'),
        'edit_item'                  => __( 'Editar Segmentos de Produtos'),
        'update_item'                => __( 'Atualizar Segmentos de Produtos'),
        'view_item'                  => __( 'Ver Segmentos de Produtos'),
        'add_or_remove_items'        => __( 'Add ou remover Segmentos de Produtos'),
        'popular_items'              => __( 'Segmentos de Produtos Populares'),
        'search_items'               => __( 'Buscar Segmentos de Produtos'),
        'not_found'                  => __( 'Nada encontrado'),
        'no_terms'                   => __( 'Nenhum Segmentos de Produtos'),
        'items_list'                 => __( 'Lista de Segmentos de Produtos'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'query_var'                  => 'segmento-produtos',
        'rewrite'                    => array('slug' => 'segmentos','with_front' => false, 'hierarchical' => true),
    );
    register_taxonomy( 'segmento-produtos', array( 'produtos' ), $args );

}
add_action( 'init', 'segmento_produto_taxonomy', 0 );

// Remove Next & Prev
function wpseo_disable_rel_next_home( $link ) {
    return false;
}
// add_filter( 'wpseo_next_rel_link', 'wpseo_disable_rel_next_home' );
?>
