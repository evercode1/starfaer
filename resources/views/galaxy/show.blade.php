@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Galaxy</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Galaxy</h1>

        <div class="row">

        <ul class="collection with-header">
                <li class="collection-header"><h4>{{ $galaxy->name }}</h4></li>
                <li class="collection-item">From Universe:
                <b><a href="/universe/{{ $galaxy->universe->id }} - {{ $galaxy->universe->slug }}">
                {{ $galaxy->universe->name }}</a></b></li>

        </ul>



        <div>

        </div>

@endsection

