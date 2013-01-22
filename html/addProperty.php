<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        
        // try to add task
        $results = query("INSERT INTO tasks (sdescrip, ldescrip, surveyembed, time, name, 
                         createdby, videoembed, question, audioembed, confirmationcode, money, maxUsers, dateCreated, taskType) 
                         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), ?)",
                         $_POST["sdescrip"], $_POST["ldescrip"],  $_POST["surveyembed"], $_POST["time"],  
                         $_POST["taskname"], $_SESSION["id"], $_POST["videoembed"], $_POST["vquestion"], $_POST["audioembed"], $_POST["confirmationcode"],
                         $_POST["money"], $_POST["maxUsers"], $_POST["tasktype"]);
        if ($results === false)
        {
            apologize("Unable to create a new task. Please try again.");
        }
        $results = query("SELECT LAST_INSERT_ID() AS id");
        $lastCreatedTask = $results[0]["id"];
        
        if ($lastCreatedTask === false)
        {
            apologize("Error updating most recent task.");
        }
        
        $_SESSION['lastCreatedTask'] = $lastCreatedTask;
        
        $price = $_POST["money"]*$_POST["maxUsers"];
        // redirect to tasks list
        render("test_Payment_page.php", array("price" => $price));
        
        //redirect("/index.php");
    }
    else
    {
        // else render form
        render("addProperty_form.php", array("title" => "Add a property"));
    }

?>
