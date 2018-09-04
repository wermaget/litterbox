$(document).ready(function () {
    var banner_index = 1;
    var banners_qty = 3;
    var banner = $("#home-hero-banner");


    if ($(window).scrollTop() != 0) {
        $("#topnav").addClass('scrolled');
    } else {
        $("#topnav").removeClass('scrolled');
    }

    $('#btn-show-search-job').on("click", function (e) {
        $('#home-search-talent').css('display', 'none');
        $('#home-search-job').css('display', 'block');
    });

    $('#btn-show-search-talent').on("click", function (e) {
        $('#home-search-talent').css('display', 'block');
        $('#home-search-job').css('display', 'none');
    });


    $(window).scroll(function () {
        if ($(window).scrollTop() != 0) {
            $("#topnav").addClass('scrolled');
        } else {
            $("#topnav").removeClass('scrolled');
        }
    });


    $("#home-slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#home-slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#home-slideshow');
    }, 5000);

    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var fakeHeight = $(window).height() - 550;
        var viewportBottom = viewportTop + fakeHeight;

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    $(window).on('resize scroll', function() {
        $('.paragraph').each(function() {
            var id = $(this).attr('id');
            var hash = "#"+id;

            if ($(this).isInViewport()) {
                $('.director a[href="'+hash+'"]').addClass('active');
            } else {
                $('.director a[href="'+hash+'"]').removeClass('active');
            }
        });

        if($(".sticky-content").offset().top > 1250) {
            // if($("#sidebar").hasClass('sticky')){
                $("#sidebar").removeClass('sticky');
            // }
        }else{
            //alert("DAPAT MA BALIK");
            // if(!$("#sidebar").hasClass('sticky')){
                $("#sidebar").addClass('sticky');
            // }
        }
    });

    $('.director a').on('click',function(e) {
        e.preventDefault();
        var offset = 75;
        var target = this.hash;
        if ($(this).data('offset') != undefined) offset = $(this).data('offset');
        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top - offset
        }, 500, 'swing', function() {
            // window.location.hash = target;
        });
    });

});