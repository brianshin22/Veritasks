<?php

    // configuration
    require("../includes/config.php"); 
    
     //gets all the non-completed tasks
        $rows = query("SELECT tasks.*, completion.task_id, task_types.type FROM tasks LEFT JOIN completion ON tasks.id = completion.task_id AND
               completer = {$_SESSION['id']} LEFT JOIN task_types ON task_types.id = tasks.taskType WHERE numCompletions<maxUsers AND 
               (completion.task_id IS NULL OR submitted = 0) AND paid = 1 AND createdby != {$_SESSION['id']}
               AND FINISHED = 0");
               
        $name = query("SELECT name FROM users2 WHERE id =?", $_SESSION["id"]);
    
        if($name === false)
        {
            apologize("Could not retrieve name");
        }
        
        $name = $name[0];
        $_SESSION["name"] = $name["name"];
    
    
        // renders tasks
        render("properties.php", array("rows" => $rows, "name" => $_SESSION["name"], "title" => "Available Properties"));

?>
