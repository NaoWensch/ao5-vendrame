<?php

/*
 * Post Type Produtos
 */
function my_custom_post_produtos() {
    $labels = array(
        'name' => __('Produtos'),
        'singular_name' => __('Produto'),
        'add_new' => __('Novo Produto'),
        'add_new_item' => __('Adicionar novo Produto'),
        'edit_item' => __('Editar Produto'),
        'new_item' => __('Novo Produto'),
        'view_item' => __('Ver Produto'),
        'search_items' => __('Buscar Produto'),
        'not_found' =>  __('Nenhum Produto encontrado'),
        'not_found_in_trash' => __('Nada encontrado na Lixeira'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => '',
        'supports'      => array( 'title', 'thumbnail', 'editor'),
        'has_archive'   => true,
        'hierarchical'  => true,
        'query_var'     => true,
        'menu_icon'   	=> 'dashicons-cart',
        'rewrite'       => false,
        'rewrite'       => array('slug' => 'produtos/%categoria-produtos%','with_front' => false),
    );
    register_post_type( 'produtos', $args );
}
add_action( 'init', 'my_custom_post_produtos' );