@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Edit WorldTermType</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit WorldTermType</h1>

                <section class="mt-20">

                @include('world-term-type.edit-form')

                </section>

            </div>

    </div>

@endsection

