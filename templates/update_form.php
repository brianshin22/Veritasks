<!-- Form to update tasks -->

<script src="js/validTask.js"></script>
<script>
$(document).ready(function(){

var cval = <?PHP print $task[0]['taskType']; ?>;

$("#update_task_type").val(cval).attr("selected", true);

var oval = <?PHP print $task[0]['finished']; ?>;
if(oval == 1)
{
    $("#closeTask").css("display","none");
}
else
{
    $("#openTask").css("display","none");
}
});
</script>

<h3>Update Task</h3>
<form id="updateTask" action="update.php" method="post">
    <fieldset>
        <div class="control-group">
            <select id = "update_task_type" name = "tasktype" title="Required: Please select the type of task">
                <option value="0">Select Task Type</option>
                <option value="1">Survey</option>
                <option value="2">Video Summary</option>
                <option value="3">Audio Transcription</option>
            </select>
        </div>
        
        <div class="control-group">
            <label>Name of Task:</label>
            <input autofocus name="taskname" placeholder="Name of Task" id="taskname" 
                   value= "<?= $task[0]['name'] ?>" type="text" title="Required: Input an informative name for the task."/>
        </div>
        
        <div class="control-group">
            <label>Brief description of your task:</label>
            <textarea name="sdescrip" rel="tooltip" id="sdescrip" rows="3" placeholder="Short Description" 
                value= "<?= $task[0]['sdescrip'] ?>" title="Required: Input a short (one sentence) description of the task."><?= $task[0]['sdescrip'] ?></textarea>
        </div>
        
        <div class="control-group">
            <label>Detailed explanation of your task:</label>
             <textarea name="ldescrip" rel="tooltip" id="ldescrip" rows="5" placeholder="Long Description"
                value= "<?= $task[0]['ldescrip'] ?>" title="If you would like, enter a longer description for the task"><?= $task[0]['ldescrip'] ?></textarea>
        </div>
        
        <div class="control-group">
            <label>Approximate Time to Complete (in minutes):</label>
            <input name="time" placeholder="Approx Time to Complete (in minutes)" rel="tooltip" id="time" type="text"
                   value= "<?= $task[0]['time'] ?>" title="Input the approximate time it will take a user to complete the task in minutes."/>
        </div>
        
        <div class="control-group">
            <label>Payment:</label>
            <input name="money" placeholder="Payment per Completion" rel="tooltip" id="money" type="text"
                   value= "<?= $task[0]['money'] ?>" title="Input the amount of money (in dollars) a user will get upon completion of task."/>
        </div>
        
        <div class="control-group">
            <label>Survey Cap:</label>
            <input name="maxUsers" placeholder="Max Number of Completions" rel="tooltip" id="maxUsers" type="text"
                   value= "<?= $task[0]['maxUsers'] ?>" title="Input the maximum number of users you want to complete the task."/>
        </div>
        
        <div class="survey">
            <div class="control-group">
                <label>Embed link for your survey</label>
                <textarea name="surveyembed" rel="tooltip" id="surveyembed" rows="1" placeholder="Embed survey code here"
                    value= "<?= $task[0]['surveyembed'] ?>" title="Please embed your Google Form or Qualtrics Survey"><?= $task[0]['surveyembed'] ?></textarea>
            </div>
            
             <div class="control-group">
                    <label>Confirmation code:</label>
                    <textarea name="confirmationcode" rel="tooltip" id="confirmationcode" rows="1" placeholder="Enter Confirmation Code Here"
                        value= "<?= $task[0]['confirmationcode'] ?>" title="Please enter the confirmation code that you created for your survey"><?= $task[0]['confirmationcode'] ?></textarea>
            </div>
        </div>
        
        <div class="videosummary">
            <div class="control-group">
                    <label>Video embed link:</label>
                    <textarea name="videoembed" rel="tooltip" id="videoembed" rows="1" placeholder="Write video embed code here"
                        value= "<?= $task[0]['videoembed'] ?>" title="Please embed your Video"><?= $task[0]['videoembed'] ?></textarea>
            </div>
            
            <div class="control-group">
                    <label>Question or task:</label>
                    <textarea name="vquestion" rel="tooltip" id="vquestion" rows="1" placeholder="Write task question here"
                        value= "<?= $task[0]['vquestion'] ?>" title="Please enter what question you would like the participant to answer"><?= $task[0]['vquestion'] ?>
                    </textarea>
            </div>
        
            
        </div>
        
        <div class="audiotranscript">
            <div class="control-group">
                    <label>Audio embed link:</label>
                    <textarea name="audioembed" rel="tooltip" id="audioembed" rows="1" placeholder="Write audio embed code here"
                        value= "<?= $task[0]['audioembed'] ?>" title="Please embed your Audio code"><?= $task[0]['audioembed'] ?></textarea>
            </div>
        </div>
        
        <input type="hidden" name="hidden4" value="<?= $task[0]['id'] ?>">
       
        <div class="control-group">
            <button type="submit" class="btn btn-primary">Submit Changes</button>
        </div>
    </fieldset>
</form>

<form id = "closeTask" action="closeTask.php" method="post">
    <input type="hidden" name="hidden5" value="<?= $task[0]['id'] ?>">
    <input type="hidden" name="finished" value="<?= $task[0]['finished'] ?>">
    <button class="btn btn-primary" type="submit" value="Close Task">Close Task</button>
</form>

<form id = "openTask" action="closeTask.php" method="post">
    <input type="hidden" name="hidden5" value="<?= $task[0]['id'] ?>">
    <input type="hidden" name="finished" value="<?= $task[0]['finished'] ?>">
    <button class="btn btn-primary" type="submit" value="Re-open Task">Re-open Task</button>
</form>
