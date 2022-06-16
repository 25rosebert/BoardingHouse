@extends('layouts.userApp')

@section('content')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@include('layouts.inc.carousel')
<section class="banner mt-0 py-3">
   {{-- <div class="container"> --}}
    <div class="row mt-3 d-flex justify-content-center align-items-center">
        <div class="col-md-8 mt-5">
            <div class="search"> <i class="fa fa-search"></i> 
                <form action="{{route('search')}}" method="GET" role="search">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Search Properties..."> <button class="btn btn-primary">Search</button> 
                </form>
            </div>
        </div>
    </div>
{{-- </div> --}}
</section>
@if ($property->isNotEmpty())
<div class="container">
  <h2>Search Results</h2>
  <div class="row">
      @foreach ($property as $properties)
      <div class="col-lg-3 col-md-12 mb-4">
          <div class="card" style="height:370px; width:280px;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="img-fluid" style="height:200px; width:100%">
              <a href="!#">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$properties->name}}</h5>
                  <span class="float-start">{{$properties->category->name}}</span>
                  <span class="float-end text-warning"><b>₱{{number_format($properties->price)}}  </b></span>
                  <div class="mt-5">
                      <a href="{{route('view.details',['id'=>$properties->id,'catID'=>$properties->category_id])}}" class="homie btn btn-primary">View Details</a>
                  </div>
            </div>
          </div>
        </div>
      @endforeach
  </div>
  {{ $property->links('vendor.pagination.simple-tailwind') }}
</div>
@else
    <div class="py-5 mt-5 mb-5 px-5">
        <h3 class="text-center text-danger">No Resuls have ben found</h3>
    </div>
@endif
@endsection

