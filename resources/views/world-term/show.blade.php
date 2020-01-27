@extends('layouts.masters.master-auth')

@section('title')

    <title>WorldTerm</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">World Term</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $worldTerm->name }}</h4></li>

                        <li class="collection-item">From Planet:
                        <b><a href="/planet/{{ $planetId }}">
                        {{ $planetName }}</a></b></li>

                        <li class="collection-item">First Appearance:
                        <b><a href="/book/{{ $bookId }}">
                        {{ $bookTitle }}</a></b></li>


                        <li class="collection-item">{!! $worldTerm->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

