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

    .arrow2{
        width: 30px;
        position: absolute;
        top: 150px;
        left: 300px;
        color: red;
        fill: currentColor;
        transition: 0.5s;
    }

    .arrow2:hover{
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

    .readmore{
        margin-top: -50px;
    }

    .figure{
       width: 55%;
    }

    #disabled{
        cursor: not-allowed;
        pointer-events: none;

    }

    .card-title{
        font-weight: bold;
    }

    .containerRight{
        float: right;
        width: 40%;
    }
.card-text{
   margin-bottom: 5px;
}
.card-small{
    position: relative;
    display: inline-block;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
    margin-left: 25px;
    margin-top: 25px;
}

.card-img-small{
    position: absolute;
    width: 11%;
    right: -10px;
    top: -140px;
    transition: 0.5s;
}

    .card-img-small:hover{
        transform: scale(0.94);
        opacity: 0.6;
        cursor: pointer;
    }




/*.container{*/
/*    max-width: 1200px;*/
/*}*/

/*    .card{*/
/*        display: inline-block;*/
/*        margin-right: 30px;*/
/*        margin-bottom: 30px;*/
/*    }*/

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
