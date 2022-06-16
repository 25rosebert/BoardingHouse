  var marker;
  var mapMarker;
  var mapLocations;
  var geocoder;
  var maps;
  var myLatLng = {lat:16.1505, lng: 119.9856};
  function initMap() {
 
  let mapOptions = {
      zoom: 15,
      center: myLatLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    };

 var map = new google.maps.Map(document.getElementById("myMap"),mapOptions);
           marker = new google.maps.Marker({
           position: myLatLng, 
           map: map, 
           draggable: true,
           animation: google.maps.Animation.DROP,
       });

       geocoder = new google.maps.Geocoder({'latLng': myLatLng }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
           if (results[0]) {
              $('#latitude,#longitude').show();
              $('#address').val(results[0].formatted_address);
              $('#latitude').val(marker.getPosition().lat());
              $('#longitude').val(marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);  
           }
        }
     });  
     
     google.maps.event.addListener(marker, 'position_changed','click', function() {
     
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
              if (results[0]) {
                 $('#address').val(results[0].formatted_address);
                 $('#latitude').val(marker.getPosition().lat());
                 $('#longitude').val(marker.getPosition().lng());
                //  infowindow.setContent(results[0].formatted_address);
                //  infowindow.open(map, marker);
              }
            }
        });
    });
  
    var infowindow = new google.maps.InfoWindow()
        marker.addListener('click',function(){
           
              infowindow.open(map, marker);
        });

    var infowindow = new google.maps.InfoWindow({
        content: "<h6>Drag the Marker to your respected Property</h6>"
    });    
       
  }








