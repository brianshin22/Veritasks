<!-- Contains information about users that completed specific task-->


<h3>Info About Task: "<?= $rows[0]["name"] ?>"</h3>
<table id="createdsurveytasks" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Name</th>      
            <th>Date Completed</th>
            <th>Time taken (min)</th>
            
         </tr>
    </thead>
    <tbody>
    <?php foreach ($task as $row): ?>
        <tr>
            <td><?= $row["name"] ?></td>      
            <td><?= $row["time_end"] ?></td>
            <td><?= $row["minutesTaken"] ?></td> 
        </tr>
    <? endforeach ?>
    </tbody>
</table>

