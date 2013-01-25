$(document).ready(function() {  
    $('#tasktable tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href)
        {
            window.location = href;
        }
    });

    jQuery.fn.extend({ 
        disableSelection : function() { 
                return this.each(function() { 
                        this.onselectstart = function() { return false; }; 
                        this.unselectable = "on"; 
                        jQuery(this).css('user-select', 'none'); 
                        jQuery(this).css('-o-user-select', 'none'); 
                        jQuery(this).css('-moz-user-select', 'none'); 
                        jQuery(this).css('-khtml-user-select', 'none'); 
                        jQuery(this).css('-webkit-user-select', 'none'); 
                }); 
        } 
    }); 

    $('.table-hover').disableSelection();
});

