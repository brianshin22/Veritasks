/***********************************************************************
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 **********************************************************************/
$(document).ready(function(){
    $("input").tooltip({
          'selector': '',
          'placement': 'right'
    });

    $("textarea").tooltip({
          'selector': '',
          'placement': 'right'
    });
    
    $("select").tooltip({
          'selector': '',
          'placement': 'right'
    });
    
    $('.nav li a').on('click', function() {
        $(this).parent().parent().find('.active').removeClass('active');
        $(this).parent().addClass('active');
    });
    
    $('.btn').addClass("btn-custom2");
    
});

