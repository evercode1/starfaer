@extends('layouts.masters.master-auth')

@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Planets Orbiting The Star {{ ucwords($star->name) }}</h1>

            <ol class="collection">

                @foreach($planets as $planet)

                <li class="collection-item">
                    <a href="/planet/{{ $planet->id }}">
                        {{ ucwords($planet->name) }} </a>- planet type is {{ $planet->planetType->name }}
                    - has {{ $planet->is_life_present == 1 ? 'life' : 'no life' }}
                    - has {{ $planet->moon_count }} moons</li>

                    @endforeach

            </ol>


        </div>



    </div>



@endsection