<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.master-partials.meta')

    @yield('title')

    @include('layouts.master-partials.css')

    @include('layouts.master-partials.shiv')

</head>

<body>



<div id="app">

    @include('layouts.master-partials.top-nav')


    <div>


        <div class="row">

    @yield('content')



        </div><!-- end row -->

    </div><!--  end container -->

    @include('layouts.master-partials.footer')

</div> <!-- end app for vue -->

    @include('layouts.master-partials.scripts')



</body>
</html>
