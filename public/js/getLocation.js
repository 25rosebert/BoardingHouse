    var map;
    var marker;
    var mapLocations;
    // var lat = 16.1505;
    // var lng = 119.9856;
    var geocoder;
    var myLatLng = {lat:16.1505, lng: 119.9856};
    // var infowindow = new google.maps.InfoWindow();
  // let location = {lat: 16.1505, lng: 119.9856};
    function initMap() {
    // myLatLng = new google.maps.LatLng(lat, lng);
 
  let mapOptions = {
        zoom: 15,
        center: myLatLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
     };
 
  let mapOptions2 = {
    center: myLatLng,
    zoom: 12
  }
   map = new google.maps.Map(document.getElementById("myMap"),mapOptions); 
       var marker = new google.maps.Marker({
           position: myLatLng, 
           map: map, 
           draggable: true,
           animation: google.maps.Animation.DROP
       });
      //  map = new google.maps.Map(document.getElementById("mapLocations"),mapOptions); 

       geocoder = new google.maps.Geocoder({'latLng': myLatLng }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
           if (results[0]) {
              $('#latitude,#longitude').show();
              $('#address').val(results[0].formatted_address);
              $('#latitude').val(marker.getPosition().lat());
              $('#longitude').val(marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowinfow.open(map, marker);
           }
        }
     });
     
     google.maps.event.addListener(marker, 'dragend', function() {
     
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
    }
