@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/')}}">
<div class="container pt-5" style="height: 90vh">    
    <div class="row"> 
      <div class="col-md-10 offset-1">
        <div class="card shadow-lg">
          <div class="card-header" style="background-color: #75CE9F">
            <h4 class="card-title ">User Verification</h4>
            <p class="card-category">Fill up the form below to verify your account</p>
          </div>
          <div class="card-body">
              <form action="{{route('verify-now')}}" method="POST" enctype="multipart/form-data" class="appendForm" >
                  @csrf
                  <div class="row">                    
                      <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                      <div class="col-md-4 mb-3">
                        <label for="" class="text-dark" >Age:</label>
                          <input type="number" name="age" id="" class="form-control" placeholder="How Old are you?">
                          <span class="errormessage">@error('age') {{ $message }} @enderror</span>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="" class="text-dark">Birthdate:</label>
                        <input type="date" name="birthdate" id="" class="form-control">
                        <span class="errormessage ">@error('birthdate') {{ $message }} @enderror</span>
                      </div>
                      <div class="col-md-4 mb-3">
                        <label for="" class="text-dark">ID Type:</label>
                        <select name="id_type" id="" class="form-select">                        
                            <option value="" selected disabled >SELECT ID</option>
                            <option value="voters_id">Voter's ID</option>
                            <option value="postal_id">Postal ID</option>
                            <option value="drivers_license">Driver's License</option>
                            <option value="national_id">National ID</option>
                            <option value="sss_umid">SSS/UMID Card</option>
                            <option value="passport">Passport</option>
                            <option value="Government Office/GOCC ID">Government Office/GOCC ID</option>
                            <option value="HDMF ID(Pagibig)">HDMF ID(Pagibig)</option>
                            <option value="PRC ID">PRC ID</option>  

                        </select>                    
                        
                        <span class="errormessage">@error('id_type') {{ $message }} @enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="" class="text-dark">Photo of your ID: Front</label>
                        <input type="file" name="frontOfID" id="" class="form-control" required>
                        <span class="errormessage">@error('frontOfID') {{ $message }} @enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="" class="text-dark">Photo of your ID: Back</label>
                        <input type="file" name="backOfID" id="" class="form-control" required>
                        <span class="errormessage">@error('backOfID') {{ $message }} @enderror</span>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="" class="text-dark">Photo</label>
                        <input type="file" accept="image/*" capture="camera" name="photo" id="" class="form-control"/ required>
                        <span class="errormessage">@error('photo') {{ $message }} @enderror</span>
                      </div>                      
                      <div class="col-md-6 mb-5">
                        <label for="" class="text-dark">Barangay Clearance:</label>
                        <input type="file" name="brgy_clearance" id="" class="form-control" required>
                        <span class="errormessage">@error('brgy_clearance') {{ $message }} @enderror</span>
                      </div>
                      <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn text-light fw-bold fs-5" style="background-color: #01A66F" type="submit">Submit</button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>
</div>            
@endsection