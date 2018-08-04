@extends('layouts.masters.master-auth')

@section('title')

    <title>Atmosphere</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Atmosphere</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ ucwords($atmosphere->name) }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $atmosphere->universe->id }} - {{ $atmosphere->universe->slug }}">
                        {{ $atmosphere->universe->name }}</a></b></li>
                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $atmosphere->galaxy->id }} - {{ $atmosphere->galaxy->slug }}">
                        {{ $atmosphere->galaxy->name }}</a></b></li>
                        <li class="collection-item">{!! $atmosphere->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

