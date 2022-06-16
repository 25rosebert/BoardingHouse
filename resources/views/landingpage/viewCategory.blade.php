@extends('layouts.userApp')

@section('content')
@include('layouts.inc.carousel')    
<div class="py-3">
    <div class="container pt-3" style="height:90vh">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}" style="text-decoration:none">Home</a></li>
                  <li class="breadcrumb-item" aria-current="page"><a href="{{route('view.categories',$category->slug)}}" style="text-decoration:none">{{$category->name }}</a></li>
                </ol>
            </nav>
            <h1 class="text-success"><b>{{$category->name}}</b></h1>
            @foreach ($property as $properties)
            <div class="col-md-3 mb-3">
                <a href="{{route('view.details', ['id'=>$properties->id, 'catID'=>$properties->category_id])}}" class="" style="text-decoration:none">  
                    <div class="card homie" style="height:300px; width:100%">
                            <img src="{{asset('assets/upload/images/'.$properties->image)}}"  alt="Product Image" style="height:200px; width:100%">
                            <div class="card-body">
                                <h5 class="text-danger">{{$properties->name}}</h5>
                                <span class="float-start text-dark">{{$properties->category->name}}</span>
                                <span class="float-end text-warning"><b>₱</b>{{number_format($properties->price)}}</span>
                            </div>
                    </div>
                </a>
            </div>                    
            @endforeach    
        </div>      
        {{ $property->links('vendor.pagination.simple-default') }}
    </div>
</div>
@endsection