<!-- Main page that user accesses. Contains information about all tasks available-->

<script type="text/javascript" src="js/rowClick.js">    
</script>


<div>
    <h3>List of Properties</h3>
</div>


<div class="row">
<div class="span10 offset2">
    

<table id="tasktable" class="table table-hover ">
    <thead>
    </thead>
    <tbody>

    
    <?php foreach ($rows as $row): ?>
        <tr>  
            <td>
                <p><?=$row["title"]?></p>
                <a href="/page.php?id=<?=$row['propertyid']?>" >
                </a>
            </td>
            
            
        </tr>
    <? endforeach ?> 
    </tbody>
</table>

</div>
</div>




