<?php
    function my_related_articles() {
        if (is_single()) {
    	global $post;
    	$current_post = $post-> ID;
        $number_posts = 3;
    	$categories = get_the_category();
        $cat = get_the_category();
        $cat_id = $cat[0]->term_id;
        $cat_name = $cat[0]->name;

        ?>

<div class="flex flex-start blog-resp">
        <?php 
            // foreach ($categories as $category) :
    
        
            $posts = get_posts('numberposts=' . $number_posts . '&category='. $category->term_id . '&exclude=' . $current_post);
            foreach($posts as $post) :
        ?>

    <article class="blog-box link-seo">
        
        <figure>
            <?php if (get_the_post_thumbnail()) : ?>
                <?= the_post_thumbnail('medium', ['alt' => esc_html (get_the_title())]); ?>
            <?php else : ?>
                <img src="<?php bloginfo('template_directory')?>/assets/img/blog/imagem-blog.jpg" alt="Imagem Blog">
            <?php endif; ?>
        </figure>

        <div class="cont-blog">
            <span class="tit-categoria"><i class="fa fa-bookmark" aria-hidden="true"></i> <?= $cat_name ?></span>
            <h3 class="blogContent__title blogContent__title--related">
                <a href="<?php the_permalink(); ?>">
                    <?php  the_title();?>
                </a>
            </h2>
        </div>

    </article>
    
    <?php endforeach; ?>   
</div>  
    <?php } wp_reset_query(); } ?>



