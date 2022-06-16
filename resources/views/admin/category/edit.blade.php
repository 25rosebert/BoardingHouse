@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('categories')}}" class="text-muted" style="text-decoration:none">Categories</a></li>        
              <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-muted" style="text-decoration:none">Edit Category</a></li>        
            </ol>
        <a href="{{url('categories')}}" class="btn btn-danger btn-sm" style="float: right;"><i class="fas fa-arrow-left"></i></a>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit/Update Category</h4>
              <p class="card-category">You can change your data arround here</p>
            </div>
            <div class="card-body">
                <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                        </div>
                        <div class="col md-12">
                            <input type="file" class="form-control" name="image"multiple>                            
                        </div>
                        @if ($category->image)
                            <img src="{{asset('assets/upload/category/'.$category->image)}}" class="w-25" alt="Imahe">
                        @endif
                        <div class="col md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
@endsection