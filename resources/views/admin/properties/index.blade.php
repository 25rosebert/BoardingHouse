<?php
  use App\Models\Properties;
?>
@extends('layouts.admin')

@section('css')
{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
@endsection
@section('content')
<div class="content">
  <div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
      </ol>
    </nav>
    {{-- <a href="{{url('create-property')}}" class="btn btn-success btn-sm">Add Property</a> --}}
    <a href="{{route('chooseCate')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-square fa-1x"> Add Property</i></a>
    <a href="{{url('/propPDF')}}" class="btn btn-danger btn-sm" style="float: right">Export to PDF</i></a>
    <hr>
    <h6>House and Lot</h6>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">House and Lot Table</h4>
            <p class="card-category">List of Properties by House and Lot Category</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-light" id="boardTable"style="width:100%">
                <thead>
                  <tr>
                    {{-- <th class="text-center">ID</th> --}}
                    <th class="text-center">Property Name</th>
                    <th class="text-center">Address</th>
                    <th class="text-xcenter">Price</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Agent</th>
                    <th class="text-center">Contact_info</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
               
                  @foreach ($properties as $property)
                    <tr>
                      {{-- <td>{{$property->id}}</td> --}}
                      <td>{{$property->name}}</td>
                      <td>{{$property->locations->address}}</td> 
                      <td>{{$property->price}}</td>
                      <td>{{$property->category->name}}</td>
                      <td>{{$property->classification->type}}</td>
                      <td>{{$property->user->name}}</td>
                      <td>+{{$property->phone}}</td>
                      <td>{{$property->description}}</td>                                
                      <td>
                        <a href="{{route('view.house' ,$property->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye fa-2x"></i></a>                                                                                                                         
                        <a href="{{url('edit my house property/'.$property->id)}}"class="btn btn-sm btn-warning" >
                          <i class="fas fa-edit fa-2x"></i>
                        </a>
                        <form action="{{url('delete house/'.$property->id)}}" method="GET">
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you, want to delete these Item?')"
                           type="submit"><i class="fas fa-trash-alt fa-2x"></i></button>
                        </form>                      
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
  <hr>
  <h6>Boarding House</h6>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title ">Boarding House Table</h4>
          <p class="card-category"> List of all Properties by Boarding House Category</p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="propertyTable">
              <thead>
                <tr>
                  {{-- <th class="text-center">ID</th> --}}
                  <th class="text-center">Property Name</th>
                  <th class="text-center">Address</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Category</th>
                  <th class="text-center">Type</th>
                  <th class="text-center">Agent</th>
                  <th class="text-center">Contact_info</th>
                  <th class="text-center">Description</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($properties_board as $property)
                  <tr>
                    {{-- <td>{{$property->id}}</td> --}}
                    <td>{{$property->name}}</td>
                    <td>{{$property->locations->address}}</td> 
                    <td>{{$property->price}}</td>
                    <td>{{$property->category->name}}</td>
                    <td>{{$property->classification->type}}</td>
                    <td>{{$property->user->name}}</td>
                    <td>+{{$property->phone}}</td>
                    <td>{{$property->description}}</td>                      
                    <td>
                      <a href="{{route('view.boarding' ,$property->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye fa-2x"></i></a> 
                      <a href="{{url('edit boardinghouse/'.$property->id)}}"class="btn btn-sm btn-warning" >
                        <i class="fas fa-edit fa-2x"></i>
                      </a>
                      <form action="{{url('delete house/'.$property->id)}}" method="GET">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you, want to delete these Item?')"
                         type="submit"><i class="fas fa-trash-alt fa-2x"></i></button>
                      </form>
                      
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<hr>
<h6>Lot Table</h6>
<hr>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-success">
        <h4 class="card-title ">Lots Table</h4>
        <p class="card-category">List of Properties by the Lot Category</p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover" id="lotTable">
            <thead>
              <tr>
                {{-- <th class="text-center">ID</th> --}}
                <th class="text-center">Property Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">Price</th>
                {{-- <th>Total Land Area</th> --}}
                <th class="text-center">Category</th>
                <th class="text-center">Type</th>
                <th class="text-center">Agent</th>
                <th class="text-center">Contact_info</th>
                <th class="text-center">Description</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
           
              @foreach ($properties_lot as $property)
                <tr>
                  {{-- <td>{{$property->id}}</td> --}}
                  <td>{{$property->name}}</td>
                  <td>{{$property->locations->address}}</td> 
                  <td>{{$property->price}}</td>
                  {{-- <td>{{$property->lot->land_size}}</td> --}}
                  <td>{{$property->category->name}}</td>
                  <td>{{$property->classification->type}}</td>
                  <td>{{$property->user->name}}</td>
                  <td>+{{$property->phone}}</td>
                  <td>{{$property->description}}</td>

                  <td>
                    <a href="{{route('view.lot' ,$property->id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye fa-2x"></i></a>                        

                    <a href="{{url('edit lot/'.$property->id)}}"class="btn btn-sm btn-warning" >
                      <i class="fas fa-edit fa-2x"></i>
                    </a>
                    {{-- <a href="{{url('delete-properties/'.$property->id)}}"class="btn btn-sm btn-danger">
                     <i class="material-icons">delete</i>
                    </a> --}}
                    <form action="{{url('delete house/'.$property->id)}}" method="GET">
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you, want to delete these Item?')"
                       type="submit"><i class="fas fa-trash-alt fa-2x"></i></button>
                    </form>
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
  </div>
@endsection

@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script> 

<script>
    $(document).ready( function () {
    $('#propertyTable').DataTable();
});
$(document).ready( function () {
    $('#boardTable').DataTable();
});
$(document).ready(function(){
  $('#lotTable').DataTable();
});
  </script>
@endpush

