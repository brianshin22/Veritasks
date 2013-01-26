<script src="js/displayMap.js"></script>
<script src="js/checkTitle.js"></script>
<script>
$(document).ready(function(){

var oval = <?PHP print $row['active']; ?>;
var propertyid = <?= $row['propertyid'] ?>;
$("#hidden6").val(propertyid);
if(oval == 1)
{
    $("#availability").html('Close listing');
    $("#hidden5").val(0);
}
else
{
    $("#availability").html('Open listing');
    $("#hidden5").val(1);
}
});
</script>
<div class="row">
    <div class="span7 offset3">
        <div class="well">
        <h3>Update your Listing</h3>
            <form class="form-horizontal" id="finishUpdate" action="finishUpdate.php" method="post">
                <fieldset>
                
                    <div class="control-group">
                        <label class="control-label" for="title">
                            Listing title<i class="icon-lock"></i></label>
                        <div class="input-append">
                        <input name="title" style="width:327px" type="text" id="title" 
                        placeholder="Input a short description of your property" value="<?= $row['title']?>" required />
                        <span id="charsleft"class="add-on"><?= 70-strlen($row['title']) ?></span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="property_description">
                            Longer Description<i class="icon-lock"></i></label>
                        <textarea name="property_description" class="span4" rel="tooltip" id="property_description" rows="8"
                         placeholder="More specific description of your listing (rooms, price, rental dates, etc.)" 
                            title="Input a longer description of your property."  
                            value=required><?= $row['Description'] ?></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="address">Address <i class="icon-lock"></i></label>
                        <input name="address" class="span4" placeholder="Listing address" value="<?= $row['Address']?>" 
                        id="address" type="text"
                               required/>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="address"></label>
                        <div id="map_canvas" style="width:375px; height:200px; margin: 0 auto 0 auto"></div>
                    </div>
                    
                    <input type="hidden" name="latitude1" id="latitude1" type="text" value="<?= $row['latitude']?>"/>
                    <input type="hidden" name="longitude1" id="longitude1" type="text" value="<?= $row['longitude']?>"/>
                    <input type="hidden" name="propertyid" value="<?=$row['propertyid'] ?>">
                    
                </fieldset>
            </form>  
            <button type="submit" class="btn" form="finishUpdate">Update</button>
        <p>    
            <form id = "closeListing" action="closeListing.php" method="post">
                <input type="hidden" id="hidden5" name="hidden5"/>
                <input type="hidden" id="hidden6" name="hidden6"/>
                <button class="btn" type="submit" id = "availability" value="Close Task">Close Listing</button>
            </form>
        </p>
        </div>
    </div>
</div>

