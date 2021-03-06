@extends('layouts.masters.master-auth')

@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Moons Orbiting <a href="/planet/{{ $planet->id }}">
                    {{ ucwords($planet->name) }}</a></h1>

            @if(count($moons) < 1)

                <p>Sorry, <a href="/planet/{{ $planet->id }}">
                        {{ ucwords($planet->name) }}</a> has no moons.</p>

                @endif
            <ol class="collection">

                @foreach($moons as $moon)

                <li class="collection-item">
                    <a href="/moon/{{ $moon->id }}">{{ $moon->name }} - {{ $moon->orbital_position }}</a></li>

                    @endforeach

            </ol>


        </div>



    </div>



@endsection