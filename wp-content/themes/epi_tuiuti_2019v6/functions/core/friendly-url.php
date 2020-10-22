<?php


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
preg_match('/.+produtos+.[^\/]*+(.*)/', $url, $sub_tax);
preg_match('/.+produtos+(.[^\/]*)(.[^\/]*)(.[^\/]*)/', $url, $sub_tax_single);
$test_tax = str_replace('/','', $sub_tax[1]);

if ($test_tax) {
    $args = array(
    'name'        => $test_tax,
    'post_type'   => 'produtos',
    'post_status' => 'publish',
    'numberposts' => 1
    );
    $my_posts = get_posts($args);
}

if (strpos($url,'/page/') !== false) {
    add_action('init', 'upper_rewrite_pagination');
    flush_rewrite_rules();
    // echo '<h1>TESTE 1</h1>';
} elseif($sub_tax_single[3] != '/' && $sub_tax_single[3] != '') {
    add_action( 'init', 'upper_rewrite' );
    flush_rewrite_rules();    
    // echo '<h1>TESTE 2</h1>';
}elseif($sub_tax[1] != '/' && $my_posts) {
    add_action( 'init', 'upper_rewrite_2' );
    flush_rewrite_rules();    
    // echo '<h1>TESTE 3</h1>';
} else {
    add_action( 'init', 'upper_rewrite' );
    flush_rewrite_rules();    
    // echo '<h1>TESTE 4</h1>';
}

function upper_rewrite() {
    // add_rewrite_rule( '^produtos/([^/]*)/?$','index.php?categorias=$matches[1]','top' );
    // add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/?$','index.php?categorias=$matches[2]','top' );
    // add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/([^/]*)/?','index.php?categorias=$matches[1]&produtos=$matches[3]','top' );
    // add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/page/?([0-9]{1,})?$','index.php?produtos=$matches[2]&paged=$matches[2]','top' );
    // add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/page/?([0-9]{1,})/?','index.php?produtos=$matches[2]&paged=$matches[3]','top' );
    // flush_rewrite_rules();

    add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/([^/]*)?$','index.php?produtos=$matches[3]','top' );
}

function upper_rewrite_2() {
    add_rewrite_rule( '^produtos/([^/]*)/([^/]*)?$','index.php?produtos=$matches[2]','top' );
}

function upper_rewrite_pagination() {
    add_rewrite_rule( '^([^/]*)/page/?([0-9]{1,})?$','index.php?pagename=$matches[1]&paged=$matches[2]','top' );
    add_rewrite_rule( '^produtos/([^/]*)/([^/]*)/([^/]*)/page/?([0-9]{1,})?$','index.php?produtos=$matches[3]&paged=$matches[4]','top' );
}

function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'produtos' ){
        $terms = wp_get_object_terms( $post->ID, 'tipo_produto' );
        if( $terms ){

            $x_terms = 0;
            foreach ($terms as $term) {
                $x_terms++;
            }

            if ($x_terms > 1) {
                if ($terms[0]->parent) {
                    $parent_term = get_term_by('id' , $terms[0]->parent, 'tipo_produto');
                    $parent_slug = $parent_term->slug;
                    $child_slug = $terms[0]->slug;
                } else {
                    $parent_term = $terms[0];
                    $parent_slug = $parent_term->slug;
                    $child_slug = $terms[1]->slug;
                }

                $new_slug = "{$parent_term->slug}/{$child_slug}";
            } else {
                $new_slug = $terms[0]->slug;
            }

            return str_replace( '%tipo_produto%' , $new_slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 10 );

// function wpa_show_permalinks( $post_link, $post ){
//     if ( is_object( $post ) && $post->post_type == 'produtos' ){
//         $terms = wp_get_object_terms( $post->ID, 'tipo_produto' );
//         if( $terms ){
//             return str_replace( '%tipo_produto%' , $terms[0]->slug , $post_link );
//         }
//     }
//     return $post_link;
// }
// add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );