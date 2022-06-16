@extends('layouts.app')
    @section('css')
        {{-- <link rel="stylesheet" href="{{asset('admin/css/map.css')}}"> --}}
         <style>
          h1,h2,h3,h4,h5,h6{
                color: yellow;
                text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
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
    {{-- <a href="{{route('allProperties')}}" style="float: right" class="btn btn-danger btn-sm">Back</a> --}}
    <div class="container">  
      <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger">
                  <h4 class="card-title ">Update Lot</h4>
                  <p class="card-category">Edit and Update your properties here</p>
                </div>
                <div class="card-body">
                    <form action="{{url('update this lot/'.$properties->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                          <div class="row">
                            <input type="hidden" name="user_id" value="{{$properties->user_id}}">
                            <input type="hidden" name="contact_number" value="{{$properties->phone}}">
                             <div class="col-md-12 mb-3">
                                  <label for="">Name</label>
                                  <input type="text" class="form-control" name="name" value="{{$properties->name}}"> 
                                  <span style="color: red"> @error('name'){{$message}}  @enderror</span>
                              </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Selected_Category</label>
                                <select name="category_id" id="" class="form-select" >
                                    {{-- <option value="">SELECT CATEGORY</option> --}}
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red"> @error('category_id'){{$message}}  @enderror</span>
                             </div>
                             <div class="col-md-6 mb-3">
                                <label for="">Classification</label>
                                <select name="classification_id" id="" class="form-select" >
                                    <option value="">SELECT TYPE</option>
                                    @foreach ($classification as $classification)
                                        <option value="{{ $classification->id}}">{{$classification->type}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red"> @error('classification_id'){{$message}}  @enderror</span>
                             </div>
                             <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select" >
                                    <option value="">PROPERTY STATUS</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id}}">{{$status->status}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red"> @error('status'){{$message}}  @enderror</span>
                             </div>                        
                                {{-- Lot Form --}}
                                @if ($properties->lot)
                                    @foreach ($properties->lots as $lot)                                    
                                        <div class="col-md-3 mb-3">
                                            <label for="">Land Size</label>
                                                <input type="number" name="land_size" id="" class="form-control" value="{{$lot->land_size}}" placeholder="In square meter">
                                            <span style="color: red"> @error('land_size'){{$message}}  @enderror</span>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- End of Lot Form --}}
                                <div class="col-md-3 mb-3">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$properties->price}}"  placeholder="in pesos">
                                    <span style="color: red"> @error('price'){{$message}}  @enderror</span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="3" >{{$properties->description}}</textarea>
                                    <span style="color: red"> @error('description'){{$message}}  @enderror</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Images</label>
                                    <input type="file" class="form-control" name="photo">          
                                    <span style="color: red"> @error('photo'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->image)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="mb-3" style="max-height: 120px; max-width:120px" alt="Image">     
                                    </div>
                                @endif          
                                <div class="col-md-6 mb-3">
                                    <label for="">More Images</label>
                                    <input type="file" class="form-control" name="file[]" multiple placeholder="Change your poperty images, OPTIONAL">          
                                    <span style="color: red"> @error('file'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->images)
                                    @foreach ($properties->images as $images)
                                        <img src="{{asset('assets/upload/properties/'.$images->images)}}" class="mb-3" alt="Images" style="max-width: 120px; max-height: 120px ">
                                    @endforeach
                                @endif                     
                                <div class="col-md-12 mb-3">
                                    <button type="submit" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);" class="btn btn-danger btn-lg">Update Property</button>
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





 