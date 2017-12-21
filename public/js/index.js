$(function() {
    var yearNumber = 0;
    var termNumber=0;

        $("#explore-sign-up").click(function(e){
            $("#sign_up_button").click();   
            console.log('MaiOmar');
        });

		$(".Year-List li").click(function(e){
        	$("#Year-Button").css('pointer-events','auto');
            yearNumber=$(this).index()+1;
            
        	$("#Term-Button").click();
        });


		$(".Term-List li").click(function(e){
        	$("#Term-Button").css('pointer-events','auto');
            termNumber=$(this).index()+1;

            console.log(yearNumber);
            console.log(termNumber);

            $("#Course-List").empty();

            if (yearNumber == 1)
            {
                if (termNumber == 1)
                    {
                        console.log("Adding First List");
                        var ul = $('#11');
                        ul.clone(true).appendTo("#Course-List");
                    }
                else
                    {
                        console.log("Adding Second List");
                        var ul = $('#12');
                        ul.clone(true).appendTo("#Course-List");
                    }

            } else if (yearNumber == 2)
            {
                if (termNumber == 1)
                    {
                        console.log("Adding First List");
                        var ul = $('#21');
                        ul.clone(true).appendTo("#Course-List");
                    }
                else
                    {
                        console.log("Adding Second List");
                        var ul = $('#22');
                        ul.clone(true).appendTo("#Course-List");
                    }

            }else if (yearNumber == 3)
            {
                if (termNumber == 1)
                    {
                        console.log("Adding First List");
                        var ul = $('#31');
                        ul.clone(true).appendTo("#Course-List");
                    }
                else
                    {
                        console.log("Adding Second List");
                        var ul = $('#32');
                        ul.clone(true).appendTo("#Course-List");
                    }

            } else if (yearNumber == 4)
            {
                if (termNumber == 1)
                    {
                        console.log("Adding First List");
                        var ul = $('#41');
                        ul.clone(true).appendTo("#Course-List");
                    }
                else
                    {
                        console.log("Adding Second List");
                        var ul = $('#42');
                        ul.clone(true).appendTo("#Course-List");
                    }

            }

        	$("#Course-Button").click();
        });


		$(".Course-List li").click(function(e){

        });

        $(".Year-Button").click(function(e){
            $("#Term-Button").css('pointer-events','none');
            $("#Term-Button").css('cursor','default');
            
            $("#Term-Button").css('pointer-events','none');
            $("#Term-Button").css('cursor','default');
        });

        $(".Term-Button").click(function(e){
            $("#Course-Button").css('pointer-events','none');
            $("#Course-Button").css('Cursor','default');
        });

         $("#explore").on("click", function() {
        var object = $(this);
        $("html ,body").animate({
            scrollTop: $("#" + object.data("scroll") + "-section").offset().top - 55}, 700);
    });

	$('#mi-slider').catslider();

});