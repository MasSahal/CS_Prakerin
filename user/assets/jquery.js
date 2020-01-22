$(window).scroll(function(){
    var jml_scroll = $(this).scrollTop();

    $('.jumbotron .container').css({
        'transform' : 'translate(0,'+ jml_scroll/4 +'%)'
    });
});