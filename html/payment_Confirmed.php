<?php

    // configuration
    require("../includes/config.php"); 
    
    $results = query("UPDATE tasks SET paid = 1 WHERE id = ?", $_SESSION['lastCreatedTask']);
    if ($results === false)
    {
        apologize("Unable to create a new task. Please try again.");
    }

    render("./payment_Confirmed_page.php", array("Title" => "Payment Confirmed"));
    

?>
