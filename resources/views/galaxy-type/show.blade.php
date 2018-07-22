@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>GalaxyType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">GalaxyType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $galaxyType->name }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $galaxyType->universe->id }} - {{ $galaxyType->universe->slug }}">
                        {{ $galaxyType->universe->name }}</a></b></li>
                        <li class="collection-item">{!! $galaxyType->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

