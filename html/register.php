<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["email"]))
        {
            apologize("You must enter an email.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must choose a password.");
        }
        else if (empty($_POST["username"]))
        {
            apologize("You must enter your name.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
        {
            apologize("Those passwords did not match.");
        }
        
        // try to register user
        $results = query("INSERT INTO users (email, hash, paypalemail, name) VALUES(?, ?, ?, ?)",
        $_POST["email"], crypt($_POST["password"]), $_POST["paypalemail"], $_POST["username"]);
        if ($results === false)
        {
            apologize("That username appears to be taken.");
        }

        // get new user's ID
        $results = query("SELECT LAST_INSERT_ID() AS id");
        $id = $results[0]["id"];

        // log user in
        $_SESSION["id"] = $id;

        // redirect to portfolio
        redirect("./index.php");
    }
    else
    {
        // else render form
        render("register_form.php", array("title" => "Register"));
    }

?>
