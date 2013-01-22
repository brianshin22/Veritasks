<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION["taskid"] = $_POST["hid1"];
           
        redirect("surveydescription.php");
    }
    
    
    else 
    {
        render("home.php",["title" => "Harvard Sublets"]);
    }
    
?>
