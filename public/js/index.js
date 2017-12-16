$(function() {

		$(".Year-List li").click(function(e){
        	$("#Year-Button").css('pointer-events','auto');
        	$("#Course-Button").click();
        });


		$(".Course-List li").click(function(e){
        	$("#Course-Button").css('pointer-events','auto');
        	$("#Term-Button").click();
        });


		$(".Term-List li").click(function(e){

        });

        $(".Year-Button").click(function(e){
            $("#Course-Button").css('pointer-events','none');
            $("#Course-Button").css('cursor','default');
            
            $("#Term-Button").css('pointer-events','none');
            $("#Term-Button").css('cursor','default');
        });

        $(".Course-Button").click(function(e){
            $("#Term-Button").css('pointer-events','none');
            $("#Term-Button").css('Cursor','default');
        });

         $("#explore").on("click", function() {
        var object = $(this);
        $("html ,body").animate({
            scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55}, 700);
    });

	$('#mi-slider').catslider();


});