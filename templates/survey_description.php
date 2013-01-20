<h4>Title: <? echo $task[0]["name"]?></h4>

<div>
<strong> Description: </strong> 
<p><? echo $task[0]["ldescrip"]?></p>
</div>
    
<div>
<strong>Estimated time: </strong>
<p> <? echo $task[0]["time"]?></p>
</div>

<div>  
<strong>Payment: </strong> 
<p> $<? echo $task[0]["money"]?></p>
</div>

<div>
    <form action= "dosurvey.php" method="post">
        <input type="hidden" name="hid2" value="<?= $task[0]['id'] ?>">
        <button class="btn btn-primary" type="submit" value="Begin task">Begin task</button>
        
    </form>
</div>
 
