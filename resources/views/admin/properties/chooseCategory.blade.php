@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('properties')}}" class="text-muted" style="text-decoration:none">Properties</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="{{url('choose category')}}" aria-disabled="true" style="text-decoration: none;" class="text-muted">Choose Category</a></li>              
            </ol>
          </nav>
    <a href="{{route('allProperties')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
      <div class="container-fluid" style="height:90vh">  
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                  <h3>Choose your Property Category</h3>
                  <p>To be redirected to respected form pages</p>
              </div>
              <div class="card-body">
                <form action="post" id="category_form" onsubmit="submitForm();">
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3">
                            <label for="category">Category</label>
                            <select name="category" class="form-select" id="category">
                                <option value="" disabled selected>Select a Category. What Type of Property do you Have??</option>
                                <option value="{{route('addHouseAndLot')}}">House and Lot
                                <option value="{{route('addBoarding')}}">Boarding House</option>
                                <option value="{{route('addLot')}}">Lot</option>
                                {{-- <option value="{{route('addApart')}}">Apartment</option> --}}
                            </select>
                          </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $('#category').change( function(){
                location.href = $(this).val();
            });
        }); 
    </script>
@endpush