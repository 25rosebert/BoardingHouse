   
<!-- Header Starts -->
<div class="navbar-wrapper">

    <div class="navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <!-- Nav Starts -->
        <div class="navbar-collapse  collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item {{Request::is('/') ? 'active':''}}"><a href="{{url('/')}}">Home</a></li>
            <li class="nav-item {{Request::is('about') ? 'active':''}}"><a href="{{url('about')}}">About Us</a></li>
            <li class="nav-item {{Request::is('agents') ? 'active':''}}"><a href="{{url('agents')}}">Agents</a></li>         
            <li class="nav-item {{Request::is('contact') ? 'active':''}}"><a href="{{url('contact ')}}">Contact Us</a></li>
            {{-- <li class="nav-item {{Request::is('property listing') ? 'active':''}}"><a href="{{url('property listing')}}">Property Listing</a></li>     --}}
            
             <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/home " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#" >My Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item"href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                </li>
                @endguest
          </ul>
        </div>
        <!-- #Nav Ends -->

      </div>
    </div>

</div>
<!-- #Header Starts -->

<div class="container">
    
<!-- Header Starts -->
<div class="header">
    <a href="{{url('/')}}"><img src="{{asset("frontend/images/propertyfinder.png")}}" alt="Realestate"></a>
    {{-- <a href="index.php"><img src="{{asset('frontend/images/logo1.png')}}" class="logo"  alt="Realestate"></a> --}}
                  <ul class="pull-right">
                    <li><a href="buysalerent.php">Buy</a></li>
                    <li><a href="buysalerent.php">Sale</a></li>         
                    <li><a href="buysalerent.php">Rent</a></li>
                  </ul>
    </div>
    <!-- #Header Starts -->
    </div>
</div>

