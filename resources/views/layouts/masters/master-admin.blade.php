<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.admin-partials.meta')
    @include('layouts.master-partials.css')

</head>

<body role="document">

<div id="app">

    @include('layouts.admin-partials.top-nav')

    {{--@include('layouts.admin-partials.left-nav')--}}

    @yield('content')

    @include('layouts.admin-partials.footer')

</div> <!-- end app div for vue -->

@include('layouts.admin-partials.scripts')

</body>


</html>