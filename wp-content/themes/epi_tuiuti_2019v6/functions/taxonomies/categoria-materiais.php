<?php

/* Taxonomy Materiais */

function categoria_materiais_taxonomy() {
    $labels = array(
    'name'                       => __( 'Categorias de Materiais'),
    'singular_name'              => __( 'Categoria de Materiais'),
    'menu_name'                  => __( 'Categorias de Materiais'),
    'all_items'                  => __( 'Todos os Categorias de Materiais'),
    'parent_item'                => __( 'Categoria de Materiais pai'),
    'parent_item_colon'          => __( 'Categoria de Materiais pai:'),
    'new_item_name'              => __( 'Novo Categoria de Materiais'),
    'add_new_item'               => __( 'Adicionar Categoria de Materiais'),
    'edit_item'                  => __( 'Editar Categoria de Materiais'),
    'update_item'                => __( 'Atualizar Categoria de Materiais'),
    'view_item'                  => __( 'Ver Categoria de Materiais'),
    'add_or_remove_items'        => __( 'Add ou remover Categoria de Materiais'),
    'popular_items'              => __( 'Categorias de Materiais Populares'),
    'search_items'               => __( 'Buscar Categoria de Materiais'),
    'not_found'                  => __( 'Nada encontrado'),
    'no_terms'                   => __( 'Nenhum Categoria de Materiais'),
    'items_list'                 => __( 'Lista de Categorias de Materiais'),
     );
    $args = array(
        'labels' => $labels,
        'hierarchical'  => true,
        'public'        => true,
        'query_var'     => 'categoria-materiais',
        'rewrite'       => array('slug' => 'materiais-educativos','with_front' => false, 'hierarchical' => true),
        '_builtin'      => false,
    );
    register_taxonomy( 'categoria-materiais', array('materiais'), $args );
}
add_action( 'init', 'categoria_materiais_taxonomy', 0 );

?>