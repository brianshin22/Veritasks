<?php

    // configuration
    require("../includes/config.php"); 
    
     //gets all available properties
        $rows = query("SELECT * FROM properties");
              
        // renders tasks
        render("properties.php", array("rows" => $rows, "title" => "Available Properties"));

?>
