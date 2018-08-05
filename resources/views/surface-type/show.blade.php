@extends('layouts.masters.master-auth')

@section('title')

    <title>SurfaceType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">SurfaceType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $surfaceType->name }}</h4></li>

                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $surfaceType->universe->id }} -
                        {{ $surfaceType->universe->slug }}">
                        {{ $surfaceType->universe->name }}</a></b></li>

                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $surfaceType->galaxy->id }} -
                        {{ $surfaceType->galaxy->slug }}">
                        {{ $surfaceType->galaxy->name }}</a></b></li>

                        <li class="collection-item">{!! $surfaceType->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

