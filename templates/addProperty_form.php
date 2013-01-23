<!-- Form to create a listing -->

<script src="js/multiupload.js"></script>
<script src="js/displayMap.js"></script>
<?php echo "uploads/{$_SESSION["id"]}/"?>
<div class="row">
    <div class="span5 offset4">
        <div class="well">
        <h3>Add a Listing</h3>
            <form class="form-horizontal" id="addListing" action="addProperty.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="property_type">Property type <i class="icon-lock"></i></label>
                        <select id = "property_type" name = "propertytype" title="Please select the type of property">
                            <option value="0">Select Property Type</option>
                            <option value="1">Apartment</option>
                            <option value="2">House</option>
                        </select>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="title">
                            Listing title<i class="icon-lock"></i></label>
                        <textarea name="title" rel="tooltip" id="title" rows="2" placeholder="Title" 
                            title="Input a short description of your property that will serve as your
                            listing's title."></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="property_description">
                            Longer Description<i class="icon-lock"></i></label>
                        <textarea name="property_description" rel="tooltip" id="property_description" rows="4"
                         placeholder="More specific description of your listing (rooms, price, rental dates, etc.)" 
                            title="Input a longer description of your property."></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="address">Address <i class="icon-lock"></i></label>
                        <input name="address" placeholder="Listing address" id="address" type="text"
                               required/>
                    </div>
                    
                    <div id="map_canvas" style="width:400px; height:200px"></div>
                    
                    <input name="latitude1" id="latitude1" type="text"/>
                    <input name="longitude1" id="longitude1" type="text"/>
                           
                    <div class="control-group">
                        <label class="control-label" for="photos">Photos <i class="icon-lock"></i></label>
                        See below
                    </div>
                   
                    
                </fieldset>
                
            </form>
            <div id="dragAndDropFiles" class="uploadArea">
            </div>           
            <form name="demoFiler" id="demoFiler" enctype="multipart/form-data">
                <input type="file" name="multiUpload" id="multiUpload" multiple />
                <input type="submit" name="submitHandler" id="submitHandler" value="Upload photos" />
            </form>
            <div class="progressBar">
                <div class="status"></div>
            </div>
            <button type="submit" class="btn" form="addListing">Submit</button>
        </div>
    </div>
</div>

<?php 
//<input type="filepicker" data-fp-apikey="AiELT67czTZyfgU1zLdsAz" data-fp-button-text="Upload photos" data-fp-button-class="btn btn-custom2"	data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-multiple="true" data-fp-maxsize="5000000" data-fp-services="COMPUTER" onchange="out='';for(var i=0;i<event.fpfiles.length;i++){out+=event.fpfiles[i].url;out+=' '};alert(out)">
?>
