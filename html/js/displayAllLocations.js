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
