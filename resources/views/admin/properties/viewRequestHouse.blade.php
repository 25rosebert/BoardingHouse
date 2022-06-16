@extends('layouts.admin')

@section('content')
<style>
    .card {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
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
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('pended properties')}}" class="text-muted" style="text-decoration:none">Request Properties</a></li>                     
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}" class="text-muted" style="text-decoration:none">Request House and Lot Details</a></li>                      
            </ol>
          </nav>
    <a href="{{route('pendedProp')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
        <div class="row">
            @foreach($properties as $properties)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Request House and Lot From User</h2><hr>
                    </div>
                    <div class="card-body">
                        <form class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="">Property Name</label>
                                    <input type="text" naxme="" disabled value="{{$properties->name}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Price</label>
                                    <input type="text" name="" disabled value="{{number_format($properties->price)}}" class="form-control">
                                </div>               
                                <div class="col-md-12 mb-4">
                                    <label for="">Property Description</label>
                                    <textarea name="description" id="" disabled class="form-control" rows="8">{{$properties->description}}</textarea>
                                </div>             
                                <div class="col-md-3 mb-4">
                                    <label for="">Category</label>
                                    <input type="text" name="" disabled value="{{$properties->category->name}}" class="form-control">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Classification</label>
                                    <input type="text" name="" disabled value="{{$properties->classification->type}}" class="form-control">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Property Land Size</label>
                                    <input type="text" name="" disabled value="{{$properties->reqHouse->land_size}}" class="form-control">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Bedroom</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->bedroom}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Livingroom</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->livingroom}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Comfort Room</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->comfortroom}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Kitchen</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->kitchen}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Floor Total</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->floor_total}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Floor Area</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->floor_area}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Parking Lot</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqHouse->parking_lot}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Barangay</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->barangay->barangay}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Status</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->status}}">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqLocation->address}}">
                                </div>                                
                                <div class="col-md-3 mb-4">
                                    <label for="">Latitude</label>
                                    <input type="text" class="form-control"disabled  value="{{$properties->reqLocation->latitude}}">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="">Longitude</label>
                                    <input type="text" class="form-control" disabled value="{{$properties->reqLocation->longitude}}">
                                </div>                               
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Business Permit</h6><hr>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('assets/upload/permits/'.$properties->business_permit)}}" style="max-height: 200px; max-width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>
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
                @if ($properties->reqImages)
                    @foreach ($properties->reqImages as $images)
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Owner's Information</h2><hr>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="">Owner's Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$properties->user->name}}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">E-Mail</label>
                                    <input type="text" class="form-control" value="{{$properties->user->email}}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" value="{{$properties->user->username}}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="">Contact Information</label>
                                    <input type="text" class="form-control" value="{{$properties->user->contact_number}}">
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card">
                <div class="card-body">
                    <h2>Property Locations</h2>
                </div>
                <div class="card-body" id="mapCanvas">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

    <script>    
        function initMap(){        
        // var locations = {!! json_encode($properties->reqLocations->toArray(), JSON_HEX_TAG) !!};        
        var latlng = {lat:16.1505, lng: 119.9856};
        var mapOptions2 = {
        zoom: 12,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,    
        };
        var locations = [
            ["{{$properties->reqLocation->latitude}}","{{$properties->reqLocation->longitude}}"],
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDny2vom6IhoSwID3rQtkkeOxA2KgpVTg&callback=initMap"
async></script> 
@endpush