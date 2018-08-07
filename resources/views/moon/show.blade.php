@extends('layouts.masters.master-auth')

@section('title')

    <title>Moon</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Moon</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $moon->name }}</h4></li>
                        <li class="collection-item">Orbits Planet:
                        <b><a href="/planet/{{ $moon->planet->id }} -
                        {{ $moon->planet->slug }}">
                        {{ $moon->planet->name }}</a></b></li>

                        <li class="collection-item">Orbital Position:
                        <b>{{ $moon->orbital_position }}</b></li>

                        <li class="collection-item">Mass:
                        <b>{{ $moon->mass / 100 }} times the mass of Earth's moon</b></li>

                        <li class="collection-item">Surface Type:
                        <b><a href="/surface-type/{{ $moon->surfaceType->id }} -
                        {{ $moon->surfaceType->slug }}">
                        {{ $moon->surfaceType->name }}</a></b></li>

                        <li class="collection-item">Atmosphere:
                        <b><a href="/atmosphere/{{ $moon->atmosphere->id }} -
                        {{ $moon->atmosphere->slug }}">
                        {{ $moon->atmosphere->name }}</a></b></li>

                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $moon->universe->id }} -
                        {{ $moon->universe->slug }}">
                        {{ $moon->universe->name }}</a></b></li>

                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $moon->galaxy->id }} -
                        {{ $moon->galaxy->slug }}">
                        {{ $moon->galaxy->name }}</a></b></li>

                        <li class="collection-item">{!! $moon->description !!}</li>

        </ul>



        <div>
            <div class="row">

                <a href="/moon/{{ $moon->id }}/edit"  class="waves-effect waves-light btn right">edit</a>
            </div>

        </div>

@endsection

