<!-- Form to create a tasks -->

<script src="js/validTask.js"></script>

<h3>Create a Task</h3>
<form id="createTask" action="createTask.php" method="post">
    <fieldset>
        <div class="control-group">
            <label>Task type:</label>
            <select id = "task_type" name = "tasktype" title="Required: Please select the type of task">
                <option value="0">Select Task Type</option>
                <option value="1">Survey</option>
                <option value="2">Video Summary</option>
            </select>
        </div>
        
        <div class="control-group">
            <label>Name of Task:</label>
            <input autofocus name="taskname" placeholder="Name of Task" id="taskname" 
                   type="text" title="Required: Input an informative name for the task."/>
        </div>
        
        <div class="control-group">
            <label>Brief description of your task:</label>
            <textarea name="sdescrip" rel="tooltip" id="sdescrip" rows="3" placeholder="Short Description" 
                title="Required: Input a short (one sentence) description of the task."></textarea>
        </div>
        
        <div class="control-group">
            <label>Detailed explanation of your task:</label>
             <textarea name="ldescrip" rel="tooltip" id="ldescrip" rows="5" placeholder="Longer Description" 
                title="If you would like, enter a longer description for the task"></textarea>
        </div>
        
        <div class="control-group">
            <label>Approximate Time to Complete (in minutes):</label>
            <input name="time" placeholder="Time (minutes)" rel="tooltip" id="time" type="text"
                   title="Input the approximate time it will take a user to complete the task in minutes."/>
        </div>
        
        <div class="control-group">
            <label>Payment:</label>
            <input name="money" placeholder="Payment per Completion" rel="tooltip" id="money" type="text"
                   title="Input the amount of money (in dollars) a user will get upon completion of task."/>
        </div>
        
        <div class="control-group">
            <label>Survey Cap:</label>
            <input name="maxUsers" placeholder="Max Number of Completions" rel="tooltip" id="maxUsers" type="text"
                   title="Input the maximum number of users you want to complete the task."/>
        </div>
        
        <div class="survey">
            <div class="control-group">
                <label>Embed link for your survey</label>
                <textarea name="surveyembed" rel="tooltip" id="surveyembed" rows="1" placeholder="Embed survey code here"
                    title="Please embed your Google Form or Qualtrics Survey"></textarea>
            </div>
            
             <div class="control-group">
                 <label>Confirmation code:</label>
                    <textarea name="confirmationcode" rel="tooltip" id="confirmationcode" rows="1" placeholder="Enter Confirmation Code Here"
                        title="Please enter the confirmation code that you created for your survey"></textarea>
            </div>
        </div>
        
        <div class="videosummary">
            <div class="control-group">
                    <label>Video embed link:</label>
                    <textarea name="videoembed" rel="tooltip" id="videoembed" rows="1" placeholder="Write video embed code here"
                        title="Please embed your Video"></textarea>
            </div>
            
            <div class="control-group">
                    <label>Question or task:</label>
                    <textarea name="vquestion" rel="tooltip" id="vquestion" rows="1" placeholder="Write task question here"
                        title="Please enter what question you would like the participant to answer">
                    </textarea>
            </div>
        
            
        </div>
        
        <div class="audiotranscript">
            <div class="control-group">
                    <label>Audio embed link:</label>
                    <textarea name="audioembed" rel="tooltip" id="audioembed" rows="1" placeholder="Write audio embed code here"
                        title="Please embed your Audio code"></textarea>
            </div>
        </div>
        
        <div class="control-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </fieldset>
</form>
