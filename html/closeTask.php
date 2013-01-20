<?php 
    //page to close a task
    
    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $task = query("UPDATE tasks SET finished = 1-? WHERE id = ?", $_POST["finished"], $_POST["hidden5"]);
        
        redirect("./createdTasks.php");
    }
    
    else
    {
        redirect("./createdTasks.php");
    }

?>
