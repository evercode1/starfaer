@extends('layouts.masters.master-admin-dash')

@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Seeds created, check your {{ $name }} config file.</h1>

            <div class="row">

                <a href="/seeder" class="waves-effect waves-light btn">Create More Seeds</a>


            </div>



        </div>



    </div>



    @endsection