@extends('layouts.masters.master-auth')

@section('title')

    <title>All Books</title>


    @endsection

@section('content')

    <div class="container">

        <h1 class="flow-text grey-text text-darken-1">All Books</h1>

        <div class="row">

            <all-books></all-books>

        </div>


    </div>


    @endsection