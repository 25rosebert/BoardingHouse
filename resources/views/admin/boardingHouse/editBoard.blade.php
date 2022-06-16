@extends('layouts.admin')
    @section('css')
        {{-- <link rel="stylesheet" href="{{asset('admin/css/map.css')}}"> --}}
    @endsection
@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}" aria-disabled="true" style="text-decoration: none;" class="text-muted">Edit Boarding House</a></li>
        </ol>
      </nav>
    <a href="{{route('allProperties')}}" class="btn btn-danger btn-sm">Back</a>
    <div class="container-fluid">  
      <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit/Update Boarding House</h4>
                  <p class="card-category">Edit and Update your properties here</p>
                </div>
                <div class="card-body">
                    <form action="{{url('update boarding/'.$properties->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                          <div class="row">
                            <input type="hidden" name="user_id" value="{{$properties->user_id}}">
                            <input type="hidden" name="contact_number" value="{{$properties->phone}}">
                            <div class="col-md-6 mb-3">
                                <label for="">Selected_Category</label>
                                <select name="category_id" id="" class="form-select" >
                                    {{-- <option value="">SELECT CATEGORY</option> --}}
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="errormessage"> @error('category_id'){{$message}}  @enderror</span>
                             </div>
                             <div class="col-md-6 mb-3">
                                <label for="">Classification</label>
                                <select name="classification_id" id="" class="form-select" >
                                    <option value="">SELECT TYPE</option>
                                    @foreach ($classification as $classification)
                                        <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                    @endforeach
                                </select>
                                <span class="errormessage"> @error('classification_id'){{$message}}  @enderror</span>
                             </div>
                              <div class="col-md-4 mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select" >
                                    <option value="">PROPERTY STATUS</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id}}">{{$status->status}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red"> @error('status'){{$message}}  @enderror</span>
                             </div>      
                              <div class="col-md-12 mb-3">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" name="name" value="{{$properties->name}}"> 
                                  <span class="errormessage"> @error('name'){{$message}}  @enderror</span>
                              </div>
                                {{-- Boarding House  --}}
                                @if ($properties->boardinghouses)
                                    @foreach ($properties->boardinghouses as $boarrdinghouse)
                                    <div class="col-md-3 mb-3">
                                        <label for="">Total Number of Beds</label>
                                        <input type="number" class="form-control" name="bed" value="{{$boarrdinghouse->bed}}" placeholder="Total number of Bedrooms">          
                                        <span class="errormessage"> @error('bed'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Total Rooms</label>
                                        <input type="number" class="form-control" name="room" value="{{$boarrdinghouse->rooms}}" placeholder="Total number of Bedrooms">          
                                        <span class="errormessage"> @error('room'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Comfort Room</label>
                                        <input type="number" class="form-control" name="comfortroom" value="{{$boarrdinghouse->comfortroom}}" placeholder="Total number of Comfort rooms">          
                                        <span class="errormessage"> @error('comfortroom'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Living Room</label>
                                        <input type="number" class="form-control" name="livingroom" value="{{$boarrdinghouse->livingroom}}" placeholder="Total number of Living rooms">          
                                        <span class="errormessage"> @error('livingroom'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Kitchen</label>
                                        <input type="number" class="form-control" name="kitchen" value="{{$boarrdinghouse->kitchen}}" placeholder="How Many kitchens do you have in your property">          
                                        <span class="errormessage"> @error('kitchen'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Floor Total</label>
                                        <input type="number" class="form-control" name="floor_total" value="{{$boarrdinghouse->floor_total}}" placeholder="Total House floor">          
                                        <span class="errormessage"> @error('floor_total'){{$message}}  @enderror</span>                
                                    </div>
                                    
                                <div class="col-md-3 mb-3">
                                    <label for="">Floor Area</label>
                                    <input type="number" name="floor_area" id="" class="form-control" value="{{$boarrdinghouse->floor_area}}" placeholder="In square meter">
                                    <span class="errormessage"> @error('floor_area'){{$message}}  @enderror</span>
                                </div>
                                    @endforeach
                                @endif
                                {{-- End of House and Lot Form --}}
                                <div class="col-md-3 mb-3">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$properties->price}}"  placeholder="in pesos">
                                    <span class="errormessage"> @error('price'){{$message}}  @enderror</span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="3" >{{$properties->description}}</textarea>
                                    <span class="errormessage"> @error('description'){{$message}}  @enderror</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Business Permit</label>
                                    <input type="file" class="form-control" name="permit">             
                                    <span class="errormessage"> @error('permit'){{$message}}  @enderror</span>                
                                </div>
                                    @if($properties->business_permit)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{asset('assets/upload/permits/'.$properties->business_permit)}}" class="mt-5" style="max-height: 150px; max-width:150px" alt="Image">
                                    </div>
                                @endif
                                <div class="col-md-6 mb-3">
                                    <label for="">Images</label>
                                    <input type="file" class="form-control" name="photo">          
                                    <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->image)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="mt-5" style="max-height: 150px; max-width:150px" alt="Image">     
                                    </div>
                                @endif          
                                <div class="col-md-6 mb-3">
                                    <label for="">More Images</label>
                                    <input type="file" class="form-control" name="file[]" multiple placeholder="Change your poperty images, OPTIONAL">          
                                    <span class="errormessage"> @error('file'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->images)
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
@push('script')
{{-- <script src="{{asset('admin/js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDny2vom6IhoSwID3rQtkkeOxA2KgpVTg&callback=initMap"
async></script>  --}}
@endpush





 