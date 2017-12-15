$(function() {
	$("li").mouseenter(function(){
        $(this).css('text-decoration','underline');
        $(this).css('cursor','pointer');
            $(".mai").animate({"left": "-=500px"},"slow");
    });

    $("li").mouseleave(function(){
        $(this).css('text-decoration','none');
    });

    $("#explore").on("click", function() {
        var object = $(this);
        $("html ,body").animate({
            scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55}, 700);
    });
});