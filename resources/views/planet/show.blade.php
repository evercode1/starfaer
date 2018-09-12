@extends('layouts.masters.master-auth')

@section('title')

    <title>Planet</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Planet</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ ucwords($planet->name) }}</h4></li>

                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $planet->universe->id }} -
                        {{ $planet->universe->slug }}">
                        {{ $planet->universe->name }}</a></b></li>

                        <li class="collection-item">From Galaxy:
                        <b><a href="/galaxy/{{ $planet->galaxy->id }} -
                        {{ $planet->galaxy->slug }}">
                        {{ $planet->galaxy->name }}</a></b></li>

                        <li class="collection-item">Planet Type:
                        <b><a href="/planet-type/{{ $planet->planetType->id }} -
                        {{ $planet->planetType->slug }}">
                        {{ $planet->planetType->name }}</a></b></li>

                        <li class="collection-item">Orbits Star:
                        <b><a href="/star/{{ $planet->star->id }} -
                        {{ $planet->star->slug }}">
                        {{ $planet->star->name }}</a></b></li>

                        <li class="collection-item">Planet Number From Star:

                        <b>{{ $planet->planet_number_from_star }}</b></li>

                        <li class="collection-item">In Zone:

                        <b><a href="/zone/{{ $planet->star->zone->id }}">
                                {{ $planet->star->zone->name }}</a></b></li>

                        <li class="collection-item">Is ringed?

                        <b>{{ $planet->is_ringed == 1 ? 'Yes' : 'No' }}</b></li>

                        <li class="collection-item">Atmosphere:
                        <b><a href="/atmosphere/{{ $planet->atmosphere->id }} -
                        {{ $planet->atmosphere->slug }}">
                        {{ $planet->atmosphere->name }}</a></b></li>

                        <li class="collection-item">Atmospheric Density:

                        <b>{{ $planet->atmospheric_density }} %</b></li>


                        <li class="collection-item">Mass:

                        <b>{{ $planet->mass / 100 }} times the mass of Earth</b></li>

                       <li class="collection-item">Coordinates:

                      <b>{{ $planet->coordinates }}</b></li>


                        <li class="collection-item">Moon Count:

                        <a href="/moon-list/{{ $planet->id }}"><b>{{ $planet->moon_count }}</b></a></li>

                        @if($planet->ocean_count > 0)

                        <li class="collection-item">Ocean Count:

                        <b>{{ $planet->ocean_count }}</b></li>

                        @endif

                        @if($planet->continent_count > 0)

                        <li class="collection-item">Continent Count:

                        <b>{{ $planet->continent_count }}</b></li>

                         @endif

                         <li class="collection-item">Life Present?

                         <b>{{ $planet->is_life_present == 1 ? 'Yes' : 'No' }}</b></li>

                        <li class="collection-item"><b>{!! $planet->description !!}</b></li>

        </ul>

           <div>
               @if(Auth::user()->isAdmin())

               <div class="row">

                   <a href="/planet/{{ $planet->id }}/edit"  class="waves-effect waves-light btn right">edit</a>
               </div>

              @endif

        </div>

@endsection

