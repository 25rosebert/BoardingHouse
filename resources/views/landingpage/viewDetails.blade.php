@extends('layouts.userApp')

@section('content')
@include('layouts.inc.carousel')                    
    <div class="container">
        <div class="row">
            @foreach ($properties as $properties)
                <nav class="mt-2" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}" style="text-decoration:none;">Home</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a href="{{route('view.categories',$properties->category->slug)}}" style="text-decoration:none;">{{$properties->category->name }}</a></li>
                      <li class="breadcrumb-item text-muted" aria-current="page" style="">{{$properties->name }}</li>
                    </ol>
                </nav>

                {{-- Property Details --}}
                <h2 class="mt-4 fw-bold" style="color: #75CE9F">Property Details</h2>
                <div class="col-md-12 mb-4">
                    <div class="card" >                        
                        {{-- <div class="card-body"> --}}                            
                            <img class="img-grid-col-2 img-grid-row-2" src="{{asset('assets/upload/images/'.$properties->image)}}" alt="Property Images" srcset="" style="width: 100%; height:500px">
              
                            {{-- Property images --}}                              
                                @if ($properties->images)
                                <div class="img-grid">
                                    @foreach ($properties->images as $images)
                                    
                                        <img class="" src="{{asset('assets/upload/properties/'.$images->images)}}">
                                    
                                    @endforeach
                                </div>
                                @endif
                                 <div class="pop">
                                    <span>&times;</span>
                                    <img src="{{asset('')}}" alt="">
                                </div>
                                        {{-- <img class="img-grid-col-2 img-grid-row-2" src="{{asset('assets/upload/images/1642001676_lupa.jpg')}}">
                                         <img src="{{asset('assets/upload/images/1642001676_lupa.jpg')}}">
                                          <img src="{{asset('assets/upload/images/1642001676_lupa.jpg')}}">
                                          <img src="{{asset('assets/upload/images/1642001676_lupa.jpg')}}">
                                          <img src="{{asset('assets/upload/images/1642001676_lupa.jpg')}}">    --}}
                                
                                 
                                
                                <div class="card-body">                                                                    
                                    <div class="row">                                        
                                        <div class="col-md-12 mb-3">
                                            <label class="text-shadow badge" style="font-size:20px; background-color: #01A66F"><b>Price: ₱{{number_format($properties->price)}}</b></label>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="text-dark fw-bold">Barangay: </span><h5 class="" style="color:#01A66F"><b>{{$properties->barangay->barangay}}</b></h5>                                        
                                        </div>
                                        <div class="col-md-8 mb-1">                                        
                                            <span class="text-dark fw-bold">Located at: </span><h5 class="" style="color:#01A66F"><i class="fas fa-map-marker-alt"></i> <b>{{$properties->locations->address}}</b></h5>                                        
                                        </div>                                              
                                        <div class="col-md-12 mb-3">
                                            <label for="" class="fw-bold">Property Name:</label><br>
                                            <h2 class="text-success fw-bold">{{$properties->name}}</h2>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="fw-bold">Property Type:</label><br>
                                            @if ($properties->category->slug === 'House & Lot')                            
                                                <div class="mt-1 text-light text-shadow badge bg-dark" style="font-size: 20px">{{$properties->category->name}}</div>
                                            @elseif ($properties->category->slug === 'Boarding House')                            
                                                <div class="mt-1 text-light text-shadow badge bg-dark" style="font-size: 20px">{{$properties->category->name}}</div>
                                            @elseif ($properties->category->slug === 'Lot')      
                                                <div class="mt-1 text-light text-shadow badge bg-dark" style="font-size: 20px">{{$properties->category->name}}</div>
                                            @else                      
                                                <div class="mt-1 text-light text-shadow badge bg-dark" style="font-size: 20px">null</div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="text fs-5"><b>Availability</b></label><br>
                                            @if ($properties->category->slug === 'House & Lot')                            
                                                <div class="listing-details"> 
                                                    {{-- <span class="text-success fw-bold"><i class="fas fa-bed"></i> {{ $properties->boardinghouse->bed}}</span><br> --}}
                                                    Rooms: <span class="text-success fw-bold">{{$properties->houseandlot->bedroom}}</span><br>
                                                    Kitchen: <span class="text-success fw-bold">{{$properties->houseandlot->kitchen}}</span><br>
                                                    Living Room: <span class="text-success fw-bold">{{$properties->houseandlot->livingroom}}</span><br>
                                                    Floor Total: <span class="text-success fw-bold">{{$properties->houseandlot->floor_total}}</span><br>
                                                    Floor Area: <span class="text-success fw-bold">{{$properties->houseandlot->floor_area}}</span><span class="text-dark">㎡</span><br>
                                                    Comfort Room: <span class="text-success fw-bold">{{$properties->houseandlot->comfortroom}}</span><br>    
                                                    Land Size: <span class="text-success fw-bold">{{$properties->houseandlot->land_size}}</span><span class="text-dark">㎡</span><br>    
                                                    Parking Lot: <span class="text-success fw-bold">{{$properties->houseandlot->parking_lot}}</span><br>                                                                                                                                                                                                                                                         
                                                </div>
                                            @elseif ($properties->category->slug === 'Boarding House')                        
                                                <div class="listing-details">                                                    
                                                    <span class="text-success fw-bold"><i class="fas fa-bed"></i> {{ $properties->boardinghouse->bed}}</span><br>
                                                    Rooms: <span class="text-success fw-bold">{{$properties->boardinghouse->rooms}}</span><br>
                                                    Kitchen: <span class="text-success fw-bold">{{$properties->boardinghouse->kitchen}}</span><br>
                                                    Living Room: <span class="text-success fw-bold">{{$properties->boardinghouse->livingroom}}</span><br>
                                                    Floor Total: <span class="text-success fw-bold">{{$properties->boardinghouse->floor_total}}</span><br>
                                                    Floor Area: <span class="text-success fw-bold">{{$properties->boardinghouse->floor_area}}㎡</span><br>
                                                    Comfort Room: <span class="text-success fw-bold">{{$properties->boardinghouse->comfortroom}}</span><br>
                                                </div>  
                                            @elseif ($properties->category->slug === 'Lot')                            
                                                <div class="listing-details">                                    
                                                    <p class="px-3">Land Size: <span class="text-success fw-bold">{{$properties->lot->land_size}}</span>㎡</p>
                                                </div>  
                                            @else
                                                <div class="listing-details">
                                                    null
                                                </div>    
                                            @endif    
                                        </div>                              
                                        <div class="col-md-4">
                                            <label for="" class="fw-bold">Status:</label><br>
                                            @if ($properties->status === 4)
                                                <p class="mt-1 text-light text-shadow badge bg-success " style="font-size: 16px">Available</p>
                                            @elseif($properties->status === 5)
                                                <p class="mt-1 text-light text-shadow badge bg-danger" style="font-size: 16px">Unavailable</p>
                                            @elseif ($properties->status === 6)
                                                <p class="mt-1 text-light text-shadow badge bg-danger" style="font-size: 16px">Sold</p>
                                            @else
                                                <p class="mt-1 badge-md text-danger">null</p>
                                            @endif
                                        </div> 
                                        <div class="col-md-12 mt-3">
                                            <label for="" class="fw-bold">Landmark/Nearby Area's:</label>
                                            <p class="fs-6 text-success fw-bold"><i class="fas fa-map-marker-alt"></i> {{$properties->locations->landmarks}}</p>

                                        </div>                                       
                                    </div>
                                </div>
                        {{-- </div> --}}

                        </div>            
                    </div>
                </div> {{-- End of Property Details --}}

                {{-- Owners Information and Description --}}
                <div class="col-md-12 mb-3">
                    {{-- <div class="card"> --}}
                        {{-- <div class="card-header"> --}}
                            <h4 class="" style="color:#01A66F"><b>Description</b></h4>
                        {{-- </div> --}}
                        {{-- <div class="card-body"> --}}
                            <div class="col-md-12 mb-3">
                                <p class="px-3 fs-5">{{$properties->description}}</p>
                            </div>
                            <div class="row">
                                <label for="" class="fs-4 fw-bold mb-2" style="color:#01A66F">Agent/Owner Information</label>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h5 class="" style="color: olive" ><i class="fas fa-user-tag"></i> Agent</h5>
                                        <p class="fw-bold fs-5 text-success">{{$properties->user->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">  
                                        <h5 class="" style="color: olive" ><i class="fas fa-phone"></i> Contact Info</h5>
                                        <p class="fw-bold fs-5 text-success">+{{$properties->phone}}</p>
                                    </div>  
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="">
                                        <h5 class="" style="color: olive" ><i class="fas fa-envelope"></i> E-Mail</h5>
                                        <p class="fw-bold fs-5 text-success">{{$properties->user->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="well">
                                <label for="" class=" fs-4 fw-bold" style="color:#01A66F">Location: Click Directions to navigate</label>                        
                                <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{$properties->locations->latitude}}, {{$properties->locations->longitude}}&amp;key=AIzaSyCDny2vom6IhoSwID3rQtkkeOxA2KgpVTg"></iframe>
                                {{-- <iframe src="https://embed.waze.com/iframe?zoom=12&lat={{$properties->locations->latitude}}&lon={{$properties->locations->longitude}}&pin=1" width="100%" height="450" frameborder="0" style="border:0"></iframe> --}}
                            </div>                            
                            {{-- Report a Problem --}}
                            <div class="position-relative">                                
                                <div class="position-absolute top-0 end-0">
                                    <a href="{{route('report',[$properties->id, $properties->user->name])}}">Report a Problem</a>
                                </div>                                
                            </div>
                        {{-- </div> --}}
                    {{-- </div> --}}    
                </div>
            </div>
        @endforeach
    </div>


    {{-- same Category --}}
    <div class="container">
        <h4 class="text-success mt-5 mb-3">Properties Related to your views</h4>
        <div class="row" style="display: flex;
        justify-content:center">
    
            @foreach ($propCategory as $properties)
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
                        <span class="float-end text-light text-shadow badge badge-lg bg-danger" style="font-size: 16px"><b>₱ {{number_format($properties->price)}}  </b></span>
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
                        {{-- <div class=""> --}}
                            @if ($properties->category->slug === 'House & Lot')        
                            <div class="listing-detail">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-0">
                                            Bedrooms: <span class="text-success fw-bold">{{$properties->houseandlot->bedroom}}</span>
                                            Area: <span class="text-success fw-bold">{{$properties->houseandlot->floor_area}}㎡</span>
                                            {{-- Living Room: <span class="text-success fw-bold">{{$properties->houseandlot->livingroom}}</span>                                     --}}
                                        </div>                                    
                                    </div>
                                </div>
                            </div>  
                          @elseif ($properties->category->slug === 'Boarding House')
                            <div class="listing-detail">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mt-2 mb-0">
                                            Beds: <span class="text-success fw-bold">{{$properties->boardinghouse->bed}}</span>
                                            Rooms: <span class="text-success fw-bold">{{$properties->boardinghouse->rooms}}</span>
                                            {{-- Living Room: <span class="text-success fw-bold">{{$properties->houseandlot->livingroom}}</span>                                     --}}
                                        </div>                                    
                                    </div>
                                </div>
                            </div>  
              
                          @else
                            <div class="mt-2">
                              {{-- <span data-toggle="tooltip" data-placement="bottom" data-original-title="Land Size">{{$properties->lot->land_size}}</span>  --}}
                              Land Size: <span class="text-success fw-bold">{{$properties->lot->land_size}}㎡</span>
                            </div>  
                          @endif
                        {{-- </div> --}}
    
                  </div>
                </div>
              </div>
            @endforeach
        </div>
            {{ $propCategory->links('vendor.pagination.simple-tailwind') }}
    </div>


    
    {{-- popup image --}}
<script>
    document.querySelectorAll('.img-grid img').forEach(img =>{
        img.onclick = () =>{
        document.querySelector('.pop').style.display = 'block';
        document.querySelector('.pop img').src = img.getAttribute('src');
        }
    });
    document.querySelector('.pop span').onclick=() =>{
        document.querySelector('.pop').style.display = 'none';
    }
</script>
    
<style>
    .img-grid{
        --gap: 16px;
        --num-cols: 4;
        --row-height: 200px;
    
        box-sizing: border-box;
        padding: var(--gap);
        display: grid;
        grid-template-columns: repeat(var(--num-cols), 1fr);
        grid-auto-rows: var(--row-height);
        gap: var(--gap);
    }
    
    .img-grid > img{
        width:100%;
        height:100%;
        object-fit: cover;
    }
    .img-grid-col-2{
        grid-column: span 4;
    }
    
    .img-grid-row-2{
        grid-row: span 4;
    }
    @media screen and (max-width: 1024px){
        .img-grid{
            --num-cols: 2;
            --row-height: 200px;
        }
    }
    /* 
        .pop{
        position: relative;
        top: 0; left: 0;
        background: rgba(0,0,0,9);
        height: 100%;
        width: 100%;
        z-index: 100;
        display: none;
    }
    .pop span{
        position: absolute;
        top: 0; 
        right: 10px;
        font-size: 60px;
        font-weight: bolder;
        color: #fff;
        cursor: pointer;
        z-index: 100;
    }
    .pop img{
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        border: 5px solid #fff;
        border-radius: 5px;
        width: 750px;
        object-fit: cover;
    }
    @media(max-width:768px){
        .pop img{
            width: 95%;
        }
    } */
    
    
     .pop{
        position: fixed;
        top: 0; left: 0;
        background: rgba(0,0,0,9);
        height: 100%;
        width: 100%;
        z-index: 100;
        display: none;
    }
    .pop span{
        position: absolute;
        top: 0; right: 10px;
        font-size: 60px;
        font-weight: bolder;
        color: #fff;
        cursor: pointer;
    }
    .pop img{
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        border: 5px solid #fff;
        border-radius: 5px;
        width: 750px;
        object-fit: cover;
    }
    @media(max-width:768px){
    .pop img{
            width: 95%;
        }
    }
    </style>
    
@endsection