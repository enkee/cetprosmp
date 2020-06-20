$(document).ready(function () {
    //variables globales
    var $window=$(window);

    /*if (window.matchMedia('(max-width: 575px)').matches) {*/
    //Animacion de boton buscar
    $(".boton-buscar").click(function () {
            $("#bloque-buscar").slideToggle();
            $(".form-control").val("");
            //$(".form-control").select();
            $(".form-control").focus();
        }

    );

    //Al hacer clic afuera, esconder menu y buscar
    $(document).mouseup(function (e) {

            /*var container = $("#menu-principal");*/
            var container2=$("#bloque-buscar");
            var container3=$(".boton-buscar");
            var container4=$("#general .sub-menu").parent();

            if($window.width()<991) {

                // cierre formulario de busqueda
                if ( !container3.is(e.target) && !container2.is(e.target) && container2.has(e.target).length===0 && container3.has(e.target).length===0) {
                    $("#bloque-buscar").slideUp();
                }
            }

            if($window.width()<992) {
                if ( !container4.is(e.target) && container4.has(e.target).length===0) {
                    $("#general .sub-menu").slideUp('fast');
                }
            }
        }

    );
    //Esconde inperfecciones al cangar el slideshow
    $("section#slideshow").removeClass("esconder");

    //Corrige el problema del menu flex en el menu 768
    $('a[style*="display:none"]').parent().css("display", "none");


    //Esconde el icono home en el menu principal
    $('#general .fa-home').parent().parent().css("display", "none");

    //Esconde el icono salir/entrar cuando se esta logeado
    if ($('#perfil').length > 0) {
        $('#general .fa-sign-out-alt').parent().parent().css("display", "none");
    }

    //Previene que los enlaces que son submenus redireccionen
    $('#general #menu-top').on('click', 'li a', function (e) {
            if ($(this).next().is('.sub-menu')) {
                e.preventDefault();
            }
        }

    );


    //Corrige el espacio del angulo del menu con el icono del menu
    if ($window.width() > 991) {
        $('#general .fa-angle-left').parent().css("width", "auto");

    }

    else {
        $('#general .fa-angle-left').parent().css("width", "52px");
    }

    //Muestra oculta en hover el menu2 en 992

    $('#general .sub-menu').parent().hover(function() {
            if ($window.width() > 991) {
                $(this).children('.sub-menu').css('display', 'block');
            }
        }

        , function() {
            if ($window.width() > 991) {
                $(this).children('.sub-menu').css('display', 'none');
            }
        }

    );

    $window.resize(function () {

            //Esconde el menu 1 para mostrar el menu2
            if ($window.width() > 767 && $('nav').hasClass('ssm-nav-visible')) {
                $('.ssm-overlay').click();
            }

            //Corrige el espacio del angulo del menu con el icono del menu
            if ($window.width() > 991) {
                $('#general .fa-angle-left').parent().css("width", "auto");
                //Muestra el bolque de busqueda en pantalla 992
                $("#bloque-buscar").show();
            }

            else {
                $('#general .fa-angle-left').parent().css("width", "52px");
            }

            //oculta el submenu
            $("#general .sub-menu").slideUp('fast');
        }

    );

    //Abre submenus en el menu2
    $('#general .sub-menu').parent().click(function() {
            if ($window.width() < 992) {
                var cur=$(this);
                $('#general .sub-menu').not(cur.children('.sub-menu')).slideUp('fast');
                cur.children('.sub-menu').slideToggle('fast');
            }
        }

    );

    //Esconde submenus2 al hacer scroll y el boton de ir-arriba
    $(document).scroll(function() {
            $('.sub-menu').slideUp('fast');

            var scrolltop=$(this).scrollTop();

            if (scrolltop >=200) {
                console.log('Llega');
                $('.ir-arriba').fadeIn('fast');
            }

            else {
                $('.ir-arriba').fadeOut('fast');
            }
        }

    );

    //Procesosa los nombres de usuario y los recorta
    var str=$('#general .infouser span:first-child').text();
    $('#general .infouser span:first-child').text(str.substr(0, str.indexOf(" ", 0)));

    //Procesosa los nombres de usuario y los recorta
    var str=$('#general .infouser span:nth-child(2)').text();
    $('#general .infouser span:nth-child(2)').text(str.substr(0, str.indexOf(" ", 0)));

    // Boton Bajar

    $(".bajar").click(function () {
        if($window.width()<992) {
            $('html, body').animate( {
                    scrollTop: $("#articulos").offset().top-49
                }

                , 300);
        }else{
            $('html, body').animate( {
                scrollTop: $("#articulos").offset().top-82
            }

            , 300);
        }

        }

    );

    }

);
/*
// funcion de retrazo
var delay = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

// Al cambiar tamaño de la ventana hay un retrazo de medio segundo para recargar la pagina.
var windowWidth = $(window).width();

$(window).resize(function () {
    delay(function () {
        if (windowWidth != $(window).width()) {
            location.reload();
            return;
        }
    }, 500);
});
*/
/* Al exceder la ventana, los 767px, Agregar classes css
(function($) {

    var $window = $(window),
        $dropdown = $("#menu ul li.menu-item-has-children"),
        $dropdown_toggle = $("#menu ul li.menu-item-has-children a"),
        $dropdown_menu = $("#menu ul li.menu-item-has-children ul"),
        $dropdown_item = $("#menu ul li.menu-item-has-children ul li");

    function resized() {
        if ($window.width() > 767) {
               return   $dropdown.addClass("dropdown nav-item"),
                        $dropdown_toggle.addClass("dropdown-toggle"),
                        $dropdown_menu.addClass("dropdown-menu"),
                        $dropdown_item.addClass("dropdown-item");
        }

        $dropdown.removeClass("dropdown");
        $dropdown_toggle.removeClass("dropdown-toggle");
        $dropdown_menu.removeClass("dropdown-menu");
        $dropdown_item.removeClass("dropdown-item");
    }
    
    $window
        .resize(resized)
        .trigger('resize');
})(jQuery);
*/