<!-- Form to create a listing -->

<script src="js/validTask.js"></script>
<script src="js/multiupload.js"></script>
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
                        <label class="control-label" for="property_description">Brief description of your property <i class="icon-lock"></i></label>
                        <textarea name="descrip" rel="tooltip" id="property_description" rows="3" placeholder="Short Description" 
                            title="Required: Input a short description of your property."></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="begindate">Rental begin date <i class="icon-lock"></i></label>
                        <input name="begindate" placeholder="Begin date of rental period" rel="tooltip" id="begindate" type="date"
                               title="Input the start date for the rental period." required/>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="enddate">Rental end date <i class="icon-lock"></i></label>
                        <input name="enddate" placeholder="End date of rental period" rel="tooltip" id="enddate" type="date"
                               title="Input the end date for the rental period." required/>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="price">Price <i class="icon-lock"></i></label>
                        <input name="price" placeholder="Price for rental period" rel="tooltip" id="price" type="number" min="0"
                               title="Input the rentral price for your selected time period." required/>
                    </div>
                    
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
