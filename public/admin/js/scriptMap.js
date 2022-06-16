var map;
var marker;
var myLatlng = {lat: 16.1505, lng: 119.9856};

// var infowindow = new google.maps.InfoWindow();

function initMap(){
    var mapOptions = {
    zoom: 15,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
// Map
map = new google.maps.Map(document.getElementById("myMap"), mapOptions);


// Marker 
marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true 
}); 

var geocoder = new google.maps.Geocoder();
geocoder.geocode({'latLng': myLatlng }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
        $('#latitude,#longitude').show();
        $('#address').val(results[0].formatted_address);
        $('#latitude').val(marker.getPosition().lat());
        $('#longitude').val(marker.getPosition().lng());
        // infowindow.setContent(results[0].formatted_address);
        // infowindow.open(map, marker);
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
            // infowindow.setContent(results[0].formatted_address);
            // infowindow.open(map, marker);
        }  
    }
});
});

}
// google.maps.event.addDomListener(window, 'load', initMap);
