@extends('layouts.masters.master-auth')

@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Planets Orbiting The Star {{ ucwords($star->name) }}</h1>

            <ol class="collection">

                @foreach($planets as $planet)

                <li class="collection-item">
                    <a href="/planet/{{ $planet->id }}">{{ $planet->name }} - {{ $planet->planetType->name }} - {{ $planet->planet_number_from_star }}</a></li>

                    @endforeach

            </ol>


        </div>



    </div>



@endsection