@extends('layouts.app')
<?php 
    use App\Models\Properties;
    // $user = User::Auth();
?>
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> --}}
@section('content')
<style>
    h1,h2,h3,h4,h5,h6,p{
        color: black;
    }  
    .card{
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);    
    }
    .card-header{
        font-size: 20px;
        font-weight:bold;    
        color: green;
    }
    .homie{        
        transition: transform .3s;
    }
    .homie:hover{
        color:blue;
        transform: scale(1.2);
    }
    
</style>
@if (Auth::user()->role_as == '1')

<div class="container pt-5" style="height: 90vh">    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>
                    
                    <div class="card-body">                      
                            <h3>Welcome 
                            </h3><hr><br>
                           <h4>{{Auth::user()->name}}</h4> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else 
    <div class="container pt-5" style="height: 90vh">    
        <div class="row justify-content-center">        
          <div class="col-md-8">
            <div class="row">             
              <div class="col-md-6">
                  {{-- <a href="{{route('view.request.prop')}}"> --}}
                      <div class="card"> 
                          <div class="card-header">
                             Homepage
                          </div>
                          <div class="card-body">
                              <div class="card-title">
                                  <h3 class="text-success"><i class="fas fa-home fa-5x homie"></i></h3>                            
                              </div>
                              <div class="">                         
                                  <a href="{{route('landingpage')}}"><h1 class="float-end text-success homie">See All</h1></a>
                              </div>
                          </div>
                          <div class="card-footer">
                              <p class="text-muted">Hello</p>
                          </div>
                      </div>
                  {{-- </a> --}}
              </div>                   
              <div class="col-md-6">
                  {{-- <a href="{{url('my properties')}}"> --}}
                      <div class="card"> 
                          <div class="card-header">
                            My Properties
                          </div>
                          <div class="card-body">                        
                              <div class="card-title">
                                  <h3 class="text-success"><i class="fas fa-home fa-5x homie"></i></h3>                            
                              </div>
                              <div class="">
                                  <a href="{{url('my properties')}}"><h1 class="float-end text-success homie">Total: {{Properties::where('user_id',Auth::user()->id)->count()}}</h1></a>
                              </div>                        
                          </div>
                          <div class="card-footer">
                              <p class="text-muted">Hello World</p>
                          </div>
                      </div>
                  {{-- </a> --}}
              </div>                      
    @endif

@endsection
