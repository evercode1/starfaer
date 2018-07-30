@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Galaxy Generator</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Galaxy Generator</h1>

                <section class="mt-20">

                    @include('galaxy-generator.create-form')

                </section>

        </div>

    </div>

@endsection

