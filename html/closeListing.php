<?php
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $rows = query("UPDATE properties SET active=? WHERE propertyid=?", 
                $_POST["hidden5"], $_POST["hidden6"]);
        if ($rows === false)
        {
            apologize("Unable to get your listing's information. Please try again.");
        }
    }
    
    redirect("index.php");
?>
