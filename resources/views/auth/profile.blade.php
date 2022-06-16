@extends('layouts.admin')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
              <img class="img admin_picture" src="{{Auth::user()->picture}}" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Admin</h6>
            <h4 class="card-title admin_name">{{Auth::user()->name}}</h4>
            <p class="card-description">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nobis, veritatis accusantium in consectetur odit at praesentium aliquid atque repudiandae itaque nisi deleniti magnam aut doloremque tenetur esse ducimus? Vel!
            </p>
            <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
          </div>
        </div>
      </div>


      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('adminUpdateInfo') }}" id="AdminInfoForm">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Role</label>
                    <input type="text" value="Administrator" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" class="form-control" id="inputUsername"  name="username" value="{{Auth::user()->username}}">
                    <span class="text-danger error-text username_error"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email address</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="{{Auth::user()->email}}">
                    <span class="text-danger error-text email_error"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{Auth::user()->name}}">
                    <span class="text-danger error-text name_error"></span>
                  </div>
                </div>
                <div class="col-md-12">
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
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Change Password</h4>
            <p class="card-category">Make a new password</p>
          </div>
          <div class="card-body" id="change_password" >
            <form class="form-horizontal" method="POST" action="{{ route('adminChangePassword') }}" id="changePasswordAdminForm">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating" for="inputName">Old Password</label>
                    <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                    <span class="text-danger error-text oldpassword_error"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating" for="">New Password</label>
                    <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                    <span class="text-danger error-text newpassword_error"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Confirm New Password</label>
                    <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                    <span class="text-danger error-text cnewpassword_error"></span>
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
   
@endsection

@section('script')
    
@endsection