
@extends('layouts.userApp')
    @section('css')
        {{-- <link rel="stylesheet" href="admin/css/map.css">  --}}
        <style>
            #mapCanvas{
                /* background-color: blue; */
                height:700px;
                width:100%;
            }    
            *{
                margin: 0;
                padding: 0;
            }         
        </style>       
    @endsection
    @section('content')
    @include('layouts.inc.carousel')
    <div class="section">
        {{-- <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-arrow-left"></i></a> --}}
    </div>
        <div class="container">
            {{-- @foreach ($properties as $property)
                <img src="{{asset('assets/upload/images/'.$property->image)}}" alt="">
            @endforeach --}}
            <div class="row mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-success">
                            <b>Location of All Properties</b>
                        </h3>            
                    </div>
                    <div class="card-body mb-5" id="mapCanvas">
                   
                    </div>
                    <div class="card-footer">
                        <p class="text-center">Copyright 2021 Brought to you by Property Finder</p>
                    </div>
                </div>            
            </div>
        </div>
    @endsection
@push('script')
{{-- <script src="admin/js/map.js"></script> --}}
<script>
    function initMap(){
//    console.log(locations);
    var latlng = {lat:16.1505, lng: 119.9856};
    var mapOptions2 = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,    
    };
        var mapLocations = new google.maps.Map(document.getElementById("mapCanvas"),mapOptions2);

       var locations = [
        @foreach($properties as $loc)
            [ "{{ $loc->locations->latitude }}", "{{ $loc->locations->longitude }}" ,"{{$loc->locations->address}}","{{$loc->name}}","{{$loc->price}}","{{$loc->category->name}}","{{$loc->image}}","{{$loc->classification->type}}"],
        @endforeach
    ];

    var infowindow = new google.maps.InfoWindow();
    
    for(var i = 0; i < locations.length; i++){
        var location = new google.maps.LatLng(locations[i][0], locations[i][1]);
        var marker = new google.maps.Marker({
            position: location,  
            // icon: "{{asset('admin/mapMarker.png')}}",
            map:mapLocations,      
            title:locations[i][3]   
                                
        });

        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    // infowindow.setContent("<div>"+"<h5>"+ locations[i][2] +"</h5>" +"<h6>"+ locations[i][3] +"</h6>" + "<p>"+ locations[i][5] +"</p>" + "<p>" + "Price: " + locations[i][4]+"</p>"+"</div>");
                    // infowindow.open(mapLocations, marker);

                    // infowindow.setContent("<div style='float:left'><img src='http://i.stack.imgur.com/g672i.png'></div><div style='float:right; padding: 10px;'><b>Title</b><br/>123 Address<br/> City,Country</div>");
                    
                    var infowindow = new google.maps.InfoWindow({
                        content: "<div style='float:left'><img src='http://i.stack.imgur.com/g672i.png'></div><div style='float:right; padding: 10px;'><b>"+locations[i][3]+"</b><br/>"+locations[i][2]+"<br/>"+locations[i][5]+"<b><br/>"+locations[i][7]+"</b><br/><b><br/>Price: "+locations[i][4]+"</b><br/></div>"
                                                          
                    });            
                    infowindow.open(mapLocations, marker);
                    marker.addListener('mouseout', () => infowindow.close())
                    
                }
            })
            (marker, i));         
    }
 }
 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-4UmaTreS3qqOwnxHIPltCjoFdLYoOs&callback=initMap"
async></script> 
@endpush