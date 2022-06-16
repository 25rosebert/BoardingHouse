<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mapa Ko</title>
	 <style>
		#map{
			height: 500px;
			width: 100%;
		}
		*{
			margin: 0;
			padding: 0;
		}
		#map2{
			height:100%;
			width:100%;
		}
	</style> 
</head>
<body>
	<div id="map"></div>
	{{-- <div id="map2"></div> --}}
	<script>
		function initMap(){
			var location = {lat: 16.1505, lng: 119.9856};
			
			var mapOptions = {
				zoom: 15, 
				center: location 
			};
			var map = new google.maps.Map(document.getElementById("map"),mapOptions);
			// var map2 = new google.maps.Map(document.getElementById("map2"),mapOptions);
		     var marker = new google.maps.Marker({
			 	position: location, 
			 	map: map 
			 });
		}

	</script>

	<script async defer 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDny2vom6IhoSwID3rQtkkeOxA2KgpVTg&callback=initMap">
    </script> 

{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245278.8933286093!2d119.8497346632086!3d16.144038807513855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3393dccf6d009e91%3A0xd49a89904cd7374e!2sAlaminos%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1632276620728!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"</iframe>  --}}

</body>
</html>

















































{{-- THis is to view a Map in Mapbox --}}
{{-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>Display a map on a webpage</title>	
		<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
		<link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet">
		<script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
	<style>
		#map{
			height: 500px;
			width: 100%;    
		}
		*{
			margin: 0;
			padding: 0;
		}
		
	</style>
	</head>
		<body>
		<div id="map"></div>
	
	<script>
			mapboxgl.accessToken = 'pk.eyJ1IjoiYmVydHRodW1ib2xpc3RhIiwiYSI6ImNrdHdpYmN5NDJrNnIybm1wbjI2eDh0bHUifQ.IHoFKWthd5C4tibbhBWs9g';
   
   	 const map = new mapboxgl.Map({
			container: 'map', // container ID
			style: 'mapbox://styles/mapbox/streets-v11', // style URL
			center: [119.9712 , 16.1238], // starting position [lng, lat]
			zoom: 15 // starting zoom
		});
	</script>

</body>
</html>


{{-- Maps for point A to point B navigation directions --}}
{{-- 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display navigation directions</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYmVydHRodW1ib2xpc3RhIiwiYSI6ImNrdWgwYXc4MDBldGMzMHF2NGx3dW55MmsifQ.TDFPt3cRaPnzk-NymTal1Q';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [119.9712 , 16.1238],
        zoom: 13
    });

    map.addControl(
        new MapboxDirections({
            accessToken: mapboxgl.accessToken
        }),
        'top-left'
    );
</script>

</body>
</html> --}}