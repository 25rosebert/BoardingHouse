@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset("admin/css/material-dashboard.css")}}">
<link rel="stylesheet" href="{{asset('admin/css/material-dashboard.min.css')}}">
<div class="content">
    <div class="container-sm">
        <a href="{{route('myProperties')}}" class="btn btn-danger btn-sm">Back</a>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Edit/Update Property</h4>
              <p class="card-category">Edit and Update your properties here</p>
            </div>
            <div class="card-body">
                <form action="{{url('update property/'.$properties->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <input type="hidden" name="user_id" value="{{$properties->user_id}}">
                              <input type="hidden" name="contact_number" value="{{$properties->phone}}">
                              <label for="">Name</label>
                              <input type="text" class="form-control" name="name" value="{{$properties->name}}"> 
                              <span style="color: red"> @error('name'){{$message}}  @enderror</span>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="">Address</label>
                              <input type="text" class="form-control" name="address" value="{{$properties->address}}" placeholder="Garcia St. Poblacion, Alaminos City">
                              <span style="color: red"> @error('address'){{$message}}  @enderror</span>
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
                                  <option value="">SELECT TYPE</option>
                                  @foreach ($classification as $classification)
                                      <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                  @endforeach
                              </select>
                              <span style="color: red"> @error('category_id'){{$message}}  @enderror</span>
                           </div>
                          <div class="col-md-12 mb-3">
                              <label for="">Description</label>
                              <textarea name="description" class="form-control" rows="3" >{{$properties->description}}</textarea>
                              <span style="color: red"> @error('description'){{$message}}  @enderror</span>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="">Price</label>
                              <input type="number" class="form-control" name="price" value="{{$properties->price}}"  placeholder="in pesos">
                              <span style="color: red"> @error('price'){{$message}}  @enderror</span>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="">Floor Area</label>
                              <input type="number" name="floor_area" id="" class="form-control" value="{{$properties->floor_area}}" placeholder="In square meter">
                              <span style="color: red"> @error('floor_area'){{$message}}  @enderror</span>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="">Floor Total</label>
                              <input type="number" name="floor_total" id="" class="form-control" value="{{$properties->floor_total}}" placeholder="Total number of floor building">
                              <span style="color: red"> @error('floor_total'){{$message}}  @enderror</span>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="">Land Size</label>
                              <input type="number" class="form-control" name="land_size" value="{{$properties->land_size}}" placeholder="In square meter">
                              <span style="color: red"> @error('land_size'){{$message}} @enderror </span>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="">Business Permit</label>
                              <input type="file" class="form-control" name="image">             
                              <span style="color: red"> @error('image'){{$message}}  @enderror</span>                
                          </div>
                            @if($properties->business_permit)
                              <div class="col-md-6 mb-3">
                                {{-- <form action="/delete_permit/{{$properties->business_permit}}" method="post">
                                    <button class="btn text-danger">x</button>
                                    @csrf
                                    @method('delete')
                                </form> --}}
                                <img src="{{asset('assets/upload/images/'.$properties->business_permit)}}" class="mt-5" style="max-height: 150px; max-width:150px" alt="Image">
                              </div>
                           @endif
                          <div class="col-md-6 mb-3">
                              <label for="">Images</label>
                              <input type="file" class="form-control" name="photo">          
                              <span style="color: red"> @error('photo'){{$message}}  @enderror</span>                
                          </div>
                           @if ($properties->image)
                              <div class="col-md-6 mb-3">
                                {{-- <form action="{{route('deletePropertyImage',[$properties->id])}}" method="POST"> --}}
                                 {{-- <form action="delete property image/{{$properties->id}}" method="GET" >   
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete This property Image?')" type="submit">x</button>
                                    @csrf
                                    @method('delete')
                                </form> --}}
                                <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="mt-5" style="max-height: 150px; max-width:150px" alt="Image">     
                              </div>
                          @endif          
                          <div class="col-md-6 mb-3">
                            <label for="">More Images</label>
                            <input type="file" class="form-control" name="file[]" multiple>          
                            <span style="color: red"> @error('photo'){{$message}}  @enderror</span>                
                          </div>
                            @if($properties->images)
                                @foreach ($properties->images as $images)
                                    <img src="{{asset('assets/upload/properties/'.$images->images)}}" alt="Images" style="max-width: 150px; max-height: 150px ">
                                @endforeach
                            @endif
                          <div class="col-md-12 mb-3">
                              <button type="submit" class="btn btn-primary">Update</button>
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