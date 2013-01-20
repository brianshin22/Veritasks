<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * 
                   FROM completion 
                   JOIN tasks ON completion.task_id=tasks.id
                   WHERE completer = ? AND submitted = 1", $_SESSION["id"]);
    if($rows === false)
    {
        apologize("Could not retrieve task completion history.");
    }               

    
    // render histories
    render("taskCompletionHistory_page.php", array("rows" => $rows, "name" => $_SESSION["name"]));
?>
