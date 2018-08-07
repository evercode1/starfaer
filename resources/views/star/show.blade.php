@extends('layouts.masters.master-auth')

@section('title')

    <title>Star</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Star</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ ucwords($star->name) }}</h4></li>
                       <li class="collection-item">Star Type:
                       <b><a href="/star-type/{{ $star->starType->id }} - {{ $star->starType->slug }}">
                        {{ $star->starType->name }}</a></b></li>
                        @if($star->is_binary == 1)

                        <li class="collection-item">{{ $star->name }} is part of a binary system</li>

                        @endif
                        @if($star->has_planets == 1)

                        <li class="collection-item">{{ $star->name }} has
                            <a href="/planet-list/{{ $star->id }}">{{ $star->planet_count }} planets</a></li>

                        @endif

                        <li class="collection-item">Star Age:  {{ $star->age }} billion years</li>
                        <li class="collection-item">Star Mass:  {{ $star->size / 100 }} times the mass of our sun.</li>
                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $star->galaxy->id }} - {{ $star->galaxy->slug }}">
                        {{ $star->galaxy->name }}</a></b></li>
                        <li class="collection-item">In Zone:
                        <b><a href="/zone/{{ $star->zone->id }} - {{ $star->zone->slug }}">
                        {{ $star->zone->name }}</a></b></li>
                        @if( $star->coordinates > 0)
                        <li class="collection-item">Coordinates:  {{ $star->coordinates }}</li>
                        @endif
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $star->universe->id }} - {{ $star->universe->slug }}">
                        {{ $star->universe->name }}</a></b></li>

                        <li class="collection-item"><b>{!! $star->description !!}</b></li>

        </ul>



        <div>

            @if(Auth::user()->isAdmin())
                <div class="row">

                    <a href="/star/{{ $star->id }}/edit"  class="waves-effect waves-light btn right">edit</a>
                </div>

            @endif

        </div>

@endsection

