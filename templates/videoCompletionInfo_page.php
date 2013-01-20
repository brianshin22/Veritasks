<!-- Contains information about users that completed specific task-->

<script src = "js/makeIntoTable2.js"></script>

<table id="createdvideotasks" class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Name</th>      
            <th>Date Completed</th>
            <th>Time taken (min)</th>
            <th>Question Response</th>
         </tr>
    </thead>
    <tbody>
    <?php foreach ($task as $row): ?>
        <tr>
            <td><?= $row["name"] ?></td>      
            <td><?= $row["time_end"] ?></td>
            <td><?= $row["minutesTaken"] ?></td>
            <td><?= $row["question"]?></td> 
        </tr>
        
        
    <? endforeach ?>
    </tbody>
</table>

