// height slider home
var w = window,
d = document,
e = d.documentElement,
g = d.getElementsByTagName('body')[0],
x = w.innerWidth || e.clientWidth || g.clientWidth,
y = w.innerHeight|| e.clientHeight|| g.clientHeight;

$(document).ready(function(){

    $window = $(window);
        if ( x  > 1024) {
        // MUDA A COR DO HEADER AO CHEGAR NA DIV
        var distance = $('.wrapper_header_branco').offset().top,
        $window = $(window);

        $window.scroll(function() {
            if ( $window.scrollTop() >= distance - 70 ) {
                $('#header').addClass('header_branco');
            } else {
                $('#header').removeClass('header_branco');
            }
        });

        // REVERTE A COR DO HEADER AO SAIR DA DIV
        $(window).scroll(function() {
            console.log($(".wrapper_header_branco")[0].getBoundingClientRect());
            if ($(".wrapper_header_branco")[0].getBoundingClientRect().bottom < 70)
                $('#header').removeClass('header_branco');
        });
    }
    
})