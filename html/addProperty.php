<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST["propertytype"] == 0)
        {
            apologize("You must enter a type for the listing.");
        }
        elseif (empty($_POST["imageurls"]))
        {
            apologize("You must upload at least one photo!");
        }

        else
        {
            $photourls = $_POST["imageurls"];
            $urls = explode(" ", $photourls);
            $newurls = "";
            foreach($urls as $url)
            {
                $ch = curl_init($url);
                $filename = 'uploads/' . uniqid('hello', true) . '.jpg';
                $fp = fopen($filename, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                $newurls = $newurls . $filename . " ";
                chmod ($filename, 0644);
            } 
            $newurls = trim($newurls);
     
            // try to add task
            $results = query("INSERT INTO properties (title, Description, 
                            Address, latitude, longitude, ownerid, photourls, active) VALUES (?,?,?,?,?,?,?, 1)",
                             $_POST["title"],$_POST["property_description"], 
                             $_POST["address"], $_POST["latitude1"], $_POST["longitude1"], $_SESSION["id"], $newurls);
            if ($results === false)
            {
                apologize("Unable to add your property. Please try again.");
            }
            
            $results = query("SELECT LAST_INSERT_ID() AS propertyid");
            $property = $results[0]["propertyid"];
            
            if ($property === false)
            {
                apologize("Error updating property.");
            }
            
            $_SESSION['propertyid'] = $property;
             
            redirect("index.php");
        }
        
        
    }
    else
    {
        // else render form
        render("addProperty_form.php", array("title" => "Add a listing"));
    }

?>
