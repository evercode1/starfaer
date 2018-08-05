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

        </div>

@endsection

