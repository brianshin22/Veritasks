<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if ($_POST["tasktype"] == 0)
        {
            apologize("You must enter a type for the task.");
        }
        else if (empty($_POST["taskname"]))
        {
            apologize("You must enter a name for the task.");
        }
        else if (empty($_POST["sdescrip"]))
        {
            apologize("You must give a short description of the task.");
        }
        
        else if (empty($_POST["time"]) || !preg_match("/^\d+$/", $_POST["time"]))
        {
            apologize("You must enter a positive integer estimate for the number of minutes needed to complete the task.");
        }
         
        else if (empty($_POST["money"]) || !preg_match("/^(?!(?:0|0\.0|0\.00)$)[+]?\d+(\.\d|\.\d[0-9])?$/", $_POST["money"]))
        {
            apologize("You must enter a positive decimal number for the payment.");
        }
        
        else if (empty($_POST["maxUsers"]) || !preg_match("/^\d+$/", $_POST["maxUsers"]))
        {
            apologize("You must enter a positive number for the maximum completions.");
        }
        
        else if ($_POST["tasktype"] == 1)
        {
            if(empty($_POST["surveyembed"]))
            {
                apologize("You must provide an embed link to your survey!");
            }
            
            if(empty($_POST["confirmationcode"]))
            {
                apologize("You must provide a confirmation code for your survey!");
            }
        }
        else if ($_POST["tasktype"] == 2)
        {
            if(empty($_POST["videoembed"]))
            {
                apologize("You must provide an embed link to your video!");
            }
            else if(empty($_POST["vquestion"]))
            {
                apologize("You must provide a question to ask your participant!");
            }
            
        }
        else if ($_POST["tasktype"] == 3)
        {
            if(empty($_POST["audioembed"]))
            {
                apologize("You must provide an embed link to your audio file!");
            }
        }
        
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
        render("createTask_Form.php", array("title" => "Create Task"));
    }

?>
