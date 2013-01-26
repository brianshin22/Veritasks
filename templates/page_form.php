<div class="container">
<div class="well2">

<h3><?= $prop["title"] ?></h3>

<div>

    <p> <?= $prop["Description"]?></p>

    <p><?= $prop["Address"]?></p>

</div>
<div class="row">
    <div class="span5 offset1">
        <div id="map_canvas" style="width:400px; height:400px"></div>
    </div>

    <div class="span5 ">
        <div id="galleria">
            <?php 
            $urls = explode(" ", $prop["photourls"]);
            
            foreach($urls as $url){
                echo "<img src='$url' />\n";
            }  
                 
            ?>


        </div>
    </div>
    
</div>

</div>

</div>


<script src="galleria/galleria-1.2.9.min.js"></script>
<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');
</script>
<style>
    #galleria{ width: 400px; height: 400px; background: #000 }
</style>



<script>
    function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(42.376181, -71.115757),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
        
        var gigs= <?php echo json_encode($prop); ?>
        
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
        createMarkerForGig(gigs);         
 }     
$(document).ready(function(){

initialize();

});

</script>
