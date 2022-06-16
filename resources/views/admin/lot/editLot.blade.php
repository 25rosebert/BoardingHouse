@extends('layouts.admin')
    @section('css')
        {{-- <link rel="stylesheet" href="{{asset('admin/css/map.css')}}"> --}}
    @endsection
@section('content')
<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none color:blue"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('lot')}}" aria-disabled="true" style="text-decoration: none;" class="text-muted">Edit Property Lot</a></li>
        </ol>
      </nav>
    <a href="{{route('allProperties')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
    <div class="container-fluid">  
      <div class="row"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Edit Lot Details</h4>
                  <p class="card-category">Edit and Update your properties here</p>
                </div>
                <div class="card-body">
                    <form action="{{url('update lot/'.$properties->id)}}" method="POST" enctype="multipart/form-data" >
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
                                {{-- Lot Form --}}
                                @if ($properties->lots)
                                    @foreach ($properties->lots as $lot)                                    
                                        <div class="col-md-3 mb-3">
                                            <label for="">Land Size</label>
                                                <input type="number" name="land_size" id="" class="form-control" value="{{$lot->land_size}}" placeholder="In square meter">
                                            <span class="errormessage"> @error('land_size'){{$message}}  @enderror</span>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- End of Lot Form --}}
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
                                    <label for="">Images</label>
                                    <input type="file" class="form-control" name="photo">          
                                    <span class="errormessage"> @error('photo'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->image)
                                    <div class="col-md-6 mb-3">
                                        <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="mb-3" style="max-height: 120px; max-width:120px" alt="Image">     
                                    </div>
                                @endif          
                                <div class="col-md-6 mb-3">
                                    <label for="">More Images</label>
                                    <input type="file" class="form-control" name="file[]" multiple placeholder="Change your poperty images, OPTIONAL">          
                                    <span class="errormessage"> @error('file'){{$message}}  @enderror</span>                
                                </div>
                                @if ($properties->images)
                                    @foreach ($properties->images as $images)
                                        <img src="{{asset('assets/upload/properties/'.$images->images)}}" class="mb-3" alt="Images" style="max-width: 120px; max-height: 120px ">
                                    @endforeach
                                @endif                     
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-info">Update</button>
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





 