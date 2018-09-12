@extends('layouts.masters.master-auth')

@section('title')

    <title>Life By Zone</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <ul class="collection with-header">
                <li class="collection-header"><h4>Zones With Life</h4></li>

                @foreach($zones as $zone)

                <li class="collection-item">{{ $zone->Zone }}
                    <a href="/life-zones-show?zone={{ $zone->Id }}"
                       class="secondary-content">{{ $zone->Planets }} - planets
                    </a>
                </li>

                @endforeach

            </ul>

        </div>


    </div>


@endsection