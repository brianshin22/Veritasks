<!-- Main page that user accesses. Contains information about all tasks available-->

<script>
function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(42.376181, -71.115757),
          zoom: 13,
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
<div class="row">
<div class="span10 offset2">
<h3>Available Properties</h3>

<div id="map_canvas" style="width:500px; height:500px"></div>

<table id="tasktable" class="table table-hover ">
    <thead>
        <tr>
            <th></th>      
            <th></th>  
         </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
        <tr>  
            <td><?= $row["title"] ?></td>  
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="hid1" value="<?= $row['propertyid'] ?>">
                    <button class="btn" type="submit" value="Go to Task">Go to Task</button>
                </form>
            </td>   
        </tr>
    <? endforeach ?>
    </tbody>
</table>

<script src="galleria/galleria-1.2.9.min.js"></script>
<style>
    #galleria{ width: 800; height: 400px; background: #000 }
</style>

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
</div>
<script>
    Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('#galleria');
</script>

</div>
</div>
