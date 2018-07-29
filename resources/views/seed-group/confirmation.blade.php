@extends('layouts.masters.master-admin-dash')

@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Seed Group created, check your {{ $configName }} config file.</h1>

            <div class="row">

                <a href="/seed-group" class="waves-effect waves-light btn">Create More Seed Groups</a>


            </div>



        </div>



    </div>



    @endsection