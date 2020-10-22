<?php the_field('tags_head_all', 'option'); ?>

<!-- analitics vai aqui -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22296964-1']);
  _gaq.push(['_trackPageview']);
<?php
if ( is_page('resposta-orcamento') || is_page('resposta-orcamento-rapido') ) {
    echo '
    _gaq.push([\'_addTrans\',
      \''.$_SESSION['hashorcamento'].'\',
      \'EPI Tuiuti\',
      \'0\',
      \'0\',
      \''.$current_user_meta['city'][0].'\',
      \''.$current_user_meta['estados'][0].'\',
      \'BR\'
    ]);';
    foreach ($_SESSION['carrinho'] as $produto) {
      echo '
      _gaq.push([\'_addItem\',
        \''.$_SESSION['hashorcamento'].'\',
        \''.$produto['idprod'].'\',
        \''.$produto['nome'].'\',
        \''.$produto['catprod'].'\',
        \'0\',
        \''.$produto['qnt'].'\',
      ]);
    ';
    }
    echo '_gaq.push([\'_trackTrans\']);';
}
?>

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22296964-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-22296964-1');
</script>