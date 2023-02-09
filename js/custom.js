// bar menu
var state = false;
$('.bar-menu').on('click', function(){
    if(state == false){
        $('.menu-movil').addClass('active').slideDown();
        $(this).addClass('active');
        state = true;
    }else{
        $('.menu-movil').removeClass('active').slideUp();
        $(this).removeClass('active');
        state = false;
    }
});
$(document).ready(function(){
    var cambio = false;
    $('.main-menu-list li a').each(function(index) {
        if(this.href.trim() == window.location){
            $(this).addClass("active");
            cambio = true;
        }
    });
    if(!cambio){
        $('.main-menu-list .experiencias a').addClass("active");
    }
});
// Banner home
$('.banner-home').owlCarousel({
    autoplay:true,
    loop:true,
    smartSpeed:1500,
    margin:0,
    nav:false,
    dots:true,
    items:1
}).css({'opacity':1});
// Experiences home slide
$('.experiences').owlCarousel({
    autoplay:false,
    loop:false,
    smartSpeed:1500,
    margin:0,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        641:{
            items:2
        },
        1000:{
            items:3
        }
    }

}).css({'opacity':1});
// Generic banner
$('.generic-banner').owlCarousel({
    autoplay:true,
    loop:true,
    smartSpeed:1500,
    margin:0,
    nav:false,
    dots:true,
    items:1
}).css({'opacity':1});
// what to do
var read_more = false;
$('.read-more').on('click', function(){
    if(read_more == false){
        $('.content-description').addClass('active');
        $('.more').addClass('d-none');
        $('.less').removeClass('d-none');
        read_more = true;
    }else{
        $('.content-description').removeClass('active');
        $('.more').removeClass('d-none');
        $('.less').addClass('d-none');
        read_more = false;
    }
});