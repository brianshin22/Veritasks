<?php
    
    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * FROM properties WHERE ownerid = ? ", $_SESSION["id"]);
    
    // render histories
    render("updateListing_form.php", array("Title" => "Update Listings", "rows" => $rows));
?>
