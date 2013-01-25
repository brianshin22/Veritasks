<div class="row">
    <div class="span5 offset4">
        <div class="well">
        <h3>Update your Listing</h3>
            <form class="form-horizontal" id="finishUpdate" action="finishUpdate.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="title">
                            Listing title<i class="icon-lock"></i></label>
                        <textarea name="title" rel="tooltip" id="title" rows="2" placeholder="Title" 
                            title="Input a short description of your property that will serve as your
                            listing's title." required><?= $row['title'] ?></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="property_description">
                            Longer Description<i class="icon-lock"></i></label>
                        <textarea name="property_description" rel="tooltip" id="property_description" rows="4"
                         placeholder="More specific description of your listing (rooms, price, rental dates, etc.)" 
                            title="Input a longer description of your property."  
                            value=required><?= $row['Description'] ?></textarea>
                    </div>
                    
                    <input type="hidden" name="propertyid" value="<?=$row['propertyid'] ?>">
                   
                </fieldset>
              
            <button type="submit" class="btn" form="finishUpdate">Update</button>
        </div>
    </div>
</div>

