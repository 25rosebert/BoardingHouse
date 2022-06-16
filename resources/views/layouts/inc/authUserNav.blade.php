<nav class="main-nav">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <div class="logo">
        <a><img src="{{asset('images/propertyfinder.png')}}" alt="logo"></a>
    </div>
    <ul>
        
        @if (Auth::user()->role_as === '1')
         <li><a href="{{url('/home')}}" class="active">Home</a></li>
        <!-- Left Side Of Navbar -->
        <li class=""><a href="{{route('dashboard')}}">Dashboard</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="navDropdown" role="button" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
            <ul class="dropdown-menu" aria-labelledby="#navDropdown">
                <li class="dropdown-item"><a href="{{route('adminProfile')}}">Profile</a></li>
                <li class="dropdown-item">
                    <a class=""href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </li>
@endif

    @if (Auth::user()->role_as === '0')        
        <li><a href="{{url('/home')}}"  class="{{Request::is('home') ? 'active':''}}">Home</a></li>
        <!-- Left Side Of Navbar -->
        <li class="dropdown"> 
            <a href="#" class="dropdown-toggle" id="navDropdown" role="button" data-bs-toggle="dropdown">List Your Property</a>
                <ul class="dropdown-menu" aria-labelledby="#navDropdown">
                    <li class="dropdown-item"><a  href="{{route('user.houseandlot.add')}}">House and Lot</a></li>
                    <li class="dropdown-item"><a  href="{{route('user.boarding.add')}}">Boarding House</a></li>
                    <li class="dropdown-item"><a href="{{route('user.lot.add')}}">Lot</a></li><hr>
                    <li class="dropdown-item"><a href="{{route('myProperties')}}">My Properties</a></li>
                </ul>
        </li>
        @if (Auth::user()->verified === 0)        
        <li class=""><a href="{{route('verify.account')}}"  class="{{Request::is('account_verification') ? 'active':''}}">Verify Now</a></li>            
        {{-- @else --}}
        @endif
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="navDropdown" role="button" data-bs-toggle="dropdown">{{Auth::user()->name}}</a>
            <ul class="dropdown-menu" aria-labelledby="#navDropdown">
                <li class="dropdown-item"><a href="{{route('userProfile')}}">Profile</a></li>
                <li class="dropdown-item">
                    <a class=""href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</nav>




{{-- @guest
            @if (Route::has('login'))
                <li class="">
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="">
                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else           
           <li>
               <a href="{{url('home')}}">{{Auth::user()->name}}</a>
           </li>
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
        @endguest --}}