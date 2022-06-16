@extends('layouts.admin')
    @section('css')
        {{-- <link rel="stylesheet" href="{{asset('admin/css/map.css')}}"> --}}
    @endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="#" aria-disabled="true" style="text-decoration: none;" class="text-muted">Edit House and Lot</a></li>
            </ol>
          </nav>
    <a href="{{route('allProperties')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
    <div class="container-fluid">  
      <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Edit/Update Property</h4>
                  <p class="card-category">Edit and Update your properties here</p>
                </div>
                <div class="card-body">
                    <form action="{{url('update houseandlot/'.$properties->id)}}" method="POST" enctype="multipart/form-data" >
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
                              <div class="col-md-9 mb-3">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" name="name" value="{{$properties->name}}"> 
                                  <span class="errormessage"> @error('name'){{$message}}  @enderror</span>
                              </div>
                                {{-- House And Lot Form --}}
                                @if ($properties->houseandlots)
                                    @foreach ($properties->houseandlots as $houseandlot)
                                    <div class="col-md-3 mb-3">
                                        <label for="">Bed Room</label>
                                        <input type="number" class="form-control" name="bedroom" value="{{$houseandlot->bedroom}}" placeholder="Total number of Bedrooms">          
                                        <span class="errormessage"> @error('bedroom'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Comfort Room</label>
                                        <input type="number" class="form-control" name="comfortroom" value="{{$houseandlot->comfortroom}}" placeholder="Total number of Comfort rooms">          
                                        <span class="errormessage"> @error('comfortroom'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Living Room</label>
                                        <input type="number" class="form-control" name="livingroom" value="{{$houseandlot->livingroom}}" placeholder="Total number of Living rooms">          
                                        <span class="errormessage"> @error('livingroom'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Kitchen</label>
                                        <input type="number" class="form-control" name="kitchen" value="{{$houseandlot->kitchen}}" placeholder="How Many kitchens do you have in your property">          
                                        <span class="errormessage"> @error('kitchen'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Floor Total</label>
                                        <input type="number" class="form-control" name="floor_total" value="{{$houseandlot->floor_total}}" placeholder="Total House floor">          
                                        <span class="errormessage"> @error('floor_total'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Parking Lot</label>
                                        <input type="number" class="form-control" name="parkinglot" value="{{$houseandlot->parking_lot}}" placeholder="Number of Parking lot">          
                                        <span class="errormessage"> @error('parkinglot'){{$message}}  @enderror</span>                
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Land Size</label>
                                        <input type="number" class="form-control" name="land_size" value="{{$houseandlot->land_size}}" placeholder="In squre meter">          
                                        <span class="errormessage"> @error('land_size'){{$message}}  @enderror</span>                
                                    </div>
                                        <div class="col-md-3 mb-3">
                                    <label for="">Floor Area</label>
                                    <input type="number" name="floor_area" id="" class="form-control" value="{{$houseandlot->floor_area}}" placeholder="In square meter">
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
                                        {{-- <form action="/delete_permit/{{$properties->business_permit}}" method="post">
                                            <button class="btn text-danger">x</button>
                                            @csrf
                                            @method('delete')
                                        </form> --}}
                                        <label for="" class="text text-warning">Current Permit</label>
                                        <img src="{{asset('assets/upload/permits/'.$properties->business_permit)}}" class="mb-3" style="max-height: 120px; max-width:120px" alt="Image">
                                    </div>
                                @endif
                                <div class="col-md-6 mb-3">
                                    <label for="" class="text text-danger">Do You want to Update your Property photo?</label>
                                    <input type="file" class="form-control" name="photo">          
                                    <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->image)
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="text text-warning">Current Image </label>
                                        <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="mb-3" style="max-height: 120px; max-width:120px" alt="Image">     
                                    </div>
                                @endif          
                                <div class="col-md-6 mb-3">
                                    <label for="" class="text text-danger">Do you want to change the current Images? if yes, Click Down Here</label>
                                    <input type="file" class="form-control" name="file[]" multiple placeholder="Change your poperty images, OPTIONAL">          
                                    <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>                
                                </div>
                               <div class="col-md-12">
                                @if ($properties->images)
                                <label for="images" class="text text-warning">Current Images</label>
                                    @foreach ($properties->images as $images)
                                        <img src="{{asset('assets/upload/properties/'.$images->images)}}" id="images" class="mb-3" style="max-height: 120px; max-width:120px" alt="Image">
                                    @endforeach
                                @endif                     
                               </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-warning">Update</button>
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





 