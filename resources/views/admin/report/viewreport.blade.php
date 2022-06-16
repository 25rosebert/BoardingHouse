@extends('layouts.admin')

@section('content')
@php
    use App\Models\Report;
@endphp
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('view reported property')}}" class="text-muted" style="text-decoration:none;  pointer-events: none;
                cursor: default;">Reported Property</a></li>        
            </ol>
          </nav>
        <a href="{{route('dashboard')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a>
        <div class="card">
            <div class="card-header card-header-danger">
                <h3 class="card-title">Report Details</h3>
            </div>
            <div class="card-body">
                <div class="row pt-3 pb-3 ms-3 me-3">                
                    @foreach ($report as $report)
                    <div class="col-md-5"><h3 class="text-muted">Report ID:</h3></div>                
                    <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->id}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                        <div class="col-md-5"><h3 class="text-muted">Property ID:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->property_id}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                        <div class="col-md-5"><h3 class="text-muted">No. of Report:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->offense_count}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                
                                {{-- <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{Report::where('property_id',$report->property_id)->count()}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                 --}}
                        <div class="col-md-5"><h3 class="text-muted">Report Type:</h3></div>                                                                                           
                        <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->report_type}}</p class="fs-3 fw-bold" style="color: limegreen"></div>  
                            <div class="col-md-5"><h3 class="text-muted">Owner's Name:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-5"><h3 class="text-muted">Report Description:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$report->description}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                    @endforeach                
                </div>
            </div>
        </div>        
    </div>
    {{-- Property Details --}}
    @foreach ($properties as $property)
    <div class="container pt-5">            
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">Property Details</h3>
                <p>Detatils of the property including the images</p>
            </div>
            <div class="card-body">
                <div class="row pt-3 pb-3 ms-3 me-3">                
                    {{-- @foreach ($properties as $property) --}}
                        <div class="col-md-5"><h3 class="text-muted">Property ID:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->id}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                        <div class="col-md-5"><h3 class="text-muted">Property Name:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                        <div class="col-md-5"><h3 class="text-muted">Property Price:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">₱{{number_format($property->price)}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                
                        <div class="col-md-5"><h3 class="text-muted">Barangay:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->barangay->barangay}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                                
                        <div class="col-md-5"><h3 class="text-muted">Description:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->description}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                       
                        <div class="col-md-5"><h3 class="text-muted">Category:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->category->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                        
                        <div class="col-md-5"><h3 class="text-muted">Classified as:</h3></div>                
                            <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->classification->type}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                        <div class="col-md-5"><h3 class="text-muted">Status:</h3></div>                
                            @if ($property->status === 4)
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">available</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                            @elseif($property->status === 5)
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">unavailable</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                               
                            @elseif($property->status === 6)
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">sold</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                              
                            @else                            
                                null
                            @endif
                            <div class="col-md-5"><h3 class="text-muted">Location:</h3></div>                
                                <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->locations->address}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                                                     
                            <hr>
                        {{-- Category --}}
                        @if ($property->category->slug === 'House & Lot')                        
                            <div class="col-md-3"><h5 class="text-muted">Bedrooms:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->bedroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Comfort Room:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Kitchen:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->kitchen}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Living Room:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->livingroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Floor Total:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->floor_total}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col"><h5 class="text-muted">Parking Lot:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->parking_lot}}</p class="fs-5 fw-bold" style="color: limegreen"></div>                                    
                            <div class="col-md-3"><h5 class="text-muted">Floor Area:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->floor_area}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>                            
                            <div class="col-md-3"><h5 class="text-muted">Land Size:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->houseandlot->land_size}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>

                        @elseif($property->category->slug === 'Boarding House')
                            <div class="col-md-3"><h5 class="text-muted">Beds:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->bed}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Comfort Room:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Rooms:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->comfortroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Living Room:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->livingroom}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Floor Total:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->floor_total}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col"><h5 class="text-muted">Kitchen:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->kitchen}}</p class="fs-5 fw-bold" style="color: limegreen"></div>                                    
                            <div class="col-md-3"><h5 class="text-muted">Floor Area:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->boardinghouse->floor_area}}m2</p class="fs-5 fw-bold" style="color: limegreen"></div>                                                        
                        @elseif($property->category->slug === 'Lot')
                        <div class="col-md-3"><h5 class="text-muted">Land Size:</h5></div>                
                        <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$property->lot->land_size}}m2</p></div>
                        @endif
                    {{-- @endforeach                 --}}
                </div>
            </div>
        </div>
    </div>     
    {{-- Users Info --}}
    <div class="container">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3>Owner Information</h3>
                <p>Basic info of the Property Owner</p>
            </div>
            <div class="card-body">
                <div class="row pt-3 pb-3 ms-3 me-3">
                    <div class="col-md-5"><h3 class="text-muted">Owner's Name:</h3></div>                
                        <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->user->name}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                    <div class="col-md-5"><h3 class="text-muted">Owner's Contact Number:</h3></div>                
                        <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">+{{$property->user->contact_number}}</p class="fs-3 fw-bold" style="color: limegreen"></div>                            
                    <div class="col-md-5"><h3 class="text-muted">Owner's Email Address:</h3></div>                
                        <div class="col-md-7"><p class="fs-3 fw-bold" style="color: limegreen">{{$property->user->email}}</p class="fs-3 fw-bold" style="color: limegreen"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Images --}}
    <div class="container">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3>Property Images</h3>
                <p>Images of the property</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5"><h3 class="text-muted">Property Image</h3></div>                
                        <div class="col-md-7"><img src="{{asset('assets/upload/images/'.$property->image)}}" style="height:300px; width;300px" alt="wala"></div><br>
                    <div class="col-md-5"><h3 class="text-muted">Business Permit</h3></div>                
                        <div class="col-md-7"><img src="{{asset('assets/upload/permits/'.$property->business_permit)}}" style="height:300px; width;300px" alt="wala"></div><br>
                    <div class="col-md-5"><h3 class="text-muted">Property Image</h3></div>                
                        <div class="col-md-7"><img src="{{asset('assets/upload/images/'.$property->image)}}" alt="wala" style="height:300px; width;300px"></div><b></b>
                </div>
            </div>
        </div>
    </div>

    {{-- Map --}}
    <div class="container">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3>Located at:</h3>
                <p>The location of the property is pinned by the map marker</p>
            </div>
            <div class="card-body">
                <div id="mapCanvas"> </div>
            </div>
        </div>
    </div>

    @endforeach
   
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
            ["{{$property->locations->latitude}}","{{$property->locations->longitude}}"],
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