
<nav class="navbar navbar-expand-md navbar-light bg-info shadow-md">
    {{-- <nav class="navbar navbar-inverse navbar-static-top" role="navigation"> --}}
        <div class="container">
    
             {{-- <a class="nav-logo nav-link disabled" href="{{route('homePage')}}"> --}}
                <a class="nav-logo nav-link disabled" href="{{route('homepage')}}">
                <img src="{{asset('frontend/images/logo-green.png')}}" alt="">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-i   on"></span>
            </button>
            @yield('messsage')
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" >
                        <a href="{{url('landingpage')}}" class="nav-link" style="color:#fff">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('#')}}" class="nav-link" style="color:#fff">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('#')}}" class="nav-link" style="color:#fff">Agents</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('#')}}" class="nav-link" style="color: #fff">Contact Us</a>
                    </li>
    
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #fff">{{ __('Login') }}</a>
                            </li>
                        @endif
    
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: #fff">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else   
                        
                    @if (Auth::user()->role_as == '1')
                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 20px">
                            <li>
                                <a class="dropdown-item" href="{{route('adminProfile')}}" >My Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('adminDashboard')}}" >Dashboard</a>
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
                    @else
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style=""> 
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{route('homepage')}}">Home</a>
                            {{-- <a class="nav-link" href="{{route('homePage')}}">Home</a> 
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">List  Property</a>
                            <ul class="dropdown-menu" aria-labelledby="#navDropdown">
                                <li class="dropdown-item"><a style="text-decoration: none; color:black" href="{{route('user.houseandlot.add')}}" style="color: #fff">House and Lot</a></li>
                                <li class="dropdown-item"><a style="text-decoration: none; color:black" href="{{route('user.boarding.add')}}" style="color: #fff">Boarding House</a></li>
                                <li class="dropdown-item"><a style="text-decoration: none; color:black" href="{{route('user.lot.add')}}" style="color: #fff">Lot</a></li>
                                <li class="dropdown-item"><a style="text-decoration: none; color:black" href="{{route('myProperties')}}" style="color: #fff">My Properties</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a  class="nav-link" href="{{route('myProperties')}}">My Properties</a>
                        </li> --}}
                    </ul>
                    <li class="nav-item dropdown" style="" >
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff"  >
                        {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('userProfile')}}">Profile</a>
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
                    @endif
                 
                    @endguest
                </ul>
            </div>
        </div>
    </nav>