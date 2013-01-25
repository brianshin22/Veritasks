<?php

    // configuration
    require("../includes/config.php"); 
 
     //gets all available properties
        $rows = query("SELECT * FROM properties WHERE active=1");

        // renders tasks
        render("properties.php", array("rows" => $rows, "title" => "Available Properties"));

?>
