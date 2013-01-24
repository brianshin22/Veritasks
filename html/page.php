<?php
    // config
    require("../includes/config.php");
    
    $propertyid = htmlspecialchars($_GET["id"]);

    If($propertyid === false)
    {
        apologize("Could not get property id");
    }

    $query = query("SELECT * FROM properties WHERE propertyid = ?", $propertyid);

    if($query === false)
    {
        apologize("Could not retrieve property information.");
    }

    if(count($query) == 1)
    {
        $query = $query[0];
    }



    render("page_form.php", array("title" => "Property listing", "prop" => $query));


?>
