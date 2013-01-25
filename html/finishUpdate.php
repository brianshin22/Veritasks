<?php
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
        $rows = query("UPDATE properties SET title=?, Description=?, property_type=? WHERE propertyid=?", 
                $_POST["title"], $_POST["property_description"], $_POST["propertytype"], $_POST["propertyid"]);
        if ($rows === false)
        {
            apologize("Unable to get your listing's information. Please try again.");
        }
    }
    
    redirect("index.php");
?>
