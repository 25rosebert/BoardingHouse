<?php
  use App\Models\Properties;
?>
@extends('layouts.app')
{{-- <link rel="stylesheet" href="{{asset("admin/css/material-dashboard.css")}}">
<link rel="stylesheet" href="{{asset('admin/css/material-dashboard.min.css')}}"> --}}
@section('css')
{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
<style>
  h1,h2,h3,h4,h5,h6{
    /* color:black; */
  }
  label{
    color:black;
  }
  .card{
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);    
    }
</style>
@endsection
@section('content')
  <div class="content">
  <div class="container-fluid">
    @include('layouts.inc.flashMessage')       
    {{-- <a href="{{route('home')}}" class="btn btn-success btn-sm mb-3">Add Property</a> --}}
    <select name="category"  class="btn" id="category">
      <option value=""disabled selected>SELECT CATEGORY</option>
      <option value="{{route('user.houseandlot.add')}}">House and Lot</option>
      <option value="{{route('user.boarding.add')}}">Boarding House</option>
      <option value="{{route('user.lot.add')}}">Lot</option>
    </select>
  
    <a href="{{route('home')}}" class="btn btn-danger btn-sm mb-3 float-end"><i class="fas fa-arrow-left fa-2x"></i></a>
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary bg-info">
            <h4 class="card-title ">PENDING PROPERTIES</h4>
            <p class="card-category">Waiting for Approval</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-info border-primary" id="propertyTable">
                <thead>
                  <tr class="table-danger border-primary">
                    <th>Property Name</th>
                    <th>Price</th>
                    <th width="200px">Address</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Agent</th>
                    <th>Contact_info</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  
               @if ($reqProperties->count() > 0)
               @foreach ($reqProperties as $property)
               <tr>
                 <td>{{$property->name}}</td>
                 <td>{{$property->price}}</td>
                 <td>{{$property->reqLocation->address}}</td> 
                 <td>{{$property->category->name}}</td>
                 <td>{{$property->classification->type}}</td>
                 <td>{{$property->user->name}}</td>
                 <td>{{$property->phone}}</td>
                 <td>{{$property->description}}</td>
                 <td>
                  {{-- @if ($property->category->slug === 'House & Lot')
                    <a href="{{url('edit this house/'.$property->id)}}" class="btn btn-warning btn-sm"> <i class="fas fa-edit fa-2x"></i> </a> 
                  @endif
                  @if ($property->category->slug === 'Boarding House')
                    <a href="{{url('edit this boarding house/'.$property->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-2x"></i></a> 
                  @endif
                  @if ($property->category->slug === 'Lot')
                    <a href="{{url('edit this lot/'.$property->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-2x"></i></a>
                  @endif --}}
                
                   <form action="{{route('delete.request',$property->id)}}" method="GET">
                       <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you, want to delete these Item?')"
                        type="submit"><i class="fas fa-trash-alt fa-2x"></i></button>
                     </form>
               </td>
               </tr>
             @endforeach
               @endif
                </tbody>
              </table>
              {{-- {{$properties->links()}} --}}
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
  </div>
@endsection
{{-- <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}"></script> --}}
@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script> 

<script>
  $(document).ready(function(){
      $('#category').change( function(){
          location.href = $(this).val();
      });
  }); 
</script>

<script>
    $(document).ready( function () {
    $('#propertyTable').DataTable();
});
  </script>
@endpush

