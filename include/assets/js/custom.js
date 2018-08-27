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

});