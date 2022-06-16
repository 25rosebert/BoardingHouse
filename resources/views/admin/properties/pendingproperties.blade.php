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
    <div class="section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb"> 
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{url('pended properties')}}" class="text-muted" style="text-decoration:none">Request Properties</a></li>                      
                </ol>
              </nav>
            <div class="card">
                <div class="card-body">
                    <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-arrow-left"></i></a>
            <h3 class="text-warning">List of Pending Properties that is waiting for Approval</h3>
            <table class="table-hover table-bordered" id="pendingProp">
                <thead>
                    <tr>
                        <th class="text-center">Property</th>
                        <th class="text-center">Category</th>
                        <th class="text-center" width="100px">Price</th>
                        <th class="text-center" width ="400px">Address</th>
                        {{-- <th class="text-center">Owner</th> --}}
                        <th class="text-center" width="300px">Action</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($pendingProperties as $property)
                        <tr>
                            <td>{{$property->name}}</td>
                            <td>{{$property->category->name}}</td>
                            <td>₱ {{number_format($property->price)}}</td>
                            <td>{{$property->reqLocation->address}}</td>
                            {{-- <td>{{$property->users->name}}</td> --}}
                            <td class="">
                                {{-- View Details --}}
                                    @if ($property->category->slug === 'House & Lot')
                                        <a href="{{route('view.req.house' ,$property->id)}}" class="btn btn-info btn-sm">View</a> 
                                    @endif
                                    @if ($property->category->slug === 'Boarding House')
                                        <a href="{{route('view.req.boarding' ,$property->id)}}" class="btn btn-info btn-sm">View</a> 
                                    @endif
                                    @if ($property->category->slug === 'Lot')
                                        <a href="{{route('view.req.lot' ,$property->id)}}" class="btn btn-info btn-sm">View</a>
                                    @endif
                                {{-- Delete Propert --}}
                                    @if ($property->category->slug === 'House & Lot')
                                        <a href="{{url('approve property house/'.$property->id)}}" class="btn btn-success btn-sm">Accept</a> 
                                    @endif
                                    @if ($property->category->slug === 'Boarding House')
                                        <a href="{{url('approve property boarding house/'.$property->id)}}" class="btn btn-success btn-sm">Accept</a> 
                                    @endif
                                    @if ($property->category->slug === 'Lot')
                                        <a href="{{url('approve this lot/'.$property->id)}}" class="btn btn-success btn-sm">Accept</a>
                                    @endif                            
                                <div class="float-end">
                                    <form action="{{url('/delete request/'.$property->id)}}" method="GET">
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Move to Trash?')"
                                         type="submit">Reject</button>
                                    </form>
                                </div>
                            </td>   
                        </tr>     
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script> 

<script>
    $(document).ready( function () {
    $('#pendingProp').DataTable();
});

  </script>
@endpush
