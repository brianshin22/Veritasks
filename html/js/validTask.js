/*
    Confirms that user has entered a valid task 
*/

$(document).ready(function(){
  
  //checks to make sure that required inputs are filled
  
  $("#task_type").change(function(){
        
        var selopt = $(this).val();
        if (selopt == 1) {
            $(".survey").css("display","block");
            $(".videosummary").css("display","none");
            $(".audiotranscript").css("display","none");
        }

        if (selopt == 2) {
            $(".survey").css("display","none");
            $(".videosummary").css("display","block");
            $(".audiotranscript").css("display","none");
        }
        
        if (selopt == 3) {
            $(".survey").css("display","none");
            $(".videosummary").css("display","none");
            $(".audiotranscript").css("display","block");
        }
  });
  
});
