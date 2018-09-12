@extends('layouts.masters.master-auth')

@section('title')

    <title>Zone List of Planets with Life</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <ul class="collection with-header">
                <li class="collection-header"><h4>Planets With Life in Zone {{ $zone }}</h4></li>

                @foreach($planets as $planet)

                <li class="collection-item">
                    <a href="/planet/{{ $planet->Id }}">

                        {{ $planet->Name }}

                    </a>
                </li>

                @endforeach

            </ul>

        </div>


    </div>


@endsection