$(document).ready(function () {
    $(".thirdmain").children().hide();
    $(".thirdmain ul:nth-child(1)").show();
    //$("#smart-container").hide();
    //
    //$("#smart").click(function(){
    //    $("#iphone-container").hide();
    //    $("#smart-container").show();
    //});
    //
    //$("#iphone").click(function(){
    //    $("#smart-container").hide();
    //    $("#iphone-container").show();    
    //});
    
    var main = new Array();
    $(".submain li").click(function(){
       
            $(".thirdmain").children().hide();
            $("#"+$(this).attr("id")+"-container").show();
  
    });
    
    
    
    var classes = new Array();
    $("#filter-buttons a").click(function(){
         if (classes.length == 0) {
            $("#filter-buttons a").each(function(){
                idd = $(this).data("filter");
                if (idd != "*") {
                    classes.push(idd)       
                }
                
            }); 
        }
        
        var cl = $(this).data("filter");
        if (cl == "*") {
            for (a = 0 ; a<= 5 ; a++){
                $(classes[a]).show("slow");
            }
        }
        else{
            for (a = 0 ; a<= 5 ; a++) {
                if (classes[a] != cl) {
                    $(classes[a]).hide("slow");
                }
            }
            $(cl).show("slow");
        }
    });
});