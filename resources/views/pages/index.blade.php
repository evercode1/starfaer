<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Star Faer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    @include('layouts.master-partials.css')
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/auth/facebook') }}">FB</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Star Faer
        </div>

        <div class="links">
            <a href="/">Galaxies</a>
            <a href="/">Systems</a>
            <a href="/">Worlds</a>
            <a href="/">Civilizations</a>
            <a href="/">Books</a>
        </div>
    </div>


</div>

<div class="row">

    @include('layouts.master-partials.footer')

</div>
</body>
</html>
