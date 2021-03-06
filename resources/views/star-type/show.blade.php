@extends('layouts.masters.master-auth')

@section('title')

    <title>StarType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">StarType</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $starType->name }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $starType->universe->id }} - {{ $starType->universe->slug }}">
                        {{ $starType->universe->name }}</a></b></li>
                        <li class="collection-item">{!! $starType->description !!}</li>
                        <li class="collection-item">Wikipedia:
                        <b><a href="{{ $starType->wiki_url }}">
                        {{ $starType->name }}</a></b></li>


        </ul>



        <div>

        </div>

@endsection

