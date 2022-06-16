@extends('layouts.admin')


@section('css')
{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
@endsection

@section('content')
<style>
    .card {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
</style>
@if($properties->isNotEmpty())
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>                    
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}" class="text-muted" style="text-decoration:none">Search Results</a></li>                      
            </ol>
          </nav>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Search Results</h2>
                    <a href="{{route('dashboard')}}" class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <table class="table-hover table-bordered bg-light" id="searchResult" style="width: 100%">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Classification</th>
                                <th>Address</th>
                                <th>Action</th>
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($properties as $properties)
                            <tr>
                                {{-- <td>{{$properties->id}}</td> --}}
                                <td>{{$properties->name}}</td>
                                <td>{{number_format($properties->price)}}</td>
                                <td>{{$properties->category->name}}</td>
                                <td>{{$properties->classification->type}}</td>
                                <td>{{$properties->locations->address}}</td>
                                <td>
                                    @if ($properties->category->slug === 'House & Lot')
                                        <a href="{{route('view.house' ,$properties->id)}}" class="btn btn-info btn-sm">View</a> 
                                    @endif
                                    @if ($properties->category->slug === 'Boarding House')
                                        <a href="{{route('view.boarding' ,$properties->id)}}" class="btn btn-info btn-sm">View</a> 
                                    @endif
                                    @if ($properties->category->slug === 'Lot')
                                        <a href="{{route('view.lot' ,$properties->id)}}" class="btn btn-info btn-sm">View</a>
                                    @endif  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <h6>Properties Table</h6>
                        </tfoot>
                        {{-- {{$properties->links()}} --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
<div class="py-5 text-center mt-5">
    <h2 class="text-danger">No Properties have Been Found</h2>
</div>
@endif
@endsection
@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script> 

<script>
    $(document).ready( function () {
    $('#searchResult').DataTable();
});

  </script>
@endpush
