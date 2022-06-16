@extends('layouts.app')

@section('content')
{{--   
<link rel="stylesheet" href="{{asset("admin/css/material-dashboard.css")}}">
<link rel="stylesheet" href="{{asset('admin/css/material-dashboard.min.css')}}"> --}}

    {{-- Users Dashboard --}}
    
<div class="content">
    <div class="container-sm">
      <div class="row">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>  
    @endif
        
          <div class="card card-profile col-md-3" style="background-color: rgb(255, 255, 255)">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img user_picture" style="position: center; border-radius:50%; width:10rem" src="{{Auth::user()->picture}}"/>
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-danger">Guest User</h6>
              <h4 class="card-title user_name">{{Auth::user()->name}}</h4>
              <p class="card-description text-dark">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nobis, veritatis accusantium in consectetur odit at praesentium aliquid atque repudiandae itaque nisi deleniti magnam aut doloremque tenetur esse ducimus? Vel!
              </p>
              <input type="file" name="user_image" id="user_image" style="opacity: 0;height:1px;display:none border-radius:50%">
                    <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
            </div>
          </div>
     
        <div class="col-md-9" style="padding-left: 30px">
          <div class="card">
            <div class="card-header bg-success">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body text-dark">
              <form class="form-horizontal" method="POST" action="{{ route('updateUserInfo') }}" id="userInfoForm">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Role</label>
                      <input type="text" value="Guest User" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" class="form-control" id="inputUsername"  name="username" value="{{Auth::user()->username}}">
                      <span class="text-danger error-text username_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="text" class="form-control" id="inputEmail" name="email" value="{{Auth::user()->email}}">
                      <span class="text-danger error-text email_error"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name</label>
                      <input type="text" class="form-control" id="inputName" name="name" value="{{Auth::user()->name}}">
                      <span class="text-danger error-text name_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Contact Number</label>
                      <input type="text" class="form-control" name="contact_number" value="{{Auth::user()->contact_number}}">
                      <span class="text-danger error-text contact_number_error"></span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger pull-right">Save Changes</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        {{-- Change Password --}}
        <div class="row">
        <div class="col-md-15" style="padding-left: 25rem; padding-right: 5rem">
          <div class="card">
            <div class="card-header bg-success">
              <h4 class="card-title">Change Password</h4>
              <p class="card-category">Make a new password</p>
            </div>
            <div class="card-body text-dark" id="change_password" >
              <form class="form-horizontal" method="POST" action="{{ route('userChangePassword') }}" id="changePasswordUserForm">
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating" for="oldPass">Old Password</label>
                      <input type="password" class="form-control" id="oldPass" placeholder="Enter current password" name="oldpassword">
                      <span class="text-danger error-text oldpassword_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating" for="">New Password</label>
                      <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                      <span class="text-danger error-text newpassword_error"></span>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Confirm New Password</label>
                      <input type="password" class="form-control" id="reEnterpassword" placeholder="ReEnter new password" name="reEnterpassword">
                      <span class="text-danger error-text reEnterpassword_error"></span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger pull-right">Change Password</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  {{-- <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}"></script> --}}

@endsection
