@extends('layouts.admin')

@section('css')
{{-- DataTables --}}
<link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-muted" style="text-decoration:none"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('users list')}}" class="text-muted" style="text-decoration:none">Users</a></li>        
            </ol>
          </nav>
        <a href="{{url('dashboard')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i></a>
        <a href="{{url('/exportPDF')}}" class="btn btn-success btn-sm float-right">Export to PDF</i></a>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users List Table</h4>
              <p class="card-category"> Here are the total list of Users of th system</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-light table-hover table-bordered" id="userList" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                <th>Verified</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($users as $users)
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->username}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->contact_number}}</td>
                                @if ($users->role_as === '0')
                                    <td>Guest</td>
                                @elseif($users->role_as === '1')
                                    <td>Admin</td>
                                @else
                                    <td>Undefined</td>
                                @endif
                                  @if ($users->verified === 1)
                                      <td>Fully-Verified</td>
                                  @elseif($users->verified === 0)
                                      <td>Semi-Verified</td>
                                  @else
                                    <td>Unverifieds</td>
                                  @endif                                
                                {{-- <td>
                                    <a href="{{url('delete user/'.$users->id)}}" class="btn btn-danger btn-sm">Delee</a>
                                </td> --}}
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
    $('#userList').DataTable();
});
  </script>
@endpush

