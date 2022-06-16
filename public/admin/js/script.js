let map;
// var marker;
function initMap() {
    var location = {lat: 16.1505, lng: 119.9856};
    var map = new google.maps.Map(document.getElementById("myMap"),{
        zoom: 15, 
        center: location,
        mapTypeId: new google/maps.MapTypeId.ROADMAP 
    });
     var marker = new google.maps.Marker({
         position: location, 
         map: map, 
         draggable: true
     });

  
}