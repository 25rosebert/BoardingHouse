    <nav class="main-nav">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <div class="logo">
            <a><img src="{{asset('images/propertyfinder.png')}}" alt="logo"></a>
        </div>
        <ul>
            <li>
                <a href="{{url('/')}}" class="{{Request::is('/') ? 'active':''}}">Home</a>
            </li>
            <li>
                {{-- <a href="{{route('pages.aboutUs')}}" class="{{Request::is('about') ? 'active':''}}">About Us</a> --}}
                <a href="{{route('showMap')}}" class="{{Request::is('all property locations') ? 'active':''}}">Map</a>
            </li>
            <li>
                <a href="{{route('pages.agents')}}" class="{{Request::is('agents') ? 'active':''}}">Privacy Policy</a>
            </li>
            <li>
                <a href="{{route('pages.contactUs')}}" class="{{Request::is('contact') ? 'active':''}}">Contact Us</a>
            </li>
            {{-- <li><a href="#">Login</a></li>
            <li><a href="#">Register</a></li> --}}
            @guest
                @if (Route::has('login'))
                    <li class="">
                        <a class="{{Request::is('login') ? 'active':''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="">
                        <a class="{{Request::is('register') ? 'active':''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else           
               <li>
                   {{-- <a href="{{url('home')}}">{{Auth::user()->name}}</a> --}}
                   <a href="{{url('home')}}">My Account</a>
               </li>
                {{-- <li>
                    <a class="dropdown-item" href="#" >My Profile</a>
                </li>
                <li>
                    <a class="dropdown-item"href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li> --}}
            @endguest
        </ul>
    </nav>