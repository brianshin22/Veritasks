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
    $('#createdtasks').dataTable( {
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page" }
    });
    
    $('#historytable').dataTable( {
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page" }
    });
    
    $('.nav li a').on('click', function() {
    $(this).parent().parent().find('.active').removeClass('active');
    $(this).parent().addClass('active');
});

});

