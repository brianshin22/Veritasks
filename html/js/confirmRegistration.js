/*
    Confirms that user has entered appropriate information for the registration form

*/

$(document).ready(function(){
  var ck_email = /^([\w-]+(?:\.[\w-]+)*)@(?:[A-Z0-9-]+\.)harvard\.edu$/i;
  var ck_password = /^[a-zA-Z0-9]{6,30}$/;
  
  //checks email against regex for Harvard emails
  $("#email").keyup(function(){
    var email = $(this).val();
    if (!ck_email.test(email))
    {
        $(this).css({"background-color" : "#FF9966"});
    }
    else
    {
        $(this).css({"background-color" : "#99FF66"});
    }
  });

  //makes sure password of appropriate length and form
  $("#password").keyup(function(){
    var pass = $(this).val();
    if (!ck_password.test(pass))
    {
        $(this).css({"background-color" : "#FF9966"});
    }
    else
    {
        $(this).css({"background-color" : "#99FF66"});
    }
  });
  
  //makes sure passwords agree
  $("#confirmation").keyup(function(){
    var confirmation = $(this).val();
    var password = $("#password").val();
    if (confirmation != password)
    {
        $(this).css({"background-color" : "#FF9966"});
    }
    else
    {
        $(this).css({"background-color" : "#99FF66"});
    }
  });
  
  //makes sure passwords agree
  $("#username").keyup(function(){
    if ($(this).val() != "")
    {
        $(this).css({"background-color" : "#99FF66"});
    }
    else
    {
        $(this).css({"background-color" : "#FF9966"});
    }
  });
  
});
