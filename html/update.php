<?php
    
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if ($_POST["tasktype"] == 0)
        {
            apologize("You must enter a type for the task.");
        }
        if ($_POST["taskname"] == "")
        {
            apologize("You must enter a name for the task.");
        }
        else if ($_POST["sdescrip"] == "")
        {
            apologize("You must give a short description of the task.");
        }
        
        else if ($_POST["time"] == "" || !preg_match("/^\d+$/", $_POST["time"]))
        {
            apologize("You must enter a positive integer estimate for the number of minutes needed to complete the task.");
        }
         
        else if ($_POST["money"] == "" || !preg_match("/^(?!(?:0|0\.0|0\.00)$)[+]?\d+(\.\d|\.\d[0-9])?$/", $_POST["money"]))
        {
            apologize("You must enter a positive decimal number for the payment.");
        }
        
        else if ($_POST["maxUsers"] == "" || !preg_match("/^\d+$/", $_POST["maxUsers"]))
        {
            apologize("You must enter a positive number for the maximum completions.");
        }
        
        else if ($_POST["tasktype"] == 1)
        {
            if($_POST["surveyembed"] == "")
            {
                apologize("You must provide an embed link to your survey!");
            }
            
            if($_POST["confirmationcode"] == "")
            {
                apologize("You must provide a confirmation code for your survey!");
            }
        }
        else if ($_POST["tasktype"] == 2)
        {
            if($_POST["videoembed"] == "")
            {
                apologize("You must provide an embed link to your video!");
            }
            else if($_POST["vquestion"] == "")
            {
                apologize("You must provide a question to ask your participant!");
            }
            
        }
        else if ($_POST["tasktype"] == 3)
        {
            if($_POST["audioembed"] == "")
            {
                apologize("You must provide an embed link to your audio file!");
            }
        }
        
        // try to add task
        $results = query("UPDATE tasks SET sdescrip=?, ldescrip=?, surveyembed=?, time=?, name=?, 
                         createdby=?, videoembed=?, audioembed=?, confirmationcode=?, money=?, maxUsers=?, dateCreated=now(), taskType=? 
                         WHERE id = ?",
                         $_POST["sdescrip"], $_POST["ldescrip"],  $_POST["surveyembed"], $_POST["time"],  
                         $_POST["taskname"], $_SESSION["id"], $_POST["videoembed"], $_POST["audioembed"], $_POST["confirmationcode"],
                         $_POST["money"], $_POST["maxUsers"], $_POST["tasktype"], $_POST["hidden4"]);
        if ($results === false)
        {
            apologize("Unable to update task. Please try again.");
        }
        
        redirect("./createdTasks.php");
        
    }
    
    else
    {
        redirect("./createdTasks.php");
    }
