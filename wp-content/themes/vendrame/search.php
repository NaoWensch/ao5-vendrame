<?php get_header(); ?>
<!-- index todas noticias -->

<?php if ($_GET['busca'] == 'blog'): ?>
	<?php include (TEMPLATEPATH . '/search-blog.php'); ?>
<?php else: ?>
	<?php include (TEMPLATEPATH . '/search-produtos.php'); ?>
<?php endif ?>

<?php get_footer(); ?>