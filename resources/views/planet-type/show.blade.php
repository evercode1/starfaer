@extends('layouts.masters.master-auth')

@section('title')

    <title>PlanetType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">PlanetType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $planetType->name }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $planetType->universe->id }} - {{ $planetType->universe->slug }}">
                        {{ $planetType->universe->name }}</a></b></li>
                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $planetType->galaxy->id }} - {{ $planetType->galaxy->slug }}">
                        {{ $planetType->galaxy->name }}</a></b></li>
                        <li class="collection-item">{!! $planetType->description !!}</li>
                        <li class="collection-item">Wiki Article:
                        <b><a href="{{ $planetType->wiki_url }}">
                                {{ $planetType->wiki_url }}</a></b></li>

        </ul>



        <div>

        </div>

@endsection

