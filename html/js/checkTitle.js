/*
    Confirms that user has entered appropriate information for the registration form

*/

$(document).ready(function(){
  
  //checks email against regex for Harvard emails
  $("#title").keyup(function(){
    var charsleft = 70 - $("#title").val().length;
    $("#charsleft").html(charsleft);

  });

});
