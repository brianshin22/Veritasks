<!-- Main page that user accesses. Contains information about all tasks available-->

<script src="js/makeIntoTable.js"> </script>

<div class="row">
<div class="span10 offset2">
<h3>Available Properties</h3>

<table id="tasktable" class="table table-hover ">
    <thead>
        <tr>
            <th>Title</th>      
            <th>Description</th>
            <th>Address</th>
            <th>Contact owner</th>    
         </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>  
            <td><?= $row["title"] ?></td>  
            <td><?= $row["Description"] ?></td>   
            <td><?= $row["Address"] ?></td> 
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="hid1" value="<?= $row['propertyid'] ?>">
                    <button class="btn" type="submit" value="Go to Task">Go to Task</button>
                </form>
            </td>   
        </tr>
    <? endforeach ?>
    </tbody>
</table>

<script src="galleria/galleria-1.2.9.min.js"></script>
<style>
    #galleria{ width: 800; height: 400px; background: #000 }
</style>

<div id="galleria">
<?php 

$dirname = "uploads/"; 
$images = scandir($dirname); 
$ignore = Array(".", "..", "otherfiletoignore");
foreach($images as $curimg){
if(!in_array($curimg, $ignore)) {
echo "<img src='uploads/$curimg' />\n";
}; 
}  
     
?> 
</div>
<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');
</script>

</div>
</div>
