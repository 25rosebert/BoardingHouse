@extends('layouts.admin')
    @section('css')
        <link rel="stylesheet" href="{{asset('admin/css/map.css')}}">
    @endsection
@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('choose category')}}" aria-disabled="true" style="text-decoration: none;" class="text-muted">Choose Category</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('house and lot')}}" aria-disabled="true" style="text-decoration: none;" class="text-muted">House and Lot</a></li>
        </ol>
      </nav>
    <a href="{{route('chooseCate')}}" class="btn btn-danger btn-sm">Back</a>
    <div class="container-fluid">  
      <div class="row"> 
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title ">House and Lot</h4>
              <p class="card-category">Add your property here</p>
            </div>
            <div class="card-body">
                <form action="{{route('storeHouse')}}" method="POST" enctype="multipart/form-data" class="appendForm" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="contact_number" value="{{Auth::user()->contact_number}}">
                            <label for="" style="color: black">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your Property Name"> 
                            <span class="errormessage" style="color: red" > @error('name'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Category</label>
                            <select name="category_id" id="category" value="{{ old('category_id') }}" class="form-select"> {{-- onchange="getSelectedCategory();" --}}
                                {{-- <option value="" disabled selected>SELECT CATEGORY</option> --}}
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="errormessage" style="color: red"> @error('category_id'){{$message}}  @enderror</span>
                         </div>
                        <div class="col-md-6 mb-3" >
                            <label for="" style="color: black">Classification</label>
                            <select name="classification_id" value="{{ old('classification_id') }}" id="" class="form-select" >
                                <option value="" disabled selected>CLASSIFICATION</option>
                                @foreach ($classification as $classification)
                                    <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                @endforeach
                            </select>
                            <span class="errormessage" style="color: red"> @error('classification_id'){{$message}}  @enderror</span>
                         </div>   
                          {{-- Barangay --}}
                          <div class="col-md-6 mb-3">
                            <label for="">Selected Barangay</label>
                            <select name="barangay_id" id="" value="{{ old('barangay_id') }}" class="form-select">
                                @foreach ($barangays as $barangay)
                                    <option value="{{$barangay->id}}">{{$barangay->barangay}}</option>
                                @endforeach
                            </select>
                            <span class="errormessage"> @error('barangay_id'){{$message}}  @enderror</span>
                        </div>                                                      
                        {{-- End of barangay --}}
                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" value="{{ old('status') }}" class="form-select">
                                @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                @endforeach
                            </select>
                            <span class="errormessage"> @error('status'){{$message}}  @enderror</span>
                        </div>
                        {{-- End of Status --}}                     
                {{-- House And Lot Form --}}
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Bed Room</label>
                            <input type="number" class="form-control" name="bedroom" value="{{ old('bedroom') }}" placeholder="Total number of Bedrooms">          
                            <span class="errormessage" style="color: red"> @error('bedroom'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Comfort Room</label>
                            <input type="number" class="form-control" name="comfortroom" value="{{ old('comfortroom') }}" placeholder="Total number of Comfort rooms">          
                            <span class="errormessage" style="color: red"> @error('comfortroom'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Living Room</label>
                            <input type="number" class="form-control" name="livingroom" value="{{ old('livingroom') }}" placeholder="Total number of Living rooms">          
                            <span class="errormessage" style="color: red"> @error('livingroom'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Kitchen</label>
                            <input type="number" class="form-control" name="kitchen" value="{{ old('kitchen') }}" placeholder="How Many kitchens do you have in your property">          
                            <span class="errormessage" style="color: red"> @error('kitchen'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Floor Total</label>
                            <input type="number" class="form-control" name="floor_total" value="{{ old('floor_total') }}" placeholder="Total House floor">          
                            <span class="errormessage" style="color: red"> @error('floor_total'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Parking Lot</label>
                            <input type="number" class="form-control" name="parkinglot" value="{{ old('parkinglot') }}" placeholder="Number of Parking lot">          
                            <span class="errormessage" style="color: red"> @error('parkinglot'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Land Size</label>
                            <input type="number" class="form-control" name="land_size" value="{{ old('land_size') }}" placeholder="In squre meter">          
                            <span class="errormessage" style="color: red"> @error('land_size'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="in pesos">
                            <span class="errormessage" style="color: red"> @error('price'){{$message}}  @enderror</span>
                        </div>
                  {{-- End of House and Lot Form --}}
                        <div class="col-md-12 mb-3">
                            <label for="" style="color: black">Description</label>
                            <textarea name="description" class="form-control" rows="3" value="{{ old('description') }}" placeholder="Short description of your property"></textarea>
                            <span class="errormessage" style="color: red"> @error('description'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Business Permit</label>
                            <input type="file" class="form-control" name="permit" value="{{ old('permit') }}">            
                            <span class="errormessage" style="color: red"> @error('permit'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Property Picture</label>
                            <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">          
                            <span class="errormessage" style="color: red"> @error('photo'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Property Images</label>
                            <input type="file" class="form-control" name="file[]" value="{{ old('file') }}" multiple>          
                            <span class="errormessage" style="color: red"> @error('file'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Floor Area</label>
                            <input type="number" class="form-control" name="floor_area" value="{{ old('floor_area') }}" placeholder="Floor Area of the Building">          
                            <span class="errormessage" style="color: red"> @error('floor_area'){{$message}}  @enderror</span>                
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="" style="color: black">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Garcia St. Poblacion, Alaminos City">
                            <span class="errormessage" style="color: red"> @error('address'){{$message}}  @enderror</span>
                        </div>
                         <div class="col-md-3 mb-3">
                            <label for="" style="color: black">Latitude</label>
                            <input type="text" id="latitude" class="form-control" name="latitude" value="{{ old('latitude') }}" placeholder="Latitude">
                            <span class="errormessage" style="color: red"> @error('latitude'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                           <label for="" style="color: black">Longitude</label>
                           <input type="text" id="longitude" class="form-control" name="longitude" value="{{ old('longitude') }}" placeholder="Longitude">
                           <span class="errormessage" style="color: red"> @error('longitude'){{$message}}  @enderror</span>                
                       </div>   
                       <div class="col-md-12 mt-3">
                            <h4 class="text text-warning">Drag the Marker in the Google Map below to pinpoint your Property Location.</h4>
                            <p>The Marker will get the Address, Latitude, and Longitude of your Property</p>
                        </div>                   
                         <div id="myMap" class="col-md-12"></div>  <!-- This is the map viewer -->
                         <div class="col-md-12 mt-3">
                            <label for="">Nearby Places/Landmarks:</label>                                
                            <input type="text" class="form-control" name="landmark" placeholder="Enter 2 or 3 or More Landmarks">               
                            <span class="errormessage"> @error('landmark'){{$message}}  @enderror</span>                                 
                        </div>                      
                         <div class="col-md-12 mb-3 mt-3">
                            <button type="submit" class="btn btn-warning">Create</button>
                         </div>
                    </div>
                </form>
              
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('script')
<script src="{{asset('admin/js/scriptMap.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-4UmaTreS3qqOwnxHIPltCjoFdLYoOs&callback=initMap"
async></script> 
@endpush
