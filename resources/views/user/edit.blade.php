@extends('layouts.master-admin')

@section('title')

    <title>Edit a User</title>

@endsection

@section('content')

    <div class="container">

        <div class="row">


            @include('user.edit-form')


        </div>


    </div>



@endsection