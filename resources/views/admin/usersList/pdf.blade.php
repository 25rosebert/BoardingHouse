<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users List Table</h4>
                  <p class="card-category"> Here are the total list of Users of the system</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="userList" >
                            <thead>
                                <tr>
    
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
</body>
</html>






