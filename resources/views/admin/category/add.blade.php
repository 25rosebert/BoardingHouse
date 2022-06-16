@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{url('categories')}}" class="btn btn-danger btn-sm">Back</a>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Create Category</h4>
              <p class="card-category">Create a new Category here</p>
            </div>
            <div class="card-body">
                <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter a Category Name">
                            <span style="color: red"> @error('name'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Category Slug">
                            <span style="color: red"> @error('slug'){{$message}}  @enderror</span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Category Description"></textarea>
                            <span style="color: red"> @error('description'){{$message}}  @enderror</span>
                        </div>
                        <div class="col md-12">
                            <input type="file" class="form-control" name="image" multiple placeholder="Enter a Category Image">                            
                            <span style="color: red"> @error('image'){{$message}}  @enderror</span>
                        </div>
                        <div class="col md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
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