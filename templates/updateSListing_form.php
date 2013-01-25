<script src="js/displayMap.js"></script>
<script>
$(document).ready(function(){

var oval = <?PHP print $row['active']; ?>;
var propertyid = <?= $row['propertyid'] ?>;
$("hidden6").val(propertyid);
if(oval == 1)
{
    $("#closeListing").html('Close listing');
    $("#hidden5").val(0);
}
else
{
    $("#closeListing").html('Open listing');
    $("#hidden5").val(1);
}
});
</script>
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
                    
                    <div class="control-group">
                        <label class="control-label" for="address">Address <i class="icon-lock"></i></label>
                        <input name="address" placeholder="Listing address" value="<?= $row['Address']?>" 
                        id="address" type="text"
                               required/>
                    </div>
                    
                    <div id="map_canvas" style="width:400px; height:200px"></div>
                    
                    <input type="hidden" name="latitude1" id="latitude1" type="text" value="<?= $row['latitude']?>"/>
                    <input type="hidden" name="longitude1" id="longitude1" type="text" value="<?= $row['longitude']?>"/></br>
                    
                    <input type="hidden" name="propertyid" value="<?=$row['propertyid'] ?>">
                   
                </fieldset>
            </form>  
            <button type="submit" class="btn" form="finishUpdate">Update</button>
            
        <form id = "closeListing" action="closeListing.php" method="post">
            <input type="hidden" id="hidden5" name="hidden5">
            <input type="hidden" id="hidden6" name="hidden6">
            <button class="btn" type="submit" value="Close Task">Close Task</button>
        </form>
        </div>
    </div>
</div>

