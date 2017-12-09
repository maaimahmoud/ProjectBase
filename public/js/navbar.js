$(function() {
    new WOW().init(); // wow.js for scrolling animation

    $(".intro").height($(window).height() - 55);
    $(window).on("resize", function() {
        $(".intro").height($(window).height() - 55);
    });

    $("#message").on("blur", function() {
        if ($(this).val().replace(/ /g, '').length >= 20) {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        } else {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
    });

    $('#inputEmail, #inputUserName, #inputTelephone').on("blur", function(event) {
        if ($(this).is(":invalid")) {
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }
    });


    // scroll to sections

    $(".navbar .navbar-nav a.nav-link").on("click", function() {
        var object = $(this);
        $("html ,body").animate({
            scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55
        }, 700);
    });



});

$(window).on("load", function() {
    $("#loader").hide();
    $("body").css("overflow", "auto");
});