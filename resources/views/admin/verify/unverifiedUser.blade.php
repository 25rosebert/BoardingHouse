@extends('layouts.admin')

@section('content')
<style>
    .card {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
</style>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{route('viewUnverifiedAccount')}}" class="text-muted" style="text-decoration:none">Unverfied Users</a></li>                     
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}" class="text-muted" style="text-decoration:none">View Unverified user Details</a></li>                      
            </ol>
          </nav>
    <a href="{{route('viewUnverifiedAccount')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
        <div class="row">
            @foreach($unVerifiedUser as $users)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h2>Review Verification Details</h2>
                        <p>Users Additional Information</p>
                    </div>
                    <div class="card-body">
                        <form class="form-group">
                            <div class="row">                            
                                <div class="col-md-3"><h5 class="text-muted">User's Name:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$users->user->name}}</p class="fs-5 fw-bold" style="color: limegreen"></div><div class="col-md-3"><h5 class="text-muted">Age:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$users->age}}</p class="fs-5 fw-bold" style="color: limegreen"></div>    
                            <div class="col-md-3"><h5 class="text-muted">Type of ID:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$users->id_type}}</p class="fs-5 fw-bold" style="color: limegreen"></div>
                            <div class="col-md-3"><h5 class="text-muted">Birthday:</h5></div>                
                                <div class="col-md-3"><p class="fs-5 fw-bold" style="color: limegreen">{{$users->birthdate}}</p class="fs-5 fw-bold" style="color: limegreen"></div>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h6><b> Front PIC Of the Users ID</b></h6>
                        </div>
                        
                        <div class="card-body">
                            <img src="{{asset('assets/upload/verification/'.$users->frontOfID)}}" style="height: 500px; width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h6><b>Back PIC of the Users ID</b></h6>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('assets/upload/verification/'.$users->backOfID)}}" style="height: 500px; width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h6><b>Users Photo</b></h6>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('assets/upload/verification/'.$users->photo)}}" style="height: 500px; width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h6><b>Barangay Clearance</b></h6>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('assets/upload/verification/'.$users->brgy_clearance)}}" style="height: 500px; width:100%" alt="No Image" srcset="">
                        </div>
                    </div>
                </div>                            
            </div>
            
            <div class="col">
                <a class="btn btn-success btn-lg fs-4 fw-bold" href="{{route('verifyUser',[$users->users_id,$users->id])}}">Verify</a>
            </div>

            @endforeach
        </div>
    </div>
@endsection