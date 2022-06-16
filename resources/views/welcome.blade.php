@extends('layouts.base')

@section('content')
    @include('layouts.inc.usersNav')

    <div>
        <div id="slider" class="sl-slider-wrapper">
    
            <div class="sl-slider">
            @foreach ($properties_house as $properties)    
             <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
               <div class="sl-slide-inner">
                 <div class="bg-img">
                     <img class="bg-img" src="{{asset('assets/upload/images/'.$properties->image)}}" alt="" srcset="">
                 </div>
                 <h2><a href="#">{{$properties->name}}</a></h2>
                 <blockquote>              
                 <p class="location"><span class="glyphicon glyphicon-map-marker"></span> {{$properties->locations->address}}</p>
                 <p>{{$properties->description}}</p>
                 <p>{{$properties->classification->type}}</p>
                 <cite>PHP {{number_format($properties->price)}}</cite>
                 </blockquote>
               </div>
             </div>
             {{-- @endforeach --}}
             @endforeach        
            </div>
            <!-- /sl-slider -->
    </div>
    <nav id="nav-dots" class="nav-dots">
    @foreach ($properties_house as $item)
        <span class="nav-dot-current"></span>
    @endforeach

      </nav>
    
      @include('layouts.inc.banner')
  <div class="container">
      {{-- Properties  --}}
    {{-- <div class="properties-listing spacer"> <a href="{{route('buysalerent')}}" class="pull-right viewall">View All Listing</a> --}}
      <h2>All Properties</h2>
      <div id="owl-example" class="owl-carousel">
          @foreach ($properties as $property)
          <div class="properties">
            {{-- <div class="image-holder"><img src="{{asset('assets/upload/images/'.$property->image)}}" class="img-responsive" style="width: 1000px; height: 150px" alt="properties"/> --}}
              @if ($property->classification->type == 'For Sale')
                  <div class="status new">{{$property->classification->type}}</div>
              @else
              <div class="status sold">{{$property->classification->type}}</div>
              @endif
            </div>
            <h4><a href="property-detail.php">{{$property->name}}</a></h4>
            <p class="price">Price: {{number_format($property->price)}}</p>
            @if ($property->category->slug === 'House & Lot')
              <p>{{$property->category->name}}</p>
              <div class="listing-detail">
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$property->houseandlot->bedroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property->houseandlot->livingroom}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$property->houseandlot->parking_lot}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property->houseandlot->kitchen}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$property->houseandlot->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Floor Total">{{$property->houseandlot->floor_total}}</span>
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Floor Area">{{$property->houseandlot->floor_area}}</span>
              </div>  
            @elseif ($property->category->slug === 'Boarding House')
            <p>{{$property->category->name}}</p>
              <div class="listing-detail">
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Beds">{{$property->boardinghouse->bed}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Total Rooms">{{$property->boardinghouse->rooms}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Comfort Room">{{$property->boardinghouse->comfortroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$property->boardinghouse->kitchen}}</span> 
                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">{{$property->boardinghouse->livingroom}}</span> 
              </div>  

            @else
              <div class="">
                {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Land Size">{{$property->lot->land_size}}</span>  --}}
                <p>{{$property->category->name}}</p><p>Land Size: {{$property->lot->land_size}}</p>
              </div>  
            @endif
            <a class="btn btn-primary" href="{{url('/property details/'.$property->name)}}">View Details</a>
          </div>
          @endforeach
        
    {{-- End of Properties --}}
      </div>
    </div>
    <div class="spacer">
      <div class="row">
        <div class="col-lg-6 col-sm-9 recent-view">
          <h3>About Us</h3>
          {{-- <p>These Website is made by Group No.5 from the IV-BSIT-B leads by Rose Bert Cantillo, followed by Valerie Berbon, Joffrey Leonard Mapa, and Joshua Sebastian<br><a href="{{route('pages.aboutUs')}}" class="">Learn More</a></p> --}}
        
        </div>

      </div>
    </div>
  </div>
  @include('layouts.inc.homefooter')
 @endsection