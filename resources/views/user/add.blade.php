@extends('layouts.app')

@section('content')
{{-- <link rel="stylesheet" href="{{asset("admin/css/material-dashboard.css")}}"> --}} --}}
{{-- <link rel="stylesheet" href="{{asset('admin/css/material-dashboard.min.css')}}"> --}}

<div class="content">
    <div class="container-sm">
        @include('layouts.inc.flashMessage')        
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Create New Property</h4>
              <p class="card-category">Add your property here</p>
            </div>
            <div class="card-body">
                <a href="{{route('myProperties')}}" class="btn btn-danger btn-sm float-end">Back</a>
                <form action="{{url('saving property')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="contact_number" value="{{Auth::user()->contact_number}}">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Property Name"> 
                            <span style="color: red"> @error('name'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                           <select name="category_id" id="" class="form-select" >
                               <option value="">SELECT CATEGORY</option>
                               @foreach ($category as $category)
                                   <option value="{{ $category->id}}">{{$category->name}}</option>
                               @endforeach
                           </select>
                           <span style="color: red"> @error('category_id'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select name="classification_id" id="" class="form-select" >
                                <option value="">CLASSIFICATION</option>
                                @foreach ($classification as $classification)
                                    <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                @endforeach
                            </select>
                            <span style="color: red"> @error('classification_id'){{$message}}  @enderror</span>
                         </div>
                         
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Short description of your property"></textarea>
                            <span style="color: red"> @error('description'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="in pesos">
                            <span style="color: red"> @error('price'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Floor Area</label>
                            <input type="number" name="floor_area" id="" class="form-control"  placeholder="In square meter">
                            <span style="color: red"> @error('floor_area'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Floor Total</label>
                            <input type="number" name="floor_total" id="" class="form-control" placeholder="Total number of floor building">
                            <span style="color: red"> @error('floor_total'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Land Size</label>
                            <input type="number" class="form-control" name="land_size" placeholder="In square meter">
                            <span style="color: red"> @error('land_size'){{$message}} @enderror </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Business Permit</label>
                            <input type="file" class="form-control" name="image">            
                            <span style="color: red"> @error('image'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Property Image</label>
                            <input type="file" class="form-control" name="photo">          
                            <span style="color: red"> @error('photo'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-12 mb-3">
                            <label for="">More Images</label>
                            <input type="file" class="form-control" name="file[]" multiple>          
                            <span style="color: red"> @error('file'){{$message}}  @enderror</span>                
                         </div>
                         <div class="col-md-12 mt-3">
                            <h4>Drag the Marker in the Google Map below to pinpoint your Property Location.</h4>
                            <p>The Marker will get the Address, Latitude, and Longitude of your Property</p>
                         </div>
                         <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <input type="text" class="form-control" id="address" name="address"placeholder="Garcia St. Poblacion, Alaminos City">
                            <span style="color: red"> @error('address'){{$message}}  @enderror</span>
                        </div>
                         <div class="col-md-3 mb-3">
                            <label for="">Latitude</label>
                            <input type="text" id="latitude" class="form-control" name="latitude" placeholder="Latitude">
                            <span style="color: red"> @error('latitude'){{$message}}  @enderror</span>                
                        </div>
                        <div class="col-md-3 mb-3">
                           <label for="">Longitude</label>
                           <input type="text" id="longitude" class="form-control" name="longitude" placeholder="Longitude">
                           <span style="color: red"> @error('longitude'){{$message}}  @enderror</span>                
                       </div>                      
                         <div id="myMap" class="col-md-12"></div>  <!-- This is the map viewer -->
                         <div class="col-md-12 mb-3 mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Create</button>
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

{{-- <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}"></script> --}}

