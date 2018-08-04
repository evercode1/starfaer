@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Atmosphere Generator</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Atmosphere Generator</h1>

                <section class="mt-20">

                    @include('atmosphere-generator.create-form')

                </section>

        </div>

    </div>

@endsection