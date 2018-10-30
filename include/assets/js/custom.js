$(document).ready(function () {

    /* Home custom slideshow */
    $("#home-slideshow > div:gt(0)").hide();

    setInterval(function () {
        $('#home-slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#home-slideshow');
    }, 5000);

    /* If window is scrolled add white background in navigation */
    if ($(window).scrollTop() != 0) {
        $("#topnav").addClass('scrolled');
    } else {
        $("#topnav").removeClass('scrolled');
    }
    $(window).scroll(function () {
        if ($(window).scrollTop() != 0) {
            $("#topnav").addClass('scrolled');
        } else {
            $("#topnav").removeClass('scrolled');
        }
    });

    /* Search button switch toggles in Homepage */
    $('#btn-show-search-job').on("click", function (e) {
        $('#home-search-talent').css('display', 'none');
        $('#home-search-job').css('display', 'block');
    });
    $('#btn-show-search-talent').on("click", function (e) {
        $('#home-search-talent').css('display', 'block');
        $('#home-search-job').css('display', 'none');
    });

    $.fn.isInViewport = function () {
        var offset = 75;
        var elementTop = $(this).offset().top - offset;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var fakeHeight = $(window).height() - 550;
        var viewportBottom = viewportTop + fakeHeight;

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    /* About us page sidebar scripts */
    if ($(window).scrollTop() > 2560) {
        $("#sidebar").css("opacity", "0");
    } else {
        $("#sidebar").css("opacity", "1");
    }
    $(window).on('resize scroll', function () {
        if ($(this).scrollTop() > 2600) {
            $("#sidebar").css("opacity", "0");
        } else {
            $("#sidebar").css("opacity", "1");
        }

        $('.paragraph').each(function () {
            var id = $(this).attr('id');
            var hash = "#" + id;

            if ($(this).isInViewport()) {
                $('.director a[href="' + hash + '"]').addClass('active');
            } else {
                $('.director a[href="' + hash + '"]').removeClass('active');
            }
        });
    });
    $('.director a').on('click', function (e) {
        e.preventDefault();
        var offset = 75;
        var target = this.hash;
        if ($(this).data('offset') != undefined) offset = $(this).data('offset');
        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - offset
        }, 500, 'swing', function () {
            // window.location.hash = target;
        });
    });

    /* Toggle mobile menu nav */
    $("nav .toggle").on("click", function () {
        $('body').toggleClass('nav-open');
    });

    $("nav ul.menu > li").on("click", function () {
        $(this).find('ul.nav-level2').toggleClass('active');
        $(this).find('a.nav-item-drop').toggleClass('open');
    });
});