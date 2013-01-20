<!-- Contains information about all tasks user has created-->
<table id="createdtasks" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Type</th>     
            <th>Date Created</th>
            <th>Number of Completions</th>
            <th>Currently Open?</th>
            <th></th>
            <th></th>
         </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row["name"] ?></td>    
            <td><?= $row["type"]?>  
            <td><?= $row["dateCreated"] ?></td>
            <td><?= $row["numCompletions"] ?> out of <?= $row["maxUsers"] ?></td> 
            <td><?php if($row['finished'] == 1){ echo "No";} else{echo "Yes";} ?></td>
            <td>
                <form action="taskCompletionInfo.php" method="post">
                    <input type="hidden" name="hidden2" value="<?= $row['id'] ?>">
                    <button class="btn btn-primary" type="submit" value="Get more info">Get more info</button>
                </form>
            </td>
            <td>
                <form action="updateTask.php" method="post">
                    <input type="hidden" name="hidden3" value="<?= $row['id'] ?>">
                    <button class="btn btn-primary" type="submit" value="Update Task">Update Task</button>
                </form>
            </td>      
        </tr>
    <? endforeach ?>
    </tbody>
</table>

