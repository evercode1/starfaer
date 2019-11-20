@extends('layouts.masters.master-guest')

@section('content')
<div class="container">

    <div class="center">

        <h1 class="center flow-text grey-text text-darken-1">Need to Register? <a href="/register">Click Here</a> </h1>

    </div>

    <div>
           @include('auth.login-form')

    </div>

    <!-- password reset and register links -->

    <div class="left ml-10">

        <a href="{{ url('/password/reset') }}">Forgot password?</a>


    </div>  <!-- end text-center -->

</div>


@endsection








