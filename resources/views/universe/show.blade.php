@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Universes</title>

    @endsection

@section('content')


    <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Universe</h1>

        <div class="row">

            <ul class="collection with-header">
                <li class="collection-header"><h4>{{ $universe->name }}</h4></li>
                <li class="collection-item">Author:  {{ $universe->author }}</li>
                <li class="collection-item">Description: <p><b>{!! $universe->description !!}</b></p></li>

            </ul>




        </div>



    </div>


    @endsection