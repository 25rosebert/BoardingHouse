 <div class="sidebar" data-color="azure" data-background-color="white" data-image="frontend/images/propertyfinder.png">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
        <img src="{{asset('frontend/images/logo-green.png')}}" alt=""></a>
      {{-- <img src="{{Auth::user()->picture}}" alt="" style="height:200px; width:100%" srcset=""> --}}
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{Request::is('dashboard') ? 'active':''}}">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{Request::is('properties') ? 'active':''}}">
        <a class="nav-link" href="{{url('properties')}}">
          <i class="fas fa-home"></i>
          <p>Properties</p>
        </a>
      </li>
      <li class="nav-item {{Request::is('categories') ? 'active':''}}">
        <a class="nav-link " href="{{url('categories')}}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
       <li class="nav-item {{Request::is('list of unverified users') ? 'active':''}}">
        <a class="nav-link" href="{{url('list of unverified users')}}">
          <i class="fas fa-id-card"></i>
          <p>User Verification</p>
        </a>
      </li> 
      {{-- <li class="nav-item {{Request::is('pended properties') ? 'active':''}}">
        <a class="nav-link" href="{{url('pended properties')}}">
          <i class="fas fa-id-card"></i>
          <p>Verification</p>
        </a>
      </li>  --}}
       <li class="nav-item {{Request::is('users list') ? 'active':''}}">
        <a class="nav-link" href="{{url('users list')}}">
          <i class="fas fa-users"></i> 
          <p>Users List</p>
        </a>
      </li> 
      <li class="nav-item {{Request::is('maps') ? 'active':''}}">
        <a class="nav-link" href="{{url('maps')}}">
          <i class="fas fa-map-marker-alt"></i>
          <p>Maps</p>
        </a>
      </li>
      <li class="nav-item {{Request::is('profile') ? 'active':''}}">
        <a class="nav-link" href="{{url('profile')}}">
          <i class="fas fa-user"></i>
          <p>My Profile</p>
        </a>
      </li>
      <li class="nav-item">
         <a class="nav-link"href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          <p>{{ __('Logout') }}</p>
        </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
      </li>
    </ul>
  </div>
</div>