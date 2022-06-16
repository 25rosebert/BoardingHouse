@extends('layouts.admin')

@section('content')
<style>
    .card {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
</style>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>                     
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}" class="text-muted" style="text-decoration:none">Lot Details</a></li>                      
            </ol>
          </nav>
        <a href="{{route('allProperties')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
        <div class="row">
            @foreach($properties as $properties)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h2>Property Details</h2>
                    </div>
                    <div class="card-body">
                        <form class="form-group">
                            <div class="row">
                            <div class="col-md-5"><h3 class="text-muted">Property ID:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->id}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-5"><h3 class="text-muted">Property Name:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-5"><h3 class="text-muted">Property Price:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">₱{{number_format($properties->price)}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                
                            <div class="col-md-5"><h3 class="text-muted">Barangay:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->barangay->barangay}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                                
                            <div class="col-md-5"><h3 class="text-muted">Description:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->description}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                       
                            <div class="col-md-5"><h3 class="text-muted">Category:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->category->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                        
                            <div class="col-md-5"><h3 class="text-muted">Classified as:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->classification->type}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                            <div class="col-md-5"><h3 class="text-muted">Status:</h3></div>                
                                @if ($properties->status === 4)
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">available</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                                @elseif($properties->status === 5)
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">unavailable</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                                @elseif($properties->status === 6)
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">sold</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                              
                                @else                            
                                    null
                                @endif
                                <div class="col-md-5"><h3 class="text-muted">Location:</h3></div>                
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->locations->address}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                     
                                <hr>
                                {{-- Category --}}
                                @if ($properties->category->slug === 'House & Lot')                        
                                <div class="col-md-3"><h5 class="text-muted">Bedrooms:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->bedroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-3"><h5 class="text-muted">Comfort Room:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-3"><h5 class="text-muted">Kitchen:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->kitchen}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-3"><h5 class="text-muted">Living Room:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->livingroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-3"><h5 class="text-muted">Floor Total:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->floor_total}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                <div class="col"><h5 class="text-muted">Parking Lot:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->parking_lot}}</p class="fs-5 fw-bold" style="color: limegreen"></div>                                    
                                <div class="col-md-3"><h5 class="text-muted">Floor Area:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->floor_area}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>                            
                                <div class="col-md-3"><h5 class="text-muted">Land Size:</h5></div>                
                                    <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->houseandlot->land_size}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>

                                @elseif($properties->category->slug === 'Boarding House')
                                    <div class="col-md-3"><h5 class="text-muted">Beds:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->bed}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                    <div class="col-md-3"><h5 class="text-muted">Comfort Room:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                    <div class="col-md-3"><h5 class="text-muted">Rooms:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                    <div class="col-md-3"><h5 class="text-muted">Living Room:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->livingroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                    <div class="col-md-3"><h5 class="text-muted">Floor Total:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->floor_total}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                    <div class="col"><h5 class="text-muted">Kitchen:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->kitchen}}</p class="fs-5 fw-bold" style="color: limegreen"></div>                                    
                                    <div class="col-md-3"><h5 class="text-muted">Floor Area:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->boardinghouse->floor_area}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>                                                        
                                @elseif($properties->category->slug === 'Lot')
                                    <div class="col-md-3"><h5 class="text-muted">Land Size:</h5></div>                
                                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$properties->lot->land_size}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Cover Image</h6><hr>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('assets/upload/images/'.$properties->image)}}" style="max-height: 200px; max-width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>
                @if ($properties->images)
                    @foreach ($properties->images as $images)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6>Property Image</h6><hr>
                            </div>
                            <div class="card-body">
                                <img src="{{asset('assets/upload/properties/'.$images->images)}}" alt="No Image" style="max-height: 200px; max-width:100%" srcset="">
                            </div>
                        </div>
                    </div>    
                    @endforeach
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Owner's Information</h2><hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5"><h3 class="text-muted">Owner's Name:</h3></div>                
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->user->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-5"><h3 class="text-muted">Username:</h3></div>                
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->user->username}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-5"><h3 class="text-muted">Email Address:</h3></div>                
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$properties->user->email}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                                <div class="col-md-5"><h3 class="text-muted">Contact Number:</h3></div>                
                                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">+{{$properties->user->contact_number}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Property Locations</h2>
                    </div>
                    <div class="card-body" id="mapCanvas">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

    <script>    
        function initMap(){                
        var latlng = {lat:16.1505, lng: 119.9856};
        var mapOptions2 = {
        zoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,    
        };
        var locations = [
            ["{{$properties->locations->latitude}}","{{$properties->locations->longitude}}"],
        ];    
        var mapLocations = new google.maps.Map(document.getElementById("mapCanvas"),mapOptions2);

        for(var i=0; i<locations.length; i++){
            var location = new google.maps.LatLng(locations[i][0], locations[i][1]);
            var marker = new google.maps.Marker({
            position: location,              
            map:mapLocations,                                              
            });
        }         
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-4UmaTreS3qqOwnxHIPltCjoFdLYoOs&callback=initMap"
async></script> 
@endpush