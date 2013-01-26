<?php
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(strlen($_POST["title"] > 70))
        {
            apologize("Your title must be 70 characters or less.");
        }
        else
        {
            $rows = query("UPDATE properties SET title=?, Description=?, property_type=?, Address=?, 
                    latitude=?, longitude=? WHERE propertyid=?", 
                    $_POST["title"], $_POST["property_description"], $_POST["propertytype"],
                    $_POST["address"], $_POST["latitude1"], $_POST["longitude1"], $_POST["propertyid"]);
            if ($rows === false)
            {
                apologize("Unable to get your listing's information. Please try again.");
            }
        }
    }
    
    redirect("index.php");
?>
