<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {

                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

    body{
        background-image: url("{{url('/images/background.png')}}");
        background-position: center;
    }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .logo > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 600px;
            }

            .title {

                color: #FFF;
                padding: 0 25px;
                font-size: 26px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }
            /*a:hover{*/

            /*    opacity: 0.60;*/

            /*}*/

            /*a:after {*/
            /*    content: "";*/
            /*    display: block;*/
            /*    width: 0;*/
            /*    border-bottom: 3px solid;*/
            /*    margin: 4px auto;*/
            /*    transition:all 0.5s ease-in-out ;*/
            /*}*/

            /*a:hover:after {*/
            /*    width: 75%;*/
            /*}*/

            .m-b-md {
                margin-bottom: 30px;
            }
            .ahome{
                position: absolute;

            }

            .arrowhome{
                position: absolute;
                width: 100px;
                margin-left: 50px;
                transition: 0.5s ease;
            }

            .arrowhome:hover{
                transform: translateX(50px);
                cursor:pointer;

            }
        </style>
    </head>
{{--    style="background-image: url('{{url('/images/background.png')}}')"--}}
    <body>
        <div class="flex-center position-ref full-height">

            <div class="top-left logo">
                <a href="{{ url('/') }}">Medialab</a>
            </div>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">My Medialab</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    @if(Auth::check())
                        Hello {{Auth::user()->name}}, let's get u loaded!
                        <a class="ahome" href="{{route('home')}}">
                        <img class="arrowhome" src="{{url('/images/arrowhome.svg')}}" alt="">
                        </a>
                    @else
                        loan and enjoy, simple
                    @endif
                </div>

            </div>
        </div>
    </body>
</html>
