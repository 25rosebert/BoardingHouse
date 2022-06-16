@extends('layouts.userApp')

@section('content')
<div class="container pt-4" style="height: 100vh">      
    {{-- <a href="{{url('/')}}">back</a>/ --}}
    <div class="row"> 
      <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header bg" style="background-color: rgb(29, 110, 29)">
            <h4 class="card-title text-center fs-3 fw-bold text-light">Report a Problem</h4>
            <p class="card-category text-center text-white">Let us know what problem do you have encounter.</p>
          </div>
          <div class="card-body">
              <form action="{{route('problem')}}" method="POST" enctype="multipart/form-data" class="appendForm" >
                  @csrf
                  <div class="row">
                    @foreach ($propertyID as $userID)
                        <input type="hidden" name="propertyId" value="{{$userID->id}}">
                        <input type="hidden" name="name" value="{{$userID->user->name}}">
                    @endforeach
                    <div class="col-md-12 mb-3">
                        <label for="" class="fw-bold">Report Type:</label>
                        <select name="reportType" id="" class="form-select">
                            <option value="Fake Property">Fake Property</option>    
                            <option value="Unregistered Property">Unregistered Property</option>
                            <option value="Wrong Location">Wrong Location</option>
                            <option value="Wrong Information">Wrong Information</option>
                            <option value="Fake User">Fake User</option>
                            {{-- <option value="5">Unregistered</option> --}}
                            {{-- <option value="6"></option> --}}
                        </select>                            
                    </div>  
                    <div class="col-md-12 mb-5">
                        <label for="" class="fw-bold">Description:</label>
                        <textarea name="description" class="form-control" id="" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="offense_count" value="1">
                    <div class="col-md-12">
                        <button class="btn text-light fw-bold" type="submit" style="background-color: rgb(29, 110, 29)">Submit Report</button>
                    </div>
                  </div>
              </form>
            </div>                  
        </div>
        </div>
    </div>
</div>
@endsection
