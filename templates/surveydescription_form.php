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
    <form action= "surveydescription.php" method="post">
        <button class="btn btn-primary" type="submit" value="Begin task">Begin task</button>
        
    </form>
</div>
 
