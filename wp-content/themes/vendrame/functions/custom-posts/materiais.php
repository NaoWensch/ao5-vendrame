<?php

/*
 * Post Type Materiais
 */
function my_custom_post_materiais() {
    $labels = array(
        'name' => __('Materiais'),
        'singular_name' => __('Material'),
        'add_new' => __('Novo Material'),
        'add_new_item' => __('Adicionar novo Material'),
        'edit_item' => __('Editar Material'),
        'new_item' => __('Novo Material'),
        'view_item' => __('Ver Material'),
        'search_items' => __('Buscar Material'),
        'not_found' =>  __('Nenhum Material encontrado'),
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
        'menu_icon'   	=> 'dashicons-download',
    );
    register_post_type( 'materiais', $args );
}
add_action( 'init', 'my_custom_post_materiais' );