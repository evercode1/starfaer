@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Zone</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Zone</h1>

        <div class="row">

            <ul class="collection with-header">

                        <li class="collection-header"><h4>{{ $zone->name }}</h4></li>

                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $zone->universe->id }} - {{ $zone->universe->slug }}">
                        {{ $zone->universe->name }}</a></b>
                        </li>

                        <li class="collection-item">Type:
                        <b><a href="/zone-type/{{ $zone->zoneType->id }} - {{ $zone->zoneType->slug }}">
                        {{ $zone->zoneType->name }}</a></b>
                        </li>

                        <li class="collection-item">Coordinates:  <b>{{ $zone->coordinates }}</b></li>

                        <li class="collection-item">{!! $zone->description !!}</li>

            </ul>


        <div>

        </div>

@endsection

