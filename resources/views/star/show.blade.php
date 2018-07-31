@extends('layouts.master-auth')

@section('title')

    <title>Star</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Star</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $star->name }}</h4></li>
                        <li class="collection-item">From Universe:
                        <b><a href="/universe/{{ $star->universe->id }} - {{ $star->universe->slug }}">
                        {{ $star->universe->name }}</a></b></li>
                        <li class="collection-item">{!! $star->description !!}</li>

        </ul>



        <div>

        </div>

@endsection

