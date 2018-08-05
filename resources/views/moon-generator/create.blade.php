@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Moon Generator</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Moon Generator</h1>

                <section class="mt-20">

                    @include('moon-generator.create-form')

                </section>

        </div>

    </div>

@endsection