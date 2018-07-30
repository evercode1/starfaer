@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Zone Type Generator</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Zone Type Generator</h1>

                <section class="mt-20">

                    @include('zone-type-generator.create-form')

                </section>

        </div>

    </div>

@endsection

