@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>ZoneType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">ZoneType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $zoneType->name }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $zoneType->universe->id }} - {{ $zoneType->universe->slug }}">
                        {{ $zoneType->universe->name }}</a></b></li>
                        <li class="collection-item">{!! $zoneType->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

