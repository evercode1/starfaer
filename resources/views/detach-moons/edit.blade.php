@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Detach Moon</title>

@endsection



@section('content')

    <div class="container ">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Detach Moons From Planet</h1>

            <section class="mt-20">

                @include('detach-moons.create-form')

            </section>

        </div>

    </div>

@endsection