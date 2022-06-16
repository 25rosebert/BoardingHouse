@extends('layouts.admin')

@section('css')
{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('css/previewImg.css                                                                                                        ')}}">
<style>

/* demo class for thumbnail images on the page */
.thumbnails{
  max-width: 300px;
  height: auto;
  cursor: pointer;
}
</style>                 
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
                  <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-muted" style="text-decoration:none">Verify User</a></li>                      
                </ol>
              </nav>
            <div class="card">
                <div class="card-header card-header-success">
                    <h3 class="">List of Semi-verified Users waiting to be Fully-verified</h3>
                    <p>Verify User</p>
                </div>
                <div class="card-body">
                    <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm" style="float: right"><i class="fas fa-arrow-left"></i></a>            
            <table class="table-hover table-bordered" id="unverifiedUsers" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Birthdate</th>
                        <th class="text-center">Type of ID</th>
                        <th class="text-center">Front of ID</th>
                        <th class="text-center">Back of ID</th>         
                        <th class="text-center">User's Photo</th>
                        <th class="text-center">Brgy Clearance</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($unVerified as $users)
                        <tr>
                            <td>{{$users->user->name}}</td>
                            <td>{{$users->age}}</td>
                            <td>{{$users->birthdate}}</td>
                            <td>{{$users->id_type}}</td>
                            <td>                              
                                <div class="img-container">
                                    <div class="image">
                                        <img src="{{asset('assets/upload/verification/'.$users->frontOfID)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">
                                    </div>
                                </div>
                                <div class="popup-img">
                                    <span>&times;</span>
                                    <img src="{{asset('assets/upload/verification/'.$users->frontOfID)}}" alt="">
                                </div>                                
                            </td>
                            <td>                              
                                <div class="img-container">
                                    <div class="image">
                                        <img src="{{asset('assets/upload/verification/'.$users->backOfID)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">                                
                                    </div>
                                </div>
                                <div class="popup-img">
                                    <span>&times;</span>
                                    <img src="{{asset('assets/upload/verification/'.$users->backOfID)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">                                
                                </div>              
                            </td>
                            <td>                            
                                <div class="img-container">
                                    <div class="image">
                                        <img src="{{asset('assets/upload/verification/'.$users->photo)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">
                                    </div>
                                </div>
                                <div class="popup-img">
                                    <span>&times;</span>
                                    <img src="{{asset('assets/upload/verification/'.$users->photo)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">
                                </div>                                                                        
                            </td>
                            <td>
                                <div class="img-container">
                                    <div class="image">
                                        <img src="{{asset('assets/upload/verification/'.$users->brgy_clearance)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">
                                    </div>
                                </div>
                                <div class="popup-img">
                                    <span>&times;</span>
                                    <img src="{{asset('assets/upload/verification/'.$users->brgy_clearance)}}" class="thumbnails" alt="no-image" style="max-height: 100px; max-width:100px">
                                </div>                                                                               
                            </td>                        
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('viewUnverifiedUser',$users->id)}}">View</a>
                                <a class="btn btn-success btn-sm" href="{{route('verifyUser',[$users->users_id,$users->id])}}">Verify</a>
                                <form action="{{route('rejectUnverifiedUser',$users->id)}}" method="GET">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"
                                     type="submit">Reject</button>
                                </form>
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
<script>
    document.querySelectorAll('.img-container img').forEach(image =>{
        image.onclick = () =>{
        document.querySelector('.popup-img').style.display = 'block';
        document.querySelector('.popup-img img').src = image.getAttribute('src');
        }
    });
    document.querySelector('.popup-img span').onclick=() =>{
        document.querySelector('.popup-img').style.display = 'none';
    }
</script>
<script src="{{asset('datatables/datatables.min.js')}}"></script> 
<script>
    $(document).ready( function () {
    $('#unverifiedUsers').DataTable();
});

  </script>
@endpush
