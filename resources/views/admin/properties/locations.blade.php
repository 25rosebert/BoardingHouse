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
        <li class="breadcrumb-item active" aria-current="page"><a href="{{url('categories')}}" class="text-muted" style="text-decoration:none">Locations</a></li>        
      </ol>
    </nav>
    <a href="{{url('choose category')}}" class="btn btn-success btn-sm">Add Property</a>
    <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm" style="float: right">Back</a>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Locations of Every Properties</h4>
            <p class="card-category"> List of all Property Locations created by Users</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="locations">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Property Name</th>
                    <th>Address</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    {{-- <th>Actions</th> --}}
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($properties as $property)
                    <tr>
                      <td>{{$property->id}}</td>
                      <td>{{$property->name}}</td>
                      <td>{{$property->locations->address}}</td> 
                      <td>{{$property->locations->latitude}}</td>
                      <td>{{$property->locations->longitude}}</td>
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
      $(document).ready(function(){
          $('#locations').DataTable();
      });
  </script>
@endpush