<!-- Main page that user accesses. Contains information about all tasks available-->


<script type="text/javascript" src="js/rowClick.js">    
</script>

<script>
function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(42.376181, -71.115757),
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
        
        var gigs= <?php echo json_encode($rows); ?>
        
        var createMarkerAt = function(lat, lng) {
          var latLng, marker;
          latLng = new google.maps.LatLng(lat, lng);
          marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
          return marker;
        }
        
        var createMarkerForGig = function (gig) {
          var marker, info;
          marker = createMarkerAt(gig.latitude, gig.longitude);
          info = new google.maps.InfoWindow({
            content: gig.title
          });
          google.maps.event.addListener(marker, 'click', function() {
            info.open(map, marker);
          });
          return marker;
        }
        
        // Add markers for all the gigs.
        var len = gigs.length;
        for (var i = 0; i<len; i++) {
          createMarkerForGig(gigs[i]);
        }
         
 }     
$(document).ready(function(){

initialize();

});
</script>

<div>
    <h3>List of Properties</h3>
</div>


<div class="row">
    <div class="span11 offset1">
        
        <div class="row">
            
            <div class="span5">

                <div id="map_canvas" style="width:500px; height:500px"></div>
            </div>
            <div class="span5 offset1">
                <table id="tasktable" class="table table-hover unselect">

                    <thead>
                    </thead>
                    <tbody>

                    
                    <?php foreach ($rows as $row): ?>
                        <tr>  
                            <td>
                                <p><?=$row["title"]?></p>
                                <a href="/page.php?id=<?=$row['propertyid']?>" >
                                </a>
                            </td>
                            
                        </tr>
                    <? endforeach ?> 

                    </tbody>
                </table>
            </div>
            <div class="span5 offset1">
                <div id="map_canvas" style="width:100%; height:500px"></div>
            </div>
        </div>
    </div>
</div>




