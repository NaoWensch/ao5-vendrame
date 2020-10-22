<?php

/*
 * Post Type Materiais
 */
function my_custom_post_obra() {
    $labels = array(
        'name' => __('Obras'),
        'singular_name' => __('Obra'),
        'add_new' => __('Novo Obra'),
        'add_new_item' => __('Adicionar novo Obra'),
        'edit_item' => __('Editar Obra'),
        'new_item' => __('Novo Obra'),
        'view_item' => __('Ver Obra'),
        'search_items' => __('Buscar Obra'),
        'not_found' =>  __('Nenhum Obra encontrado'),
        'not_found_in_trash' => __('Nada encontrado na Lixeira'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => '',
        'supports'      => array( 'title', 'editor'),
        'has_archive'   => true,
        'hierarchical'  => true,
        'query_var'     => true,
        'menu_icon'   	=> 'dashicons-hammer',
    );
    register_post_type( 'obra', $args );
}
add_action( 'init', 'my_custom_post_obra' );