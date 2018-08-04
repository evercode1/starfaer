@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create Planet Generator</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Planet Generator</h1>

                <section class="mt-20">

                    @include('planet-generator.create-form')

                </section>

        </div>

    </div>

@endsection