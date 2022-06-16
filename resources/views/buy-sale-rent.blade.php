@extends('layouts.base')

@section('content')
@include('layouts.inc.usersNav')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
</div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">

    <div class="row">
      <div class="col-lg-3 col-sm-4 ">

        <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
          <input type="text" class="form-control" placeholder="Search of Properties">
      <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-7">
                <select class="form-control">
                    <option>Price</option>
                    <option>PHP 500 - PHP 50,000</option>
                    <option>PHP 51,000 - PHP 100,000</option>
                    <option> PHP100,000 - PHP 500,000</option>
                    <option>PHP 500,000 - above</option>
                </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <option>Property Type</option>
                <option>House and Lot</option>
                  <option>Boarding House</option>
                  <option>Apartment</option>
                  <option>Lot</option>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>  



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
      <div class="row">
         {{-- @foreach ($properties->images as $item) --}}
         <div class="col-lg-4 col-sm-5"><img src="" class="img-responsive img-circle" alt="properties"></div>
         <div class="col-lg-8 col-sm-7">
         <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
         <p class="price">$300,000</p> </div>
         {{-- @endforeach --}}
      </div>
</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100</div>
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
  <div class="row">
    @foreach ($properties as $properties)
        <!-- properties -->
     <div class="col-lg-4 col-sm-6">
        <div class="properties">
          <div class="image-holder"><img src="{{asset('assets/upload/images/'.$properties->image)}}" class="img-responsive" style="width: 100%; height:250px"lt="properties">
          @if ($properties->classification->type === 'For Sale')
            <div class="status new">{{$properties->classification->type}}</div>
          @elseif($properties->classification->type === 'For Lease')
            <div class="status lease" style="background:red; ">{{$properties->classification->type}}</div>
          @else
            <div class="status sold">{{$properties->classification->type}}</div>
          @endif
            
        </div>
          <h4><a href="{{url('property details/'.$properties->name)}}">{{$properties->name}}</a></h4>
          <p class="price">Price: {{number_format($properties->price)}}</p>
            @if ($properties->category->slug === 'House & Lot')
              <div class="listing-detail">
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$properties->houseandlot->bedroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$properties->houseandlot->livingroom}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$properties->houseandlot->parking_lot}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$properties->houseandlot->kitchen}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$properties->houseandlot->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Floor Total">{{$properties->houseandlot->floor_total}}</span>
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Floor Area">{{$properties->houseandlot->floor_area}}</span>
              </div>  
            @elseif ($properties->category->slug === 'Boarding House')
              <div class="listing-detail">
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Beds">{{$properties->boardinghouse->bed}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Rooms">{{$properties->boardinghouse->rooms}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$properties->boardinghouse->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$properties->boardinghouse->kitchen}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$properties->boardinghouse->livingroom}}</span> 
              </div>  

            @else
              <div class="">
                {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Land Size">{{$properties->lot->land_size}}</span>  --}}
                <p>Land Size: {{$properties->lot->land_size}}</p>
              </div>  
            @endif
            <a class="btn btn-success" href="{{url('/property details/'.$properties->name)}}">View Details</a>
          </div>
    </div>
        <!-- properties -->
    @endforeach
       <!-- properties -->

</div>
</div>
</div>
</div>
</div>
</div>

@include('layouts.inc.homefooter')
@endsection


