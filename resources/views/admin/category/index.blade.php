@extends('layouts.admin')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{url('categories')}}" class="text-muted" style="text-decoration:none">Categories</a></li>        
                </ol>
              </nav>
            {{-- <a href="{{url('add-category')}}" class="btn btn-success btn-sm"><i class="fas fa-plus-square fa-1x"> Add Category</i></a> --}}
            <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-arrow-left"></i></a>

        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title ">Category Table</h4>
                <p class="card-category">These are the Categories of every property</p>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-light table-bordered table-sm" id="categoryTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><i class="fas fa-file-signature fa-1x"> Name</i></th>
                                <th >Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{$item->id}}</td>    
                                    <td>{{$item->name}}</td>    
                                    <td>{{$item->description}}</td>    
                                    <td>
                                        <img src="{{asset('assets/upload/category/'.$item->image)}}" class="category-image" alt="">
                                    </td>
                                    <td>
                                        <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit fa-2x"></i></a>
                                        {{-- <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                                       
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
  $('#categoryTable').DataTable();
});
</script>
@endpush