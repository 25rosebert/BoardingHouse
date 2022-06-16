@extends('layouts.base')

@section('content')
    @include('layouts.inc.usersNav')
    <!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Buy</span>
    <h2>Buy</h2>
  </div>
</div>
<!-- banner -->

@foreach ($properties as $property)
<div class="container">
  <div class="properties-listing spacer">

    <div class="col-lg-12 col-sm-8 ">
    <div class="col-md-8">
      <h2>{{$property->name}}</h2>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="property-images">
      
      <!-- Slider Starts -->
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">
          @foreach ($property->images as $propertyImage)
            <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}active"></li>
            {{-- <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li> --}}
          @endforeach
        </ol>
        <div class="carousel-inner">
          <!-- Item 1 -->
          @foreach ($property->images as $propertyImage)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <img src="{{asset('assets/upload/properties/'.$propertyImage->images)}}" class="properties" alt="properties" />
            </div>
          @endforeach
          <!-- #Item 1 -->
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
      <!-- #Slider Ends -->  


</div>

<div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
<p>{{$property->description}}</p>
{{-- <p>{{$property->houseandlot->bedroom}}</p> --}}

</div>
<div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
{{-- <div class="well"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll={{$property->location->latitude}},{{$property->location->longitude}}&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear={{$property->locations->location->address}}&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe></div> --}}
<div class="well"><iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$property->locations->latitude}}, {{$property->locations->longitude}}&amp;key=AIzaSyCDny2vom6IhoSwID3rQtkkeOxA2KgpVTg"></iframe></div>

</div>


</div>
<div class="col-lg-4">
<div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Price: {{number_format($property->price)}}</p>
<p class="area"><span class="glyphicon glyphicon-map-marker"></span>{{$property->locations->address}}</p>

<div class="profile">
<h3><span class="glyphicon glyphicon-user"></span>Agent Details</h3>
<p>{{$property->user->name}}<br>{{$property->phone}}</p>
</div>
</div>

  <h3><span class="glyphicon glyphicon-home"></span> Availabilty</h3>
  @if ($property->category->slug === 'House & Lot')
  <div><p>{{$property->category->name}}</p></div>
  <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property->houseandlot->bedroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property->houseandlot->livingroom}}</span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property->houseandlot->parking_lot}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property->houseandlot->kitchen}}</span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$property->houseandlot->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Floor Total">{{$property->houseandlot->floor_total}}</span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Floor Area">{{$property->houseandlot->floor_area}}</span>
  </div>  
@elseif ($property->category->slug === 'Boarding House')
  <div><p>{{$property->category->name}}</p></div>
  <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Beds">{{$property->boardinghouse->bed}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Rooms">{{$property->boardinghouse->rooms}}</span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$property->boardinghouse->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property->boardinghouse->kitchen}}</span> 
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property->boardinghouse->livingroom}}</span> 
  </div>  

@else
  <div>
    <p>{{$property->category->name}}</p> 
  </div>
  <div class="">
    {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Land Size">{{$property->lot->land_size}}</span>  --}}
    <p>Land Size: {{$property->lot->land_size}}</p>
  </div>  
@endif

</div>

</div>
</div>
</div>
</div>
</div>    
@endforeach

@include('layouts.inc.homefooter')
@endsection