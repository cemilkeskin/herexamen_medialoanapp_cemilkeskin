<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{url('/images/logowhite.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @can('admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users') }}">{{ __('Users') }}</a>
                    </li>
                    @endcan

                        @can('uitleendienst')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('items') }}">{{ __('Items') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('allLoans')}}">{{ __('Loans') }}</a>
                            </li>
                        @endcan

                        @can('user')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('items') }}">{{ __('Items') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loans', Auth::user()->email) }}">{{ __('My Loans') }}</a>
                            </li>
                        @endcan
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
