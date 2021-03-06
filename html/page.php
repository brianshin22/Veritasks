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

    $nameSearch = query("SELECT email FROM users2 LEFT JOIN properties ON id = properties.ownerid WHERE properties.propertyid = ?", $propertyid);

    if($nameSearch === false)
    {
        apologize("Could not retrieve property owner contact information");
    }
    
    $nameSearch = $nameSearch[0];

    $ownerEmail = $nameSearch["email"];
    

    render("page_form.php", array("title" => "Property listing", "prop" => $query, "contact" => $ownerEmail));


?>
