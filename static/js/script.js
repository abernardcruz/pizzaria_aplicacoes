$(function(){
    foto1 = 'static/img/banner1.jpg';
    atual = foto1;
    foto2 = 'static/img/banner2.jpg';
    setInterval(function(){ 
        (atual == foto1) ? atual = foto2: atual = foto1;
        $('.container').css('background-image', "url("+ atual +")");
    }, 10000);
});