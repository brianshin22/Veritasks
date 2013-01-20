<!-- Contains information about all tasks user has completed-->

<h3> <?echo $name?>'s Completed Tasks</h3>

<table id="historytable" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Task Name</th>      
            <th>Date Completed</th>
            <th>Time Spent (min)</th>
            <th>Money Earned</th>    
         </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>
            <td><?= $row["name"] ?></td>      
            <td><?= $row["time_end"] ?></td> 
            <td><?= $row["minutesTaken"] ?></td> 
            <td>$<?= $row["money"] ?></td>  
        </tr>
    <? endforeach ?>
    </tbody>
</table>

