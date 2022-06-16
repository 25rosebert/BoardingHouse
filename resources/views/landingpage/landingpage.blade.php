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
<div class="py-5">
    <div class="container pt-5" style="height: 90vh">    
        <div class="row">
            <h2>Featured Properties</h2>
            <div class="owl-carousel owl-theme mb-5">            
                @foreach ($houseandlot as $house)
                    <div class="ms-2 me-2">
                        <a href="{{route('view.details',['id'=>$house->id,'catID'=>$house->category_id])}}" class="homie text-black" style="text-decoration: none">
                        <div class="card mb-2 shadow-sm homie" style="display: flex; justify-content:center">
                            <img class="card-img-top" src="{{asset('assets/upload/images/'.$house->image)}}" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$house->name}}</h5>
                                <span class="float-start">{{$house->category->name}}</span>
                                <span class="float-end ">₱{{number_format($house->price)}}</span>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
            </div> 
        </div>      
    </div>
</div>
<div class="container">
    <h2>All Properties</h2>
    <div class="row" style="display: flex;
    justify-content:center">

        @foreach ($property as $properties)
        <div class="col-lg-3 center-block mb-4">
            <div class="card" style="height:400px; width:280px;">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{asset('assets/upload/images/'.$properties->image)}}" class="img-fluid" style="height:200px; width:100%">
                <a href="!#">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                    <h5 class="card-title mb-2">{{$properties->name}}</h5>
                    <span class="float-start">{{$properties->category->name}}</span>
                    <span class="float-end text-success text-shadow" style="font-size:16px; font-weight:bold"><b>₱ {{number_format($properties->price)}}  </b></span>                                        
                    <div class="mt-5">
                        <a href="{{route('view.details',['id'=>$properties->id,'catID'=>$properties->category_id])}}" class="btn btn-primary homie">View Details</a>
                        @if ($properties->status === 4)
                            <p class="float-end mt-1 text-light text-shadow badge bg-success" style="font-size: 16px">Available</p>
                        @elseif($properties->status === 5)
                            <p class="float-end mt-1 text-light text-shadow badge bg-dark" style="font-size: 16px">Unavailable</p>
                        @elseif ($properties->status === 6)
                            <p class="float-end mt-1 text-light text-shadow badge bg-danger" style="font-size: 16px">Sold</p>
                        @else
                            <p class="float-end mt-1 badge-md text-danger">null</p>
                        @endif
                    </div>
                    <div class="">
                        @if ($properties->category->slug === 'House & Lot')        
                        <div class="listing-detail">
                            {{-- <div class="col-md-12"> --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-12 mt-2 mb-0"> --}}
                                        Bedrooms: <span class="text-success fw-bold">{{$properties->houseandlot->bedroom}}</span><br>
                                        Area: <span class="text-success fw-bold">{{$properties->houseandlot->floor_area}}㎡</span>
                                        {{-- Living Room: <span class="text-success fw-bold">{{$properties->houseandlot->livingroom}}</span>                                     --}}
                                    {{-- </div>                                     --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </div>  
                      @elseif ($properties->category->slug === 'Boarding House')
                        <div class="listing-detail">
                            {{-- <div class="col-md-12"> --}}
                                {{-- <div class="row"> --}}
                                    {{-- <div class="col-md-12 mt-2 mb-0"> --}}
                                        Beds: <span class="text-success fw-bold">{{$properties->boardinghouse->bed}}</span><br>
                                        Rooms: <span class="text-success fw-bold">{{$properties->boardinghouse->rooms}}</span>
                                        {{-- Living Room: <span class="text-success fw-bold">{{$properties->houseandlot->livingroom}}</span>                                     --}}
                                    {{-- </div>                                     --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        </div>  
          
                      @else
                        <div class="mt-2">
                          {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Land Size">{{$properties->lot->land_size}}</span>  --}}
                          Land Size: <span class="text-success fw-bold">{{$properties->lot->land_size}}㎡</span>
                        </div>  
                      @endif
                    </div>

              </div>
            </div>
          </div>
        @endforeach
    </div>
        {{ $property->links('vendor.pagination.simple-tailwind') }}
</div>

  <!-- Categories -->
  <div class="container mt-5">
      <h2>Categories</h2>
    <div class="owl-carousel owl-theme mb-5">
        @foreach ($category as $category)
            <div class="ms-2 me-2">
               {{-- <a href="{{route('view.categories' ,$category->slug)}}" class=""> --}}
                    <div class="card shadow-sm mb-2" style="height:400px">
                        <img class="card-img-top" src="{{asset('assets/upload/category/'.$category->image)}}" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$category->name}}</h5>
                            <span class="">{{$category->description}}</span>
                            <div class="">
                                <a href="{{route('view.categories' ,$category->slug)}}" class="btn btn-success homie">View Category</a>
                            </div>
                        </div>
                    </div>
               {{-- </a> --}}
            </div>
        @endforeach
    </div> 
</div>
@endsection
@push('script')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
<script>
    var botmanWidget = {
        aboutText: 'Properties Finder',
        introMessage: "✋ Hi! Im From Properties Finder"
    };
</script>

<script>
    //for tooltip
    $(function(){
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endpush
