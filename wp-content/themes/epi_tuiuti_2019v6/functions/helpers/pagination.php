<?php
//Paginação
function wordpress_pagination() {
  global $wp_query;
  $big = 999999999;
  echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'next_text' => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
        'prev_text' => '<i class="fa fa-chevron-left" aria-hidden="true"></i>'
  ) );
}

// PRODUTOS POR PAGINA
function tenpixelsleft_custom_posts_per_page($query) {
    if (!$query->is_main_query())
        return $query;
    elseif ($query->is_post_type_archive('produtos') || $query->is_tax('categoria-produtos'))
        $query->set('posts_per_page', '9');
    return $query;
}

if (!is_admin()) {
    add_filter('pre_get_posts', 'tenpixelsleft_custom_posts_per_page');
}

?>