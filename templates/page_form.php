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

<h3><?= $prop["title"] ?></h3>

<div>

    <p> <?= $prop["Description"]?></p>

    <p><?= $prop["Address"]?></p>

</div>

<div>
    <div id="map_canvas" style="width:500px; height:500px">
    </div>

</div>


    <div id="galleria">
<?php 

    $dirname = "uploads/"; 
    $images = scandir($dirname); 
    $ignore = Array(".", "..", "otherfiletoignore");
    foreach($images as $curimg){
    if(!in_array($curimg, $ignore)) {
    echo "<img src='uploads/$curimg' />\n";
    }; 
    }  
         
    ?>

    <script>
        Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
        Galleria.run('#galleria');
    </script>

    </div>


</div>




<script src="galleria/galleria-1.2.9.min.js"></script>
<style>
    #galleria{ width: 800; height: 400px; background: #000 }
</style>
