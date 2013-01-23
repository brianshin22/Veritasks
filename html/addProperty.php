<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // try to add task
        $results = query("INSERT INTO properties (property_type, title, Description, 
                        Address, latitude, longitude, ownerid) VALUES (?,?,?,?,?,?,?)",
                         $_POST["propertytype"], $_POST["title"],$_POST["property_description"], 
                         $_POST["address"], $_POST["latitude1"], $_POST["longitude1"], $_SESSION["id"]);
        if ($results === false)
        {
            apologize("Unable to add your property. Please try again.");
        }
        
        $results = query("SELECT LAST_INSERT_ID() AS id");
        $property = $results[0]["id"];
        
        if ($property === false)
        {
            apologize("Error updating property.");
        }
        
        $_SESSION['property'] = $property;
        
#        $results2 = query("INSERT INTO listings (begindate, enddate, price, 
#                        p_id) VALUES (?,?,?,?)",
#                         $_POST["begindate"], $_POST["enddate"], $_POST["price"], $_SESSION["property"]);
#        if ($results2 === false)
#        {
#            apologize("Unable to add your property. Please try again.");
#        }
        
        redirect("about.php");
    }
    else
    {
        // else render form
        render("addProperty_form.php", array("title" => "Add a property"));
    }

?>
