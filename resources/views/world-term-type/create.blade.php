@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create a WorldTermType</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">WorldTermType</h1>

                <section class="mt-20">

                    @include('world-term-type.create-form')

                </section>

        </div>

    </div>

@endsection

