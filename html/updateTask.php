<?php
    //sends all the information about the relevant task
    
    // configuration
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $task = query("SELECT * FROM tasks WHERE id = ?", $_POST["hidden3"]);
        if($task=== FALSE)
        {
            apologize("Unable to get information about task.");
        }
        
        render("update_form.php", array("title" => "Create Task", "task" => $task));
    }
    
    else
    {
        redirect("./createdTasks.php");
    }
?>
