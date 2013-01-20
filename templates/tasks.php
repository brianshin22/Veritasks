<!-- Main page that user accesses. Contains information about all tasks available-->

<script src="js/makeIntoTable.js"> </script>

<h3><?echo $name?>'s Available Tasks</h3>

<table id="tasktable" class="table table-striped table-hover table-bordered ">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Type</th>      
            <th>Short Description</th>   
            <th>Approx Time (min)</th>
            <th>Long Description</th>
            <th>Number of Completions</th>
            <th>Maximum Number of Completions</th>
            <th>Payment</th>
            <th></th>    
         </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row["name"] ?></td>    
            <td><?= $row["type"] ?></td>  
            <td><?= $row["sdescrip"] ?></td>   
            <td><?= $row["time"] ?></td>
            <td><?= $row["ldescrip"] ?></td>
            <td><?= $row["numCompletions"] ?></td>
            <td><?= $row["maxUsers"] ?></td>
            <td>$<?= $row["money"] ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="hid1" value="<?= $row['id'] ?>">
                    <button class="btn btn-primary" type="submit" value="Go to Task">Go to Task</button>
                </form>
            </td>   
        </tr>
    <? endforeach ?>
    </tbody>
</table>

