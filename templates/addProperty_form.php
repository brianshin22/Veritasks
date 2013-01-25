<!-- Form to create a listing -->

<script src="js/upload.js"></script>
<script src="js/displayMap.js"></script>

<div class="row">
    <div class="span5 offset4">
        <div class="well">
        <h3>Add a Listing</h3>
            <form class="form-horizontal" id="addListing" action="addProperty.php" method="post">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="title">
                            Listing title<i class="icon-lock"></i></label>
                        <textarea name="title" rel="tooltip" id="title" rows="2" placeholder="Title" 
                            title="Input a short description of your property that will serve as your
                            listing's title." required></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="property_description">
                            Longer Description<i class="icon-lock"></i></label>
                        <textarea name="property_description" rel="tooltip" id="property_description" rows="4"
                         placeholder="More specific description of your listing (rooms, price, rental dates, etc.)" 
                            title="Input a longer description of your property." required></textarea>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="address">Address <i class="icon-lock"></i></label>
                        <input name="address" placeholder="Listing address" id="address" type="text"
                               required/>
                    </div>
                    
                    <div id="map_canvas" style="width:400px; height:200px"></div>
                    
                    <input type="hidden" name="latitude1" id="latitude1" type="text"/>
                    <input type="hidden" name="longitude1" id="longitude1" type="text"/></br>
                           
                    <div class="control-group">
                        <label class="control-label" for="photos">Photos <i class="icon-lock"></i></label>
                        <input type="filepicker" id="filepicker" data-fp-apikey="AiELT67czTZyfgU1zLdsAz" data-fp-button-text="Upload photos" data-fp-button-class="btn"	data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-multiple="true" data-fp-maxsize="10485760" data-fp-services="COMPUTER">
                    </div>
                   
                    <input type="hidden" name="imageurls" id="imageurls"/>
                </fieldset>
              
            <button type="submit" class="btn" form="addListing">Submit</button>
        </div>
    </div>
</div>

<?php 
//<input type="filepicker" data-fp-apikey="AiELT67czTZyfgU1zLdsAz" data-fp-button-text="Upload photos" data-fp-button-class="btn btn-custom2"	data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-multiple="true" data-fp-maxsize="5000000" data-fp-services="COMPUTER" onchange="out='';for(var i=0;i<event.fpfiles.length;i++){out+=event.fpfiles[i].url;out+=' '};alert(out)">
?>
