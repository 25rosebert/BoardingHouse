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
    {{-- <div class="section"> --}}
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title ">House and Lot</h3>
                        <p class="card-category">Add your property here</p>
                      </div>
                    <div class="card-body">
                        <form action="{{route('user.houseandolot.store')}}" method="POST" enctype="multipart/form-data" class="appendForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="contact_number" value="{{Auth::user()->contact_number}}">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Your Property Name">
                                <span class="errormessage"> @error('name'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Selected Category</label>
                                <select name="category_id" id="" value="{{ old('category_id') }}" class="form-select">
                                    @foreach ($category as $selectedCategory)
                                        <option value="{{$selectedCategory->id}}">{{$selectedCategory->name}}</option>
                                    @endforeach
                                </select>
                                <span class="errormessage"> @error('category_id'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Classification</label>
                                <select name="classification_id" id="" value="{{ old('classification_id') }}" class="form-select">
                                    <option value="" disabled selected>SELECT WHAT DO YOU WANT FOR YOUR PROPERTY</option>
                                    @foreach ($classification as $classification)
                                        <option value="{{$classification->id}}">{{$classification->type}}</option>
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
                            <div class="col-md-3 mb-3">
                                <label for="">Bedroom</label>
                                <input type="number" name="bedroom" class="form-control" value="{{ old('bedroom') }}" placeholder="Total Bedroom in your House">
                                <span class="errormessage"> @error('bedroom'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Living Room</label>
                                <input type="number" name="livingroom" class="form-control" value="{{ old('livingroom') }}" placeholder="Total Living room in your House">
                                <span class="errormessage"> @error('livingroom'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Comfort Room</label>
                                <input type="number" name="comfortroom" class="form-control" value="{{ old('comfortroom') }}" placeholder="Total Comfort Room in your House">
                                <span class="errormessage"> @error('comfortroom'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Kitchen</label>
                                <input type="number" name="kitchen" class="form-control" value="{{ old('kitchen') }}" placeholder="TOtal kitchen in your house">
                                <span class="errormessage"> @error('kitchen'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Floor Total</label>
                                <input type="number" name="floor_total" class="form-control" value="{{ old('floor_total') }}" placeholder="Total Floor of house">
                                <span class="errormessage"> @error('floor_total'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Parking Lot</label>
                                <input type="number" name="parkinglot" class="form-control" value="{{ old('parkinglot') }}" placeholder="Total number of parking">
                                <span class="errormessage"> @error('parkinglot'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">             
                                <label for="">Land Size</label>
                                <input type="number" name="land_size" class="form-control" value="{{ old('land_size') }}" placeholder="Total land Area">
                                <span class="errormessage"> @error('land_size'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="How much is your house">
                                <span class="errormessage"> @error('price'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" value="{{ old('description') }}" placeholder="Write a short description of your property" rows="3"></textarea>
                                <span class="errormessage"> @error('description'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Business Permit <span style="color: grey">Optional...</span></label>
                                <input type="file" name="permit" value="{{ old('permit') }}" class="form-control">
                                <span class="errormessage"> @error('permit'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Property Picture <span style="color:grey">Main Picture of your property</span></label>
                                <input type="file" name="photo" id="" value="{{ old('photo') }}" class="form-control">
                                <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Additional Images <span style="color:grey">You can add one or more images</span></label>
                                <input type="file" name="file[]" value="{{ old('file') }}" id="" class="form-control" multiple>
                                <span class="errormessage"> @error('file'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Floor Area</label>
                                <input type="number" name="floor_area" class="form-control" value="{{ old('floor_area') }}" placeholder="Input the house area, in Square centimeter">
                                <span class="errormessage"> @error('floor_area'){{$message}}  @enderror</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Garcia St. Poblacion, Alaminos City">
                                <span class="errormessage"> @error('address'){{$message}}  @enderror</span>
                            </div>
                             <div class="col-md-3 mb-3">
                                <label for="">Latitude</label>
                                <input type="text" id="latitude" class="form-control" name="latitude" value="{{ old('latitude') }}" placeholder="Latitude">
                                <span class="errormessage"> @error('latitude'){{$message}}  @enderror</span>                
                            </div>
                            <div class="col-md-3 mb-3">
                               <label for="">Longitude</label>
                               <input type="text" id="longitude" class="form-control" name="longitude" value="{{ old('longitude') }}" placeholder="Longitude">
                               <span class="errormessage"> @error('longitude'){{$message}}  @enderror</span>                
                           </div>   
                           <div class="col-md-12 mt-3">
                                <h4 class="text text-warning">Drag the Marker in the Google Map below to pinpoint your Property Location.</h4>
                                <p class="text-danger">The Marker will get the Address, Latitude, and Longitude of your Property</p>
                            </div>                   
                             <div id="myMap" class="col-md-12"></div>  <!-- This is the map viewer -->
                            <div class="col-md-12 mt-3">
                                <label for="">Nearby Places/Landmarks:</label>                                
                                <input type="text" class="form-control" name="landmark" placeholder="Enter 2 or 3 or More Landmarks">               
                                <span class="errormessage"> @error('landmark'){{$message}}  @enderror</span>                                 
                            </div>                            
                            <div class="col-md-12 mb-3 mt-3">
                                <button type="submit" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);" class="btn btn-primary btn-lg">Submit Property                                                                    </button>
                             </div>
                        </div>
                        </form>
                    </div>            
                </div>
               </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection
@push('script')
<script src="{{asset('admin/js/scriptMap.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAO-4UmaTreS3qqOwnxHIPltCjoFdLYoOs&callback=initMap"
async></script> 
    
@endpush
