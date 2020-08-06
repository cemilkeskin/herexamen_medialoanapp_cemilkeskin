<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>

    .logo{
        width: 15%;
        transition: 0.5s;
    }
    .logo:hover{
        transform: scale(0.95);
        opacity: 0.60;
    }

    .arrow{
        width: 30px;
        position: absolute;
        top: 150px;
        left: 500px;
        color: red;
        fill: currentColor;
        transition: 0.5s;
    }

    .arrow:hover{
        cursor:pointer;
        color: darkred;
        transform: scale(0.92);
        opacity: 0.60;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #FFF;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        transition: 0.5s;
    }

    .navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
        opacity: 0.60;
        color: #fff;
    }

    .iconUser{
        width: 22px;
        margin-left: 20px;
        transition: 0.5s;
    }

    .iconUser:hover
    {

        transform: scale(0.92);
        opacity: 0.60;
    }

    #card-right{
        position: absolute;
        right: 390px;

    }


    nav{
        background-image: url("{{url('/images/background.png')}}");
    }
</style>
<body>
    <div id="app">

            @include('partials.header')

        <main class="py-4">

            @yield('content')

        </main>
    </div>
</body>
</html>
