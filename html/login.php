<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            apologize("You must provide your email.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        // query database for user
        $rows = query("SELECT users2.*, properties.propertyid FROM users2 LEFT JOIN  properties ON users2.id = properties.ownerid WHERE email = ?", $_POST["email"]);

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

        // compare hash of user's input against hash that's in database


            if (crypt($_POST['password'], $row["password"] == $row["password"]))
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                
                
                if($row["propertyid"] != NULL)
                {
                    $_SESSION["propertyid"] = 1;
                }


                // redirect to portfolio
                redirect("./index.php");
            }

                    }

        // else apologize
        apologize("Invalid email and/or password.");
    }
    else
    {
        // else render form
        render("login_form.php", array("title" => "Log In"));
    }

?>
