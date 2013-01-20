<?php

    require("../includes/config.php");
     
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        $begin = query("INSERT INTO completion (task_id, completer, time_begin, submitted) VALUES( ?,?, now(), 0)
        ON DUPLICATE KEY UPDATE time_begin=now()",
         $_SESSION["taskid"], $_SESSION["id"]);
         if($begin=== false)
         {
            apologize("Could not insert new row into completion");
         }
        
        $tasktype = query("SELECT taskType FROM tasks WHERE id = ?", $_SESSION["taskid"]);
        if($tasktype === false)
        {
            apologize("Could not retrieve task type");
        }
        
        $_SESSION["tasktype"] = $tasktype[0]["taskType"];
            
        redirect("dosurvey.php");
    }
    
    else 
    {
        $task = query("SELECT * FROM tasks WHERE id = ?", $_SESSION["taskid"]);
        
        if ($task === false)
        {
            apologize("Sorry! There was an error with the task you are looking for!");
        }
        render("surveydescription_form.php", array("task" => $task));
    }
      

?>
