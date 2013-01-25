<?php
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
    $rows = query("SELECT * FROM properties WHERE propertyid = ? ", $_POST["hidden2"]);
    if ($rows === false)
    {
        apologize("Unable to get your listing's information. Please try again.");
    }
    
    // render histories
    render("updateSListing_form.php", array("Title" => "Update this listing", "row" => $rows[0]));
    }
    
    else
    {
        redirect("index.php");
    }
?>
