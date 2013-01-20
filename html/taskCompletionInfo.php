<?php
// Page to display task completion info for task creator

    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_POST["hidden2"];        
        if ($id===false)
        {
            apologize("Could not get Task ID");
        }
 
        
        $task = query("SELECT completion.*, users.name FROM completion 
                       LEFT JOIN users ON completion.completer = users.id
                       WHERE task_id = ?", $id);
        if ($task === false)
        {
            apologize("Could not get task information");
        }
        
        $rows = query("SELECT name, taskType FROM tasks WHERE id = ?", $id);
        if ($rows === false)
        {
            apologize("Could not get task information");
        }
        /*
        if(mysql_num_rows($task) == 0)
        {
            apologize("No users have completed this task yet.");
        }
        
        */
        
        if($rows[0]["taskType"] == 2)
        {
            render("videoCompletionInfo_page.php", array("task" => $task, "rows" => $rows));
        }
        else 
        {
            render("taskCompletionInfo_page.php", array("task" => $task, "rows" => $rows));
        }
    }
    
    else
    {
        redirect("./createdTasks.php");
    }

?>


