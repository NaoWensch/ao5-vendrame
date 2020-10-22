<?php

// ADICIONA CLASSE PARA VIDEOS DO YOUTUBE
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container-wrapper"><div class="video-container">'.$html.'</div></div>';
    return $return;
}