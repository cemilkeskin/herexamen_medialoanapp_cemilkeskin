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
            background-image: url("{{url('/images/backgempty.png')}}");
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

        .containerAbout{
            margin-top :125px;
            margin-left: 15%;
            margin-right: 15%;
        }
        .titleAbout{
            color: white;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .subtitleAbout{
            color: white;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-left: 75px;
        }
        .textAbout{
            color: white;
            letter-spacing: 1px;
        font-weight: 700;
            margin-left: 175px;
        }

        ul li{
            color: white;
            font-weight: 700;
            transition: 0.5s;
        }

        ul li:hover{
            transform: scale(1.02);
        }
    </style>
</head>
{{--    style="background-image: url('{{url('/images/background.png')}}')"--}}
<body style="overflow: hidden">


    <div class="top-left logo">
        <a href="{{ url('/') }}">Medialab</a>
    </div>

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/about') }}">About</a>
                <a href="{{ url('/home') }}">My Medialab</a>

            @else
                <a href="{{ url('/about') }}">About</a>
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif

            @endauth
        </div>
    @endif

    <div class="containerAbout">

           <h2 class="titleAbout" style="margin-bottom: 65px">About Medialoanapp</h2>
        <h4 class="subtitleAbout">THE BAWSS of tutorials, laravel crud</h4>
        <ul style="margin-left: 135px">
            <li><a href="https://www.techiediaries.com/laravel/php-laravel-7-6-tutorial-crud-example-app-bootstrap-4-mysql-database/">https://www.techiediaries.com/laravel/php-laravel-7-6-tutorial-crud-example-app-bootstrap-4-mysql-database/</a></li>
        </ul>
           <h4 class="subtitleAbout">authentication and authorization</h4>
        <ul style="margin-left: 135px">
            <li><a href="https://laravel.com/docs/7.x/authentication">https://laravel.com/docs/7.x/authentication</a></li>
            <li><a href="https://laravel.com/docs/7.x/authorization">https://laravel.com/docs/7.x/authorization</a></li>
        </ul>
        <h4 class="subtitleAbout">laravel popup alerts</h4>
        <ul style="margin-left: 135px">
            <li><a href="https://www.5balloons.info/best-way-to-pass-bootstrap-alert-flash-messages-in-laravel/">https://www.5balloons.info/best-way-to-pass-bootstrap-alert-flash-messages-in-laravel/</a></li>
        </ul>
        <h4 class="subtitleAbout">bootstrap library</h4>
        <ul style="margin-left: 135px">
            <li><a href="https://themes.getbootstrap.com/">https://themes.getbootstrap.com/</a></li>
        </ul>
        <h4 class="subtitleAbout">laravel date time </h4>
        <ul style="margin-left: 135px">
            <li><a href="https://stackoverflow.com/questions/6982692/how-to-set-input-type-dates-default-value-to-today">https://stackoverflow.com/questions/6982692/how-to-set-input-type-dates-default-value-to-today</a></li>
            <li><a href="https://stackoverflow.com/questions/28807774/php-add-one-week-to-a-user-defined-date/28807838">https://stackoverflow.com/questions/28807774/php-add-one-week-to-a-user-defined-date/28807838</a></li>
            <li><a href="https://stackoverflow.com/questions/5174789/php-add-7-days-to-date-format-mm-dd-yyyy/32109423">https://stackoverflow.com/questions/5174789/php-add-7-days-to-date-format-mm-dd-yyyy/32109423</a></li>
        </ul>
        <h4 class="subtitleAbout">laravel specific selection from database </h4>
        <ul style="margin-left: 135px">
            <li><a href="https://laravel.com/docs/7.x/queries#parameter-grouping">https://laravel.com/docs/7.x/queries#parameter-grouping</a></li>
        </ul>
        <h4 class="subtitleAbout">laravel url controller helper </h4>
        <ul style="margin-left: 135px">
            <li><a href="https://laravel.com/docs/5.1/helpers#urls">https://laravel.com/docs/5.1/helpers#urls</a></li>
            <li><a href="https://stackoverflow.com/questions/52777156/laravel-5-how-to-pass-multiple-parameter-in-get-route">https://stackoverflow.com/questions/52777156/laravel-5-how-to-pass-multiple-parameter-in-get-route</a></li>
        </ul>





    </div>

</body>
</html>
