@extends('layouts.app')
    @section('css')
        <link rel="stylesheet" href="{{asset('admin/css/map.css')}}">
        <style>
            h1 h2 h3 h4 h5 h6{
                color: black;
            }
            label{
                color:black;
                font-weight:bold;
            }
            .card {
                box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
            }
        </style>
    @endsection
@section('content')
<div class="content">
    <div class="container">  
      <div class="row"> 
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success">
              <h4 class="card-title">Lot</h4>
              <p class="card-category">Add your property here</p>
            </div>
            <div class="card-body">
                <form action="{{route('user.lot.store')}}" method="POST" enctype="multipart/form-data" class="appendForm" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="contact_number" value="{{Auth::user()->contact_number}}">
                            <label for="" style="color:black">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your Property Name"> 
                            <span class="errormessage"> @error('name'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Category</label>
                            <select name="category_id" id="category" class="form-select" onchange="getSelectedCategory();"> {{-- onchange="getSelectedCategory();" --}}
                                {{-- <option value="" disabled selected>SELECT CATEGORY</option> --}}
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach'
                            </select>
                            <span class="errormessage"> @error('category_id'){{$message}}  @enderror</span>
                         </div>
                        <div class="col-md-6 mb-3" >
                            <label for=""style="color:black">Classification</label>
                            <select name="classification_id" id="" class="form-select" >
                                <option value="" disabled selected>CLASSIFICATION</option>
                                @foreach ($classification as $classification)
                                    <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                @endforeach
                            </select>
                            <span class="errormessage"> @error('classification_id'){{$message}}  @enderror</span>
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
                        <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Land Size</label>
                            <input type="number" class="form-control" name="land_size" value="{{ old('land_size') }}" placeholder="In square meter">
                            <span class="errormessage"> @error('land_size'){{$message}} @enderror </span>
                        </div>                        
                        <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="How much is your property?">
                            <span class="errormessage"> @error('price'){{$message}} @enderror </span>
                        </div> 
                        <div class="col-md-12 mb-3">
                            <label for=""style="color:black">Description</label>
                            <textarea name="description" class="form-control" rows="3" value="{{ old('description') }}" placeholder="Short description of your property"></textarea>
                            <span class="errormessage"> @error('description'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Property Picture</label>
                            <input type="file" class="form-control" name="photo" value="{{ old('photo') }}">          
                            <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Property Images</label>
                            <input type="file" class="form-control" name="file[]" value="{{ old('file') }}" multiple>          
                            <span class="errormessage"> @error('file'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for=""style="color:black">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Garcia St. Poblacion, Alaminos City">
                            <span class="errormessage"> @error('address'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for=""style="color:black">Latitude</label>
                            <input type="text" id="latitude" class="form-control" name="latitude" value="{{ old('latitude') }}" placeholder="Latitude">
                            <span class="errormessage"> @error('latitude'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                           <label for=""style="color:black">Longitude</label>
                           <input type="text" id="longitude" class="form-control" name="longitude" value="{{ old('longitude') }}" placeholder="Longitude">
                           <span class="errormessage"> @error('longitude'){{$message}}  @enderror</span>                
                       </div>   
                       <div class="col-md-12 mt-3">
                            <h4 class="text-warning">Drag the Marker in the Google Map below to pinpoint your Property Location.</h4>
                            <p class="text-danger">The Marker will get the Address, Latitude, and Longitude of your Property</p>
                        </div>                   
                         <div id="myMap" class="col-md-12"></div>  <!-- This is the map viewer -->
                         <div class="col-md-12 mt-3">
                            <label for="">Nearby Places/Landmarks:</label>                                
                            <input type="text" class="form-control" name="landmark" placeholder="Enter 2 or 3 or More Landmarks">               
                            <span class="errormessage"> @error('landmark'){{$message}}  @enderror</span>                 
                        </div>                      
                         <div class="col-md-12 mb-3 mt-3">
                            <button type="submit" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);"   class="btn btn-lg btn-primary">Submit Property</button>
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
