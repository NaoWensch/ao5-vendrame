<?php

function attachment_field_credit($form_fields, $post) {
    $form_fields['be_photographer_name'] = array(
        'label' => 'Autor da Imagem',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'be_photographer_name', true)
    );

    $form_fields['be_photographer_url'] = array(
        'label' => 'Url de Origem',
        'input' => 'text',
        'value' => get_post_meta($post->ID, 'be_photographer_url', true)
    );

    return $form_fields;
}

add_filter('attachment_fields_to_edit', 'attachment_field_credit', 10, 2);

function attachment_field_credit_save($post, $attachment) {
    if(isset($attachment['be_photographer_name'])) {
        update_post_meta($post['ID'], 'be_photographer_name', $attachment['be_photographer_name']);
    }

    if(isset($attachment['be_photographer_url'])) {
        update_post_meta($post['ID'], 'be_photographer_url', esc_url($attachment['be_photographer_url']));
    }

    return $post;
}

add_filter('attachment_fields_to_save', 'attachment_field_credit_save', 10, 2);

function get_media_info($id) {
    $nome = get_post_meta($id, 'be_photographer_name', true);
    $url  = get_post_meta($id, 'be_photographer_url', true);

    $output = NULL;

    if($nome) {
        if($url) {
            $output = '<span class="origem-media"><a href="'. $url .'" title="'.$nome.'" target="_blank">'.$nome.'</a></span>';
        }

        else {
            $output = '<span class="origem-media">'.$nome.'</span>';
        }
    }

    return $output;
}

function html_insert_image($html, $id, $caption, $title, $align, $url, $size) {
    $html = get_image_tag($id, '', $title, $align, $size);
    $info = get_media_info($id);

    $output  = "<figure id='post-$id media-$id' class='figure align$align'>";
    $output .= $html;
    $output .= ' '.$info.' ';
    $output .= "</figure>";

    return $output;
}

add_filter('image_send_to_editor', 'html_insert_image', 10, 9);
