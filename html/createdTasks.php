<?php
    
    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT tasks.*, task_types.type 
                   FROM tasks LEFT JOIN task_types ON tasks.taskType = task_types.id
                   WHERE createdby = ? AND paid = 1", $_SESSION["id"]);
    
    // render histories
    render("createdTasks_page.php", array("rows" => $rows));
?>
