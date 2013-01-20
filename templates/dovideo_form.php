<!-- Form to render a video task -->
<div>
    <? echo $embed?>
</div>
    
<br> 
    
<div>
    <form action="dosurvey.php" method = "post">
        <div class="control-group">
                 <? echo $question?> <br> 
                 <textarea name="vquestion" rel="tooltip" id="vquestion" placeholder="Enter response here" 
                 ></textarea>
        </div>
        
        <div class = "control-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>  
    </form>
</div>
