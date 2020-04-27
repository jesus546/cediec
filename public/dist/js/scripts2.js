$(function (){
    var myElement = document.querySelector("header");
    var headroom  = new Headroom(myElement);
    headroom.init();

    //menu resposive
    var ancho = $(window).width(),
        enlaces = $('#enlaces'),
        btnMenu = $('#btn-menu'),
        icono = $('#btn-menu .icono');
        
        if (ancho < 750) {
            enlaces.hide();
            icono.addClass('fa-bars');
    }
    
    btnMenu.on('click', function (e) {
        enlaces.slideToggle();
        icono.toggleClass('fa-bars');
    });

    $(window).on('resize', function () {
        if ($(this).width() > 750) {
            enlaces.show();
            icono.removeClass('fa-bars')
        } else {
            icono.addClass('fa-bars')
        }
    });
});